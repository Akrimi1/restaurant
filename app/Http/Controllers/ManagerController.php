<?php

namespace App\Http\Controllers;
use App\Vendor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
// use Illuminate\Support\Facades\DB;






class ManagerController extends Controller
{
    
    
    
  public function index()
  {
      
      $login_id = \Auth::user()->id;

       $role_id = "3";
       $managers = DB::table("users")->where(["role_id"=>$role_id])->select('*')->get();
    $managers = json_decode( json_encode($managers), true);
  
    //  echo "Add Created successfully";
       return view('managers.manager_listing')->with("managers", $managers)->with("login_id", $login_id);


  }
  
  
  
  public function add_manager()
  {
        $login_id = \Auth::user()->id;
       $role_id = "3";
       $managers = DB::table("users")->where(["role_id"=>$role_id])->select('*')->get();
    $managers = json_decode( json_encode($managers), true);
      return view('managers.create');
  }






   public function save_manager(Request $request)
 {
     
   


// $name = $request->name;
// $email = $request->email;
// $password = Hash::make($data['password']);
// $api_token = str_random(60);


$user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = "3";
        $user->password = Hash::make($request->password);
        $user->api_token = str_random(60);
        $a=$user->save();
        
        

        //  $defaultRoles = $this->roleRepository->findByField('default', '1');
       
        // $defaultRoles = $defaultRoles->pluck('name')->toArray();
        $defaultRoles = array();
        $defaultRoles = array("manager"); 
        
    //   $defaultRoles = Array ( [0] => manager );
        $user->assignRole($defaultRoles);



 if($a == 1)
 {
   // Flash::success(__('lang.saved_successfully', ['operator' => __('lang.restaurant')]));
  // $promotion = DB::select("SELECT * FROM 'add_promotion'");

    // print_r($promotion); die;
     echo "Add Created successfully";

  $login_id = \Auth::user()->id;

       $role_id = "3";
       $managers = DB::table("users")->where(["role_id"=>$role_id])->select('*')->get();
    $managers = json_decode( json_encode($managers), true);
  
    
       return view('managers.manager_listing')->with("managers", $managers)->with("login_id", $login_id);

 }
 else{
     echo "Add Not Created";
 }

die;
}




  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $car = Car::find($id);
   return view('vendors.demo', array('car' => $car));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      $login_id = \Auth::user()->id;
      
       $managers=DB::table("users")->where(["id"=>$id])->first();
       
      
       
       return view('managers.edit')->with("managers", $managers)->with("login_id", $login_id);
      
    //   print_r($managers);  die;
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request,$id)
  {
      
      $name = $request->name;
      $email = $request->email;
      $password = $request->password;
    //   $old_password = $request->old_password;
      
    //   $old_password=Hash::make($old_password);
    
    
      $new_password = $request->new_password;
      
      
      if (empty($new_password))
      {
          $status = DB::table("users")->where(["id"=>$id])->update(['name' => $name,'email'=>$email]);
          
      }
      else
      {
          $new_password= Hash::make($new_password);
          $status = DB::table("users")->where(["id"=>$id])->update(['name' => $name,'email'=>$email,'password'=>$new_password]);
      }
      
    
     
      
      
         $login_id = \Auth::user()->id;

       $role_id = "3";
       $managers = DB::table("users")->where(["role_id"=>$role_id])->select('*')->get();
    $managers = json_decode( json_encode($managers), true);
  
    //  echo "Add Created successfully";
       return view('managers.manager_listing')->with("managers", $managers)->with("login_id", $login_id);
     
     
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function delete($id)
  {
      $status = DB::table('users')->delete($id);
      if($status == 1)
      {
          echo "data deleted sucessfully";
      }
      else{
          echo "data not deleted";
      }
       $login_id = \Auth::user()->id;

       $role_id = "3";
       $managers = DB::table("users")->where(["role_id"=>$role_id])->select('*')->get();
    $managers = json_decode( json_encode($managers), true);
  
    
       return view('managers.manager_listing')->with("managers", $managers)->with("login_id", $login_id);
  }
}
