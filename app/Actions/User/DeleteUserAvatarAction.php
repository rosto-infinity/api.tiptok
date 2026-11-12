<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DeleteUserAvatarAction
{
    /**
     * Delete the user's custom avatar and reset to default.
     */
    public function execute(User $user): User
    {
        $oldAvatar = $user->avatar;

        $user->forceFill([
            'avatar' => null,
        ])->save();

        $this->deletePath($oldAvatar);

        return $user;
    }

    /**
     * Safely remove an avatar path from the public disk if it resides under avatars/.
     */
    public function deletePath(?string $path): void
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
