<?php

declare(strict_types=1);

namespace App\Http\Responses;

use App\Http\Resources\Api\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\ProfileInformationUpdatedResponse as ProfileInformationUpdatedResponseContract;
use Symfony\Component\HttpFoundation\Response;

class ProfileInformationUpdatedResponse implements ProfileInformationUpdatedResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  Request  $request
     */
    public function toResponse($request): Response
    {
        /** @var User $user */
        $user = $request->user()->fresh();

        return new JsonResponse([
            'message' => 'Profile updated successfully.',
            'user' => new UserResource($user),
        ], Response::HTTP_OK);
    }
}
