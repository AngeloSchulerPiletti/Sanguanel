<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Inertia\Inertia;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (null !== Auth::user()) {
            if (Auth::user()->adminLevel > 2) {
                return $next($request);
            }
            return redirect(RouteServiceProvider::HOME);
        }
        else {
            abort(403);
        }

        
    }
}
