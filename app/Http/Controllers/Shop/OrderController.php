<?php

namespace App\Http\Controllers\Shop;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\UpdateOrder;
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
     * Show all the orders.
     * 
     * @return [type] [description]
     */
    public function index(Request $request) 
    {   
        $orders = $this->shop->orders()
            ->filterByDate($request->input('date'))
            ->with('customer_address')
            ->orderBy('orders.created_at', 'desc')
            ->get();

        $date = $request->input('date') ?: Carbon::now()->format('Y-m-d');

        return view('shop.orders.index', compact('orders', 'date'));
    }

    /**
     * Show the form for editing the order.
     * 
     * @param  [type] $orderId [description]
     * @return [type]          [description]
     */
    public function edit($orderId) 
    {   
        $order = $this->shop->orders()
            ->with('customer_address', 'products.product')
            ->findOrFail($orderId);

        $response = [
            'html' => view('shop.orders.edit', compact('order'))->render(),
        ];

        return Response($response, 200);
    }

    /**
     * Update the order.
     * 
     * @param  UpdateOrder $request [description]
     * @return [type]               [description]
     */
    public function update(UpdateOrder $request) 
    {   
        $request->save();

        flash('Order updated successfully.', 'success');

        return Response(['status' => 'success'], 200);
    }
}
