<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Product;
use App\Brand;
use App\user;
use App\Types;
use Auth;
use DateTime;
use DB;
use Validator;
use File;
use Image;
//use App\Http\Controllers\Image;

class BrandController extends Controller
{   
    public function index()
    {   
        $allexpence = Brand::select('id','name')->orderBy('id', 'desc')->paginate(15);
        if(count($allexpence) > 0){
            return response()->json($allexpence, 200);
        }
        return response()->json([
            'response' => 'error',
            'message' => 'No Record Found'
        ], 400);
    }
	
/*      **********      Made By G.N (Start)    *********   */

    public function addBrand(){
        return view('merchant.brand.addbrand');
    }

    public function saveBrand(Request $request){
        
        $brand = new Brand;

        $brand->brand_name = $request->brandname;

        $brand->updated_by = 1;
        $datasaved=$brand->save();

        return response()->json([
            'message' => 'Menue created successfully'
        ], 200);
    }

    public function brandList(){

        if(Auth::user()->group_id==3){
            $merchantid=Auth::user()->merchantid;
            $typeslist=Types::orderBy('type_name')->get(['id','type_name']);

            $brandlist=Brand::where('merchantid', $merchantid)->orderBy('brand_name')->get(['id','brand_name']);

            // $productlist= DB::table('products AS a')
            //                ->leftJoin('types AS b','b.id','=','a.type_id')
            //                ->leftJoin('category AS c','c.id','=','a.category_id')
            //                ->leftJoin('subcategory AS d','d.id','=','a.subcategory_id')
            //                ->leftJoin('brands AS e','e.id','=','a.brand_id')
            //                ->select('a.id','a.product_name','a.product_detail','a.subcategory_id','a.category_id','a.type_id','a.size','a.brand_id','a.color','a.unite','a.customerprice','a.maxcommisssion','a.priceshift','a.reviewscore','a.points','a.productdetails','a.picturemain','a.picturelinks','a.active','a.priority','b.type_name','c.category_name','d.subcat_anme','e.brand_name')->where('a.merchantid',$merchantid)->orderBy('a.product_name', 'desc')->paginate(15);

            return view('merchant.brand.merchantbrandlist',['types'=>$typeslist,'brands'=>$brandlist/*,'products'=>$productlist*/]);
        }

        // if(Auth::user()->group_id==3){
        //     $merchantid=Auth::user()->merchantid;
        //     $typeslist=Types::orderBy('type_name')->get(['id','type_name']);

        //     $brandlist=Brand::where('merchantid',1)->orderBy('brand_name')->get(['id','brand_name']);

        //     return view('merchant.product.merchantbrandlist')->with('brands', $brandlist);
        // }
    }

    public function brandEdit($id){
        $brand = Brand::find($id);
        return view('merchant.brand.editbrand')->with('brand', $brand);
    }

    public function brandUpdate(Request $request, $id){
        $brand = Brand::find($id);
        $brand->brand_name = $request->brandname;
        $brand->merchantid=Auth::user()->merchantid;
        $brand->save();

        session()->flash('success', 'Data Updated successfully.');

        return redirect()->route('brandEdit', $id);
    }

    public function brandDelete($id){
        $brand = Brand::find($id);
        if(!is_null($brand)){
            $brand->delete();
        }
        session()->flash('success', 'Data deleted successfully.');
        return back();
    }



/*      **********      Made By G.N (End)    *********   */
	
    public function editfnlBrand(Request $request)
    {
        $this->validate($request, [
            'id'=> 'required',
            'name' => 'required',
        ]);
        
            $id=$request->id;
            $accout = Brand::where("id",$id)->get()->first();

            $accout->name = $request->name;

            $accout->updated_by = $request->user()->id;
            $datasaved=$accout->save();

            $updateproduct=Product::where('brandid',$id)->update(['brandname'=>$request->name]);
           

        return response()->json([
            'message' => 'Menue created successfully'
        ], 200);
    }
	
    public function gettheBrand($id)
    {
        
        $alldatas = Brand::where("id",$id)->get();
        if(count($alldatas) > 0){
            return response()->json($alldatas, 200);
        }
        return response()->json([
            'response' => 'error',
            'message' => 'No Record Found'
        ], 400);
    }

   

}
