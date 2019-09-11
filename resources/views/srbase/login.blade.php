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
                    <img src="{{ asset('images/sr.png') }}" class="img-responsive" alt="" >
                </div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">Sales Matchmaker Login</div>
                        <div class="panel-body">

                            <ul class="row">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}


                                <li class="col-sm-12">
                                    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                        <label for="mobile" class="col-md-4 control-label">Mobile Number</label>

                                        <div class="col-md-6">
                                            <input id="mobile" type="mobile" class="form-control" name="mobile" max="11" value="{{ old('mobile') }}" required>

                                            @if ($errors->has('mobile'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('mobile') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                
                                <li class="col-sm-12">
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
                                </li>

                               <li class="col-sm-6">
                                  <div class="checkbox checkbox-primary">
                                    <input id="cate1" class="styled" type="checkbox" >
                                    <label for="cate1"> Keep me logged in </label>
                                  </div><br/>
                                </li>
                                <li class="col-sm-6"> <a href="#." class="forget">Forgot your password?</a> </li>
                                <li class="col-sm-12 text-left">
                                  <button type="submit" class="btn-round">Login</button>
                                </li>
                                
                            </form>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
