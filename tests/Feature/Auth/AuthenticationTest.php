<?php

declare(strict_types=1);

use App\Models\User;

it('authenticates user with valid credentials and returns user resource', function () {
    $user = User::factory()->create([
        'email' => 'devin@tiptok.io',
        'password' => 'password123',
    ]);

    $response = $this->postJson('/login', [
        'email' => 'devin@tiptok.io',
        'password' => 'password123',
    ]);

    $response->assertStatus(200)
        ->assertJson([
            'message' => 'Authenticated successfully.',
            'two_factor' => false,
            'token' => null,
            'user' => [
                'id' => $user->id,
                'email' => 'devin@tiptok.io',
            ],
        ]);

    $this->assertAuthenticatedAs($user);
});

it('authenticates and issues a personal access token when device_name is supplied', function () {
    $user = User::factory()->create([
        'email' => 'sarah@tiptok.io',
        'password' => 'password123',
    ]);

    $response = $this->postJson('/login', [
        'email' => 'sarah@tiptok.io',
        'password' => 'password123',
        'device_name' => 'MacBook Pro TipTok',
    ]);

    $response->assertStatus(200);
    $token = $response->json('token');

    expect($token)->toBeString()->not->toBeEmpty();
    expect($user->tokens()->where('name', 'MacBook Pro TipTok')->exists())->toBeTrue();
});

it('fails authentication with incorrect password', function () {
    User::factory()->create([
        'email' => 'wrongpass@tiptok.io',
        'password' => 'correct-password',
    ]);

    $response = $this->postJson('/login', [
        'email' => 'wrongpass@tiptok.io',
        'password' => 'incorrect-password',
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['email']);

    $this->assertGuest();
});

it('logs out authenticated user successfully', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->postJson('/logout');

    $response->assertStatus(200)
        ->assertJson([
            'message' => 'Logged out successfully.',
        ]);
});
