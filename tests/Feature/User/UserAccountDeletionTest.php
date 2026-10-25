<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;

test('unauthenticated users cannot delete account', function (): void {
    $response = $this->deleteJson('/api/user/account');

    $response->assertStatus(401);
});

test('users cannot delete account without password', function (): void {
    $user = User::factory()->create([
        'password' => Hash::make('Secret123!'),
    ]);

    Sanctum::actingAs($user);

    $response = $this->deleteJson('/api/user/account', []);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['password']);

    $this->assertDatabaseHas('users', ['id' => $user->id]);
});

test('users cannot delete account with wrong password', function (): void {
    $user = User::factory()->create([
        'password' => Hash::make('Secret123!'),
    ]);

    Sanctum::actingAs($user);

    $response = $this->deleteJson('/api/user/account', [
        'password' => 'WrongPassword123!',
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['password']);

    $this->assertDatabaseHas('users', ['id' => $user->id]);
});

test('users can delete account with correct password', function (): void {
    $user = User::factory()->create([
        'password' => Hash::make('Secret123!'),
    ]);

    $user->createToken('test-token');

    Sanctum::actingAs($user);

    $response = $this->deleteJson('/api/user/account', [
        'password' => 'Secret123!',
    ]);

    $response->assertStatus(200)
        ->assertJson([
            'message' => 'Votre compte et l’ensemble de vos données ont été définitivement supprimés.',
        ]);

    $this->assertDatabaseMissing('users', ['id' => $user->id]);
});
