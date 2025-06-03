<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {

        $user = $request->user();

        // Jika belum login, biarkan middleware auth:sanctum yang handle (jangan block di sini)
        if (!$user) {
            return response()->json(['message' => 'Unauthorized - Not authenticated'], 401);
        }

        // Jika role tidak sesuai
        if ($user->role !== $role) {
            return response()->json(['message' => 'Unauthorized - Role mismatch'], 403);
        }
        return $next($request);
    }
}
