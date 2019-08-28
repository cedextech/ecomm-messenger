<form role="form" method="POST" action="{{ url('shop/settings/order') }}">
    {{ csrf_field() }}

    <div class="form-group {{ $errors->has('delivery_fee') ? ' has-error' : '' }}">
        <label for="delivery_fee">Delivery Fee</label>

        <div class="row">
            <div class="col-xs-3">
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" value="{{ old('delivery_fee', $shop->delivery_fee) }}" name="delivery_fee" id="delivery_fee">
                </div>
            </div>
        </div>

        @if ($errors->has('delivery_fee'))
            <span class="help-block">
                {{ $errors->first('delivery_fee') }}
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('delivery_amount_minimum') ? ' has-error' : '' }}">
        <label for="delivery_amount_minimum">Delivery Amount Minimum</label>

        <div class="row">
            <div class="col-xs-3">
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" value="{{ old('delivery_amount_minimum', $shop->delivery_amount_minimum) }}" name="delivery_amount_minimum" id="delivery_amount_minimum">
                </div>
            </div>
        </div>

        @if ($errors->has('delivery_amount_minimum'))
            <span class="help-block">
                {{ $errors->first('delivery_amount_minimum') }}
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('notification_email') ? ' has-error' : '' }}">
        <label for="notification_email">Order Notification E-mail Address</label>

        <div class="row">
            <div class="col-xs-6">
                <input type="text" class="form-control" id="notification_email" name="notification_email" value="{{ old('notification_email', $shop->notification_email) }}">
            </div>
        </div>

        @if ($errors->has('notification_email'))
            <span class="help-block">
                {{ $errors->first('notification_email') }}
            </span>
        @endif
    </div>

    <button type="submit" class="btn bg-olive btn-flat">Save</button>
</form>