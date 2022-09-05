<?php
/**
 * File name: RestaurantController.php
 * Last modified: 2020.04.30 at 08:21:08
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\RestaurantRepository;
use App\Repositories\DriverRepository;
use App\Repositories\ManagerRepository;
use App\Repositories\UserRepository;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Auth;
use DB;

class ManagerDashboardController extends Controller
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
    
    public function index()
    {
        $user_id = Auth::user()->id;
        
        $manager_name=DB::table('users')->where('id',$user_id)->value('name');
       
        $ordersCount = $this->orderRepository->where('manager_id',$user_id)->count();
          $orders = $this->orderRepository->where('manager_id',$user_id)->get();
        $membersCount = $this->userRepository->where('role_id', '4')->count();
        $restaurantsCount=DB::table('restaurants')->where('managerId',$user_id)->get();
          $usersCount = $this->usersRepository->where('manager_id',$user_id)->count();
        $restaurantsCount = $this->restaurantRepository->where('managerId',$user_id)->count();
           $driverCount = $this->driverRepository->count();
           // $managerCount = $this->managerRepository->where('role_id', '3')->count();
        $restaurants = $this->restaurantRepository->where('managerId',$user_id)->limit(7)->get();
              //  $manager = $this->managerRepository->where('role_id', '3')->limit(5)->get();
                 // $manager_details = $this->managerRepository->where('role_id', '3')->limit(5)->get();
                $driver = $this->driverRepository->limit(7)->get();
                  $users = $this->usersRepository->where('manager_id',$user_id)->limit(7)->get();
        $earning = $this->paymentRepository->where('manager_id',$user_id)->sum('price');
        $ajaxEarningUrl = route('payments.byMonth',['api_token'=>auth()->user()->api_token]);
//        dd($ajaxEarningUrl);
        return view('manager_dashboard.index')
            ->with("ajaxEarningUrl", $ajaxEarningUrl)
            ->with("ordersCount", $ordersCount)
             ->with("orders", $orders)
            ->with("restaurantsCount", $restaurantsCount)
            ->with("driverCount", $driverCount)
            ->with("usersCount", $usersCount)
             ->with("users", $users)
            //->with("managerCount", $managerCount)
             ->with("restaurants", $restaurants)
            //->with("manager", $manager)
            // ->with("manager_details", $manager_details)
            ->with("driver", $driver)
            ->with("membersCount", $membersCount)
            ->with("earning", $earning);
    }  
        
   

}
