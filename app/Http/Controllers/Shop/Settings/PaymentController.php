<?php

namespace App\Http\Controllers\Shop\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Shop\BaseController;
use Illuminate\Support\Facades\Auth;

class PaymentController extends BaseController
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

        return view('shop.settings.payment.index', compact('shop'));
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
            'accept_cash' => 'required|in:0,1',
            'accept_card_offline' => 'required|in:0,1'
        ]);

        $this->shop->accept_cash = $request->input('accept_cash');
        $this->shop->accept_card_offline = $request->input('accept_card_offline');

        $this->shop->save();

        flash('Shop information updated successfully.', 'success');

        return redirect('shop/settings/payments');
    }
}