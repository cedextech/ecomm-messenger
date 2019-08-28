<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InvitationCreated extends Notification implements ShouldQueue
{
    use Queueable;

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
        return (new MailMessage)
                    ->subject(config('app.name') . ' - Invitation')
                    ->greeting('Hi there,')
                    ->line('Welcome to ' . config('app.name') . '!')
                    ->line('Create a Facebook Messenger chatbot for your store within minutes.')
                    ->line('Chatbots are the next generation in communication, get ready to face the future.')
                    ->line('Have any questions? Just shoot us an email! We’re always here to help.')
                    ->action('Create Account', url('invitation/' . $notifiable->token))
                    ->line('Thank you.');
    }
}
