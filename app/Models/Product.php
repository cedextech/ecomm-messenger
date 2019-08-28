<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
    /**
     * Category the menu belongs to.
     * 
     * @return [type] [description]
     */
    public function category() 
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
    * Scope a query to get only search result.
    *
    * @param \Illuminate\Database\Eloquent\Builder $query
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeFilter($query, $keyword)
    {
        return $query->where('name','LIKE',"{$keyword}%");
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