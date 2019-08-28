@extends('layouts.app')

@section('title', 'Payment Settings')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <section class="content-header">
                    <h1>Payments</h1>
                    <p>Cash or Cards</p>
                </section>
            </div>

            <div class="col-md-8">
                <div class="box box box-danger">
                    <div class="box-body">
                        
                        <form role="form" method="POST" action="{{ url('shop/settings/payments') }}">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('accept_cash') ? ' has-error' : '' }}">
                                <label for="accept_cash">Cash</label>

                                <p class="help-block">Accept cash payments</p>

                                <div class="row">
                                    <div class="col-xs-3">
                                        <select class="form-control" name="accept_cash" id="accept_cash">
                                            <option value="1" {{ old('accept_cash', $shop->accept_cash) == '1' ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ old('accept_cash', $shop->accept_cash) == '0' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>

                                @if ($errors->has('accept_cash'))
                                    <span class="help-block">
                                        {{ $errors->first('accept_cash') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('accept_card_offline') ? ' has-error' : '' }}">
                                <label for="accept_card_offline">Cards</label>

                                <p class="help-block">You take payments offline (In person or over the phone)</p>

                                <div class="row">
                                    <div class="col-xs-3">
                                        <select class="form-control" name="accept_card_offline" id="accept_card_offline">
                                            <option value="1" {{ old('accept_card_offline', $shop->accept_card_offline) == '1' ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ old('accept_card_offline', $shop->accept_card_offline) == '0' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>

                                @if ($errors->has('accept_card_offline'))
                                    <span class="help-block">
                                        {{ $errors->first('accept_card_offline') }}
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