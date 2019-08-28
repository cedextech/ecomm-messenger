<?php

namespace App\Events;

use App\Models\Shop;
use Illuminate\Queue\SerializesModels;

class ShopInfoUpdated
{
    use SerializesModels;

    /**
     * Shop
     * 
     * @var [type]
     */
    public $shop;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }
}
