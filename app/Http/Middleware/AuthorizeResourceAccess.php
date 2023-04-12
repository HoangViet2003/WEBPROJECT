<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthorizeResourceAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // print out user details in json format
            $user = response()->json(Auth::user());
            $is_admin = $user->original['is_admin'];

            if ($is_admin || $user->original['id'] == $request->route('id')) {
                return $next($request);
            }

            return response()->json(['message' => 'You are not authorized to access this resource']);
        }

        return response()->json(['message' => 'You are not authorized to access this resource']);
    }
}
