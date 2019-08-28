<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    /**
     * Products in a category.
     * 
     * @return [type] [description]
     */
    public function products() 
    {
        return $this->hasMany('App\Models\Product');
    }

    /**
     * Category belongs to a shop.
     * 
     * @return [type] [description]
     */
    public function shop() 
    {
        return $this->belongsTo('App\Models\Shop');
    }

    /**
     * Get the category image.
     * 
     * @param  [type] $image [description]
     * @return [type]        [description]
     */
    public function getImageAttribute($image) 
    {   
        return ($image) ? asset('storage/' . $image) : asset('img/default.png');
    }
}
