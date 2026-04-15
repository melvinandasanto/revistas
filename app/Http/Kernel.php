<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [];
    
    protected $middlewareGroups = [
        'web' => [],
        'api' => [],
    ];
    
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'admin' => \App\Http\Middleware\AdminOnly::class,
        'autor' => \App\Http\Middleware\AutorOnly::class,
        'restrict_writes' => \App\Http\Middleware\RestrictWriteOperations::class,
    ];
}
