<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use \App\User;

class CheckAdmin
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = User::find(Auth::id());
        if($user->admin == 1) {
            return $next($request);
        }
    }
}
