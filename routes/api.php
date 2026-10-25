<?php

declare(strict_types=1);

use App\Http\Controllers\Api\UserAvatarController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserTokenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->name('api.')->group(function (): void {
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
