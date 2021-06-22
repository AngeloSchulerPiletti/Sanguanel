<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class UserAgentRestriction
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
        $agent = new Agent();
        if($agent->isRobot()){
            abort(403);
        }
        else if($agent->isMobile()){
            return redirect(route('home'))->with('status', [0 => 'Você não pode acessar esta área via mobile...']);
        }
        return $next($request);
    }
}
