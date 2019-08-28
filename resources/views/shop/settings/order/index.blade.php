@extends('layouts.app')

@section('title', 'Order Settings')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <section class="content-header">
                    <h1>Order</h1>
                    <p>Delivery Fee, Delivery Amount Minimum, Order Notification E-mail Address</p>
                </section>
            </div>

            <div class="col-md-8">
                <div class="box box box-danger">
                    <div class="box-body">
                        
                        @include('shop.settings.order.tab1')

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <section class="content-header">
                    <h1>Tax</h1>
                    <p>Tax and Tax Type</p>
                </section>
            </div>

            <div class="col-md-8">
                <div class="box box box-danger">
                    <div class="box-body">
                        
                        @include('shop.settings.order.tab2')

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection