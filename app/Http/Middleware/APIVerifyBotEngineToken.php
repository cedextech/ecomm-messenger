<?php

namespace App\Http\Middleware;

use Closure;

class APIVerifyBotEngineToken
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
        abort_if(! ($request->header('X-BOT-ENGINE-ACCESS-TOKEN') == config('app.bot_engine_access_token')), 403);

        return $next($request);
    }
}
