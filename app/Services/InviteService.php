<?php

namespace App\Services;

use App\Models\Invite;
use App\Models\Shop;
use App\Models\ShopHour;
use App\Models\User;
use App\Notifications\InvitationCreated;
use App\Services\ShopService;
use Hash;

class InviteService
{
    /**
     * Create the invitation.
     * 
     * @param  [type] $email [description]
     * @return [type]        [description]
     */
    public function invite($email) 
    {
        $invite = Invite::updateOrCreate(
            ['email' => $email],
            ['token' => str_random(20)]
        );

        $invite->notify(new InvitationCreated(1));
    }

    /**
     * Signup user via invitation.
     * 
     * @param  [type] $input [description]
     * @return [type]        [description]
     */
    public function create($input) 
    {
        $invite = $this->getInvite($input['token']);

        // TODO
        // Move to user service

        $user = new User;
        $user->name = $input['name'];
        $user->email = $invite->email;
        $user->password = Hash::make($input['password']);
        $user->save();

        // TODO
        // Move to shop service
        
        $shopService = new ShopService();   

        $shop = new Shop;
        $shop->name = $input['shop_name'];
        $shop->user_id = $user->id;
        $shop->uid = $shopService->generateUuid();
        $shop->latitude = '';
        $shop->longitude = '';
        $shop->address = '';
        $shop->notification_email = $invite->email;
        $shop->save();

        // Working Hours
        foreach(range(1, 7) as $day) {
            $hour = new ShopHour;

            $hour->shop_id = $shop->id;
            $hour->opening_1 = '9:00' ;
            $hour->closing_1 = '16:00';
            $hour->opening_2 = '19:00';
            $hour->closing_2 = '23:00';
            $hour->opened_or_closed = 1 ;
            $hour->day = $day;

            $hour->save();
        }

        $this->removeInvite($input['token']);

        return true;
    }

    /**
     * Remove the invitation.
     * 
     * @param  [type] $token [description]
     * @return [type]        [description]
     */
    public function removeInvite($token) 
    {
        Invite::token($token)->delete();
    }

    public function getInvite($token) 
    {
        return Invite::token($token)->firstOrFail();
    }
}