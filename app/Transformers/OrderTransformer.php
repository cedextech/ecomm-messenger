<?php

namespace App\Transformers;

use App\Models\Shop;

class OrderTransformer extends Transformer
{   
    /**
     * App\Models\Shop
     * @var [type]
     */
    private $shop; 

    public function shop(Shop $shop) 
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * Transform the resource.
     * 
     * @param  [type] $resource [description]
     * @return [type]           [description]
     */
    public function transform($resource)
    {   
        return [
            'order' => (int) $resource->reference,
            'status' => $resource->status_text,
            'address' => $this->transformAddress($resource->customer_address),
            'payment' => $this->transformPayment($resource, $this->shop),
            'products' => $this->transformProducts($resource->products)
        ];
    }

    /**
     * Transform the order address.
     * 
     * @param  [type] $address [description]
     * @return [type]          [description]
     */
    public function transformAddress($address)
    {   
        return [
            'name' => $address->name,
            'mobile' => $address->mobile,
            'address' => $address->address,
            'city' => $address->city,
            'location' => $address->location,
            'zipcode' => $address->zipcode                  
        ];
    }

    /**
     * Transform the order payment.
     * 
     * @param  [type] $resource [description]
     * @return [type]           [description]
     */
    public function transformPayment($resource)
    {   
        return [
            'tax' => (double) $resource->tax,
            'tax_amount' => (double) $resource->tax_amount,
            'delivery_charge' => (double) $resource->delivery_fee,
            'subtotal' => (double) $resource->subtotal,
            'payed_amount' => (double) $resource->total,
            'mode' => $resource->payment_mode_text,
            'status' => $resource->payment_status_text,
            'currency' => $this->shop->currency_code
        ];
    }

    /**
     * Transform the ordered products.
     * 
     * @param  [type] $products [description]
     * @return [type]           [description]
     */
    public function transformProducts($products) 
    {
        return $products->transform(function ($item, $key) {
            return [
                'id' => (int) $item->product_id,
                'name' => $item->name,
                'price' => (double) $item->price,
                'display_price' => format_currency($item->price),
                'quantity' => (int) $item->quantity,
                'subtotal' => (double) $item->subtotal,
                'display_subtotal' => format_currency($item->subtotal),
                'description' => $item->description,
                'image' => $item->image
            ];
        });
    }
}