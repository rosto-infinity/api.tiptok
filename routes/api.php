<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\UserAvatarController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\UserTokenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - V1
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->middleware('auth:sanctum')->name('api.v1.')->group(function (): void {
    // Current user profile
    Route::get('/user', [UserController::class, 'show'])->name('user.show');

    // Avatar management
    Route::post('/user/avatar', [UserAvatarController::class, 'update'])->name('user.avatar.update');
    Route::delete('/user/avatar', [UserAvatarController::class, 'destroy'])->name('user.avatar.destroy');

    // Personal Access Tokens management
    Route::get('/user/tokens', [UserTokenController::class, 'index'])->name('user.tokens.index');
    Route::delete('/user/tokens/others', [UserTokenController::class, 'destroyOthers'])->name('user.tokens.destroy-others');
    Route::delete('/user/tokens/{token}', [UserTokenController::class, 'destroy'])->name('user.tokens.destroy');
});
