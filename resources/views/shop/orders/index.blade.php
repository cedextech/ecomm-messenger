@extends('layouts.app')

@section('title', 'Orders')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header" id="page-orders">
    <h1>Orders</h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-2">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="order-datepicker" value="{{ $date }}">
                    </div>

                    <br/>
                </div>
            </div>

            <div class="box box-danger">
                <div class="box-body table-responsive no-padding">

                    @if(!$orders->isEmpty())

                        <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th width="20%">Name</th>
                                        <th width="10%">Total</th>
                                        <th width="10%">Service</th>
                                        <th width="20%">Payment</th>
                                        <th width="15%">Date</th>
                                        <th width="10%">Status</th>
                                        <th width="10%">View</th>
                                    </tr>

                                    @foreach($orders as $order)
                                        <tr>
                                            <td>
                                                <div data-toggle="popover" data-content="{{ nl2br(e($order->customer_address->full_address)) }}" data-trigger="hover" data-html="true">
                                                    {{ $order->customer_address->name }} <br> ({{ $order->customer_address->mobile }})
                                                </div>
                                            </td>

                                            <td>{{ format_currency($order->total) }}</td>

                                            <td>{{ $order->checkout_type_text }}</td>

                                            <td>
                                                <span class="label {{ payment_status_label($order->payment_status) }}">
                                                    {{ $order->payment_status_text }}
                                                </span>

                                                 <br> ({{ $order->payment_mode_text }})
                                            </td>

                                            <td>{{ $order->created_at->format('d M Y') }} <br> {{ $order->created_at->format('h:i A') }}</td>

                                            <td>
                                                <span class="label {{ order_status_label($order->status) }}">
                                                    {{ $order->status_text }}
                                                </span>
                                            </td>

                                            <td>
                                                <a href="javascript:void(0)" class="btn load-ajax-modal" data-url="/shop/orders/{{ $order->id }}/edit">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>

                    @else

                        <br>
                        <p class="well">No records found!</p>

                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
@endsection