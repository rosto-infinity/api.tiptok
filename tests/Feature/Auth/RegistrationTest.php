<?php

declare(strict_types=1);

use App\Models\User;

it('registers a new user successfully with valid details', function () {
    $response = $this->postJson('/register', [
        'name' => 'Kouamé Koffi',
        'email' => 'koffi@tiptok.ci',
        'phone' => '+2250707070707',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
    ]);

    $response->assertStatus(201)
        ->assertJsonStructure([
            'message',
            'token',
            'user' => [
                'id',
                'name',
                'email',
                'phone',
                'avatar_url',
                'email_verified_at',
                'two_factor_enabled',
            ],
        ])
        ->assertJsonPath('token', null)
        ->assertJsonPath('user.email', 'koffi@tiptok.ci')
        ->assertJsonPath('user.phone', '+2250707070707');

    $this->assertGuest();

    $this->assertDatabaseHas('users', [
        'email' => 'koffi@tiptok.ci',
        'phone' => '+2250707070707',
    ]);
});

it('does not issue a sanctum token on registration even with device_name and allows subsequent login', function () {
    $response = $this->postJson('/register', [
        'name' => 'Aya Traoré',
        'email' => 'aya@tiptok.ci',
        'phone' => '+2250102030405',
        'password' => 'SecurePass123!',
        'password_confirmation' => 'SecurePass123!',
        'device_name' => 'iPhone 16 Pro',
    ]);

    $response->assertStatus(201)
        ->assertJsonPath('token', null)
        ->assertJsonPath('user.name', 'Aya Traoré');

    $this->assertGuest();

    $user = User::where('email', 'aya@tiptok.ci')->firstOrFail();
    expect($user->tokens()->count())->toBe(0);

    $loginResponse = $this->postJson('/login', [
        'email' => 'aya@tiptok.ci',
        'password' => 'SecurePass123!',
        'device_name' => 'iPhone 16 Pro',
    ]);

    $loginResponse->assertStatus(200);
    expect($loginResponse->json('token'))->toBeString()->not->toBeEmpty();
});

it('fails to register with duplicate email case-insensitively', function () {
    User::factory()->create(['email' => 'duplicate@tiptok.ci']);

    $response = $this->postJson('/register', [
        'name' => 'Duplicate Test',
        'email' => 'Duplicate@tiptok.ci',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['email']);
});

it('fails to register with invalid phone number', function () {
    $response = $this->postJson('/register', [
        'name' => 'Invalid Phone User',
        'email' => 'invalid-phone@tiptok.ci',
        'phone' => '123456',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['phone']);
});
