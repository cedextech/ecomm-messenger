<?php

namespace App\Transformers;

class ProductTransformer extends Transformer
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
            'category_id' => (int) $resource['category_id'],
            'name' => $resource['name'],
            'description' => $resource['description'],
            'price' => (double) $resource['price'],
            'display_price' => format_currency($resource['price']),
            'image' => $resource['image'],
            'status' => (int) $resource['status']
        ];
    }
}
