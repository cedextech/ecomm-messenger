<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        $attributes = [
            'prefix' => 'shop'
        ];

        Broadcast::routes($attributes);

        require base_path('routes/channels.php');
    }
}
