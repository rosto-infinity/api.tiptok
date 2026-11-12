<?php

declare(strict_types=1);

use App\Actions\Fortify\ResetUserPassword;
use App\Models\User;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;

it('returns security headers on responses', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
    $response->assertHeader('X-Content-Type-Options', 'nosniff');
    $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
    $response->assertHeader('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');
    $response->assertHeader('X-Permitted-Cross-Domain-Policies', 'none');
    expect((string) $response->headers->get('Content-Security-Policy'))->toContain("default-src 'self'");
});

it('returns clean 401 json without stack trace and strict csp when unauthenticated on api routes', function () {
    $response = $this->get('/api/user');

    $response->assertStatus(401)
        ->assertJson(['message' => 'Unauthenticated.'])
        ->assertHeader('Content-Type', 'application/json')
        ->assertHeader('Content-Security-Policy', "default-src 'none'; frame-ancestors 'none'; base-uri 'none'");

    expect($response->content())->not->toContain('RouteNotFoundException')
        ->not->toContain('vendor/laravel');
});

it('revokes bearer token in database on logout', function () {
    $user = User::factory()->create();
    $newToken = $user->createToken('TipTok Web App');

    $this->actingAs($user);

    $response = $this->withToken($newToken->plainTextToken)
        ->postJson('/logout');

    $response->assertStatus(200)
        ->assertJson(['message' => 'Logged out successfully.']);

    expect(PersonalAccessToken::find($newToken->accessToken->id))->toBeNull();
});

it('sets expiration and sanitizes device_name when issuing login tokens', function () {
    $user = User::factory()->create([
        'email' => 'token-security@tiptok.ci',
        'password' => 'Password123!',
    ]);

    $dirtyName = "MacBook\n\t".str_repeat('X', 150);

    $response = $this->postJson('/login', [
        'email' => 'token-security@tiptok.ci',
        'password' => 'Password123!',
        'device_name' => $dirtyName,
    ]);

    $response->assertStatus(200);

    $token = $user->tokens()->latest()->firstOrFail();
    expect(strlen($token->name))->toBeLessThanOrEqual(100);
    expect($token->name)->not->toContain("\n")->not->toContain("\t");
    expect($token->expires_at)->not->toBeNull();
});

it('revokes all tokens and rotates remember_token on password reset', function () {
    $user = User::factory()->create([
        'remember_token' => 'old-remember-token',
    ]);
    $token = $user->createToken('Stale Device');

    app(ResetUserPassword::class)->reset($user, [
        'password' => 'NewResetPassword123!',
        'password_confirmation' => 'NewResetPassword123!',
    ]);

    $user->refresh();
    expect($user->tokens()->count())->toBe(0);
    expect(PersonalAccessToken::find($token->accessToken->id))->toBeNull();
    expect($user->remember_token)->not->toBe('old-remember-token');
});

it('revokes other tokens and rotates remember_token on password update while preserving current bearer token', function () {
    $user = User::factory()->create([
        'password' => Hash::make('CurrentPass123!'),
        'remember_token' => 'old-remember-token',
    ]);

    $currentToken = $user->createToken('Current Browser');
    $otherToken = $user->createToken('Lost Phone');

    $this->actingAs($user);

    $response = $this->withToken($currentToken->plainTextToken)
        ->putJson('/user/password', [
            'current_password' => 'CurrentPass123!',
            'password' => 'UpdatedPass456!',
            'password_confirmation' => 'UpdatedPass456!',
        ]);

    $response->assertStatus(200);

    $user->refresh();
    expect(PersonalAccessToken::find($currentToken->accessToken->id))->not->toBeNull();
    expect(PersonalAccessToken::find($otherToken->accessToken->id))->toBeNull();
    expect($user->remember_token)->not->toBe('old-remember-token');
});

it('handles session transient token safely on token endpoints and rejects non-numeric token ids', function () {
    $user = User::factory()->create();
    $user->createToken('Other Device');

    $this->actingAs($user);

    $indexResponse = $this->getJson('/api/user/tokens');
    $indexResponse->assertStatus(200)
        ->assertJsonPath('data.0.is_current', false);

    $this->deleteJson('/api/user/tokens/1abc')->assertStatus(404);

    $this->deleteJson('/api/user/tokens/others')->assertStatus(200);
    expect($user->tokens()->count())->toBe(0);
});

it('allows clearing nullable profile fields to null', function () {
    $user = User::factory()->create([
        'name' => 'Kouadio',
        'email' => 'kouadio@tiptok.ci',
        'phone' => '+2250707070707',
        'birth_date' => '1995-05-10',
        'birth_place' => 'Abidjan',
    ]);

    $this->actingAs($user);

    $response = $this->putJson('/user/profile-information', [
        'name' => 'Kouadio Updated',
        'email' => 'kouadio@tiptok.ci',
        'phone' => null,
        'birth_date' => null,
        'birth_place' => null,
    ]);

    $response->assertStatus(200);

    $user->refresh();
    expect($user->phone)->toBeNull();
    expect($user->birth_date)->toBeNull();
    expect($user->birth_place)->toBeNull();
});

it('rejects corrupt image payload disguised as jpeg without deleting existing avatar', function () {
    Storage::fake('public');

    $user = User::factory()->create();
    Sanctum::actingAs($user, ['*']);

    $validAvatar = UploadedFile::fake()->image('valid.jpg', 400, 400);
    $this->postJson('/api/user/avatar', ['avatar' => $validAvatar])->assertStatus(200);

    $user->refresh();
    $existingPath = $user->avatar;
    Storage::disk('public')->assertExists($existingPath);

    $corruptFile = UploadedFile::fake()->createWithContent('corrupt.jpg', 'not-a-real-jpeg-binary');
    $response = $this->postJson('/api/user/avatar', ['avatar' => $corruptFile]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['avatar']);

    $user->refresh();
    expect($user->avatar)->toBe($existingPath);
    Storage::disk('public')->assertExists($existingPath);
});

it('rate limits sensitive account deletion requests', function () {
    $user = User::factory()->create([
        'password' => Hash::make('Secret123!'),
    ]);

    Sanctum::actingAs($user);

    for ($i = 0; $i < 5; $i++) {
        $this->deleteJson('/api/user/account', [
            'password' => 'WrongPassword!',
        ])->assertStatus(422);
    }

    $this->deleteJson('/api/user/account', [
        'password' => 'WrongPassword!',
    ])->assertStatus(429);
});

it('enforces csrf protection without blanket fortify exemptions', function () {
    $middleware = app(ValidateCsrfToken::class);
    $reflection = new ReflectionProperty($middleware, 'except');
    $except = $reflection->getValue($middleware);

    expect($except)->not->toContain('login')
        ->not->toContain('register')
        ->not->toContain('logout')
        ->not->toContain('two-factor-challenge')
        ->not->toContain('user/*');
});
