<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $shop->name }}</title>

        <link href="{{ mix('/css/checkout.css') }}" rel="stylesheet">
    </head>
    <body class="nojQuery">

        <script type="text/javascript">
            window.Laravel = {!!json_encode([
                'csrfToken' => csrf_token(),
                'baseUrl' => config('app.url')]) !!};
        </script>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="row">

                        <button class="accordion btn-head" id="cart-summary">Cart Summary</button>
                        <div class="sec-cont pd-15" id="section-cart-summary">

                            @foreach($cart->items as $item)
                                <div class="cart-row">
                                    <span class="p-name">{{ $item->product->name }}</span>
                                    <span class="p-quantity">x {{ $item->quantity }}</span>
                                    <span class="p-price">{{ format_currency($item->subtotal, $shop->currency_code) }}</span>
                                </div>
                            @endforeach

                            <hr style="margin-bottom:0px">
 
                            <div class="cart-row clr-grey">
                                <span class="pull-left text-l">Subtotal</span>
                                <span class="pull-right text-r">{{ format_currency($cart->subtotal, $shop->currency_code) }}</span>
                            </div>

                            <div class="cart-row clr-grey">
                                <span class="pull-left text-l">Tax ({{ $cart->tax }}%)</span>
                                <span class="pull-right text-r">{{ format_currency($cart->tax_amount, $shop->currency_code) }}</span>
                            </div>

                            @if($cart->checkout_type == 'delivery')
                                <div class="cart-row clr-grey">
                                    <span class="pull-left text-l">Delivery Fee</span>
                                    <span class="pull-right text-r">{{ format_currency($cart->delivery_fee, $shop->currency_code) }}</span>
                                </div>
                            @endif

                            <div class="cart-row txt-bold mb-20">
                                <span class="pull-left text-l">Total</span>
                                <span class="pull-right text-r">{{ format_currency($cart->total, $shop->currency_code) }}</span>
                            </div>
                        </div>

                        <button class="accordion btn-head" id="customer-info">Customer Info</button>
                        <div class="sec-cont" id="section-customer-info">
                            <form role="form" id="form-checkout">
                                <div class="text-item">
                                    <label for="mobile">Contact Phone Number</label>
                                    <input type="tel" class="txt-box" id="mobile" name="mobile">
                                </div>

                                <div class="text-item">
                                    <label for="city">City</label>
                                    <input type="text" class="txt-box" id="city" name="city">
                                </div>

                                <div class="text-item">
                                    <label for="street">Street</label>
                                    <input type="text" class="txt-box" id="street" name="street">
                                </div>

                                <div class="text-item">
                                    <label for="zipcode">Zipcode</label>
                                    <input type="tel" class="txt-box" id="zipcode" name="zipcode">
                                </div>

                                <div class="text-item">
                                    <label for="special_request">Special Request</label>
                                    <input type="text" class="txt-box" id="special_request" name="special_request">
                                </div>

                                <input type="hidden" name="checkout_token" value="{{ $token }}">

                                <div class="col-md-12">
                                    <button type="submit" disabled="disabled" class="btn btn-default btn-blue-full pd-15 btn-checkout" name="submit" value="submit">Place Order</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ mix('/js/checkout.js') }}"></script>
    </body>
</html>