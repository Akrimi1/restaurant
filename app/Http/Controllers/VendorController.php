<?php

namespace App\Http\Controllers;

use App\Vendor;
use DB;
// use App\DataTables\VendorsDataTable;



use Illuminate\Http\Request;

use App\Http\Requests;
// use App\Http\Controllers\Controller;

// use Illuminate\Support\Facades\Hash;
// use Datatables;
use Auth;
// use App\User;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;




class VendorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

     // echo "deepak"; die;
    // $vendors = vendor::select('category', 'image')->get();

    $vendors=DB::table("vendors")->get();

    $vendors= json_decode( json_encode($vendors), true);
    
    
   
    return view('vendors.demoo', array('vendors' => $vendors));

// return view('vendors.demo', compact('vendors'));



      // $car = Vendor::find($id);
     // return view('vendors.demo', array('vendors' => $vendors));

  }



  public function returnAjaxData()
    {

              $vendors=DB::table("vendors")->get();
              $vendors= json_decode( json_encode($vendors), true);
             // print_r($vendors); die;

            return datatables()->of(DB::table("vendors")->get())->addIndexColumn()
                    ->addColumn('action', function($vendors){
                        // $btn = '<a href="'. route("VendorController@delete", $vendors->id) .'"><i class="fa fa-eye"></i></a>';
                          $btn = '<a href="/Vendor/edit/" class="edit btn btn-info btn-sm">View</a>';
                           $btn = $btn.'<a href="/Vendor/edit/1" class="edit btn btn-primary btn-sm">Edit</a>';
                           $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])->make(true);
           // return datatables()->of($vendors)->make(true);
         // return Datatables::of($vendors)->make(true);
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
      
       $vendors=DB::table("vendors")->where(["id"=>$id])->first();
       
       return view('vendors.edit')->with("vendors", $vendors)->with("login_id", $login_id);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request,$id)
  {
     $category = $request->category;
     
     $images = $request->images;
     
     
      
    if (isset($images)){
    
     $imageName = time().'.'.request()->images->getClientOriginalExtension();
     
     
    request()->images->move(public_path('images'), $imageName);
    
    }
    
   else
    {
        
         $imageName = $request->image;
    
        
         
    }
    
    
       
       
//       if ($request->hasFile('file')) {
//     $destinationPath = public_path('images');
//     $files = $request->file('images'); // will get all files
    
//     print_r($files); die;

//     foreach ($files as $file) {//this statement will loop through all files.
//         $file_name = $file->getClientOriginalName(); //Get file original name
//         echo $file_name; die;
//         $file->move($destinationPath , $file_name); // move files to destination folder
//     }
// }
      
      
      
        // $imageName = time().'.'.request()->image->getClientOriginalExtension();
    // request()->image->move(public_path('images'), $image);
    

   
      //  $values = array('category' => $category,'image' => $imageName);
    // $a = DB::table('vendors')->insert($values);
      
     // DB::table('answers')->where('id',2)->update(['customer_id' => 1, 'answer' => 2]);
$status = DB::table('vendors')->where('id',$id)->update(['category' => $category, 'image' => $imageName]);
    //   $status = DB::table("vendors")->update($values)->where(["id"=>$id]);
      
      
      
      
      
      if($status == 1)
      {
          echo "category updated sucessfully";
      }
    
       $vendors = DB::table("vendors")->select('*')->get();
    $vendors = json_decode( json_encode($vendors), true);
  
    //  echo "Add Created successfully";
       return view('vendors.demoo')->with("vendors", $vendors);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function delete($id)
  {
      $status = DB::table('vendors')->delete($id);
      if($status == 1)
      {
          echo "data deleted sucessfully";
      }
      else{
          echo "data not deleted";
      }
       $login_id = \Auth::user()->id;

      
       $vendors = DB::table("vendors")->select('*')->get();
    $vendors = json_decode( json_encode($vendors), true);
  
    
       return view('vendors.demoo')->with("vendors", $vendors)->with("login_id", $login_id);
  }
}
