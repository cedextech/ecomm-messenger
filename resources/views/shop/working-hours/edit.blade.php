@extends('layouts.app')

@section('title', 'Working Hours')

@section('content')

    <section class="content-header">
        <h1>Working Hours</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <form role="form" action="/shop/working-hours/update" method="POST">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-1"><b>Day</b></div>
                                <div class="col-md-4"><b>Morning</b></div>
                                <div class="col-md-4"><b>Evening</b></div>
                                <div class="col-md-2"><b>Open/Closed</b></div>
                            </div>

                            <br />

                            @if (count($shopHour) > 0)  
                                @foreach($shopHour as $data)
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="working-days">
                                                {{ $data->day_text }}
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="bootstrap-timepicker">
                                                <div class="form-group {{ $errors->has('opening_1.'.$data->day) ? ' has-error' : '' }}">
                                                    <div class="input-group">
                                                        <input type="text" name="opening_1[{{$data->day}}]" class="form-control timepicker" value="{{$data->opening_1}}" required>

                                                        <div class="input-group-addon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </div>
                                                    </div>

                                                    @if ($errors->has('opening_1.'.$data->day))
                                                        <span class="help-block">
                                                            {{ $errors->first('opening_1.'.$data->day) }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="bootstrap-timepicker">
                                                <div class="form-group {{ $errors->has('closing_1.'.$data->day) ? ' has-error' : '' }}">
                                                    <div class="input-group">
                                                        <input type="text" name="closing_1[{{$data->day}}]" class="form-control timepicker" value="{{$data->closing_1}}" required>

                                                        <div class="input-group-addon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </div>
                                                    </div>

                                                    @if ($errors->has('closing_1.'.$data->day))
                                                        <span class="help-block">
                                                            {{ $errors->first('closing_1.'.$data->day) }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="bootstrap-timepicker">
                                                <div class="form-group {{ $errors->has('opening_2.'.$data->day) ? ' has-error' : '' }}">
                                                    <div class="input-group">
                                                        <input type="text" name="opening_2[{{$data->day}}]" class="form-control timepicker" value="{{$data->opening_2}}" required>

                                                        <div class="input-group-addon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </div>
                                                    </div>

                                                    @if ($errors->has('opening_2.'.$data->day))
                                                        <span class="help-block">
                                                            {{ $errors->first('opening_2.'.$data->day) }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="bootstrap-timepicker">
                                                <div class="form-group {{ $errors->has('closing_2.'.$data->day) ? ' has-error' : '' }}">
                                                    <div class="input-group">
                                                        <input type="text" name="closing_2[{{$data->day}}]" class="form-control timepicker" value="{{$data->closing_2}}" required>

                                                        <div class="input-group-addon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </div>
                                                    </div>

                                                    @if ($errors->has('closing_2.'.$data->day))
                                                        <span class="help-block">
                                                            {{ $errors->first('closing_2.'.$data->day) }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-1">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="opened_or_closed[{{$data->day}}]" class="minimal-red" value="{{$data->opened_or_closed}}" {{ ($data->opened_or_closed == 1) ? 'checked' : '' }}>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <button type="submit" class="btn bg-olive btn-flat">&nbsp;&nbsp; Update &nbsp;&nbsp;</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection