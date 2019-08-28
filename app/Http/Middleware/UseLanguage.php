<?php

namespace App\Http\Middleware;

use App;
use Session;
use Closure;

class UseLanguage
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
        App::setLocale(Session::get('language', config('app.locale')));

        return $next($request);
    }
}
