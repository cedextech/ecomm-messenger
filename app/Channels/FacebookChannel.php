<?php

namespace App\Channels;

use App\Services\Messenger;
use Illuminate\Notifications\Notification;

class FacebookChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        if (! $to = $notifiable->routeNotificationForFacebookChannel()) {
            return;
        }

        $message = $notification->toFacebook($notifiable);

        return (new Messenger)
                ->page($message['page_access_token'])
                ->to($to)
                ->send($message['message']);
    }
}