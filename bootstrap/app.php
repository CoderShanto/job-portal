<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
       $middleware->alias([
            'guest.to.profile' => \App\Http\Middleware\RedirectIfAuthenticatedToProfile::class,
            'custom.auth' => \App\Http\Middleware\CustomAuth::class,
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
