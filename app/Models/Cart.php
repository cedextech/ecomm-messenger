<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['facebook_id', 'product_id', 'quantity', 'subtotal'];

    /**
     * Product associated with cart.
     * 
     * @return [type] [description]
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function scopeCustomer($query, $facebookId) 
    {
        return $query->where('facebook_id', $facebookId);
    }
}
