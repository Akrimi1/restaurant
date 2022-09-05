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




class CustomerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      
      $login_id = \Auth::user()->id;
      
      
       $customers = DB::table("customers")->select('*')->where(["restaurant_id"=>$login_id])->get();
       $customers = json_decode( json_encode($customers), true);
  
       return view('customers.index')->with("customers", $customers)->with("login_id", $login_id);


  }
  

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  
//   public function delete($id)
//   {
//       $status = DB::table('customers')->delete($id);
//       if($status == 1)
//       {
//           echo "data deleted sucessfully";
//       }
//       else{
//           echo "data not deleted";
//       }
//       $login_id = \Auth::user()->id;

//       $role_id = "3";
//       $managers = DB::table("users")->where(["id"=>$login_id])->select('*')->get();
//     $managers = json_decode( json_encode($managers), true);
  
    
//       return view('managers.manager_listing')->with("managers", $managers)->with("login_id", $login_id);
//   }
}
