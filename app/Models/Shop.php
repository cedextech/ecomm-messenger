<?php

namespace App\Models;

use DB;
use App\Models\BaseModel;
use Illuminate\Notifications\Notifiable;

class Shop extends BaseModel
{   
    use Notifiable;

    /**
     * Restaurant owner.
     * 
     * @return [type] [description]
     */
    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Shop working hours.
     * 
     * @return [type] [description]
     */
    public function workingHours() 
    {
        return $this->hasMany('App\Models\ShopHour');
    }

    /**
     * Shop content pages. 
     * 
     * @return [type] [description]
     */
    public function pages() 
    {
        return $this->belongsToMany('App\Models\Page')->withPivot('id', 'title', 'content');
    }

    /**
     * Shop's categories.
     * 
     * @return [type] [description]
     */
    public function categories() 
    {
        return $this->hasMany('App\Models\Category');
    }

    /**
     * Shop's products.
     * 
     * @return [type] [description]
     */
    public function products() 
    {
        return $this->hasMany('App\Models\Product');
    }

    /**
     * Shop's orders.
     * 
     * @return [type] [description]
     */
    public function orders() 
    {
        return $this->hasMany('App\Models\Order');
    }

    /**
     * Apps integration with shop.
     * 
     * @return [type] [description]
     */
    public function apps() 
    {
        return $this->hasMany('App\Models\ShopApp');
    }

    /**
     * The customers of shop.
     * 
     * @return [type] [description]
     */
    public function customers() 
    {
        return $this->hasMany('App\Models\Customer');
    }

    /**
     * Get the shop logo.
     * 
     * @param  [type] $logo [description]
     * @return [type]       [description]
     */
    public function getLogoAttribute($logo) 
    {   
        return ($logo) ? asset('storage/' . $logo) : asset('img/default-shop-logo.png');
    }

    /**
     * Get the shop banner image.
     * 
     * @param  [type] $banner [description]
     * @return [type]         [description]
     */
    public function getBannerAttribute($banner) 
    {   
        return ($banner) ? asset('storage/' . $banner) : asset('img/default-shop-banner.png');
    }

    /**
     * Check the shop is opened or closed in current time.
     * 
     * @return boolean
     */
    public function getIsShopOpenedAttribute() 
    {
        $currentTime = date('H:i', time());

        $sql = '((("'.$currentTime.'" BETWEEN opening_1 AND closing_1)) OR (("'.$currentTime.'" BETWEEN opening_2 AND closing_2)))'; 

        return $this->workingHours()
                    ->where('day', date('N'))
                    ->where('opened_or_closed', 1)
                    ->whereRaw($sql)
                    ->exists();
    }

    /**
     * New order notification email address.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->notification_email;
    }

    /**
     * Get the shop by UID.
     * 
     * @param  [type] $query [description]
     * @param  [type] $uid   [description]
     * @return [type]        [description]
     */
    public function scopeByUid($query, $uid) 
    {
        return $query->where('uid', $uid)->firstOrFail();
    }
}
