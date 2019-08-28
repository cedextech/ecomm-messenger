<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Services\CheckoutService;

class CheckoutController extends Controller
{   
    /**
     * CheckoutService
     * 
     * @var [type]
     */
    public $checkoutService;

    public function __construct(CheckoutService $checkoutService) 
    {
        $this->checkoutService = $checkoutService;
    }

    /**
     * Show the checkout form.
     * 
     * @param  [type] $token [description]
     * @return [type]        [description]
     */
    public function show($token)
    {
        $checkoutToken = $this->checkoutService->getToken($token);

        if(is_null($checkoutToken)) {
            abort(404);
        }

        $shop = $checkoutToken->shop;

        $cartService = new CartService($shop, $checkoutToken->facebook_id);

        $cart = $cartService->transformContents($cartService->contents(), $checkoutToken);

        if($cart->items->isEmpty()) {
            abort(404);
        }

        return view('checkout.create', compact('token', 'shop', 'cart'));
    }
}