<form role="form" method="POST" action="{{ url('shop/settings/tax') }}">
    {{ csrf_field() }}

    <div class="form-group {{ $errors->has('tax') ? ' has-error' : '' }}">
        <label for="tax">Tax %</label>

        <div class="row">
            <div class="col-xs-3">
                <div class="input-group">
                    <input type="text" class="form-control" value="{{ old('tax', $shop->tax) }}" name="tax" id="tax">
                    <span class="input-group-addon">%</span>
                </div>
            </div>
        </div>

        @if ($errors->has('tax'))
            <span class="help-block">
                {{ $errors->first('tax') }}
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('tax_type') ? ' has-error' : '' }}">
        <label for="tax_type">Tax Type</label>

        <div class="row">
            <div class="col-xs-6">
                <select class="form-control" name="tax_type" id="tax_type">
                    <option value="1" {{ old('tax_type', $shop->tax_type) == '1' ? 'selected' : '' }}>Menu prices already include taxes</option>
                    <option value="2" {{ old('tax_type', $shop->tax_type) == '2' ? 'selected' : '' }}>Apply tax on top of my menu prices</option>
                </select>
            </div>
        </div>

        @if ($errors->has('tax_type'))
            <span class="help-block">
                {{ $errors->first('tax_type') }}
            </span>
        @endif
    </div>

    <button type="submit" class="btn bg-olive btn-flat">Save</button>
</form>