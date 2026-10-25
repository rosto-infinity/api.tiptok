<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\TokenResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class UserTokenController extends Controller
{
    /**
     * List all active personal access tokens for the authenticated user.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $tokens = $request->user()->tokens()->latest()->get();

        return TokenResource::collection($tokens);
    }

    /**
     * Revoke a specific personal access token.
     */
    public function destroy(Request $request, int|string $tokenId): JsonResponse
    {
        $token = $request->user()->tokens()->where('id', $tokenId)->firstOrFail();
        $token->delete();

        return new JsonResponse([
            'message' => 'Token revoked successfully.',
        ], Response::HTTP_OK);
    }

    /**
     * Revoke all personal access tokens except the current one.
     */
    public function destroyOthers(Request $request): JsonResponse
    {
        $currentToken = $request->user()->currentAccessToken();

        $request->user()->tokens()
            ->when($currentToken, fn ($query) => $query->where('id', '!=', $currentToken->id))
            ->delete();

        return new JsonResponse([
            'message' => 'Other active tokens and sessions revoked successfully.',
        ], Response::HTTP_OK);
    }
}
