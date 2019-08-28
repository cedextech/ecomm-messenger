<?php

namespace App\Listeners\Messenger;

use App\Services\Messenger;
use App\Events\ConnectedToFacebookPage;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscribeAppToPage implements ShouldQueue
{
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
        $this->messenger->page($event->shop->facebook_page_access_token)
                ->subscribeAppToPage();
    }
}