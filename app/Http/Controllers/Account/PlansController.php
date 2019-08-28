<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

class PlansController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return view('account.plans');
    }
}
