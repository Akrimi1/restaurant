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
use Illuminate\Http\Request;
use Auth;
use DB;

class SearchController extends Controller
{
  
    public function index(Request $request)
    {
        
    $login_id = \Auth::user()->id;
    
    
    
    $q = $request->input('q');
    
     if (auth()->user()->hasRole('admin')) {
             $restaurants = DB::table('orders')
              ->select('orders.*','drivers.rider_name')
            ->join('drivers','drivers.id','=','orders.driver_id')
             ->where('restaurant_name','LIKE','%'.$q.'%')
             ->orWhere('manager_name','LIKE','%'.$q.'%')
             ->get();
        }else if((auth()->user()->hasRole('manager'))){
           $restaurants = DB::table('orders')
            ->select('orders.*','drivers.rider_name')
            ->join('drivers','drivers.id','=','orders.driver_id')
            ->where('manager_id', '=', $login_id)
            ->where('restaurant_name','LIKE','%'.$q.'%')
            ->orWhere('manager_name','LIKE','%'.$q.'%')->get();
        }
        else if((auth()->user()->hasRole('client'))){
          $restaurants = DB::table('orders')
                ->select('orders.*','drivers.rider_name')
                ->join('drivers','drivers.id','=','orders.driver_id')
               ->where('restaurant_id', '=', $login_id)
               ->where('restaurant_name','LIKE','%'.$q.'%')
               ->orWhere('manager_name','LIKE','%'.$q.'%')
               ->get();
        }
    
   // $restaurants = DB::table('orders')->select('orders.*')->where('restaurant_name','LIKE','%'.$q.'%')->orWhere('manager_name','LIKE','%'.$q.'%')->get();
    
    //print_r($user);die;
    
    if(count($restaurants) > 0){
        return view('search.index')->withDetails($restaurants)->withQuery ( $q );
    }
    else{ 
        
        return view ('search.index')->withMessage('No Details found. Try to search again !');
    }
        
    }  
        
}
