<form role="form" method="POST" action="{{ url('shop/setup') }}">
    {{ csrf_field() }}

    <input type="hidden" name="tab" value="4">

    <div class="form-group {{ $errors->has('notification_email') ? ' has-error' : '' }}">
        <label for="notification_email">Facebook</label>

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

    <div class="form-group {{ $errors->has('notification_email') ? ' has-error' : '' }}">
        <label for="notification_email">Twitter</label>

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

    <div class="form-group {{ $errors->has('notification_email') ? ' has-error' : '' }}">
        <label for="notification_email">Pinterest</label>

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

    <div class="form-group {{ $errors->has('notification_email') ? ' has-error' : '' }}">
        <label for="notification_email">Yelp</label>

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

    <div class="form-group {{ $errors->has('notification_email') ? ' has-error' : '' }}">
        <label for="notification_email">Instagram</label>

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

    <button type="submit" class="btn bg-olive btn-flat">&nbsp;&nbsp; Save &nbsp;&nbsp;</button>
</form>