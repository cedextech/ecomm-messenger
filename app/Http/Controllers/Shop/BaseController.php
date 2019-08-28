<?php

namespace App\Http\Controllers\Shop;

use Auth;
use Config;
use App\Http\Controllers\Controller;

class BaseController extends Controller 
{   
    /**
     * Authenticated user's shop.
     * 
     * @var [type]
     */
    protected $shop;

    public function __construct() 
    {       
        // TODO
        // Need rework, need better method to handle this.

        $this->middleware(function ($request, $next) {
            $this->shop = Auth::user()->shop;
            
            $this->boot();
            
            return $next($request);
        });
    }

    /**
     * Bootstrap the shop settings.
     * 
     * @return [type] [description]
     */
    public function boot() 
    {
        Config::set('app.timezone', $this->shop->timezone);
        Config::set('app.currency_code', $this->shop->currency_code);

        date_default_timezone_set($this->shop->timezone);
    }
}