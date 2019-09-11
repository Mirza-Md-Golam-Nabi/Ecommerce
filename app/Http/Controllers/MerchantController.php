<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\user;
use App\Marchantlist;
use App\Groupsall;
use Auth;
use DB;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return $users = DB::table('users')->leftJoin('group', 'users.group_id', '=', 'group.id')->orderBy('users.group_id', 'asc')->orderBy('users.id', 'asc')->get(['users.id','users.name','users.username','users.email','users.group_id','users.alowaccess as allowed','group.name as groupname']);//->orderBy('users.group_id', 'desc');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registrationFinal(Request $request)
    {
        $this->validate($request, [
            'company' => 'required|unique:marchantlist',
            'reprgname' => 'required',
            'mobileno' => 'required|unique:marchantlist,mobileno',
            'email' => 'required|email|unique:marchantlist,email',
            'password' => 'required|alphaNum|min:3',
        ]);
       
            try{
                DB::beginTransaction();

                $merchant = new Marchantlist;
                $merchant->company = $request->company;
                $merchant->hotline = $request->hotline;
                $merchant->mobileno = $request->mobileno;
                $merchant->email = $request->email;
                $merchant->reprgname = $request->reprgname;
                $merchant->save();

                $newuserid="SM".$merchant->id;

                $verifiedcode=rand(100000,999999);
                $codeexpiredat=date("Y-m-d H:i:s", strtotime("+20 minutes"));



                $mainorder = new User;
                $mainorder->name = $request->company;
                $mainorder->username = $newuserid;
                $mainorder->group_id = 3; 
                $mainorder->merchantid=$merchant->id;     
                $mainorder->mobileno=$request->mobileno;      
                //$mainorder->alowaccess = $request->allowedaccess;
                $mainorder->email = $request->email;
                $mainorder->password = Hash::make($request->password);
                $mainorder->verifiedmobilecode = '0';
                $mainorder->active = $verifiedcode;
                $mainorder->codeexpiredat = $codeexpiredat;
                $mainorder->updated_by = 1;//$request->user()->id;
                $datasave=$mainorder->save();

                if($datasave){
                    $newsms="Thanks,+for+registration.+your+registration+OTP+Code+is+".$verifiedcode."";
                        $newurls='http://alphasms.biz/index.php?app=ws&u=indexer&h=351794a3122fab8ff8bbc78b8092797b&op=pv&to='.$request->mobileno.'&msg='.$newsms;

                                  
                                    $curl = curl_init();
                                    // Set some options - we are passing in a useragent too here
                                    curl_setopt_array($curl, array(
                                        CURLOPT_RETURNTRANSFER => 1,
                                        CURLOPT_URL => $newurls,
                                        CURLOPT_USERAGENT => 'SMS mobile Request'
                                    ));
                                    // Send the request & save response to $resp
                                    $resp = curl_exec($curl);
                                    // Close request to clear up some resources
                                    curl_close($curl);
                }

                DB::commit();
            }catch(Exception $e){
                DB::rollback();

            }
            return redirect(route('merchantvarification',['mobilen' => $request->mobileno]));
    }
    public function verificationFinal(Request $request)
    {
        $this->validate($request, [
            'mobiledata' => 'required',
            'varificationcode' => 'required',
        ]);
            $dateddata=date("Y-m-d H:i:s");
            $datats=User::where('mobileno',$request->mobiledata)->update(['active'=>1,'verifiedmobilecode'=>'','validateddat'=>$dateddata]);
            if($datats){
                return redirect(route('merchantlogin'));
            }else{
                return redirect(route('welcome'));
            }
            
    }
    public function registrationView(){
        return view('merchant.addmerchant');
    }
    public function varificationContlr(Request $request){
        return view('merchant.verification',['mobile'=>$request->mobilen]);
    }
    public function loginContlr(){ 
        return view('merchant.login');
    }

    public function doLogin(Request $request)
    {
        // validate the info, create rules for the inputs
        
         $validator = $this->validate($request, [
            'mobileno'    => 'required',
            'password' => 'required|alphaNum|min:3' 
        ]);


            // create our user data for the authentication
            $userdata = array(
                'mobileno'     => $request->mobileno,
                'password'  => $request->password
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {
                if(Auth::user()->group_id==3){
                    return redirect(route('home'));
                }else{
                    Auth::logout();
                    return redirect(route('merchantlogin'));  
                }
            }else {   
                return redirect(route('merchantlogin')); 

            }
            
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function groupall()
    {
        return $users = Groupsall::all();
    }

    public function getspecifcUsernw($id)
    {   $allexpence = User::where('id',$id)->where('companyid','0')->get(['name','username','group_id','email','alowaccess'])->first();
        if(count($allexpence) > 0){
            return response()->json($allexpence, 200);
        }
        return response()->json([
            'response' => 'error',
            'message' => 'No Record Found'
        ], 400);
    }

    public function editUseradd(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'useremail' => 'required|email',
            'password' => 'required|alphaNum|min:3',
            'usertypes' => 'required',
        ]);
        
        
        $id=$request->id;
            $mainorder = User::where('id',$id)->where('companyid','0')->get()->first();
            $mainorder->name = $request->name;
            $mainorder->group_id = $request->usertypes;            
            $mainorder->alowaccess = $request->allowedaccess;
            $mainorder->email = $request->useremail;
            $mainorder->password = Hash::make($request->password);
            $mainorder->active = '1';
            $mainorder->updated_by = $request->user()->id;
            $mainorder->save();

            echo "<pre>";
            print_r($mainorder);
            echo "</pre>";

             //return redirect('/products');

       /* return response()->json([
            'message' => 'User updated successfully'
        ], 200);*/
    }
    public function showallasarray()
    {   $users = User::all();
        $array = array();
        foreach ($users as $key => $value) {
           $array[$value->id] = $value->name;
        }        
        return response()->json($array, 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    

    public function add()
    {
        //
        return view('users.adduser');
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
