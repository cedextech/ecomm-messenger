<?php

namespace App\Services;

use DB;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderProduct;
use App\Services\CartService;
use App\Events\OrderWasReceived;
use App\Services\CustomerService;
use App\Notifications\OrderPlaced;
use App\Notifications\OrderReceived;

class OrderService
{
    /**
     * Get the orders count by days.
     * 
     * @param  [type] $shopId [description]
     * @return [type]         [description]
     */
    public function summaryBetweenDates($shopId) 
    {   
        $startDate = Carbon::today();
        $endDate = Carbon::today()->subDays(9);

        $sql = "
                SELECT COUNT(orders.id) AS order_count, SUM(orders.total) AS sales_total, DATE(orders.created_at) AS order_date
                FROM orders
                WHERE orders.shop_id = '{$shopId}' AND (DATE(created_at) BETWEEN DATE('{$endDate}') AND DATE('{$startDate}'))
                GROUP BY DATE(orders.created_at)
                ORDER BY DATE(orders.created_at)
            ";

        $orders = collect(DB::select($sql));

        $orders = $orders->mapWithKeys(function ($item) {
            return [$item->order_date => $item];
        });

        for($i = $startDate; $i >= $endDate; $startDate->subDay()) {
            if(!$orders->has($startDate->format('Y-m-d'))) {
                $orders->prepend((object) [
                    'order_count' => 0,
                    'sales_total' => 0,
                    'order_date' => $startDate->format('Y-m-d')
                ], $startDate->format('Y-m-d'));
            }
        }

        $orders = $orders->sortBy('order_date');

        $result = [
            'days'          => $orders->pluck('order_date'),
            'orders'        => $orders->pluck('order_count'),
            'sales'         => $orders->pluck('sales_total'),
            'today_orders'  => $orders[Carbon::today()->format('Y-m-d')]->order_count,
            'today_sales'   => format_currency($orders[Carbon::today()->format('Y-m-d')]->sales_total)
        ];

        return $result;
    }

    /**
     * Get the orders report between two dates.
     * 
     * @param  [type] $shopId    [description]
     * @param  [type] $startDate [description]
     * @param  [type] $endDate   [description]
     * @return [type]            [description]
     */
    public function reportBetweenDates($shopId, $startDate, $endDate) 
    {       
        Order::$withoutAppends = true;

        $select = '
            COUNT(*) AS orders_count, 
            SUM(subtotal) AS net_total, 
            SUM(tax_amount) AS total_tax_amount, 
            SUM(delivery_fee) AS total_delivery_fee, 
            SUM(total) AS total_sales, 
            DATE(created_at) AS order_date';

        $orders = Order::select(DB::raw($select))
                    ->where('shop_id', '=', $shopId)
                    ->whereBetween(DB::raw('DATE(created_at)'), [$startDate, $endDate])
                    ->orderBy(DB::raw('DATE(created_at)'))
                    ->groupBy(DB::raw('DATE(created_at)'))
                    ->get();

        $orders = $orders->map(function($order) {
            $order['order_date'] = Carbon::parse($order->order_date);

            return $order;
        });

        return $orders;
    }

    /**
     * Generate the order reference.
     * 
     * @return [type] [description]
     */
    public function generateOrderReference() 
    {
        $number = mt_rand(10000, 99999);

        if ($this->orderReferenceExists($number)) {
            return $this->generateOrderReference();
        }

        return $number;
    }

    /**
     * Check the order reference exists.
     * 
     * @param  [type] $number [description]
     * @return [type]         [description]
     */
    function orderReferenceExists($number) 
    {
        return Order::referenceExists($number)->exists();
    }

