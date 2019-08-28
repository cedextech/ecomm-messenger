<div class="modal-content">
    <form role="form" action="/shop/orders/update" method="POST" id="form-update-order">
        <input type="hidden" name="order_id" value="{{ $order->id }}">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Order Details #{{ $order->reference }}</h4>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td width="50%">Total</td>
                            <td>{{ format_currency($order->total) }}</td>
                        </tr>

                        <tr>
                            <td>Tax ({{ $order->tax }}%)</td>
                            <td>{{ format_currency($order->tax_amount) }}</td>
                        </tr>

                        <tr>
                            <td>Delivery Fee</td>
                            <td>{{ format_currency($order->delivery_fee) }}</td>
                        </tr>

                        <tr>
                            <td>Date</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-6">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td width="50%">Payment Status</td>
                            <td>
                                <span class="label {{ payment_status_label($order->payment_status) }}">
                                    {{ $order->payment_status_text }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td>Order Status</td>
                            <td>
                                <span class="label {{ order_status_label($order->status) }}">
                                    {{ $order->status_text }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td>Payment Mode</td>
                            <td>{{ $order->payment_mode_text }}</td>
                        </tr>

                        <tr>
                            <td>Service</td>
                            <td>{{ $order->checkout_type_text }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <table class="table table-bordered table-condensed">
                <tr>
                    <td width="55%"><b>Name</b></td>
                    <td width="15%"><b>Price</b></td>
                    <td width="15%"><b>Quantity</b></td>
                    <td width="15%"><b>Subtotal</b></td>
                </tr>

                @foreach($order->products as $product)
                    <tr>
                        <td>{{ $product->product->name }}</td>
                        <td>{{ format_currency($product->price) }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ format_currency($product->subtotal) }}</td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="4">
                        <strong>Special Request</strong> 
                        <br/> {{ $order->special_request }}
                    </td>
                </tr>
            </table>

            <div class="row">
                <div class="col-md-8">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td><b>Customer Address</b></td>
                        </tr>
                        <tr>
                            <td>{!! nl2br(e($order->customer_address->fulladdress)) !!}</td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Order Status</label>
                        <select class="form-control" name="order_status">
                            @foreach(all_order_statuses() as $key => $value)
                                <option value="{{ $key }}" {{ ($order->status == $key) ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Payment Status</label>
                        <select class="form-control" name="payment_status">
                            @foreach(all_payment_statuses() as $key => $value)
                                <option value="{{ $key }}" {{ ($order->payment_status == $key) ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            <button type="submit" class="btn bg-olive btn-flat" name="submit" value="submit">Save changes</button>
        </div>
    </form>
</div>