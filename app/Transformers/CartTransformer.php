<?php

namespace App\Transformers;

class CartTransformer extends Transformer
{
    /**
     * Transform the resource.
     * 
     * @param  [type] $resource [description]
     * @return [type]           [description]
     */
    public function transform($resource)
    {   
        return [
            'id' => (int) $resource['product']['id'],
            'name' => $resource['product']['name'],
            'description' => $resource['product']['description'],
            'image' => $resource['product']['image'],
            'price' => (double) $resource['product']['price'],
            'display_price' => format_currency($resource['product']['price']),
            'quantity' => (int) $resource['quantity'],
            'subtotal' => (double) $resource['subtotal'],
            'display_subtotal' => format_currency($resource['subtotal']),
        ];
    }

    /**
     * Transform the cart data.
     * 
     * @param  [type] $resource [description]
     * @return [type]           [description]
     */
    public function transformCart($resource)
    {   
        return [
            'items' => $this->transformCollection($resource->toArray()),
            'total' => $resource->sum('subtotal'),
            'display_total' => format_currency($resource->sum('subtotal')),
            'quantity' => (int) $resource->sum('quantity')
        ];
    }
}