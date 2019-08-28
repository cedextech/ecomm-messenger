@extends('layouts.app', ['loginPage' => true])

@section('title', 'Login')

@section('body-class', 'login-page hold-transition')

@section('content')
<div class="login-box">
    <div class="login-box-body">
        <div class="login-logo">
            <a href="/">{{ config('app.name') }}</a>
        </div>

        <form role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password'))
                    <span class="help-block">
                        {{ $errors->first('password') }}
                    </span>
                @endif
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection