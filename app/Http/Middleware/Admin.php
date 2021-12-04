<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Admin extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not admin granted.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check()) {
            if ($request->user()->is_admin == true) {
                return $next($request);
            }
            abort(403);
        }

        return redirect('/login');
    }
}
