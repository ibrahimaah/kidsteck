<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // If the route starts with "admin", redirect to admin login
            if ($request->is('admin*')) {
                return redirect()->route('admin.loginForm');
            }
            // Otherwise, redirect to home page
            return redirect('/');
        }

        return $next($request);
    }
}
