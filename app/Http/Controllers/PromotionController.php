<?php

namespace App\Http\Controllers;
use App\Vendor;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
// use Illuminate\Support\Facades\DB;




class PromotionController extends Controller
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
    // return view('vendors.demo', compact('vendors'));
          // $car = Vendor::find($id);
         // return view('vendors.demo', array('vendors' => $vendors));

    // $vendors=DB::table("vendors")->get();
    //
    // $vendors= json_decode( json_encode($vendors), true);
    // print_r($vendors); die;
    // return view('vendors.demo', array('vendors' => $vendors));


 return view('promotions.promotion');

// return view('promotions.index');


  }


  public function get_promotions()
  {
    $promotion = DB::table("add_promotion")->select('*')->get();
    $promotion = json_decode( json_encode($promotion), true);


        return view('promotions.promotion_listing')->with("promotion", $promotion);
       // return view('promotions.index')->with("promotion", $promotion);
  }




  public function save_promotion(Request $request)
 {




     $title = $request->title;
     $description = $request->description;


 //
 //      $validator = \Validator::make($request->all(), [
 //                             'category' => 'required|max:255',
 //                             'email' => 'required|email|max:255',
 //                             'subject' => 'required',
 //                             'bodymessage' => 'required']
 // );
 //
 //     if ($validator->fails()) {
 //         return redirect('contact')->withInput()->withErrors($validator);
 //     }
 //
 //
 //
 //       request()->validate([
 //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
 // ]);

 $imageName = time().'.'.request()->image->getClientOriginalExtension();
 request()->image->move(public_path('images'), $imageName);



  $values = array('title' => $title,'image' => $imageName, 'description' => $description);
 $a = DB::table('add_promotion')->insert($values);



 if($a == 1)
 {
   // Flash::success(__('lang.saved_successfully', ['operator' => __('lang.restaurant')]));
  // $promotion = DB::select("SELECT * FROM 'add_promotion'");

    // print_r($promotion); die;

    $promotion = DB::table("add_promotion")->select('*')->get();
    $promotion = json_decode( json_encode($promotion), true);

     echo "Add Created successfully";
       return view('promotions.promotion_listing')->with("promotion", $promotion);

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
   //  $car = Car::find($id);
   // return view('vendors.demo', array('car' => $car));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      //

      // $category = $this->categoryRepository->findWithoutFail($id);
      //
      //
      // if (empty($category)) {
      //     Flash::error(__('lang.not_found', ['operator' => __('lang.category')]));
      //
      //     return redirect(route('categories.index'));
      // }
      // $customFieldsValues = $category->customFieldsValues()->with('customField')->get();
      // $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->categoryRepository->model());
      // $hasCustomField = in_array($this->categoryRepository->model(), setting('custom_field_models', []));
      // if ($hasCustomField) {
      //     $html = generateCustomField($customFields, $customFieldsValues);
      // }
      //
      // return view('categories.edit')->with('category', $category)->with("customFields", isset($html) ? $html : false);

      $promotion=DB::table("add_promotion")->where(["id"=>$id])->first();



      return view('promotions.edit')->with('promotion', $promotion);
      // echo "deepak";   die;
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      echo "deepak del";   die;
  }
}
