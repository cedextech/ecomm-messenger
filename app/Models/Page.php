<?php

namespace App\Models;

use App\Models\BaseModel;

class Page extends BaseModel
{   
    /**
     * Shop the page belongs to.
     * 
     * @return [type] [description]
     */
    public function shop() {
        return $this->belongsToMany('App\Models\Shop');
    }
}
