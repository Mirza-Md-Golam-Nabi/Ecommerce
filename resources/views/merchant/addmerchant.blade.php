@extends('layouts.app')

@section('slideshow')

@endsection
@section('maincontent')
<section class="slid-sec">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <br/>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ asset('images/shop.jpg') }}" class="img-responsive" alt="" >
                </div>
                <div class="col-md-8 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">Merchant Register</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('merchantregisterpost') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                                    <label for="company" class="col-md-4 control-label">Company Name</label>

                                    <div class="col-md-6">
                                        <input id="company" type="text" class="form-control" name="company" value="{{ old('company') }}" required autofocus>

                                        @if ($errors->has('company'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('company') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('reprgname') ? ' has-error' : '' }}">
                                    <label for="reprgname" class="col-md-4 control-label">Representative Name</label>

                                    <div class="col-md-6">
                                        <input id="reprgname" type="text" class="form-control" name="reprgname" value="{{ old('reprgname') }}" required autofocus>

                                        @if ($errors->has('reprgname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('reprgname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('hotline') ? ' has-error' : '' }}">
                                    <label for="hotline" class="col-md-4 control-label">Company Hotline</label>

                                    <div class="col-md-6">
                                        <input id="hotline" type="text" class="form-control" name="hotline" max="11" value="{{ old('hotline') }}" required>

                                        @if ($errors->has('hotline'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('hotline') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('mobileno') ? ' has-error' : '' }}">
                                    <label for="mobileno" class="col-md-4 control-label">Mobile Number</label>

                                    <div class="col-md-6">
                                        <input id="mobileno" type="text" class="form-control" name="mobileno" max="11" value="{{ old('mobileno') }}" required>

                                        @if ($errors->has('mobileno'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('mobileno') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        
                                        <button type="submit" class="btn-round">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
