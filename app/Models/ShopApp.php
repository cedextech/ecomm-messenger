<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopApp extends Model
{   
    protected $fillable = ['shop_id', 'code'];

    /**
     * The app installed shop.
     * 
     * @return [type] [description]
     */
    public function shop() 
    {
        return $this->belongsTo('App\Models\Shop');
    }
}