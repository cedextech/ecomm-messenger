<?php 

namespace App\Http\Middleware;

use Closure;

class Cors
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
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Credentials: true');

        $headers = [
            'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers'=> 'Content-Type, Origin,X-Requested-With,Accept,Authorization,If-None-Match,Accept-language'
        ];

        if ($request->getMethod() == "OPTIONS") {
            return Response::make('OK', 200, $headers);
        }

        $response = $next($request);
        
        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }
        
        return $response;
    }
}