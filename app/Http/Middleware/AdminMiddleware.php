<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated as an admin
        if (!Auth::guard('admin')->check()) {
            // Redirect to the admin login page if not authenticated
            return redirect('/login')->with('error', 'You must be logged in as an admin to access this page.');
        }

        return $next($request);
    }
}
