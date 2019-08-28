<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\ShopService;

class APIVerifyFacebookPage
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
        $shopService = new ShopService();

        abort_if(empty($request->header('X-FACEBOOK-PAGE-ID')), 403);

        if(!$shopService->shopByFacebookPageID($request->header('X-FACEBOOK-PAGE-ID'))) {
            abort(404);
        }

        return $next($request);
    }
}
