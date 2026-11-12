<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\Laravel\Facades\Image;
use Throwable;

class UpdateUserAvatarAction
{
    /**
     * Process, resize, and update the user's profile avatar.
     *
     * @throws ValidationException
     */
    public function execute(User $user, UploadedFile $file): User
    {
        // 1. Decode & re-encode FIRST so corrupt files fail cleanly before mutating state
        try {
            $encoded = Image::decode($file->getRealPath())
                ->cover(400, 400)
                ->encode(new WebpEncoder(quality: 80));
        } catch (Throwable) {
            throw ValidationException::withMessages([
                'avatar' => ['Le fichier image est invalide ou corrompu.'],
            ]);
        }

        // 2. Store new image on the public disk
        $oldAvatar = $user->avatar;
        $filename = 'avatars/'.Str::uuid().'.webp';
        Storage::disk('public')->put($filename, $encoded->toString());

        // 3. Persist the new avatar and roll back uploaded file if DB save fails
        try {
            $user->forceFill([
                'avatar' => $filename,
            ])->save();
        } catch (Throwable $e) {
            Storage::disk('public')->delete($filename);

            throw $e;
        }

        // 4. Delete previous avatar only after the new one is safely saved
        $this->deleteOldAvatar($oldAvatar);

        return $user;
    }

    /**
     * Delete previous avatar if it exists inside the expected avatars directory.
     */
    private function deleteOldAvatar(?string $path): void
    {
        if (
            is_string($path) &&
            str_starts_with($path, 'avatars/') &&
            ! str_contains($path, '..') &&
            Storage::disk('public')->exists($path)
        ) {
            Storage::disk('public')->delete($path);
        }
    }
}
