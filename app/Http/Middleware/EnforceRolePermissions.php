<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnforceRolePermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$allowedRoles): Response
    {
        $user = auth()->user();

        // Verificar que el usuario tenga uno de los roles permitidos
        if (!in_array($user->rol, $allowedRoles)) {
            abort(403, 'No tienes permiso para acceder a este recurso');
        }

        return $next($request);
    }
}
