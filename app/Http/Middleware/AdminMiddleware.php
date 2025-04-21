<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    // public function handle(Request $request, Closure $next): Response
    // {
    //     if ($request->user() && $request->user()->role === 'admin') {
    //         return $next($request);
    //     }

    //     return response()->json(['message' => 'Unauthorized'], 403);
    // }
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        return $request->expectsJson()
            ? response()->json(['message' => 'Unauthorized'], 403)
            : redirect()->route('login');
    }
}
