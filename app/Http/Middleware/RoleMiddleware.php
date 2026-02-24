<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Jika user belum login atau role tidak sesuai, tendang ke dashboard
        if (!$request->user() || $request->user()->role !== $role) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}