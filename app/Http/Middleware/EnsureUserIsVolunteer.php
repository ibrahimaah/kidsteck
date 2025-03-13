<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsVolunteer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Ensure user is authenticated and has role_id corresponding to 'volunteer'
        if (!Auth::check() || Auth::user()->role_id !== 2) { // Assuming 2 is the role_id for 'volunteer'
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
