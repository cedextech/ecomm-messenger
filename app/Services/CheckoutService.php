<?php

namespace App\Services;

use App\Models\Checkout;
use App\Models\Shop;

class CheckoutService
{
    /**
     * Get the checkout URL.
     * 
     * @param  Shop   $shop           [description]
     * @param  [type] $facebookUserId [description]
     * @return [type]                 [description]
     */
    public function checkoutUrl(Shop $shop, $facebookUserId) 
    {
        $checkout = Checkout::where([
            'facebook_id' => $facebookUserId, 
            'shop_id' => $shop->id
        ])->firstOrFail();

        return url('shop/checkout/' . $checkout->token);
    }

    /**
     * Choose the checkout type for the current order.
     * 
     * @param  Shop   $shop           [description]
     * @param  [type] $facebookUserId [description]
     * @param  [type] $checkoutType   [description]
     * @return [type]                 [description]
     */
    public function chooseCheckoutType(Shop $shop, $facebookUserId, $checkoutType) 
    {
        Checkout::updateOrCreate(
            ['facebook_id' => $facebookUserId, 'shop_id' => $shop->id],
            ['token' => $this->createToken(), 'service' => $checkoutType]
        );
    }

    /**
     * This assume that, shop only provide one service and chatbot didn't ask for services.
     * Chatbot ask for service, only if shop provides two service.
     * So here we need to apply that one by default.
     * 
     * @param  Shop $shop   [description]
     * @return [type]       [description]
     */
    private function shopDefaultCheckoutType(Shop $shop)
    {
        if($shop->has_delivery) {
            return 'delivery';
        }

        if($shop->has_pickup) {
            return 'pickup';
        }

        return 'delivery';
    }

    /**
     * Create the checkout token
     * 
     * @return [type] [description]
     */
    public function createToken() 
    {
        return str_random(20);
    }

    /**
     * Check the token is valid or not.
     * 
     * @param  [type]  $token [description]
     * @return boolean        [description]
     */
    public function isValidToken($token) 
    {
        return Checkout::where('token', $token)->exists();
    }

    /**
     * Get the token.
     * 
     * @param  [type] $token [description]
     * @return [type]        [description]
     */
    public function getToken($token) 
    {
        return Checkout::where('token', $token)->first();
    }

    /**
     * Get the shop associated with checkout.
     * 
     * @param  [type] $token [description]
     * @return [type]        [description]
     */
    public function getShopFromToken($token) 
    {
        return Checkout::where('token', $token)
                    ->with('shop')
                    ->first()
                    ->shop;
    }
}