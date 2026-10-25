<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    Storage::fake('public');
});

it('uploads and optimizes user avatar to webp', function () {
    $user = User::factory()->create([
        'name' => 'Koffi Paul',
        'avatar' => null,
    ]);

    Sanctum::actingAs($user, ['*']);

    $file = UploadedFile::fake()->image('photo.jpg', 800, 800);

    $response = $this->postJson('/api/v1/user/avatar', [
        'avatar' => $file,
    ]);

    $response->assertStatus(200);

    $user->refresh();
    expect($user->avatar)->not->toBeNull();
    expect($user->avatar)->toEndWith('.webp');

    Storage::disk('public')->assertExists($user->avatar);
    expect($response->json('data.avatar_url'))->toContain($user->avatar);
});

it('removes old avatar from disk when new one is uploaded', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user, ['*']);

    $firstFile = UploadedFile::fake()->image('first.jpg', 400, 400);
    $this->postJson('/api/v1/user/avatar', ['avatar' => $firstFile]);

    $user->refresh();
    $firstAvatarPath = $user->avatar;
    Storage::disk('public')->assertExists($firstAvatarPath);

    $secondFile = UploadedFile::fake()->image('second.png', 400, 400);
    $this->postJson('/api/v1/user/avatar', ['avatar' => $secondFile]);

    $user->refresh();
    $secondAvatarPath = $user->avatar;

    expect($secondAvatarPath)->not->toBe($firstAvatarPath);
    Storage::disk('public')->assertMissing($firstAvatarPath);
    Storage::disk('public')->assertExists($secondAvatarPath);
});

it('rejects invalid avatar format or oversized files', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user, ['*']);

    $pdfFile = UploadedFile::fake()->create('document.pdf', 500);

    $response = $this->postJson('/api/v1/user/avatar', [
        'avatar' => $pdfFile,
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['avatar']);
});

it('deletes custom avatar and resets to default generated avatar', function () {
    $user = User::factory()->create([
        'name' => 'Adjoua Diane',
    ]);
    Sanctum::actingAs($user, ['*']);

    $file = UploadedFile::fake()->image('me.jpg', 400, 400);
    $this->postJson('/api/v1/user/avatar', ['avatar' => $file]);

    $user->refresh();
    $avatarPath = $user->avatar;
    Storage::disk('public')->assertExists($avatarPath);

    $response = $this->deleteJson('/api/v1/user/avatar');

    $response->assertStatus(200);
    $user->refresh();

    expect($user->avatar)->toBeNull();
    Storage::disk('public')->assertMissing($avatarPath);
    expect($response->json('data.avatar_url'))->toContain('ui-avatars.com');
});
