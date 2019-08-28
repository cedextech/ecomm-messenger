<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderReceived extends Notification implements ShouldQueue
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
     * App\Models\OrderAddress
     * 
     * @var [type]
     */
    private $address;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($shop, $order, $address)
    {
        $this->shop = $shop;
        $this->order = $order;
        $this->address = $address;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $content = [
            'order' => $this->order,
            'products' => $this->order->products,
            'address' => $this->address
        ];

        return (new MailMessage)
                    ->markdown('mails.order.received', $content);
    }
}
