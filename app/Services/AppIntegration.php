<?php

namespace App\Services;

use App\Models\ShopApp;

class AppIntegration
{
    /**
     * Install the app.
     * 
     * @param  [type] $shop    [description]
     * @param  [type] $appCode [description]
     * @return [type]          [description]
     */
    public function installApp($shop, $appCode) 
    {   
        $app = new ShopApp(['code' => $appCode]);

        return $shop->apps()->save($app);
    }

    /**
     * Install the messenger app.
     * 
     * @param  [type] $shop [description]
     * @return [type]       [description]
     */
    public function installMessenger($shop)
    {
        return $this->installApp($shop, 'MESSENGER');
    }

    /**
     * Messenger integration status.
     * 
     * @param  [type]  $apps [description]
     * @return boolean       [description]
     */
    public function isMessengerOn($apps) 
    {
        $filtered = $apps->where('code', 'MESSENGER');

        return !$filtered->isEmpty();
    }
}