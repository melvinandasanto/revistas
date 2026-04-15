<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutorOnly
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->rol !== 'autor') {
            abort(403, 'Solo autores pueden acceder a este recurso');
        }

        return $next($request);
    }
}
