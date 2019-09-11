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

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function brandCreate(){
        if(Auth::user()->group_id==3){
            

            return view('merchant.product.addbrand');
        }
    }
    public function brandCreatefnl(Request $request)
    {
        $this->validate($request, [
            'brandname' => 'required',
        ]);
        
            $merchantid=Auth::user()->merchantid;
           $datass=Brand::where('merchantid',$merchantid)->where('brand_name',$request->brandname)->get();

           if(!count($datass) > 0){
                try{
                    DB::beginTransaction();

                    $prodct = new Brand;
                    $prodct->merchantid = $merchantid;
                    $prodct->brand_name = $request->brandname;
                    $prodct->updated_by = Auth::user()->id;
                    $prodct->save();

                    

                    DB::commit();
                }catch(Exception $e){
                    DB::rollback();

                }
           }
            
            return redirect(route('welcome'));
    }*/
    public function productCreatevw(){
        if(Auth::user()->group_id==3){
            $merchantid=Auth::user()->merchantid;
            $typeslist=Types::orderBy('type_name')->get(['id','type_name']);

            $brandlist=Brand::where('merchantid',1)->orderBy('brand_name')->get(['id','brand_name']);

            return view('merchant.product.addproduct',['types'=>$typeslist,'brands'=>$brandlist]);
        }
    }
    public function datagetCatg(Request $request)
    {
        // $select = $request->get('select');
         $value = $request->get('typid');
        // $dependent = $request->get('dependent');
         $data = Category::where('type_id', $value)->get();
         

         $output = '<option value="">Please Select</option>';
         foreach($data as $row)
         {
            $output .= '<option value="'.$row->id.'">'.$row->category_name.'</option>';
         }
         echo $output;
    }

    public function datagetSubcatg(Request $request)
    {
         $value = $request->get('catid');
         $data = Subcategory::where('category_id', $value)->get();

         $output = '<option value="">Please Select</option>';
         foreach($data as $row)
         {
            $output .= '<option value="'.$row->id.'">'.$row->subcat_anme.'</option>';
         }
         echo $output;
    }

    public function productUpload(Request $request) 
    {
        $this->validate($request, [
            'products' => 'required',
            'typeid' => 'required',
            'catgid' => 'required',
            'subcatgid' => 'required',
            'customerprice' => 'required',
        ]);
        $imageName="";
        if($request->hasFile('input_img')){
            $imageName = time().'.'.$request->input_img->getClientOriginalExtension();
            $newpathdata=public_path('uploads/product/600/').$imageName;
            $dfdfdff=$request->input_img;
            $datas=$this->ImageResize($dfdfdff, 600, 600, $newpathdata);
            $request->input_img->move(public_path('uploads/product/800'), $imageName);
            $image = Image::make(sprintf('uploads/product/800/%s', $imageName))
                ->resize(null,800, function ($constraint) {
                    $constraint->aspectRatio();
                })->save();
              
        }

        $merchantid=Auth::user()->merchantid;
        $datass=Product::where('merchantid',$merchantid)->where('type_id',$request->typeid)->where('category_id',$request->catgid)->where('subcategory_id',$request->subcatgid)->where('brand_id',$request->brandid)->where('product_name',$request->products)->get();

           if(!count($datass) > 0){
                try{
                    DB::beginTransaction();

                    $prodct = new Product;
                    $prodct->merchantid = $merchantid;
                    $prodct->product_name = $request->products;
                    $prodct->product_detail = $request->productdetl;
                    $prodct->subcategory_id = $request->subcatgid;
                    $prodct->category_id = $request->catgid;
                    $prodct->type_id = $request->typeid;
                    $prodct->brand_id = $request->brandid;
                    $prodct->size = $request->sizenm;
                    $prodct->color = $request->colornm;
                    $prodct->unite = $request->unitenm;
                    $prodct->customerprice = $request->customerprice;
                    $prodct->maxcommission = $request->maxcommission;
                    //$prodct->priceshift = $request->productdetl;
                    $prodct->picturemain = $imageName; 
                    $prodct->updated_by = Auth::user()->id;
                    $prodct->save();

                    

                    DB::commit();
                }catch(Exception $e){
                    DB::rollback();

                }
           }
           session()->flash('success', 'Product Added Successfully.');
            
            return redirect(route('productcreate'));
    }
    //Merchant Product List

    public function productList(){
        if(Auth::user()->group_id==3){
            $merchantid=Auth::user()->merchantid;
            $typeslist=Types::orderBy('type_name')->get(['id','type_name']);

            $brandlist=Brand::where('merchantid',1)->orderBy('brand_name')->get(['id','brand_name']);


            $productlist= DB::table('products AS a')
                           ->leftJoin('types AS b','b.id','=','a.type_id')
                           ->leftJoin('category AS c','c.id','=','a.category_id')
                           ->leftJoin('subcategory AS d','d.id','=','a.subcategory_id')
                           ->leftJoin('brands AS e','e.id','=','a.brand_id')
                           ->select('a.id','a.product_name','a.product_detail','a.subcategory_id','a.category_id','a.type_id','a.size','a.brand_id','a.color','a.unite','a.customerprice','a.maxcommission','a.priceshift','a.reviewscore','a.points','a.productdetails','a.picturemain','a.picturelinks','a.active','a.priority','b.type_name','c.category_name','d.subcat_anme','e.brand_name')->where('a.merchantid',$merchantid)->orderBy('a.product_name', 'desc')->paginate(15);


            return view('merchant.product.merchantproduct',['types'=>$typeslist,'brands'=>$brandlist,'products'=>$productlist]);
        }
    }

    public function productEdit($id){
        if(Auth::user()->group_id==3){
            $merchantid=Auth::user()->merchantid;
            $typeslist=Types::orderBy('type_name')->get(['id','type_name']);

            $brandlist=Brand::where('merchantid',1)->orderBy('brand_name')->get(['id','brand_name']);

            $productlist = Product::find($id);

            return view('merchant.product.editproduct',['types'=>$typeslist,'brands'=>$brandlist, 'products' => $productlist]);
        }
    }

    public function productUpdate(Request $request, $id){
        $product = Product::find($id);
        $product->merchantid = $request->merchantid;
        $product->product_name = $request->products;
        $product->product_detail = $request->productdetl;
        $product->subcategory_id = $request->subcatgid;
        $product->category_id = $request->catgid;
        $product->type_id = $request->typeid;
        $product->brand_id = $request->brandid;
        $product->size = $request->sizenm;
        $product->color = $request->colornm;
        $product->unite = $request->unitenm;
        $product->customerprice = $request->customerprice;
        $product->maxcommission = $request->maxcommission;
        //$product->priceshift = $request->productdetl;
        if($request->hasFile('input_img')){
            $image = $request->file('input_img');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/products/'.$img);
            Image::make($image)->save($location);
    
            $product->picturemain = $$img;
        }
         
        $product->updated_by = Auth::user()->id;
        $product->save();

        session()->flash('success', 'Data Updated Successfully.');

        return redirect()->route('productEdit', $id);

    }

    public function productDelete($id){
        $product = Product::find($id);
        if(!is_null($product)){
            $product->delete();
        }
        session()->flash('success', 'Data deleted Successfully.');
        return back();
    }

    /*......TG>>>IMAGE RESIZER START....*/
    
    public function resize_imagejpg($file, $w, $h, $finaldst) {

       list($width, $height) = getimagesize($file);
       $src = imagecreatefromjpeg($file);
       $ir = $width/$height;
       $fir = $w/$h;
       if($ir >= $fir){
           $newheight = $h; 
           $newwidth = $w * ($width / $height);
       }
       else {
           $newheight = $w / ($width/$height);
           $newwidth = $w;
       }   
       $xcor = 0 - ($newwidth - $w) / 2;
       $ycor = 0 - ($newheight - $h) / 2;


       $dst = imagecreatetruecolor($w, $h);
       imagecopyresampled($dst, $src, $xcor, $ycor, 0, 0, $newwidth, $newheight, 
       $width, $height);
       imagejpeg($dst, $finaldst);
       imagedestroy($dst);
       return $file;


    }
    public function resize_imagegif($file, $w, $h, $finaldst) {

       list($width, $height) = getimagesize($file);
       $src = imagecreatefromgif($file);
       $ir = $width/$height;
       $fir = $w/$h;
       if($ir >= $fir){
           $newheight = $h; 
           $newwidth = $w * ($width / $height);
       }
       else {
           $newheight = $w / ($width/$height);
           $newwidth = $w;
       }   
       $xcor = 0 - ($newwidth - $w) / 2;
       $ycor = 0 - ($newheight - $h) / 2;


       $dst = imagecreatetruecolor($w, $h);
       $background = imagecolorallocatealpha($dst, 0, 0, 0, 127);
       imagecolortransparent($dst, $background);
       imagealphablending($dst, false);
       imagesavealpha($dst, true);
       imagecopyresampled($dst, $src, $xcor, $ycor, 0, 0, $newwidth, $newheight, 
       $width, $height);
       imagegif($dst, $finaldst);
       imagedestroy($dst);
       return $file;


    }
    public function resize_imagepng($file, $w, $h, $finaldst) {

       list($width, $height) = getimagesize($file);
       $src = imagecreatefrompng($file);
       $ir = $width/$height;
       $fir = $w/$h;
       if($ir >= $fir){
           $newheight = $h; 
           $newwidth = $w * ($width / $height);
       }
       else {
            $newheight = $w / ($width/$height);
       $newwidth = $w;
       }   
       $xcor = 0 - ($newwidth - $w) / 2;
       $ycor = 0 - ($newheight - $h) / 2;


       $dst = imagecreatetruecolor($w, $h);
       $background = imagecolorallocate($dst, 0, 0, 0);
       imagecolortransparent($dst, $background);
       imagealphablending($dst, false);
       imagesavealpha($dst, true);

       imagecopyresampled($dst, $src, $xcor, $ycor, 0, 0, $newwidth, 
       $newheight,$width, $height);

       imagepng($dst, $finaldst);
       imagedestroy($dst);
       return $file;


    }
    public function ImageResize($file, $w, $h, $finaldst) {
          $getsize = getimagesize($file);
          $image_type = $getsize[2];
          if( $image_type == IMAGETYPE_JPEG) {
             $this->resize_imagejpg($file, $w, $h, $finaldst);
          } elseif( $image_type == IMAGETYPE_GIF ) {
             $this->resize_imagegif($file, $w, $h, $finaldst);
          } elseif( $image_type == IMAGETYPE_PNG ) {
             $this->resize_imagepng($file, $w, $h, $finaldst);
          }

    }
    /*......TG>>>IMAGE RESIZER END....*/

}
