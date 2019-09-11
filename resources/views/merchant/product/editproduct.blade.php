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
                        <div class="panel-heading">Merchant Product Create</div>
                        <div class="panel-body">
                            @include('msg')
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ route('productupdate', $products->id) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="merchantid" value="{{ $products->merchantid }}">
                                <div class="form-group{{ $errors->has('products') ? ' has-error' : '' }}">
                                    <label for="products" class="col-md-4 control-label">Product Name</label>

                                    <div class="col-md-6">
                                        <input id="products" type="text" class="form-control" name="products" value="{{ $products->product_name }}" required autofocus>

                                        @if ($errors->has('products'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('products') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('typeid') ? ' has-error' : '' }}">
                                  
                                    <label for="typeid" class="col-md-4 control-label">Product Type</label>
                                    <div class="col-md-6">
                                      <select id="typeid" class="form-control dynamic" name="typeid" value="{{ old('typeid') }}" required>
                                        <option value="">Please Select</option>
                                        @foreach($types as $typ)
                                          <option value="{{$typ->id}}">{{$typ->type_name}}</option>
                                        @endforeach
                                      </select>
                                        @if ($errors->has('typeid'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('typeid') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('catgid') ? ' has-error' : '' }}">
                                  
                                    <label for="catgid" class="col-md-4 control-label">Product Category</label>
                                    <div class="col-md-6">
                                      <select id="catgid" class="form-control" name="catgid" value="{{ old('catgid') }}" required>
                                        
                                          <option value=""></option>
                                      </select>
                                        @if ($errors->has('catgid'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('catgid') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('subcatgid') ? ' has-error' : '' }}">
                                  
                                    <label for="subcatgid" class="col-md-4 control-label">Product Sub Category</label>
                                    <div class="col-md-6">
                                      <select id="subcatgid" class="form-control" name="subcatgid" value="{{ old('subcatgid') }}" required>
                                        
                                          <option value=""></option>
                                      </select>
                                        @if ($errors->has('subcatgid'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('subcatgid') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('brandid') ? ' has-error' : '' }}">
                                  
                                    <label for="brandid" class="col-md-4 control-label">Brand Name</label>
                                    <div class="col-md-6">
                                      <select id="brandid" class="form-control dynamic" name="brandid" value="{{ old('brandid') }}" required>
                                        <option value="">Please Select</option>
                                        @foreach($brands as $brnd)
                                          <option value="{{$brnd->id}}">{{$brnd->brand_name}}</option>
                                        @endforeach
                                      </select>
                                        @if ($errors->has('brandid'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('brandid') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('customerprice') ? ' has-error' : '' }}">
                                    <label for="customerprice" class="col-md-4 control-label">Customer Price (Tk)</label>

                                    <div class="col-md-6">
                                        <input id="customerprice" type="text" class="form-control" name="customerprice"  value="{{ $products->customerprice }}" required>

                                        @if ($errors->has('customerprice'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('customerprice') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('customerprice') ? ' has-error' : '' }}">
                                    <label for="maxcommission" class="col-md-4 control-label">Max Commission (Tk)</label>

                                    <div class="col-md-6">
                                        <input id="maxcommission" type="text" class="form-control" name="maxcommission"  value="{{ $products->maxcommission }}" required>

                                        @if ($errors->has('maxcommission'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('maxcommission') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="input_img" class="col-md-4 control-label">Image Upload</label>
                                    <div class="col-md-6">
                                        <input type="file" name="input_img" id="input_img" data-preview="#preview" >
                                        <img class="col-sm-6" id="preview"  src="">
                                    </div>
                                </div>

                                

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('sizenm') ? ' has-error' : '' }}">
                                        <label for="sizenm" class="col-md-4 control-label">Size</label>

                                        
                                            <input id="sizenm" type="text" class="form-control" name="sizenm" value="{{ $products->size }}" required autofocus>

                                            @if ($errors->has('sizenm'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('sizenm') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('colornm') ? ' has-error' : '' }}">
                                        <label for="colornm" class="col-md-4 control-label">Color</label>

                                        
                                            <input id="colornm" type="text" class="form-control" name="colornm" value="{{ $products->color }}" required autofocus>

                                            @if ($errors->has('colornm'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('colornm') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>

                                <div class="col-md-1"></div>
                                <div class="col-md-2">
                                    <div class="form-group{{ $errors->has('unitenm') ? ' has-error' : '' }}">
                                        <label for="unitenm" class="col-md-4 control-label">Unite</label>

                                        
                                            <input id="unitenm" type="text" class="form-control" name="unitenm" value="{{ $products->unite }}" required autofocus>

                                            @if ($errors->has('unitenm'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('unitenm') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="productdetl"  class="col-md-4 control-label">Product Details</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control" name="productdetl" id="productdetl" rows="5" placeholder="" required>{{ $products->product_detail }}</textarea>
                                         @if ($errors->has('productdetl'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('productdetl') }}</strong>
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