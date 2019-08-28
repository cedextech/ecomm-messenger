<?php

namespace App\Notifications;

use App\Models\Shop;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use App\Channels\FacebookChannel;
use Tgallice\FBMessenger\Model\Message;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderUpdated extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * App\Models\Order
     * 
     * @var [type]
     */
    private $order;

    /**
     * App\Models\Shop
     * 
     * @var [type]
     */
    private $shop;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order, Shop $shop)
    {
        $this->order = $order;
        $this->shop = $shop;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [FacebookChannel::class];
    }

    /**
     * Get the messenger text representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return FacebookChannel
     */
    public function toFacebook($notifiable)
    {
        return [
            'page_access_token' => $this->shop->facebook_page_access_token,
            'message' => new Message('Hey ' . $notifiable->first_name . ', Your order (#' . $this->order->reference . ') status has changed to ' . $this->order->status_text)
        ];
    }
}
