<?php

declare(strict_types=1);

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\TwoFactorDisabledResponse as TwoFactorDisabledResponseContract;
use Symfony\Component\HttpFoundation\Response;

class TwoFactorDisabledResponse implements TwoFactorDisabledResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toResponse($request): Response
    {
        return new JsonResponse([
            'message' => 'Two-factor authentication disabled.',
        ], Response::HTTP_OK);
    }
}
