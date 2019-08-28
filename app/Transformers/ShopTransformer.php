<?php

namespace App\Transformers;

class ShopTransformer extends Transformer
{
    /**
     * Transform object into a generic array
     *
     * @param  [type] $resource [description]
     * @return [type]           [description]
     */
    public function transform($resource)
    {
        return [
            'id' => (int) $resource['id'],
            'name' => $resource['name'],
            'address' => $resource['address'],
            'latitude' => $resource['latitude'],
            'longitude' => $resource['longitude'],
            'location' => $resource['location'],
            'about' => $resource['about'],
            'banner' => $resource['banner'],
            'logo' => $resource['logo'],
            'delivery_charge' => (double) $resource['delivery_fee'],
            'minimum_delivery_amount' => (double) $resource['delivery_amount_minimum'],
            'display_delivery_charge' => format_currency($resource['delivery_fee']),
            'display_minimum_delivery_amount' => format_currency($resource['delivery_amount_minimum']),
            'has_delivery' => (int) $resource['has_delivery'],
            'has_pickup' => (int) $resource['has_pickup']          
        ];
    }
}