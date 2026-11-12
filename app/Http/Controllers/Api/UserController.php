<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Actions\User\DeleteUserAvatarAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display the authenticated user's profile.
     */
    public function show(Request $request): UserResource
    {
        return new UserResource($request->user());
    }

    /**
     * Delete the authenticated user account and all associated resources.
     */
    public function destroy(
        Request $request,
        DeleteUserAvatarAction $deleteAvatarAction
    ): JsonResponse {
        $request->validate([
            'password' => ['required', 'string'],
        ], [
            'password.required' => 'Veuillez saisir votre mot de passe pour confirmer la suppression définitive.',
        ]);

        /** @var User $user */
        $user = $request->user();

        if (! Hash::check((string) $request->password, $user->password)) {
            return response()->json([
                'message' => 'Le mot de passe saisi est incorrect.',
                'errors' => [
                    'password' => ['Le mot de passe saisi est incorrect.'],
                ],
            ], 422);
        }

        $avatarPath = $user->avatar;

        DB::transaction(function () use ($user): void {
            // 1. Révoquer tous les jetons Sanctum
            $user->tokens()->delete();

            // 2. Supprimer le compte définitivement
            $user->delete();
        });

        // 3. Supprimer l'avatar physique uniquement après commit de la transaction
        $deleteAvatarAction->deletePath($avatarPath);

        if ($request->hasSession()) {
            Auth::guard(config('fortify.guard', 'web'))->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return response()->json([
            'message' => 'Votre compte et l’ensemble de vos données ont été définitivement supprimés.',
        ]);
    }
}
