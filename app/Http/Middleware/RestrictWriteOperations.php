<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictWriteOperations
{
    /**
     * Solo admins pueden: crear, editar, eliminar.
     * Usuarios normales solo pueden: consultar (GET, HEAD, OPTIONS)
     * Autores pueden: leer + acceder a Mi Autoría
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            abort(401, 'Debe estar autenticado');
        }

        $user = auth()->user();

        // Si es admin, permitir todo
        if ($user->isAdmin()) {
            return $next($request);
        }

        // Para usuarios no-admin: solo permitir métodos de lectura
        if ($request->isMethod('get') || $request->isMethod('head') || $request->isMethod('options')) {
            return $next($request);
        }

        // POST, PUT, PATCH, DELETE bloqueados para no-admins
        abort(403, 'Solo administradores pueden crear, editar o eliminar registros');
    }
}
