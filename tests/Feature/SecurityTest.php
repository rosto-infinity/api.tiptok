<?php

declare(strict_types=1);

it('returns security headers on responses', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
    $response->assertHeader('X-Content-Type-Options', 'nosniff');
    $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
    $response->assertHeader('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');
});

it('returns clean 401 json without stack trace when unauthenticated on api routes', function () {
    $response = $this->get('/api/user');

    $response->assertStatus(401)
        ->assertJson(['message' => 'Unauthenticated.'])
        ->assertHeader('Content-Type', 'application/json');

    expect($response->content())->not->toContain('RouteNotFoundException')
        ->not->toContain('vendor/laravel');
});
