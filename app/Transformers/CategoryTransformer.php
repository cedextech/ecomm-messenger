<?php

namespace App\Transformers;

class CategoryTransformer extends Transformer
{       
    /**
     * Transform the category.
     * 
     * @param  [type] $category [description]
     * @return [type]           [description]
     */
    public function transform($category)
    {   
        return [
            'id' => (int) $category['id'],
            'name' => $category['name'],
            'description' => $category['description'],
            'image' => $category['image'],
            'status' => (int) $category['status'],
        ];
    }
}