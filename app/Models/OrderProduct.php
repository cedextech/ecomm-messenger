<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{   
    protected $appends = [
        'subtotal'
    ];

    /**
     * Product relationship.
     * 
     * @return [type] [description]
     */
    public function product() 
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * Get the subtotal for each products ordered.
     * 
     * @return [type] [description]
     */
    public function getSubtotalAttribute() 
    {
        return round($this->price * $this->quantity, 2);
    }

    /**
     * Get the product image.
     * 
     * @param  [type] $image [description]
     * @return [type]        [description]
     */
    public function getImageAttribute($image) 
    {   
        return ($image) ? asset('storage/' . $image) : asset('img/default.png');
    }
}