    /**
     * Create the order.
     * 
     * @param  [type] $request [description]
     * @return [type]          [description]
     */
    public function create($request) 
    {   
        $checkoutService = new CheckoutService;
        $customerService = new CustomerService;

        $checkoutToken = $checkoutService->getToken($request['checkout_token']);
        $shop = $checkoutToken->shop;

        // Store must be open
        if(!$shop->IsShopOpened) {
            return [
                'status' => 'error',
                'message' => 'Store is closed now. Please try later.'
            ];
        }

        $cartService = new CartService($shop, $checkoutToken->facebook_id);

        $cart = $cartService->transformContents($cartService->contents(), $checkoutToken);

        // Cart is empty
        if(!$cartService->isEmpty($cart)) {
            return [
                'status' => 'error',
                'message' => 'Your cart is empty. Please add products before checkout.'
            ];
        }

        // Order total is less than min order amount.
        if(!$cartService->isGreaterThanOrderMinimumAmount($cart)) {
            return [
                'status' => 'error',
                'message' => 'Your order subtotal is too small to submit online. Minimum order amount is ' . $shop->delivery_amount_minimum 
            ];
        }

        // Customer account creation
        if(!$customer = $customerService->signup($shop, $checkoutToken->facebook_id)) {
            return [
                'status' => 'error',
                'message' => 'Couldn\'t process your order'
            ];
        }

        // Everything Ok. Start the create order process.
        $order = $this->saveOrder($request, $shop, $customer, $cart);
        $orderAddress = $this->saveAddress($request, $order, $customer);
        $this->saveProducts($order, $cart->items);

        $cartService->clear();
        $checkoutToken->delete();

        $shop->notify(new OrderReceived($shop, $order, $orderAddress));
        $customer->notify(new OrderPlaced($shop, $order));
        event(new OrderWasReceived($order));

        return [
            'status' => 'success',
            'data' => [
                'reference' => $order->reference
            ]
        ];
    }

    /**
     * Save the order details.
     * 
     * @param  [type] $request  [description]
     * @param  [type] $shop     [description]
     * @param  [type] $customer [description]
     * @param  [type] $cart     [description]
     * @return [type]           [description]
     */
    private function saveOrder($request, $shop, $customer, $cart)
    {
        $order = new Order;

        $order->reference       = $this->generateOrderReference();
        $order->shop_id         = $shop->id;
        $order->customer_id     = $customer->id;
        $order->subtotal        = $cart->subtotal;
        $order->tax             = $cart->tax;
        $order->tax_amount      = $cart->tax_amount;
        $order->delivery_fee    = $cart->delivery_fee;
        $order->total           = $cart->total;
        $order->special_request = $request['special_request'];
        $order->checkout_type   = $cart->checkout_type;
        $order->payment_mode    = ($cart->checkout_type == 'delivery') ? 'delivery_cash' : 'pickup_cash';
        $order->payment_status  = 'pending';
        $order->status          = 'pending';

        $order->save();

        return $order;
    }

    /**
     * Save the product.
     * 
     * @param  [type] $order [description]
     * @param  [type] $cart  [description]
     * @return [type]        [description]
     */
    private function saveProducts($order, $cart) 
    {
        foreach($cart as $item) {
            $products[] = [
                'order_id' => $order->id,
                'product_id' => $item->product->id,
                'name' => $item->product->name,
                'price' => $item->product->price,
                'quantity' => $item->quantity
            ];
        }

        DB::table('order_products')->insert($products);

        return true;
    }

    /**
     * Save the address.
     * 
     * @param  [type] $request  [description]
     * @param  [type] $order    [description]
     * @param  [type] $customer [description]
     * @return [type]           [description]
     */
    private function saveAddress($request, $order, $customer) 
    {
        $orderAddress = new OrderAddress;

        $orderAddress->order_id = $order->id;
        $orderAddress->name     = $customer->first_name;
        $orderAddress->mobile   = $request['mobile'];
        $orderAddress->city     = $request['city'];
        $orderAddress->location = $request['street'];
        $orderAddress->zipcode  = $request['zipcode'];

        $orderAddress->save();

        return $orderAddress;
    }

    /**
     * Get the order.
     * 
     * @param  [type] $orderReference [description]
     * @param  [type] $where          [description]
     * @return [type]                 [description]
     */
    public function getOrder($orderReference, $where) 
    {   
        // TODO
        // Add facebook_id in $where

        $order = Order::where('reference', $orderReference)
                    ->where($where)
                    ->with(['products' => function($query) {
                        $query->join('products', 'products.id', '=', 'order_products.product_id')
                            ->select('order_products.*','products.image','products.description');
                    }])
                    ->with('customer_address')
                    ->firstOrFail();

        return $order;
    }
}