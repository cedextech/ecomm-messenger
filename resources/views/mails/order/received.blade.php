@component('mail::message')
# New order has been received!

Order Reference #{{ $order->reference }}

@isset($order->special_request)
Special Request <br>
{{ $order->special_request }}
@endisset

@component('mail::table')
| Name          |   Price       | Quantity  | Subtotal  |
| :------------ |:------------- | :-------- |:--------- |
@foreach($products as $product)
| {{ $product->name }} | {{ $product->price }} | {{ $product->quantity }} | {{ $product->subtotal }} |
@endforeach
@endcomponent

@component('mail::table')
| Customer Address |   &nbsp;   |
| :--------------  |:-----------|
| Name    | {{ $address->name }} |
| Mobile  | {{ $address->mobile }} |
| City    | {{ $address->city }} |
| Location| {{ $address->location }} |
| Zipcode | {{ $address->zipcode }} |
@endcomponent
 
@component('mail::table')
| Payment Details |   &nbsp;   |
| :-------------- |:-----------|
| Subtotal               | {{ $order->subtotal }} |
| Tax ({{ $order->tax }}%)| {{ $order->tax_amount }} |
| Delivery Fee           | {{ $order->delivery_fee }} |
| Total                  | {{ $order->total }} |
| Payment Mode           | {{ $order->payment_mode_text }} |
| Payment Status         | {{ $order->payment_status_text }} |
@endcomponent

@component('mail::button', ['url' => url('shop/orders')])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent