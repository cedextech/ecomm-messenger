<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Shop;
use App\Services\Messenger;
use Tgallice\FBMessenger\Model\UserProfile;

class CustomerService
{   
    /**
     *  Signup new customer in a shop.
     * 
     * @param  Shop   $shop       [description]
     * @param  [type] $facebookId [description]
     * @return [type]             [description]
     */
    public function signup(Shop $shop, $facebookId) 
    {
        $messenger = new Messenger();

        $customer = Customer::firstOrNew([
            'shop_id' => $shop->id,
            'facebook_id' => $facebookId
        ]);

        if(!$customer->exists) {
            $profile = $messenger->page($shop->facebook_page_access_token)
                            ->to($facebookId)
                            ->profile();

            $customer->first_name = $profile->getFirstName();
            $customer->last_name = $profile->getLastName();
            $customer->language = $profile->getLocale();
            $customer->shop_id = $shop->id;

            $customer->save();
        }

        return $customer;
    }
}