<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // التأكد من أن المستخدم مسجل الدخول وأنه مسؤول
        if ($request->user() && $request->user()->is_admin === 1) {
            return $next($request);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
