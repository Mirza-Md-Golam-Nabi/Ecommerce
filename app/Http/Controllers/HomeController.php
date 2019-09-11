<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Types;
use App\Category;
use App\Subcategory;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchantid = 3;
      $typeslist=Types::orderBy('type_name')->get(['id','type_name']);

      $brandlist=Brand::where('merchantid',1)->orderBy('brand_name')->get(['id','brand_name']);

      $categorylist=Category::orderBy('category_name')->get(['id','category_name']);

      $productlist= DB::table('products AS a')
                         ->leftJoin('types AS b','b.id','=','a.type_id')
                         ->leftJoin('category AS c','c.id','=','a.category_id')
                         ->leftJoin('subcategory AS d','d.id','=','a.subcategory_id')
                         ->leftJoin('brands AS e','e.id','=','a.brand_id')
                         ->select('a.id','a.product_name','a.product_detail','a.subcategory_id','a.category_id','a.type_id','a.size','a.brand_id','a.color','a.unite','a.customerprice','a.maxcommission','a.priceshift','a.reviewscore','a.points','a.productdetails','a.picturemain','a.picturelinks','a.active','a.priority','b.type_name','c.category_name','d.subcat_anme','e.brand_name')->where('a.merchantid',$merchantid)->orderBy('a.product_name', 'desc')->paginate(15);


      return view('welcome',['types'=>$typeslist,'brands'=>$brandlist,'products'=>$productlist, 'category' => $categorylist]);
    }
}
