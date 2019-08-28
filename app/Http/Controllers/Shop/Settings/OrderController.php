<?php

namespace App\Http\Controllers\Shop\Settings;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Shop\BaseController;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Show the setup form with old values.
     * 
     * @return [type] [description]
     */
    public function edit() 
    {
        $shop = $this->shop;

        return view('shop.settings.order.index', compact('shop'));
    }

    /**
     * Update the order settings.
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update(Request $request) 
    {   
        $this->validate($request, [
            'delivery_fee' => 'required|numeric',
            'delivery_amount_minimum' => 'required|numeric',
            'notification_email' => 'required|email|max:191',
        ]);

        $this->shop->delivery_fee = $request->input('delivery_fee');
        $this->shop->delivery_amount_minimum = $request->input('delivery_amount_minimum');
        $this->shop->notification_email = $request->input('notification_email');

        $this->shop->save();

        flash('Shop information updated successfully.', 'success');

        return redirect('shop/settings/order');
    }

    /**
     * Update the tax settings.
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateTax(Request $request) 
    {
        $this->validate($request, [
            'tax' => 'required|numeric',
            'tax_type' => 'required|in:1,2'
        ]);

        $this->shop->tax = $request->input('tax');
        $this->shop->tax_type = $request->input('tax_type');

        $this->shop->save();

        flash('Shop information updated successfully.', 'success');

        return redirect('shop/settings/order');
    }
}