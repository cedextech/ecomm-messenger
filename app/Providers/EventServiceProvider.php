<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],

        'App\Events\ConnectedToFacebookPage' => [
            'App\Listeners\Messenger\SetGreetingText',
            'App\Listeners\Messenger\SetStartedButton',
            'App\Listeners\Messenger\SetPersistentMenu',
            'App\Listeners\Messenger\SubscribeAppToPage',
        ],

        'App\Events\DisconnectedFromFacebookPage' => [
            'App\Listeners\Messenger\DeleteGreetingText',
            'App\Listeners\Messenger\DeleteStartedButton',
            'App\Listeners\Messenger\DeletePersistentMenu',
            'App\Listeners\Messenger\UnsubscribeAppFromPage',
        ],

        'App\Events\ShopInfoUpdated' => [
            'App\Listeners\Messenger\UpdateGreetingText',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
