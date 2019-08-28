<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = ['facebook_id', 'shop_id', 'token', 'service'];

    public function shop() 
    {
        return $this->belongsTo('App\Models\Shop');
    }
}