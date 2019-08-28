<?php

namespace App\Listeners\Messenger;

use App\Services\Messenger;
use App\Events\ConnectedToFacebookPage;
use Illuminate\Contracts\Queue\ShouldQueue;

class SetGreetingText implements ShouldQueue
{   
    /**
     * @var App\Services\Messenger
     */
    public $messenger;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Messenger $messenger)
    {
        $this->messenger = $messenger;
    }

    /**
     * Handle the event.
     * 
     * @param  ConnectedToFacebookPage $event [description]
     * @return [type]                         [description]
     */
    public function handle(ConnectedToFacebookPage $event)
    {   
        $text = "Hello {{user_first_name}}!, welcome to " . $event->shop->name;

        $this->messenger->page($event->shop->facebook_page_access_token)
                ->setGreetingText($text);
    }
}