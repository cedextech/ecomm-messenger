<?php

namespace App\Services;

use DB;
use App\Models\Shop;
use App\Models\Cart;
use App\Models\Customer;

class CartService
{
    /**
     * String
     * 
     * @var [type]
     */
    private $facebookUserId;

    /**
     * Create constructor instance.
     * 
     * @param Shop   $shop           [description]
     * @param [type] $facebookUserId [description]
     */
    public function __construct(Shop $shop, $facebookUserId) 
    {
        $this->shop = $shop;
        $this->facebookUserId = $facebookUserId;
    }

    /**
     * Add product to the cart.
     * 
     * @param [type] $product  [description]
     * @param [type] $quantity [description]
     */
    public function add($product, $quantity) 
    {
        Cart::updateOrCreate(
            ['facebook_id' => $this->facebookUserId, 'product_id' => $product->id],
            [
                'facebook_id' => $this->facebookUserId,
                'product_id' => $product->id,
                'quantity' => DB::raw('quantity + ' . $quantity), 
                'subtotal' => DB::raw($product->price . ' * quantity')
            ]
        );

        return true;
    }

    /**
     * Get the cart of a customer.
     * 
     * @param  [type] $customerShopId   [description]
     * @return [type]                   [description]
     */
    public function contents()
    {
        return Cart::customer($this->facebookUserId)
                    ->with('product')->get();
    }

    /**
     * Transform the cart. Add the tax, delivery_fee, total indexes.
     * 
     * @param  [type] $cart     [description]
     * @param  [type] $checkout [description]
     * @return [type]           [description]
     */
    public function transformContents($cart, $checkout) 
    {
        $subtotal = $total = $cart->sum('subtotal');
        $taxAmount = $subtotal * ($this->shop->tax / 100);
        $deliveryFee = 0;

        if($this->shop->tax_type == 2) {
            $total = $total + $taxAmount;
        }

        if($checkout->service == 'delivery') {
            $total += $this->shop->delivery_fee;
            $deliveryFee = round($this->shop->delivery_fee, 2);
        }

        return (object) [
            'tax' => $this->shop->tax,
            'tax_amount' => round($taxAmount, 2),
            'subtotal' => round($subtotal, 2),
            'total' => round($total, 2),
            'checkout_type' => $checkout->service,
            'delivery_fee' => $deliveryFee,
            'items' => $cart
        ];
    }

    /**
     * Clear the cart.
     * 
     * @return [type] [description]
     */
    public function clear() 
    {
        return Cart::customer($this->facebookUserId)
                   ->delete();
    }

    /**
     * Remove the product from the cart.
     * 
     * @param  [type] $product [description]
     * @return [type]          [description]
     */
    public function remove($product) 
    {
        return Cart::customer($this->facebookUserId)
                    ->where('product_id', $product->id)
                    ->delete();
    }

    /**
     * Check the cart is empty or not.
     * 
     * @param  [type]  $cart [description]
     * @return boolean       [description]
     */
    public function isEmpty($cart = null) 
    {
        if($cart) {
            return !$cart->items->isEmpty();
        }

        return Cart::customer($this->facebookUserId)->exists();
    }

    /**
     * Order subtotal should greater than min order amount.
     * 
     * @return boolean [description]
     */
    public function isGreaterThanOrderMinimumAmount($cart = null) 
    {   
        if($cart) {
            return $cart->subtotal >= $this->shop->delivery_amount_minimum;
        }

        return $this->subtotal() >= $this->shop->delivery_amount_minimum;
    }

    /**
     * Get the cart subtotal.
     * 
     * @return [type] [description]
     */
    public function subtotal() 
    {
        $contents = $this->contents();

        return $contents->sum('subtotal');
    }

    /**
     * Get the cart total.
     * Subtotal + Delivery fee.
     * 
     * @return [type] [description]
     */
    public function total() 
    {
        // TODO
        // Add the tax to total.

        $contents = $this->contents();

        return $contents->sum('subtotal') + $this->shop->delivery_fee;
    }

    /**
     * Order tax amount.
     * 
     * @return [type] [description]
     */
    public function taxAmount() 
    {
        return $this->subtotal() * ($this->shop->tax / 100);
    }
}