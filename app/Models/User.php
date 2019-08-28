<?php

namespace App\Models;

use App\Scopes\StatusScope;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new StatusScope);
    }

    /**
     * User owned shop.
     * 
     * @return [type] [description]
     */
    public function shop() 
    {
        return $this->hasOne('App\Models\Shop');
    }

    /**
     * User owned facebook pages.
     * 
     * @return [type] [description]
     */
    public function facebookPages() 
    {
        return $this->hasMany('App\Models\FacebookPage');
    }
}
