<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/'); // si no está logueado
        }

        if (! $request->user()->hasRole($role)) {
            abort(403, 'No tienes permisos para acceder.');
        }

        return $next($request);
    }
}