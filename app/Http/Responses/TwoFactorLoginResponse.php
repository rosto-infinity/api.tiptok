<?php

declare(strict_types=1);

namespace App\Http\Responses;

use App\Http\Resources\Api\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\TwoFactorLoginResponse as TwoFactorLoginResponseContract;
use Symfony\Component\HttpFoundation\Response;

class TwoFactorLoginResponse implements TwoFactorLoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  Request  $request
     */
    public function toResponse($request): Response
    {
        /** @var User $user */
        $user = $request->user();

        $token = null;
        if ($request->filled('device_name') || $request->header('X-Request-Token')) {
            $rawDeviceName = trim((string) $request->input('device_name', 'auth_token'));
            $sanitizedDeviceName = preg_replace('/[\x00-\x1F\x7F]/u', '', $rawDeviceName) ?? '';
            $deviceName = Str::limit($sanitizedDeviceName !== '' ? $sanitizedDeviceName : 'auth_token', 100, '');

            $expirationMinutes = config('sanctum.expiration');
            $expiresAt = is_numeric($expirationMinutes) && (int) $expirationMinutes > 0
                ? now()->addMinutes((int) $expirationMinutes)
                : null;

            $token = $user->createToken($deviceName, ['*'], $expiresAt)->plainTextToken;
        }

        return new JsonResponse([
            'message' => 'Two-factor authentication successful.',
            'two_factor' => false,
            'token' => $token,
            'user' => new UserResource($user),
        ], Response::HTTP_OK);
    }
}
