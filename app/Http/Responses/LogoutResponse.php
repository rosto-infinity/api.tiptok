<?php

declare(strict_types=1);

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;
use Symfony\Component\HttpFoundation\Response;

class LogoutResponse implements LogoutResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toResponse($request): Response
    {
        if ($user = $request->user()) {
            $user->currentAccessToken()?->delete();
        }

        return new JsonResponse([
            'message' => 'Logged out successfully.',
        ], Response::HTTP_OK);
    }
}
