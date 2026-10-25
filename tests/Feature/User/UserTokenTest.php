<?php

declare(strict_types=1);

use App\Models\User;

it('denies unauthenticated access to token endpoints', function () {
    $this->getJson('/api/user/tokens')->assertStatus(401);
    $this->deleteJson('/api/user/tokens/1')->assertStatus(401);
    $this->deleteJson('/api/user/tokens/others')->assertStatus(401);
});

it('lists all active personal access tokens for the authenticated user', function () {
    $user = User::factory()->create();

    $token1 = $user->createToken('Desktop App');
    $token2 = $user->createToken('Mobile iPhone');

    $response = $this->withToken($token2->plainTextToken)->getJson('/api/user/tokens');

    $response->assertStatus(200)
        ->assertJsonCount(2, 'data')
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'abilities',
                    'last_used_at',
                    'expires_at',
                    'created_at',
                    'is_current',
                ],
            ],
        ]);

    $data = collect($response->json('data'));
    $currentToken = $data->firstWhere('id', $token2->accessToken->id);
    $otherToken = $data->firstWhere('id', $token1->accessToken->id);

    expect($currentToken['is_current'])->toBeTrue();
    expect($otherToken['is_current'])->toBeFalse();
});

it('revokes a specific token belonging to the authenticated user', function () {
    $user = User::factory()->create();
    $token = $user->createToken('Disposable Session');

    $response = $this->withToken($token->plainTextToken)
        ->deleteJson("/api/user/tokens/{$token->accessToken->id}");

    $response->assertStatus(200)
        ->assertJson([
            'message' => 'Token revoked successfully.',
        ]);

    expect($user->tokens()->where('id', $token->accessToken->id)->exists())->toBeFalse();
});

it('cannot revoke another users token', function () {
    $userA = User::factory()->create();
    $userB = User::factory()->create();

    $tokenA = $userA->createToken('User A Token');
    $tokenB = $userB->createToken('User B Private Token');

    $response = $this->withToken($tokenA->plainTextToken)
        ->deleteJson("/api/user/tokens/{$tokenB->accessToken->id}");

    $response->assertStatus(404);
    expect($userB->tokens()->where('id', $tokenB->accessToken->id)->exists())->toBeTrue();
});

it('revokes all other tokens except the current active session', function () {
    $user = User::factory()->create();

    $token1 = $user->createToken('First Old Token');
    $token2 = $user->createToken('Current Active Token');
    $token3 = $user->createToken('Third Old Token');

    $response = $this->withToken($token2->plainTextToken)
        ->deleteJson('/api/user/tokens/others');

    $response->assertStatus(200)
        ->assertJson([
            'message' => 'Other active tokens and sessions revoked successfully.',
        ]);

    $remainingTokens = $user->tokens()->pluck('id')->all();

    expect($remainingTokens)->toHaveCount(1);
    expect($remainingTokens[0])->toBe($token2->accessToken->id);
});
