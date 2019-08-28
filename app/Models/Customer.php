<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Notifications\Notifiable;

class Customer extends BaseModel
{   
    use Notifiable;

    protected $fillable = ['first_name', 'last_name', 'facebook_id', 'language', 'created_at', 'updated_at'];

    /**
     * The shop that customer belong to.
     * 
     * @return [type] [description]
     */
    public function shop() 
    {
        return $this->belongsTo('App\Models\Shop');
    }

    /**
     * Customer cart.
     * 
     * @return [type] [description]
     */
    public function cart() 
    {
        return $this->hasMany('App\Models\Cart');
    }

    /**
     * Get the customer by facebook ID.
     * 
     * @param  [type] $query      [description]
     * @param  [type] $facebookId [description]
     * @return [type]             [description]
     */
    public function scopeByFacebookId($query, $facebookId) 
    {
        return $query->where('facebook_id', $facebookId)->firstOrFail();
    }

    /**
     * Customer Facebook Id to send text message to messenger.
     * 
     * @return string
     */
    public function routeNotificationForFacebookChannel() 
    {
        return $this->facebook_id;
    }
}
