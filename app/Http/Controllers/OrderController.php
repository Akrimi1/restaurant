<?php
/**
 * File name: OrderController.php
 * Last modified: 2020.06.11 at 16:10:52
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 */

namespace App\Http\Controllers;

use App\Criteria\Orders\OrdersOfUserCriteria;
use App\Criteria\Users\ClientsCriteria;
use App\Criteria\Users\DriversCriteria;
use App\Criteria\Users\DriversOfRestaurantCriteria;
use App\DataTables\OrderDataTable;
use App\DataTables\FoodOrderDataTable;
use App\Events\OrderChangedEvent;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Notifications\AssignedOrder;
use App\Notifications\StatusChangedOrder;
use App\Repositories\CustomFieldRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\OrderRepository;
use App\Repositories\OrderStatusRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\UserRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

use DB;
use Auth;


class OrderController extends Controller
{
    /** @var  OrderRepository */
    private $orderRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var OrderStatusRepository
     */
    private $orderStatusRepository;
    /** @var  NotificationRepository */
    private $notificationRepository;
    /** @var  PaymentRepository */
    private $paymentRepository;

    public function __construct(OrderRepository $orderRepo, CustomFieldRepository $customFieldRepo, UserRepository $userRepo
        , OrderStatusRepository $orderStatusRepo, NotificationRepository $notificationRepo, PaymentRepository $paymentRepo)
    {
        parent::__construct();
        $this->orderRepository = $orderRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->userRepository = $userRepo;
        $this->orderStatusRepository = $orderStatusRepo;
        $this->notificationRepository = $notificationRepo;
        $this->paymentRepository = $paymentRepo;
    }

    /**
     * Display a listing of the Order.
     *
     * @param OrderDataTable $orderDataTable
     * @return Response
     */
     
     
     
     public function index(OrderDataTable $orderDataTable)
     {
         
         $driver_name =DB::table('orders')
                ->join('users', 'orders.driver_id', '=', 'users.id')
                ->select('users.name')
                ->get();
         
        return $orderDataTable->render('orders.index'); 
         
     }
     
       /**
     * Show the form for creating a new Order.
     *
     * @return Response
     */
     
    public function create()
    {
        $user = $this->userRepository->getByCriteria(new ClientsCriteria())->pluck('name', 'id');
        $driver = $this->userRepository->getByCriteria(new DriversCriteria())->pluck('name', 'id');
        
        $orderStatus = $this->orderStatusRepository->pluck('status', 'id');
        
        $hasCustomField = in_array($this->orderRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->orderRepository->model());
            $html = generateCustomField($customFields);
        }
        
        return view('orders.create')->with("customFields", isset($html) ? $html : false)->with("user", $user)->with("driver", $driver)->with("orderStatus", $orderStatus);
    }
     
//     public function indexa(OrderDataTable $orderDataTable)
//     {
//         //return $orderDataTable->render('orders.index');
//         $user_id = Auth::user()->id;
//         // $ = DB::table('users')->select('groupName')->where('username', $username)->first();
//         if($user_id==1)
//         {
        
//         return $orderDataTable->render('orders.index');
//         }
//         else
//         {
       
//   $orders = DB::table('orders')
//     ->select('orders.id','restaurant_name', 'manager_name','status','delivery_fee','payment_id','active','orderStatus')
//     ->join('order_statuses', 'order_statuses.id', '=', 'orders.order_status_id')
//     ->where('orders.manager_id', $user_id)
//     ->get();
    
//      $orders = json_decode( json_encode($orders), true);
// return view('orders.index_listing')->with("orders", $orders)->with("user_id", $user_id);


