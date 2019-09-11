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
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">Merchant Verification </div>
                        <div class="panel-body">

                            <ul class="row">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('merchantvarificationpost') }}"> 
                                {{ csrf_field() }}
                                <input id="mobiledata" type="hidden" class="form-control" name="mobiledata" max="11" value="{{$mobile}}" required>

                                <li class="col-sm-12">
                                    <div class="form-group{{ $errors->has('varificationcode') ? ' has-error' : '' }}">
                                        <label for="varificationcode" class="col-md-4 control-label">Verification Code</label>

                                        <div class="col-md-6">
                                            <input id="varificationcode" type="text" class="form-control" name="varificationcode" max="11" value="{{ old('varificationcode') }}" required>

                                            @if ($errors->has('varificationcode'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('varificationcode') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                
                                

                                <li class="col-sm-12 text-left">
                                  <button type="submit" class="btn-round">Varify</button>
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
