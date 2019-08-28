<?php

namespace App\Transformers;

abstract class Transformer
{
    /**
     *  Transform a collection.
     * 
     * @param  array  $items [description]
     * @return [type]        [description]
     */
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    /**
     * Transform method for single record.
     *
     * @param $item
     */
    abstract public function transform($item);
}