<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the authenticated user's profile.
     */
    public function show(Request $request): UserResource
    {
        return new UserResource($request->user());
    }
}
