<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacebookPage extends Model
{   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'page_id', 'access_token'
    ];

    /**
     * Owner of the Facebook page.
     * 
     * @return [type] [description]
     */
    public function owner() 
    {
        return $this->belongsTo('App\Models\User');
    }
}