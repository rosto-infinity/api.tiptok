<?php

declare(strict_types=1);

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\PasswordUpdateResponse as PasswordUpdateResponseContract;
use Symfony\Component\HttpFoundation\Response;

class PasswordUpdateResponse implements PasswordUpdateResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toResponse($request): Response
    {
        return new JsonResponse([
            'message' => 'Password updated successfully.',
        ], Response::HTTP_OK);
    }
}
