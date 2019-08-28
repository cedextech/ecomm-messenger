<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ProjectFormSubmitted extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Contact details.
     * 
     * @var [type]
     */
    private $contact;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
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
        return (new MailMessage)
        			->from($this->contact['email'])
        			->subject('Onchatbot.com | Chatbot Project from ' . $this->contact['name'])
        			->line('Name : ' . $this->contact['name'])
        			->line('')
        			->line('Email : ' . $this->contact['email'])
        			->line('')
        			->line('Company : ' . $this->contact['company'])
        			->line('')
                    ->line($this->contact['requirement'])
                    ->line('');
    }
}
