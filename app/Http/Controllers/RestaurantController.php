<?php
/**
 * File name: RestaurantController.php
 * Last modified: 2020.04.30 at 08:21:08
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

namespace App\Http\Controllers;

use App\Criteria\Restaurants\RestaurantsOfUserCriteria;
use App\Criteria\Users\AdminsCriteria;
use App\Criteria\Users\ClientsCriteria;
use App\Criteria\Users\DriversCriteria;
use App\Criteria\Users\ManagersClientsCriteria;
use App\Criteria\Users\ManagersCriteria;
use App\DataTables\RestaurantDataTable;
use App\DataTables\RequestedRestaurantDataTable;
use App\Events\RestaurantChangedEvent;
use App\Http\Requests\CreateRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Repositories\CustomFieldRepository;
use App\Repositories\CuisineRepository;
use App\Repositories\RestaurantRepository;
use App\Repositories\UploadRepository;
use App\Repositories\UserRepository;
use Flash;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
use Exception;
use Barryvdh\DomPDF\Facade as PDF;
//use SweetAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class RestaurantController extends Controller
{
    /** @var  RestaurantRepository */
    private $restaurantRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var UploadRepository
     */
    private $uploadRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var CuisineRepository
     */
    private $cuisineRepository;

    public function __construct(RestaurantRepository $restaurantRepo, CustomFieldRepository $customFieldRepo, UploadRepository $uploadRepo, UserRepository $userRepo, CuisineRepository $cuisineRepository)
    {
        parent::__construct();
        $this->restaurantRepository = $restaurantRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->uploadRepository = $uploadRepo;
        $this->userRepository = $userRepo;
        $this->cuisineRepository = $cuisineRepository;
    }

    /**
     * Display a listing of the Restaurant.
     *
     * @param RestaurantDataTable $restaurantDataTable
     * @return Response
     */
    public function index(RestaurantDataTable $restaurantDataTable)
    {
        
         $user_id = Auth::user()->id;
        
         $manager_id = DB::table("restaurants")->pluck('managerId')->first();
        
        // echo $manager_id; die;
        

        return $restaurantDataTable->render('restaurants.index');
    }


     public function vendors(RestaurantDataTable $restaurantDataTable)
    {

        return $restaurantDataTable->render('restaurants.index_vendor');


    }


    public function add_vendors_details()
    {

  echo "aaaaa"; die;
    }


     public function save_vendor(Request $request)
    {



        $category = $request->category;



    //      $validator = \Validator::make($request->all(), [
    //                             'category' => 'required|max:255',
    //                             'email' => 'required|email|max:255',
    //                             'subject' => 'required',
    //                             'bodymessage' => 'required']
    // );

    //     if ($validator->fails()) {
    //         return redirect('contact')->withInput()->withErrors($validator);
    //     }



    //       request()->validate([
    //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    // ]);

    $imageName = time().'.'.request()->image->getClientOriginalExtension();
    request()->image->move(public_path('images'), $imageName);



     $values = array('category' => $category,'image' => $imageName);
    $a = DB::table('vendors')->insert($values);



    if($a == 1)
    {
        echo "vendor Created successfully";
    }
    else{
        echo "vendor Not Created";
    }

die;
}

	public function sendMail(Request $request) {
    //dd($request->all());

    $validator = \Validator::make($request->all(), [
                                'name' => 'required|max:255',
                                'email' => 'required|email|max:255',
                                'subject' => 'required',
                                'bodymessage' => 'required']
    );

        if ($validator->fails()) {
            return redirect('contact')->withInput()->withErrors($validator);
        }


    $name = $request->name;
    $email = $request->email;
    $title = $request->subject;
    $content = $request->bodymessage;


        \Mail::send('contact.visitor_email', ['name' => $name, 'email' => $email, 'title' => $title, 'content' => $content], function ($message) {

            $message->to('your.ranisanisws1@gmail')->subject('Subject of the message!');
        });


    return redirect('contact.index')->with('status', 'You have successfully sent an email to the admin!');

}
	//public function userHasRestaurant(){
	//	 $user_id = Auth::user()->id;
	//	 $has_restaurant = DB::table('user_restaurants')
     //   ->select('restaurant_id','user_id','restaurants.name')
    //    ->join('restaurants', 'restaurants.id', '=', 'user_restaurants.restaurant_id')
    //    ->where('user_id', $user_id)
    //    ->get();
	//	$result=serialize($has_restaurant);
     //   print_r($result);die;
	//	if(is_null($result)){
     //    return true;
     //   }else{
     //      return false;
     //   }
	//}

    /**
     * Display a listing of the Restaurant.
     *
     * @param RestaurantDataTable $restaurantDataTable
     * @return Response
     */
    public function requestedRestaurants(RequestedRestaurantDataTable $requestedRestaurantDataTable)
    {
        return $requestedRestaurantDataTable->render('restaurants.requested');
    }

    /**
     * Show the form for creating a new Restaurant.
     *
     * @return Response
     */
    public function create()
    {
         $user_id = Auth::user()->id;
 		 $has_restaurant = DB::table('user_restaurants')
         ->select('restaurant_id','user_id','restaurants.name')
         ->join('restaurants', 'restaurants.id', '=', 'user_restaurants.restaurant_id')
         ->where('user_id', $user_id)
         ->count();
		//print_r($has_restaurant);die;
 	  /*if ($has_restaurant == 1) {
         Flash::error(__('lang.already_registred', ['operator' => __('lang.restaurant')]));
           return redirect()->back()->with('already has registered for restaurant');
       } else {*/
       $user = $this->userRepository->getByCriteria(new ManagersCriteria())->pluck('name', 'id');

       $drivers = $this->userRepository->getByCriteria(new DriversCriteria())->pluck('name', 'id');

       $vendors=DB::table("vendors")->get();
       $vendors= json_decode( json_encode($vendors), true);
       $vendors_list = array();
       //dd($vendors);
       foreach ($vendors as $key => $value) {
          $vendors_list[]=$value['category'];
       }


       $cuisine = $this->cuisineRepository->pluck('name', 'id');
       $usersSelected = [];
       $daysSelected = [];
       $driversSelected = [];
       $cuisinesSelected = [];
       $hasCustomField = in_array($this->restaurantRepository->model(), setting('custom_field_models', []));
       if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->restaurantRepository->model());
           $html = generateCustomField($customFields);
        }
      return view('restaurants.create')->with("customFields", isset($html) ? $html : false)->with("user", $user)->with("vendors_list", $vendors_list)->with("drivers", $drivers)->with("usersSelected", $usersSelected)->with("driversSelected", $driversSelected)->with('cuisine', $cuisine)->with('cuisinesSelected', $cuisinesSelected)->with('daysSelected', $daysSelected);
    
	//	}
	}

    /**
     * Store a newly created Restaurant in storage.
     *
     * @param CreateRestaurantRequest $request
     *
     * @return Response
     */
    public function store(CreateRestaurantRequest $request)
    {
		$user_id = Auth::user()->id;
        $manager_id = $user_id;
        $manager_name = DB::table('users')->where('id', $manager_id)->pluck('name')->first();

//dd($manager_name);


		 $has_restaurant = DB::table('user_restaurants')
        ->select('restaurant_id','user_id','restaurants.name')
        ->join('restaurants', 'restaurants.id', '=', 'user_restaurants.restaurant_id')
        ->where('user_id', $user_id)
        ->get();
        if (is_null($has_restaurant)) {
           Flash::error(__('lang.already_registred', ['operator' => __('lang.restaurant')]));
           return redirect()->back()->with('already has registered for restaurant');
      } else {


        $vendors=DB::table("vendors")->get();
        $vendors= json_decode( json_encode($vendors), true);
        $vendors_list = array();

        foreach ($vendors as $key => $value) {
           $vendors_list[]=$value['category'];
        }


        $input = $request->all();
//dd($input);
        // restaurant email, password section starts




        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = "3";
        $user->password = Hash::make($request->password);
        $user->api_token = str_random(60);
        $a=$user->save();

        $defaultRoles = array();
        $defaultRoles = array("client");
        $user->assignRole($defaultRoles);

 if($a == 1)
 {
   // Flash::success(__('lang.saved_successfully', ['operator' => __('lang.restaurant')]));
  // $promotion = DB::select("SELECT * FROM 'add_promotion'");

    // print_r($promotion); die;
     echo "restaurant email and password Created successfully";


 }
 else{
     echo "restaurant email and password not created";
 }

        // restaurant email password section ends here





         $restaurant_email = $input['email'];
        $restaurant_password = $input['password'];
        
        
        $user_table_id = DB::table('users')->select('id')->where('email', $restaurant_email)->first();
       $user_table_id = $user_table_id->id;
      
       
       $input['user_table_id'] = $user_table_id;

 
      // finding of the restaurant comission
        $admin_comission = $input['admin_commission'];
        $driver_comission = $input['driver_commission'];
         $restaurant_commission = 100 - ($admin_comission + $driver_comission);
         // end
         $input['restaurant_commission'] = $restaurant_commission;
         $input['managerName'] = $manager_name;
         $input['managerId'] = $manager_id;



//Commented

      /*  $vendors_id = $input['vendors_list'];

        $vendor_name = $vendors_list[$vendors_id];

        $newkey = "vendor_name";
        $oldkey = "vendors_list";

        $input[$newkey] = $input[$oldkey];
  unset($input[$oldkey]);

  $input['vendor_name'] = $vendor_name;*/



     $name = $input['name'];
     $email = $input['email'];
    //$vendor_name = $input['vendor_name'];



      // if(!isset($input['restaurantImage']))
      // {
      //   $restaurantImage = NULL;
      // }
      // else {
      //       $restaurantImage = $input['restaurantImage'];
      // }


     $description = $input['description'];
     $address = $input['address'];
     $latitude = $input['latitude'];
     $longitude = $input['longitude'];
     $phone = $input['phone'];
     $mobile = $input['mobile'];
     $information = $input['information'];
     $opening_time = $input['opening_time'];
     $closing_time = $input['closing_time'];
     $working_days = $input['working_days'];
     $working_days = implode(",",$working_days);




      if(!isset($input['restaurant_comission']))
      {
        $restaurant_comission = NULL;
      }
      else {
            $restaurant_comission = $input['restaurant_comission'];
     }
    
     $admin_commission = $input['admin_commission'];
     $driver_comission = $input['driver_commission'];
     $delivery_fee = $input['delivery_fee'];
     $delivery_range = $input['delivery_range'];
     $default_tax = $input['default_tax'];
     $closed = $input['closed'];
     $active = $input['active'];
     $available_for_delivery = $input['available_for_delivery'];




  //
  //     if($vendor_name == "Supermarket")
  //     {
         $sm = DB::table("restaurants")->insert(["name"=>$name,"email"=>$email,"vendor_name"=>"Supermarket", "description"=>$description,
     "address"=>$address, "latitude"=>$latitude, "longitude"=>$longitude, "phone"=>$phone, "mobile"=>$mobile, "information"=>$information, "opening_time"=>$opening_time, "closing_time"=>$closing_time, "working_days"=>$working_days,
   /*"restaurant_comission"=>$restaurant_comission,*/ "admin_commission"=>$admin_commission, /*"delivery_fee"=>$delivery_fee, "delivery_range"=>$delivery_range, "default_tax"=>$default_tax,*/ "closed"=>$closed, "active"=>$active, "available_for_delivery"=>$available_for_delivery]);
   $restaurant_id = DB::table('restaurants')->select('id')->where("email",$restaurant_email)->first();
   
  
   //select the last using email
   $ms=DB::table("user_restaurants")->insert(["user_id"=>$user_id,"restaurant_id"=>$restaurant_id->id]);
   
         if($sm == 1)
         {
           echo "Data saved sucessfully";
         }
  //     }
  //
  //
  //     if($vendor_name == "Drink Parlour")
  //     {
  //       $sm = DB::table("restaurants")->insert(["name"=>$name,"email"=>$email,"vendor_name"=>$vendor_name, "description"=>$description,
  //   "address"=>$address, "latitude"=>$latitude, "longitude"=>$longitude, "phone"=>$phone, "mobile"=>$mobile, "information"=>$information, "opening_time"=>$opening_time, "closing_time"=>$closing_time, "working_days"=>$working_days,
  // "restaurant_comission"=>$restaurant_comission, "admin_commission"=>$admin_commission, "delivery_fee"=>$delivery_fee, "delivery_range"=>$delivery_range, "default_tax"=>$default_tax, "closed"=>$closed, "active"=>$active, "available_for_delivery"=>$available_for_delivery]);
  //       if($sm == 1)
  //       {
  //         echo "Data saved sucessfully";
  //       }
  //     }
  //
  //
  //     if($vendor_name == "Farm Produce")
  //     {
  //       $sm = DB::table("restaurants")->insert(["name"=>$name,"email"=>$email,"vendor_name"=>$vendor_name, "description"=>$description,
  //   "address"=>$address, "latitude"=>$latitude, "longitude"=>$longitude, "phone"=>$phone, "mobile"=>$mobile, "information"=>$information, "opening_time"=>$opening_time, "closing_time"=>$closing_time, "working_days"=>$working_days,
  // "restaurant_comission"=>$restaurant_comission, "admin_commission"=>$admin_commission, "delivery_fee"=>$delivery_fee, "delivery_range"=>$delivery_range, "default_tax"=>$default_tax, "closed"=>$closed, "active"=>$active, "available_for_delivery"=>$available_for_delivery]);
  //       if($sm == 1)
  //       {
  //         echo "Data saved sucessfully";
  //       }
  //     }
  //
  //
  //     if($vendor_name == "Pharmacy")
  //     {
  //       $sm = DB::table("restaurants")->insert(["name"=>$name,"email"=>$email,"vendor_name"=>$vendor_name,  "description"=>$description,
  //   "address"=>$address, "latitude"=>$latitude, "longitude"=>$longitude, "phone"=>$phone, "mobile"=>$mobile, "information"=>$information, "opening_time"=>$opening_time, "closing_time"=>$closing_time, "working_days"=>$working_days,
  // "restaurant_comission"=>$restaurant_comission, "admin_commission"=>$admin_commission, "delivery_fee"=>$delivery_fee, "delivery_range"=>$delivery_range, "default_tax"=>$default_tax, "closed"=>$closed, "active"=>$active, "available_for_delivery"=>$available_for_delivery]);
  //       if($sm == 1)
  //       {
  //         echo "Data saved sucessfully";
  //       }
  //     }
                    


        if (auth()->user()->hasRole(['manager','client'])) {
            $input['users'] = [auth()->id()];
        }
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->restaurantRepository->model());
        try {
            $restaurant = $this->restaurantRepository->create($input);
            $restaurant->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));
            if (isset($input['image']) && $input['image']) {
                $cacheUpload = $this->uploadRepository->getByUuid($input['image']);
                $mediaItem = $cacheUpload->getMedia('image')->first();
                $mediaItem->copy($restaurant, 'image');
            }
            event(new RestaurantChangedEvent($restaurant, $restaurant));
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.restaurant')]));

        return redirect(route('restaurants.index'));
	}
    }
    /**
     * Display the specified Restaurant.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show($id)
    {
        $this->restaurantRepository->pushCriteria(new RestaurantsOfUserCriteria(auth()->id()));
        $restaurant = $this->restaurantRepository->findWithoutFail($id);

        if (empty($restaurant)) {
            Flash::error('Restaurant not found');

            return redirect(route('restaurants.index'));
        }

        return view('restaurants.show')->with('restaurant', $restaurant);
    }

    /**
     * Show the form for editing the specified Restaurant.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function edit($id)
    {
        $this->restaurantRepository->pushCriteria(new RestaurantsOfUserCriteria(auth()->id()));
        $restaurant = $this->restaurantRepository->findWithoutFail($id);

        if (empty($restaurant)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.restaurant')]));
            return redirect(route('restaurants.index'));
        }
        if($restaurant['active'] == 0){
            $user = $this->userRepository->getByCriteria(new ManagersClientsCriteria())->pluck('name', 'id');
        } else {
        $user = $this->userRepository->getByCriteria(new ManagersCriteria())->pluck('name', 'id');
        }
        $drivers = $this->userRepository->getByCriteria(new DriversCriteria())->pluck('name', 'id');
        $cuisine = $this->cuisineRepository->pluck('name', 'id');


        $usersSelected = $restaurant->users()->pluck('users.id')->toArray();


        $driversSelected = $restaurant->drivers()->pluck('users.id')->toArray();

        $cuisinesSelected = $restaurant->cuisines()->pluck('cuisines.id')->toArray();

//   vendors------------field  //
        $vendors=DB::table("vendors")->get();
        
        $vendors= json_decode( json_encode($vendors), true);
        $vendors_list = array();

        foreach ($vendors as $key => $value) {
           $vendors_list[]=$value['category'];
        }

        //   vendors--------end--- //



        $daysSelected = DB::table('restaurants')->where('id', $id)->pluck('working_days');
        $daysSelected = json_decode($daysSelected, true);
        $daysSelected = json_decode($daysSelected[0]);

        // print_r($daysSelected);   die;

        $customFieldsValues = $restaurant->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->restaurantRepository->model());
        $hasCustomField = in_array($this->restaurantRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('restaurants.edit')->with('restaurant', $restaurant)->with("customFields", isset($html) ? $html : false)->with("user", $user)->with("drivers", $drivers)->with("usersSelected", $usersSelected)->with("driversSelected", $driversSelected)->with('cuisine', $cuisine)->with('cuisinesSelected', $cuisinesSelected)->with('daysSelected', $daysSelected)->with("vendors_list", $vendors_list);
    }

    /**
     * Update the specified Restaurant in storage.
     *
     * @param int $id
     * @param UpdateRestaurantRequest $request
     *
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function update($id, UpdateRestaurantRequest $request)
    {
        $this->restaurantRepository->pushCriteria(new RestaurantsOfUserCriteria(auth()->id()));
        $oldRestaurant = $this->restaurantRepository->findWithoutFail($id);

        if (empty($oldRestaurant)) {
            Flash::error('Restaurant not found');
            return redirect(route('restaurants.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->restaurantRepository->model());
        try {

            $restaurant = $this->restaurantRepository->update($input, $id);
            if (isset($input['image']) && $input['image']) {
                $cacheUpload = $this->uploadRepository->getByUuid($input['image']);
                $mediaItem = $cacheUpload->getMedia('image')->first();
                $mediaItem->copy($restaurant, 'image');
            }
            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $restaurant->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
            event(new RestaurantChangedEvent($restaurant, $oldRestaurant));
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.restaurant')]));

        return redirect(route('restaurants.index'));
    }

    /**
     * Remove the specified Restaurant from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function destroy($id)
    {
        if (!env('APP_DEMO', false)) {
            $this->restaurantRepository->pushCriteria(new RestaurantsOfUserCriteria(auth()->id()));
            $restaurant = $this->restaurantRepository->findWithoutFail($id);

            if (empty($restaurant)) {
                Flash::error('Restaurant not found');

                return redirect(route('restaurants.index'));
            }

            $this->restaurantRepository->delete($id);

            Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.restaurant')]));
        } else {
            Flash::warning('This is only demo app you can\'t change this section ');
        }
        return redirect(route('restaurants.index'));
    }

    /**
     * Remove Media of Restaurant
     * @param Request $request
     */
    public function removeMedia(Request $request)
    {
        $input = $request->all();
        $restaurant = $this->restaurantRepository->findWithoutFail($input['id']);
        try {
            if ($restaurant->hasMedia($input['collection'])) {
                $restaurant->getFirstMedia($input['collection'])->delete();
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

	public function getPdf($type = 'stream')
    {
    $pdf = app('dompdf.wrapper')->loadView('order-pdf', ['order' => $this]);

    if ($type == 'stream') {
        return $pdf->stream('invoice.pdf');
    }

    if ($type == 'download') {
        return $pdf->download('invoice.pdf');
    }
    }

	 // public function htmltopdfview(Request $request)
    // {
        // $restaurants = DB::table('restaurants')
        // ->get();
        // view()->share('restaurants',$restaurants);
        // if($request->has('download')){
            // $pdf = PDF::loadView('htmltopdfview');
            // return $pdf->download('htmltopdfview');
        // }
        // return view('htmltopdfview');
    // }
	public function totalRestaurant(){
		$all_restaurant = DB::table('restaurants')
        ->get();
		//print_r($all_restaurant); die;
		return view("restaurants.invoice",
		array(
		'restaurants' => $all_restaurant
		));

	}
	// public function createPDF(){
		// $restaurants = DB::table('restaurants')
        // ->get();
		// //view('restaurants.invoice_pdf', compact('restaurants'));
		// $view = view('restaurants/invoice_pdf')->compact('restaurant',$restaurants);
		// print_r($view);die;
		// $pdf = PDF::loadView($restaurants);
		// print_r($pdf);die;
		// //$pdf = PDF::loadView('restaurants.invoice_pdf', compact('restaurants'));
		// $pdf = PDF::loadHTML($restaurants)->setPaper('a4','landscape')->setWarnings(false)->save('invoice_pdf.pdf');

      // return $pdf->download('invoice_pdf.pdf');
	// }

	 public function createPDF(Request $request)
    {
        $items = DB::table("restaurants")->get();
        $test = view("restaurants.invoice_pdf",
		array(
		'restaurant' => $items
		));

            $pdf = PDF::loadView($test)->setPaper('a4','landscape')->setWarnings(false)->save('invoice_pdf.pdf');
			//$pdf->render();
            return $pdf->download('invoice_pdf.pdf');

    }

	public function storeProducts(Request $request){

		 DB::table('products')->insert(
                  [
					  'name' => $request->name,
					  'company' => $request->company,
                      'amount' => $request->amount,
                      'available' => $request->available,
					  'description' => $request->description
				  ]
                  );

		 return view('restaurants/products');
	}
}
