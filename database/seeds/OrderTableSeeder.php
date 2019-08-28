<?php

use App\Models\Customer;
use App\Models\Shop;
use App\Services\OrderService;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{   
    public $orderService;

    public function __construct(OrderService $orderService) 
    {
        $this->orderService = $orderService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {   
        $shop = Shop::find(1);
        $customer = Customer::find(10);

        foreach(range(1, 10) as $index) {
            $input = [
                'service' => 'delivery',
                'special_request' => 'Nothing',
                'mobile' => '09090909',
                'city' => 'Cochin',
                'street' => 'Cochin',
                'zipcode' => '090339'
            ];

            $this->orderService->create($input, $shop, $customer);
        }
    }
}
