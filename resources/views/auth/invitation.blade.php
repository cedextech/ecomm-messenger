@extends('layouts.app', ['loginPage' => true])

@section('title', 'Create Account')

@section('body-class', 'login-page hold-transition')

@section('content')
<div class="login-box">
    <div class="login-box-body">
        <div class="login-logo">
            <a href="/">{{ config('app.name') }}</a>
        </div>

        <form role="form" method="POST" action="{{ url('/invitation/' . $token) }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('shop_name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" placeholder="Shop name" name="shop_name" value="{{ old('shop_name') }}" required autofocus>
     
                @if ($errors->has('shop_name'))
                    <span class="help-block">
                        {{ $errors->first('shop_name') }}
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        {{ $errors->first('password') }}
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('locale') ? ' has-error' : '' }}">
                <select class="form-control" name="locale" value="{{ old('locale') }}">
                    @foreach($locales as $key => $name)
                        <option value="{{ $key }}" {{ old('locale') == $key ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('country'))
                    <span class="help-block">
                        {{ $errors->first('country') }}
                    </span>
                @endif
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection