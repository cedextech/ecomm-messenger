@extends('layouts.app')

@section('title', 'Account')

@section('content')

    <section class="content-header">
        <h1>Account</h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Profile</h3>
                    </div>

                    <div class="box-body">
                        <form role="form" action="profile/update" method="post">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name)}}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                       {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>
 
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="name">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email)}}" disabled="true">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                       {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="name">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone)}}">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        {{ $errors->first('phone') }}
                                    </span>
                                @endif
                            </div>

                            <button type="submit" class="btn bg-olive btn-flat">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Change Password</h3>
                    </div>

                    <div class="box-body">
                        <form role="form" action="change-password/update" method="post">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('current_password') ? ' has-error' : '' }}">
                                <label for="current_password">Current Password</label>
                                <input type="password" class="form-control" id="current_password" name="current_password" value="">
                                @if ($errors->has('current_password'))
                                    <span class="help-block">
                                        {{ $errors->first('current_password') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('new_password') ? ' has-error' : '' }}">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" id="new_password" name="new_password">
                                @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        {{ $errors->first('new_password') }}
                                    </span>
                                @endif
                            </div>

                            <button type="submit" class="btn bg-olive btn-flat">Submit</button>
                        </form>
                    </div>
                </div>   
            </div>
        </div>
    </section>

@endsection