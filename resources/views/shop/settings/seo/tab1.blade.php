<form role="form" method="POST" action="{{ url('shop/setup') }}">
    {{ csrf_field() }}

    <div class="form-group {{ $errors->has('google_analytics_id') ? ' has-error' : '' }}">
        <label for="google_analytics_id">Title</label>

        <input type="text" class="form-control" id="google_analytics_id" name="google_analytics_id" value="{{ old('google_analytics_id', $shop->google_analytics_id) }}">

        @if ($errors->has('google_analytics_id'))
            <span class="help-block">
                {{ $errors->first('google_analytics_id') }}
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('google_analytics_id') ? ' has-error' : '' }}">
        <label for="google_analytics_id">Description</label>

        <input type="text" class="form-control" id="google_analytics_id" name="google_analytics_id" value="{{ old('google_analytics_id', $shop->google_analytics_id) }}">

        @if ($errors->has('google_analytics_id'))
            <span class="help-block">
                {{ $errors->first('google_analytics_id') }}
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('google_analytics_id') ? ' has-error' : '' }}">
        <label for="google_analytics_id">Keywords</label>

        <textarea class="form-control" ></textarea>

        @if ($errors->has('google_analytics_id'))
            <span class="help-block">
                {{ $errors->first('google_analytics_id') }}
            </span>
        @endif
    </div>

    <button type="submit" class="btn bg-olive btn-flat">&nbsp;&nbsp; Save &nbsp;&nbsp;</button>
</form>