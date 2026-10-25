<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;

it('denies unauthenticated access to api v1 user endpoint', function () {
    $response = $this->getJson('/api/v1/user');

    $response->assertStatus(401);
});

it('returns authenticated user profile resource via sanctum', function () {
    $user = User::factory()->create([
        'name' => 'Ablan Marie',
        'email' => 'marie@tiptok.ci',
        'phone' => '+2250505050505',
    ]);

    Sanctum::actingAs($user, ['*']);

    $response = $this->getJson('/api/v1/user');

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email',
                'phone',
                'avatar_url',
                'email_verified_at',
                'two_factor_enabled',
                'created_at',
                'updated_at',
            ],
        ])
        ->assertJsonPath('data.name', 'Ablan Marie')
        ->assertJsonPath('data.email', 'marie@tiptok.ci')
        ->assertJsonPath('data.phone', '+2250505050505');
});

it('updates user profile information including phone number via Fortify', function () {
    $user = User::factory()->create([
        'name' => 'Original Name',
        'email' => 'original@tiptok.ci',
        'phone' => '+2250101010101',
    ]);

    $this->actingAs($user);

    $response = $this->putJson('/user/profile-information', [
        'name' => 'Updated Name',
        'email' => 'updated@tiptok.ci',
        'phone' => '+2250707070707',
    ]);

    $response->assertStatus(200)
        ->assertJson([
            'message' => 'Profile updated successfully.',
            'user' => [
                'name' => 'Updated Name',
                'email' => 'updated@tiptok.ci',
                'phone' => '+2250707070707',
            ],
        ]);

    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'name' => 'Updated Name',
        'email' => 'updated@tiptok.ci',
        'phone' => '+2250707070707',
    ]);
});

it('updates user password securely via Fortify', function () {
    $user = User::factory()->create([
        'password' => Hash::make('CurrentPassword123!'),
    ]);

    $this->actingAs($user);

    $response = $this->putJson('/user/password', [
        'current_password' => 'CurrentPassword123!',
        'password' => 'NewSecretPassword456!',
        'password_confirmation' => 'NewSecretPassword456!',
    ]);

    $response->assertStatus(200)
        ->assertJson([
            'message' => 'Password updated successfully.',
        ]);

    expect(Hash::check('NewSecretPassword456!', $user->fresh()->password))->toBeTrue();
});
