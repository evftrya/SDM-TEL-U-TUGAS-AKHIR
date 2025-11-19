<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HandleSessionPersistence
{
    public function handle(Request $request, Closure $next)
    {
        // If user is not authenticated but has a session, clear it
        if (!Auth::check() && Session::has('user_id')) {
            Session::flush();
            Session::invalidate();
            Session::regenerateToken();
        }

        return $next($request);
    }
}