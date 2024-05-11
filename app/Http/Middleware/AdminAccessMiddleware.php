<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAccessMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        // Check if the user is logged in and their ID exists in the admins table
        if (Auth::check() && $user->isAdmin()) {
            return $next($request);
        }

        abort(401);
        // return view('index')->with('user', $user);
    }
}
