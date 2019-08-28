<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=AIzaSyAg1vhAzQYT0h8Vhf3NPdB5UkdhIoktLdo"></script>

<form role="form" method="POST" action="{{ url('shop/settings') }}">
    {{ csrf_field() }}

    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name">Name</label>

        <div class="row">
            <div class="col-xs-6">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $shop->name) }}">
            </div>
        </div>

        @if ($errors->has('name'))
            <span class="help-block">
                {{ $errors->first('name') }}
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
        <label for="location">Location</label>

        <div class="row">
            <div class="col-xs-6">
                <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $shop->location) }}">

                <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude', $shop->latitude) }}">
                <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude', $shop->longitude) }}">
            </div>
        </div>

        @if ($errors->has('location'))
            <span class="help-block">
                {{ $errors->first('location') }}
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
        <label for="phone">Phone</label>

        <div class="row">
            <div class="col-xs-6">
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $shop->phone) }}">
            </div>
        </div>

        @if ($errors->has('phone'))
            <span class="help-block">
                {{ $errors->first('phone') }}
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('timezone') ? ' has-error' : '' }}">
        <label for="">Timezone</label>

        <div class="row">
            <div class="col-xs-6">
                <select class="form-control select2" name="timezone" id="timezone" value="{{ old('timezone') }}">
                    @foreach($timezones as $region => $list)
                        <optgroup label="{{ $region }}">
                            @foreach($list as $timezone => $name)
                                <option value="{{ $timezone }}" {{ old('timezone', $shop->timezone) == $timezone ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
        </div>

        @if ($errors->has('timezone'))
            <span class="help-block">
                {{ $errors->first('timezone') }}
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('country_iso') ? ' has-error' : '' }}">
        <label for="">Country</label>

        <div class="row">
            <div class="col-xs-6">
                <select class="form-control select2" name="country_iso" id="country_iso" value="{{ old('country_iso') }}">
                    @foreach($countries as $key => $country)
                        <option value="{{ $key }}" {{ old('country_iso', $shop->country_iso) == $key ? 'selected' : '' }}>{{ $country['common'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @if ($errors->has('country_iso'))
            <span class="help-block">
                {{ $errors->first('country_iso') }}
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('currency_code') ? ' has-error' : '' }}">
        <label for="">Country</label>

        <div class="row">
            <div class="col-xs-6">
                <select class="form-control select2" name="currency_code" id="currency_code" value="{{ old('currency_code') }}">
                    @foreach($currencies as $currency)
                        <option value="{{ $currency }}" {{ old('currency_code', $shop->currency_code) == $currency ? 'selected' : '' }}>{{ $currency }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @if ($errors->has('currency_code'))
            <span class="help-block">
                {{ $errors->first('currency_code') }}
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('about') ? ' has-error' : '' }}">
        <label for="">About Your Shop</label>

        <div class="row">
            <div class="col-xs-12">
                <textarea name="about" id="about" rows="5" class="form-control">{{ old('about', $shop->about) }}</textarea>
            </div>
        </div>

        @if ($errors->has('about'))
            <span class="help-block">
                {{ $errors->first('about') }}
            </span>
        @endif
    </div>

    <button type="submit" class="btn bg-olive btn-flat">&nbsp;&nbsp; Save &nbsp;&nbsp;</button>
</form>

<script type="text/javascript">
    function initialize() {
        var input = document.getElementById('location');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function() {
            var location = autocomplete.getPlace().geometry.location;

            document.getElementById('latitude').value = location.lat();
            document.getElementById('longitude').value = location.lng();
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
