<?php

namespace App\Traits;

use Config;

trait ShopTrait 
{   
    /**
     * Load the shop specific settings.
     * 
     * @return [type] [description]
     */
    public function boot() 
    {
        Config::set('app.timezone', $this->shop->timezone);
        Config::set('app.currency_code', $this->shop->currency_code);

        date_default_timezone_set($this->shop->timezone);
    }
}