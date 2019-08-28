<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\CheckoutService;

class CheckoutController extends APIController
{   
    /**
     * CheckoutService
     * 
     * @var [type]
     */
    public $checkoutService;

    /**
     * New constructor instance.
     * 
     */
    public function __construct(CheckoutService $checkoutService)
    {   
        parent::__construct();

        $this->checkoutService = $checkoutService;
    }

    /**
     * Update the checkout service for given user cart.
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateService(Request $request) 
    {
        // TODO
        // Form validation

        $this->checkoutService->chooseCheckoutType(
            $this->shop,
            $this->facebookUserId, 
            $request->input('service')
        );

        $response = [
            'status' => 'success',
            'data' => []
        ];

        return $this->response($response);
    }

    /**
     * Get the checkout url
     * 
     * @return [type] [description]
     */
    public function getUrl() 
    {
        // TODO
        // Need rework

        // Shop must be opened before checkout.
        if(!$this->shop->IsShopOpened) {
            $response = [
                'status' => 'error',
                'code' => 30,
                'message' => 'Store is closed now. Please try later.'
            ];

            return $this->response($response);
        }

        $cartService = new CartService($this->shop, $this->facebookUserId);
        
        // Cart is empty
        if(!$cartService->isEmpty()) {
            $response = [
                'status' => 'error',
                'code' => 50,
                'message' => 'Your cart is empty. Please add products before checkout.'
            ];

            return $this->response($response);
        }

        // Order total is less than min order amount.
        if(!$cartService->isGreaterThanOrderMinimumAmount()) {
            $response = [
                'status' => 'error',
                'code' => 60,
                'message' => 'Your order subtotal is too small to submit online. Minimum order amount is ' . $this->shop->delivery_amount_minimum 
            ];

            return $this->response($response);
        }

        // Create checkout URL
        if($checkoutUrl = $this->checkoutService->checkoutUrl($this->shop, $this->facebookUserId)) {
            $response = [
                'status' => 'success',
                'data' => [
                    'checkout_url' => $checkoutUrl
                ]
            ];

            return $this->response($response);
        }
    }
}