//         }
        
         
//     }
    
 
     public function completed_orders(){
         $user_id = Auth::id();
        $completed_orders =DB::table('orders')
                ->join('order_statuses', 'orders.order_status_id', '=', 'order_statuses.id')
               //->join('customers', 'orders.user_id', '=', 'customers.id')
                ->join('drivers', 'orders.driver_id', '=', 'drivers.id')
                ->select('orders.id','orders.restaurant_name', 'orders.created_at','order_statuses.status','orders.driver_name','orders.customer_name')
                ->where ('orders.order_status_id', '=', '1')
                ->where('orders.manager_id', $user_id)
                ->get();
        $completed_orders = json_decode( json_encode($completed_orders), true);
       
        return view('orders.completed')->with("completed_orders", $completed_orders); 
     }
     
    public function live_orders(){
         $user_id = Auth::id();
        $live_orders =DB::table('orders')
                ->join('order_statuses', 'orders.order_status_id', '=', 'order_statuses.id')
                ->join('customers', 'orders.customer_id', '=', 'customers.id')
                ->join('drivers', 'orders.driver_id', '=', 'drivers.id')
                ->select('orders.id','orders.restaurant_name', 'orders.created_at','order_statuses.status','orders.driver_name','orders.customer_name')
                ->where ('orders.order_status_id', '=', '4')
                ->where('orders.manager_id', $user_id)
                ->get();
        $live_orders = json_decode( json_encode($live_orders), true);
      
        return view('orders.live_orders')->with("live_orders", $live_orders); 
     }
    public function progress_orders(){
        $user_id = Auth::id();
        $progress_orders =DB::table('orders')
                ->join('order_statuses', 'orders.order_status_id', '=', 'order_statuses.id')
                ->join('drivers', 'orders.driver_id', '=', 'drivers.id')
                ->join('customers', 'orders.customer_id', '=', 'customers.id')
                ->select('orders.id','orders.customer_name','orders.restaurant_name', 'orders.created_at','order_statuses.status','orders.driver_name')
                ->where ('orders.order_status_id', '=', '2')
                ->where('orders.manager_id', $user_id)
                ->get();
        $progress_orders = json_decode( json_encode($progress_orders), true);
      
        return view('orders.progress_orders')->with("progress_orders", $progress_orders); 
     }
     
     
  

    /**
     * Store a newly created Order in storage.
     *
     * @param CreateOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->orderRepository->model());
        try {
            $order = $this->orderRepository->create($input);
            $order->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));

        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.order')]));

        return redirect(route('orders.index'));
    }

    /**
     * Display the specified Order.
     *
     * @param int $id
     * @param FoodOrderDataTable $foodOrderDataTable
     *
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function show(FoodOrderDataTable $foodOrderDataTable, $id)
    {
        $user_id = Auth::id();
        $this->orderRepository->pushCriteria(new OrdersOfUserCriteria(auth()->id()));
        $order = $this->orderRepository->findWithoutFail($id);
     
    
        if (empty($order)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.order')]));

            return redirect(route('orders.index'));
        }
        $subtotal = 0;

        foreach ($order->foodOrders as $foodOrder) {
            foreach ($foodOrder->extras as $extra) {
                $foodOrder->price += $extra->price;
            }
            $subtotal += $foodOrder->price * $foodOrder->quantity;
        }

        $total = $subtotal + $order['delivery_fee'];
        $taxAmount = $total * $order['tax'] / 100;
        $total += $taxAmount;
        $foodOrderDataTable->id = $id;
        
        $orderviewStatus ='1';
        
                           
        if (auth()->user()->hasRole('admin')) {
            $adminviewstatus = DB::table("orders")
                           ->where('id', $id)
                        //   ->where('id', $id)
                           ->update(['AdminorderView_status' => $orderviewStatus]);
            return $foodOrderDataTable->render('orders.show', ["order" => $order, "AdminorderView_status" =>$adminviewstatus, "total" => $total, "subtotal" => $subtotal,"taxAmount" => $taxAmount]);
           
        } else if (auth()->user()->hasRole('manager')) {
          
           $managerviewstatus = DB::table("orders")
                           ->where('id', $id)
                           ->where('manager_id', $user_id)
                           ->update(['ManagerorderView_status' => $orderviewStatus]);
           
          return $foodOrderDataTable->render('orders.show', ["order" => $order,  "ManagerorderView_status" =>$managerviewstatus, "total" => $total, "subtotal" => $subtotal,"taxAmount" => $taxAmount]);  
        }
        
        else if (auth()->user()->hasRole('client')) {
            
              $restaurantviewstatus = DB::table("orders")
                            ->join('restaurants', 'restaurants.id', '=', 'orders.restaurant_id')
                            ->join('users', 'users.email', '=', 'restaurants.email')
                            ->where('users.id', $user_id)
                            ->where('orders.id', $id)
                          //->where('manager_id', $user_id)
                          ->update(['RestaurantorderView_status' => $orderviewStatus]);
           
            return $foodOrderDataTable->render('orders.show', ["order" => $order, "RestaurantorderView_status" => $restaurantviewstatus, "total" => $total, "subtotal" => $subtotal,"taxAmount" => $taxAmount]);
            
        }
        
        // return $foodOrderDataTable->render('orders.show', ["order" => $order, "total" => $total, "subtotal" => $subtotal,"taxAmount" => $taxAmount]); 
    }

   /**
     * Show the form for editing the specified Order.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function edit($id)
    {
        $this->orderRepository->pushCriteria(new OrdersOfUserCriteria(auth()->id()));
        $order = $this->orderRepository->findWithoutFail($id);
        if (empty($order)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.order')]));

            return redirect(route('orders.index'));
        }

        $restaurant = $order->foodOrders()->first();
        $restaurant = isset($restaurant) ? $restaurant->food['restaurant_id'] : 0;

        $user = $this->userRepository->getByCriteria(new ClientsCriteria())->pluck('name', 'id');
        $driver = $this->userRepository->getByCriteria(new DriversOfRestaurantCriteria($restaurant))->pluck('name', 'id');
        $orderStatus = $this->orderStatusRepository->pluck('status', 'id');


        $customFieldsValues = $order->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->orderRepository->model());
        $hasCustomField = in_array($this->orderRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('orders.edit')->with('order', $order)->with("customFields", isset($html) ? $html : false)->with("user", $user)->with("driver", $driver)->with("orderStatus", $orderStatus);
    }

    /**
     * Update the specified Order in storage.
     *
     * @param int $id
     * @param UpdateOrderRequest $request
     *
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function update($id, UpdateOrderRequest $request)
    {
        $this->orderRepository->pushCriteria(new OrdersOfUserCriteria(auth()->id()));
        $oldOrder = $this->orderRepository->findWithoutFail($id);
        
        
        // echo "<pre>";
        // print_r($oldOrder);   die;
        
        if (empty($oldOrder)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.order')]));
            return redirect(route('orders.index'));
        }
        //  $oldStatus = $oldOrder->payment->status;
        $oldStatus = $oldOrder->order_status_id;
        $input = $request->all();
        
        
       
        
        
        
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->orderRepository->model());
        try {

            $order = $this->orderRepository->update($input, $id);
            
              

            // if (setting('enable_notifications', false)) {
            //     if (isset($input['order_status_id']) && $input['order_status_id'] != $oldOrder->order_status_id) {
            //         Notification::send([$order->user], new StatusChangedOrder($order));
            //     }

            //     if (isset($input['driver_id']) && ($input['driver_id'] != $oldOrder['driver_id'])) {
            //         $driver = $this->userRepository->findWithoutFail($input['driver_id']);
            //         if (!empty($driver)) {
            //             Notification::send([$driver], new AssignedOrder($order));
            //         }
            //     }
            // }
            
            //  print_r($order);   die;

            // $this->paymentRepository->update([
            //     "status" => $input['status'],
            // ], $order['payment_id']);
            //dd($input['status']);
            
           

            // event(new OrderChangedEvent($oldStatus, $order));

            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $order->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
        } catch (ValidatorException $e) {
            
           
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.order')]));

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified Order from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function destroy($id)
    {
        if (!env('APP_DEMO', false)) {
            $this->orderRepository->pushCriteria(new OrdersOfUserCriteria(auth()->id()));
            $order = $this->orderRepository->findWithoutFail($id);

            if (empty($order)) {
                Flash::error(__('lang.not_found', ['operator' => __('lang.order')]));

                return redirect(route('orders.index'));
            }

            $this->orderRepository->delete($id);

            Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.order')]));


        } else {
            Flash::warning('This is only demo app you can\'t change this section ');
        }
        return redirect(route('orders.index'));
    }

    /**
     * Remove Media of Order
     * @param Request $request
     */
    public function removeMedia(Request $request)
    {
        $input = $request->all();
        $order = $this->orderRepository->findWithoutFail($input['id']);
        try {
            if ($order->hasMedia($input['collection'])) {
                $order->getFirstMedia($input['collection'])->delete();
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
