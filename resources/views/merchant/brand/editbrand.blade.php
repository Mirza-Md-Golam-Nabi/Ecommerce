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
                        <div class="panel-heading">Merchant Brand Create</div>
                        <div class="panel-body">
                          @include('msg')
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ route('brandUpdate', $brand->id) }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('brandname') ? ' has-error' : '' }}">
                                    <label for="brandname" class="col-md-4 control-label">Brand Name</label>

                                    <div class="col-md-6">
                                        <input id="brandname" type="text" class="form-control" name="brandname" value="{{ $brand->brand_name }}" required autofocus>

                                        @if ($errors->has('brandname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('brandname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        
                                        <button type="submit" class="btn-round">Update</button>
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
@section('extrascript')
<script>
$(document).ready(function(){
    //GET CATEGORY
     $('#typeid').change(function(){
        var typedata=$('#typeid').val();
        
      if(typedata != '')
      {
        $.ajax({ url: "{{ route('catgetfrmtyp') }}?typid=" + typedata,method: 'GET',success: function(data) {$('#catgid').html(data);}});
           
      }
     });

     $('#typeid').change(function(){
      $('#catgid').val('');
      $('#subcatgid').val('');
     });

     $('#catgid').change(function(){
      $('#subcatgid').val('');
     });

     //GET TYPE
     $('#catgid').change(function(){
        var catval=$('#catgid').val();
        
      if(catval != '')
      {
        $.ajax({ url: "{{ route('subgetfrmcat') }}?catid=" + catval,method: 'GET',success: function(data) {$('#subcatgid').html(data);}});
           
      }
     });
 

});
</script>

@endsection