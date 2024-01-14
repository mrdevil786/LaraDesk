<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Member
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('sanctum')->check() && (Auth::guard('sanctum')->user()->user_role === '1' || Auth::guard('sanctum')->user()->user_role === '2' || Auth::guard('sanctum')->user()->user_role === '3')) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
