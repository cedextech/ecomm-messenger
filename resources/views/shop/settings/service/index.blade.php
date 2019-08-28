@extends('layouts.app')

@section('title', 'Services Settings')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <section class="content-header">
                    <h1>Services</h1>
                    <p>Pickup or Delivery</p>
                </section>
            </div>

            <div class="col-md-8">
                <div class="box box box-danger">
                    <div class="box-body">
                        
                        <form role="form" method="POST" action="{{ url('shop/settings/services') }}">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('has_pickup') ? ' has-error' : '' }}">
                                <label for="has_pickup">Pickup</label>

                                <p class="help-block">Allow customers to pick up orders</p>

                                <div class="row">
                                    <div class="col-xs-3">
                                        <select class="form-control" name="has_pickup" id="has_pickup">
                                            <option value="1" {{ old('has_pickup', $shop->has_pickup) == '1' ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ old('has_pickup', $shop->has_pickup) == '0' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>

                                @if ($errors->has('has_pickup'))
                                    <span class="help-block">
                                        {{ $errors->first('has_pickup') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('has_delivery') ? ' has-error' : '' }}">
                                <label for="has_delivery">Delivery</label>

                                <p class="help-block">You offer delivery</p>

                                <div class="row">
                                    <div class="col-xs-3">
                                        <select class="form-control" name="has_delivery" id="has_delivery">
                                            <option value="1" {{ old('has_delivery', $shop->has_delivery) == '1' ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ old('has_delivery', $shop->has_delivery) == '0' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>

                                @if ($errors->has('has_delivery'))
                                    <span class="help-block">
                                        {{ $errors->first('has_delivery') }}
                                    </span>
                                @endif
                            </div>

                            <button type="submit" class="btn bg-olive btn-flat">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection