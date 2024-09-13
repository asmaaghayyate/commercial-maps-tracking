<?php

namespace App\Http\Middleware\Api;

use App\Enums\RoleEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CommercialMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === RoleEnum::COMMERCIAL->value) {
            return $next($request);
        } else {
            return response()->json(['message' => 'Unauthorized access'], 401);
        }
    }
}
