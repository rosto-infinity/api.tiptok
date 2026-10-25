<?php

declare(strict_types=1);

namespace App\Http\Responses;

use App\Http\Resources\Api\V1\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Symfony\Component\HttpFoundation\Response;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toResponse($request): Response
    {
        /** @var User $user */
        $user = $request->user();

        $token = null;
        if ($request->filled('device_name') || $request->header('X-Request-Token')) {
            $deviceName = (string) $request->input('device_name', 'auth_token');
            $token = $user->createToken($deviceName)->plainTextToken;
        }

        return new JsonResponse([
            'message' => 'Authenticated successfully.',
            'two_factor' => false,
            'token' => $token,
            'user' => new UserResource($user),
        ], Response::HTTP_OK);
    }
}
