<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user is 'admin' role
            if ($user->roles()->whereIn('name', ['admin'])->exists()) {
                return $next($request);
            }
        }
        // If the user does not have the required role, abort with a 403 status code
        abort(403, 'Forbidden');
    }
}
