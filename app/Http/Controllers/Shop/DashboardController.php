<?php

namespace App\Http\Controllers\Shop;

use Carbon\Carbon;

class DashboardController extends BaseController
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

    /**
     * Dashboard
     * 
     * @return [type] [description]
     */
    public function index() 
    {
        $today = Carbon::today()->format('d F Y');

        return view('shop.dashboard', compact('today'));
    }
}