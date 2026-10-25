<?php

declare(strict_types=1);

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\TwoFactorEnabledResponse as TwoFactorEnabledResponseContract;
use Symfony\Component\HttpFoundation\Response;

class TwoFactorEnabledResponse implements TwoFactorEnabledResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toResponse($request): Response
    {
        return new JsonResponse([
            'message' => 'Two-factor authentication enabled.',
        ], Response::HTTP_OK);
    }
}
