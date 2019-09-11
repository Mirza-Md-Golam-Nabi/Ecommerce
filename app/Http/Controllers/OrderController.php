<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\user;
use App\Marchantlist;
use App\Groupsall;
use Auth;

use App\Brand;
use App\Types;
use App\Category;
use App\Subcategory;
use App\Product;

use DB;
use Validator;
use DateTime;
use File;
use Image;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function orderList(){
        if(Auth::user()->group_id==3){
            $merchantid=Auth::user()->merchantid;
            $typeslist=Types::orderBy('type_name')->get(['id','type_name']);

            $brandlist=Brand::where('merchantid',1)->orderBy('brand_name')->get(['id','brand_name']);

            return view('merchant.order.orderlist',['types'=>$typeslist,'brands'=>$brandlist]);
        }
    }
    public function shipedorderList(){
        if(Auth::user()->group_id==3){
            $merchantid=Auth::user()->merchantid;
            $typeslist=Types::orderBy('type_name')->get(['id','type_name']);

            $brandlist=Brand::where('merchantid',1)->orderBy('brand_name')->get(['id','brand_name']);

            return view('merchant.order.shipedorderlist',['types'=>$typeslist,'brands'=>$brandlist]);
        }
    }

    
    

}
