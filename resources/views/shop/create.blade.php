<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Create Shop</h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            @include('flash::message')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <form role="form" action="/shops" method="POST">
                                {{ csrf_field() }}
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                            
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                            <label for="address">Address</label>
                                            <textarea name="address" id="address" value="" class="form-control" rows="5">{{ old('address') }}</textarea>

                                            @if ($errors->has('address'))
                                                <span class="help-block">
                                                    {{ $errors->first('address') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                            <label for="location">Location</label>
                                            <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
                                            
                                            @if ($errors->has('location'))
                                                <span class="help-block">
                                                    {{ $errors->first('location') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
                                            <label for="latitude">Latitude</label>
                                            <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude') }}">
                                            
                                            @if ($errors->has('latitude'))
                                                <span class="help-block">
                                                    {{ $errors->first('latitude') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
                                            <label for="longitude">Longitude</label>
                                            <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude') }}">
                                            
                                            @if ($errors->has('longitude'))
                                                <span class="help-block">
                                                    {{ $errors->first('longitude') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" id="btn-save" class="btn bg-olive btn-flat">&nbsp;&nbsp; Save &nbsp;&nbsp;</button>
                            </form>
                        </div>
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>