<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutForm;
use App\Services\OrderService;

class WebOrderController extends Controller
{
    /**
     * App\Services\OrderService
     * 
     * @var [type]
     */
    public $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Create the order.
     * 
     * @param  CheckoutForm $request
     * @return [type]                [description]
     */
    public function store(CheckoutForm $request) 
    {
        $response = $this->orderService->create($request->all());

        return response()->json($response, 200);
    }
}
