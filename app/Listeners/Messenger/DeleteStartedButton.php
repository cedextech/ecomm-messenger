<?php

namespace App\Listeners\Messenger;

use App\Services\Messenger;
use App\Events\DisconnectedFromFacebookPage;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteStartedButton implements ShouldQueue
{
    /**
     * Messenger
     * 
     * @var [type]
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
     * @param  DisconnectedFromFacebookPage  $event
     * @return void
     */
    public function handle(DisconnectedFromFacebookPage $event)
    {
        $this->messenger->page($event->shop->facebook_page_access_token)
                ->deleteStartedButton();
    }
}