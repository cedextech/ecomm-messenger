<?php

namespace App\Http\Controllers\Shop\Apps;

use App\Http\Controllers\Shop\BaseController;

class OrderController extends BaseController
{   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index() 
    {
        return view('shop.apps.order');
    }
}
