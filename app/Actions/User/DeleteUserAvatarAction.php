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
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->forceFill([
            'avatar' => null,
        ])->save();

        return $user;
    }
}
