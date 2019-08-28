<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsShopOwner
{
    /**
     * Handle an incoming request.
     * Check the user is a valid restaurant owner, and restaurant status is active.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $user = Auth::user();

        if($user->role != 2) {
            abort(401, 'Unauthorized.');
        }

        if(empty($user->shop)) {
            abort(401, 'Unauthorized.');
        }

        return $next($request);
    }
}
