<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\RestaurantRepository;
use App\Repositories\DriverRepository;
use App\Repositories\ManagerRepository;
use App\Repositories\UserRepository;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use DateTime;
use DatePeriod;
use DateInterval;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class DashboardController extends Controller
{

    /** @var  OrderRepository */
    private $orderRepository;


    /**
     * @var UserRepository
     */
    private $userRepository;

    /** @var  RestaurantRepository */
    private $restaurantRepository;
    /** @var  PaymentRepository */
    private $paymentRepository;
    
    /** @var  DriverRepository */
    private $driverRepository;
   /** @var  ManagerRepository */
   private $managerRepository;
      private $usersRepository;

    public function __construct(OrderRepository $orderRepo, UserRepository $userRepo, PaymentRepository $paymentRepo, RestaurantRepository $restaurantRepo, DriverRepository $driverRepo, ManagerRepository $managerRepo,UsersRepository $usersRepo)
    {
        parent::__construct();
        $this->orderRepository = $orderRepo;
        $this->userRepository = $userRepo;
        $this->restaurantRepository = $restaurantRepo;
        $this->paymentRepository = $paymentRepo;
        $this->driverRepository = $driverRepo;
        $this->managerRepository = $managerRepo;
         $this->usersRepository = $usersRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $date=date("Y");
    $current_month = date('Y-m');
    
    
    //only for monthly earnings
    $year=date("Y");
    $month = date('m');
    $months = array();
    
    for($month=01;$month<10;$month++)
    {
    $months[] = $year . '-0' . $month;
    }
    
    $a = $year."-10";
    $b = $year."-11";
    $c = $year."-12";
    
    array_push($months,$a,$b,$c);
 
    
 //------------------------------------

$years = array(($date-1),$date, ($date+1), ($date+2), ($date+3));
$mearnings = array();

      foreach($months as $month){
			 
		$monthlyearnings=DB::table('earnings')
			 //->select (DB::raw('sum(total_earning) as total'),DB::raw('YEAR(created_at) as year'))
			 ->select (DB::raw('sum(total_earning) as total'),DB::raw('YEAR(created_at) as year'))->where('created_at', 'like', '%'.$month.'%')
			 ->orderBy('id','desc')
			 ->get()
			 ->reverse();
			 
			 $monthlyearnings = json_decode( json_encode($monthlyearnings), true);
			 
			 $mearningss  = $monthlyearnings[0]['total'];
			 
			 if($mearningss == "")
			 {
			     $mearningss = 0;
			 }
			 
			 
			 $mearnings[] = $mearningss; 
			
			 
      }
      
      



$yearnings = array();

      foreach($years as $year){
			 
		$yearlyearnings=DB::table('earnings')
			 //->select (DB::raw('sum(total_earning) as total'),DB::raw('YEAR(created_at) as year'))
			 ->select (DB::raw('sum(total_earning) as total'),DB::raw('YEAR(created_at) as year'))->where('created_at', 'like', '%'.$year.'%')
			 ->orderBy('id','desc')
			 ->get()
			 ->reverse();
			 
			 $yearlyearnings = json_decode( json_encode($yearlyearnings), true);
			 
			 $yearningss  = $yearlyearnings[0]['total'];
			 
			 if($yearningss == "")
			 {
			     $yearningss = 0;
			 }
			 
			 
			 $yearnings[] = $yearningss; 
			
			 
      }
      
      
      $yearly_order_preparing = DB::table('orders')
			 ->select (DB::raw('count(order_status_id) as preparing'))->where('order_status_id', '=', '2')->where('created_at', 'like', '%'.$date.'%')
			 ->get();
			 
	$yearly_order_preparing = json_decode( json_encode($yearly_order_preparing), true);
$yearly_order_preparing  = $yearly_order_preparing[0]['preparing'];


 $yearly_order_completed = DB::table('orders')
			 ->select (DB::raw('count(order_status_id) as completed'))->where('order_status_id', '=', '1')->where('created_at', 'like', '%'.$date.'%')
			 ->get();
			 
	$yearly_order_completed = json_decode( json_encode($yearly_order_completed), true);
$yearly_order_completed  = $yearly_order_completed[0]['completed'];


 $yearly_order_ready = DB::table('orders')
			 ->select (DB::raw('count(order_status_id) as ready'))->where('order_status_id', '=', '3')->where('created_at', 'like', '%'.$date.'%')
			 ->get();
			 
	$yearly_order_ready = json_decode( json_encode($yearly_order_ready), true);
$yearly_order_ready  = $yearly_order_ready[0]['ready'];


$yearly_order_onway = DB::table('orders')
			 ->select (DB::raw('count(order_status_id) as onway'))->where('order_status_id', '=', '4')->where('created_at', 'like', '%'.$date.'%')
			 ->get();
			 
	$yearly_order_onway = json_decode( json_encode($yearly_order_onway), true);
$yearly_order_onway  = $yearly_order_onway[0]['onway'];


$yearly_order_delivered = DB::table('orders')
			 ->select (DB::raw('count(order_status_id) as delivered'))->where('order_status_id', '=', '5')->where('created_at', 'like', '%'.$date.'%')
			 ->get();
			 
	$yearly_order_delivered = json_decode( json_encode($yearly_order_delivered), true);
$yearly_order_delivered  = $yearly_order_delivered[0]['delivered'];



	 $order_status_yearly['preparing'] = $yearly_order_preparing ;
	 $order_status_yearly['completed'] = $yearly_order_completed;
	 $order_status_yearly['ready'] = $yearly_order_ready;
	 $order_status_yearly['onway'] = $yearly_order_onway;
	 $order_status_yearly['delivered'] = $yearly_order_delivered;
	 
	 
	 
	 
	  $monthly_order_preparing = DB::table('orders')
			 ->select (DB::raw('count(order_status_id) as preparing'))->where('order_status_id', '=', '2')->where('created_at', 'like', '%'.$current_month.'%')
			 ->get();
			 
	$monthly_order_preparing = json_decode( json_encode($monthly_order_preparing), true);
$monthly_order_preparing  = $monthly_order_preparing[0]['preparing'];




 $monthly_order_completed = DB::table('orders')
			 ->select (DB::raw('count(order_status_id) as completed'))->where('order_status_id', '=', '1')->where('created_at', 'like', '%'.$current_month.'%')
			 ->get();
			 
	$monthly_order_completed = json_decode( json_encode($monthly_order_completed), true);
$monthly_order_completed  = $monthly_order_completed[0]['completed'];




 $monthly_order_ready = DB::table('orders')
			 ->select (DB::raw('count(order_status_id) as ready'))->where('order_status_id', '=', '3')->where('created_at', 'like', '%'.$current_month.'%')
			 ->get();
			 
	$monthly_order_ready = json_decode( json_encode($monthly_order_ready), true);
$monthly_order_ready  = $monthly_order_ready[0]['ready'];



$monthly_order_onway = DB::table('orders')
			 ->select (DB::raw('count(order_status_id) as onway'))->where('order_status_id', '=', '4')->where('created_at', 'like', '%'.$current_month.'%')
			 ->get();
			 
	$monthly_order_onway = json_decode( json_encode($monthly_order_onway), true);
$monthly_order_onway  = $monthly_order_onway[0]['onway'];



$monthly_order_delivered = DB::table('orders')
			 ->select (DB::raw('count(order_status_id) as delivered'))->where('order_status_id', '=', '5')->where('created_at', 'like', '%'.$current_month.'%')
			 ->get();
			 
	$monthly_order_delivered = json_decode( json_encode($monthly_order_delivered), true);
$monthly_order_delivered  = $monthly_order_delivered[0]['delivered'];




     $order_status_monthly['preparing'] = $monthly_order_preparing ;
	 $order_status_monthly['completed'] = $monthly_order_completed;
	 $order_status_monthly['ready'] = $monthly_order_ready;
	 $order_status_monthly['onway'] = $monthly_order_onway;
	 $order_status_monthly['delivered'] = $monthly_order_delivered;

       
        $login_id = \Auth::user()->id;
        $ordersCount = $this->orderRepository->count();
        $membersCount = $this->userRepository->where('role_id', '4')->count();
        $restaurantsCount = $this->restaurantRepository->count();
           $driverCount = $this->driverRepository->count();
            $managerCount = $this->managerRepository->where('role_id', '3')->count();
            $usersCount = $this->usersRepository->count();
        $restaurants = $this->restaurantRepository->limit(5)->get();
                $manager = $this->managerRepository->where('role_id', '3')->limit(5)->get();
                  $manager_details = $this->managerRepository->where('role_id', '3')->limit(5)->get();
                $driver = $this->driverRepository->limit(5)->get();
                 $users = $this->usersRepository->limit(5)->get();
        $earning = $this->paymentRepository->all()->sum('price');
        $ajaxEarningUrl = route('payments.byMonth',['api_token'=>auth()->user()->api_token]);
        $simple = "8";
   
        
//        dd($ajaxEarningUrl);
        return view('dashboard.index')
            ->with("ajaxEarningUrl", $ajaxEarningUrl)
            ->with("ordersCount", $ordersCount)
            ->with("restaurantsCount", $restaurantsCount)
            ->with("driverCount", $driverCount)
            ->with("managerCount", $managerCount)
             ->with("usersCount", $usersCount)
            ->with("restaurants", $restaurants)
            ->with("manager", $manager)
             ->with("users", $users)
             ->with("manager_details", $manager_details)
            ->with("driver", $driver)
            ->with("membersCount", $membersCount)
            ->with("earning", $earning)
            ->with("login_id", $login_id)
            ->with("yearnings", $yearnings)
            ->with("mearnings", $mearnings)
            ->with("order_status_yearly", $order_status_yearly)
            ->with("order_status_monthly", $order_status_monthly)
            ->with("simple", $simple);
    }
}
