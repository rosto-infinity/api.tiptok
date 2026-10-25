<?php

use App\Http\Middleware\SecurityHeadersMiddleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append(SecurityHeadersMiddleware::class);

        $middleware->redirectTo(
            guests: fn (Request $request) => $request->is('api/*') ? null : '/auth/login'
        );

        $middleware->validateCsrfTokens(except: [
            'login',
            'register',
            'logout',
            'two-factor-challenge',
            'user/*',
            'forgot-password',
            'reset-password',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );

        $exceptions->render(fn (AuthenticationException $e, Request $request) => ($request->is('api/*') || $request->expectsJson())
                ? response()->json(['message' => 'Unauthenticated.'], 401)
                : null
        );
    })->create();
