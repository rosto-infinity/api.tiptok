<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class UpdateUserAvatarAction
{
    /**
     * Process, resize, and update the user's profile avatar.
     */
    public function execute(User $user, UploadedFile $file): User
    {
        // 1. Delete previous avatar if existing on disk
        $this->deleteOldAvatar($user);

        // 2. Process image with Intervention Image (v4)
        $image = Image::decode($file->getRealPath())
            ->cover(400, 400);

        $encoded = (string) $image->toWebp(80);

        // 3. Store on the public disk
        $filename = 'avatars/'.Str::uuid().'.webp';
        Storage::disk('public')->put($filename, $encoded);

        // 4. Update the user model
        $user->forceFill([
            'avatar' => $filename,
        ])->save();

        return $user;
    }

    /**
     * Delete previous avatar if it exists on disk.
     */
    private function deleteOldAvatar(User $user): void
    {
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }
    }
}
