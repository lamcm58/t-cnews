<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAuthUser
{
    /**
     * Handle an incoming request.
     * Check if user is authenticated. If not, redirect user to login page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // redirect the user to "/login"
        // and stores the url being accessed on session
        if (Auth::guest()) {
            return redirect()->guest('login');
        }

        return $next($request);
    }
}
