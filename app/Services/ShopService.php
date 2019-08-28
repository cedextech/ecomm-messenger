<?php

namespace App\Services;

use DB;
use App\Models\Shop;
use Ramsey\Uuid\Uuid;

class ShopService
{   
    /**
     * Get the shop associated with give Facebook page.
     * 
     * @param  [type] $facebookPageId [description]
     * @return [type]                 [description]
     */
    public function shopByFacebookPageID($facebookPageId) 
    {
        $shop = Shop::where([
            ['facebook_page_id', '=', $facebookPageId]
        ])->get();

        return $shop;
    }

    /**
     * Generate UUID.
     *
     * @param  [type]    [description]
     * @return [type]    [description]
     */
    public function generateUuid()
    {
        $uuid = Uuid::uuid4()->toString();
        
        $isExistUuid = Shop::where('uid', $uuid)->exists();

        if(empty(($isExistUuid))) {
            return $uuid;
        }

        $this->generateUuid();
    }

    /**
     * Check the store is opened or closed in current time.
     * 
     * @param  [type]  $shop [description]
     * @return boolean       [description]
     */
    public function isStoreOpen($shop) 
    {
        $currentDay = date('N');
        $currentTime = date('H:i', time());

        $sql = "('".$currentTime."' BETWEEN opening_1 AND closing_1 ) OR ('".$currentTime."' BETWEEN opening_2 AND closing_2" . ")"; 

        return $shop->workingHours()
                    ->where('day', $currentDay)
                    ->where('opened_or_closed', 1)
                    ->where(DB::raw($sql))
                    ->exists();

    }
}