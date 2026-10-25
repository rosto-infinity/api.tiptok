<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Actions\User\DeleteUserAvatarAction;
use App\Actions\User\UpdateUserAvatarAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserAvatarController extends Controller
{
    /**
     * Upload and update user avatar.
     */
    public function update(Request $request, UpdateUserAvatarAction $action): UserResource
    {
        $validated = $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpeg,png,webp,jpg', 'max:2048'],
        ]);

        /** @var User $user */
        $user = $request->user();

        $updatedUser = $action->execute($user, $validated['avatar']);

        return new UserResource($updatedUser);
    }

    /**
     * Remove custom user avatar and revert to default.
     */
    public function destroy(Request $request, DeleteUserAvatarAction $action): UserResource
    {
        /** @var User $user */
        $user = $request->user();

        $updatedUser = $action->execute($user);

        return new UserResource($updatedUser);
    }
}
