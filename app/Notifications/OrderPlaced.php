<?php

namespace App\Notifications;

use App\Models\Shop;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use App\Channels\FacebookChannel;
use Tgallice\FBMessenger\Model\Message;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Tgallice\FBMessenger\Model\QuickReply\Text;

class OrderPlaced extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * App\Models\Shop
     * 
     * @var [type]
     */
    private $shop;

    /**
     * App\Models\Order
     * 
     * @var [type]
     */
    private $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Shop $shop, Order $order)
    {   
        $this->shop = $shop;
        $this->order = $order;
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
        $message = new Message('Your order has been received. Thank you for your purchase! ' . 'Your order ID is #' . $this->order->reference . '. You will receive an order confirmation message shortly.');

        $receiptPayload = [
            'action' => 'SHOW_RECEIPT',
            'data' => [
                'reference' => $this->order->reference
            ]
        ];

        $message->setQuickReplies([
            new Text('Show Receipt', json_encode($receiptPayload))
        ]);

        return [
            'page_access_token' => $this->shop->facebook_page_access_token,
            'message' => $message
        ];
    }
}
