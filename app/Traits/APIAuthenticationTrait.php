<?php

namespace App\Traits;

use Request;
use App\Models\Shop;

trait APIAuthenticationTrait 
{
    /**
     * App\Models\Shop
     * 
     * @var [type]
     */
    protected $shop;

    /**
     * Facebook user.
     * 
     * @var [type]
     */
    protected $facebookUserId;

    /**
     * Authenticate the request.
     * 
     * @return [type] [description]
     */
    public function shop() 
    {
        $this->shop = Shop::where([
            ['facebook_page_id', Request::header('X-FACEBOOK-PAGE-ID')]
        ])->firstOrFail();

        return $this->shop;
    }

    /**
     * Get the Facebook user from the request.
     * 
     * @return [type] [description]
     */
    public function facebookUser() 
    {
        $this->facebookUserId = Request::input('facebook_id');
    }
}