<?php

namespace App\Http\Controllers\Api\v1;

use App\Services\OrderService;
use App\Transformers\OrderTransformer;

class OrderController extends APIController
{
    /**
     * @var App\Transformers\OrderTransformer
     */
    protected $orderTransformer;

    /**
     * @var App\Services\OrderService
     */
    protected $orderService;

    public function __construct(OrderTransformer $orderTransformer, OrderService $orderService)
    {
        parent::__construct();

        $this->orderTransformer = $orderTransformer;
        $this->orderService = $orderService;
    }

    /**
     * Get the order.
     * 
     * @param  [type] $orderReference [description]
     * @return [type]                 [description]
     */
    public function show($orderReference) 
    {
        $order = $this->orderService->getOrder($orderReference, ['shop_id' => $this->shop->id]);

        $response = [
            'status' => 'success',
            'data' => $this->orderTransformer->shop($this->shop)->transform($order)
        ];

        return $this->response($response);   
    }
}
