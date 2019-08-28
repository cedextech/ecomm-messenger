<?php

namespace App\Http\Controllers\Shop\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Shop\BaseController;
use Illuminate\Support\Facades\Auth;

class ServiceController extends BaseController
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
     * Show the payment settings form.
     * 
     * @return [type] [description]
     */
    public function edit() 
    {   
        $shop = $this->shop;

        return view('shop.settings.service.index', compact('shop'));
    }

    /**
     * Update the payment settings.
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update(Request $request) 
    {
        $this->validate($request, [
            'has_pickup' => 'required|in:0,1',
            'has_delivery' => 'required|in:0,1'
        ]);

        $this->shop->has_pickup = $request->input('has_pickup');
        $this->shop->has_delivery = $request->input('has_delivery');

        $this->shop->save();

        flash('Shop information updated successfully.', 'success');

        return redirect('shop/settings/services');
    }
}