<?php

namespace App\Http\Controllers;

use App\DataTables\PaymentDataTable;
use App\Http\Requests;

use App\Repositories\OrderRepository;
use App\Repositories\RestaurantRepository;
use App\Repositories\DriverRepository;
use App\Repositories\ManagerRepository;
use App\Repositories\UsersRepository;


use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Repositories\PaymentRepository;
use App\Repositories\CustomFieldRepository;
use App\Repositories\UserRepository;
use Flash;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class PaymentController extends Controller
{
    /** @var  PaymentRepository */
    private $paymentRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

     /** @var  OrderRepository */

     private $orderRepository;





     /**
 
      * @var UserRepository
 
      */
 
     private $userRepository;
 
 
 
     /** @var  RestaurantRepository */
 
     private $restaurantRepository;
 

 
     
 
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
/*
    /**
  * @var UserRepository
  */
  /*
private $userRepository;

    public function __construct(PaymentRepository $paymentRepo, CustomFieldRepository $customFieldRepo , UserRepository $userRepo)
    {
        parent::__construct();
        $this->paymentRepository = $paymentRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->userRepository = $userRepo;
    }
*/
    /**
     * Display a listing of the Payment.
     *
     * @param PaymentDataTable $paymentDataTable
     * @return Response
     */
    public function index(PaymentDataTable $paymentDataTable)
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
        
        $earning = $this->paymentRepository->all()->sum('price');

        //added
        $admin_commission = $this->restaurantRepository->all()->avg('admin_commission');
        $driver_commission = $this->restaurantRepository->all()->avg('driver_commission');
        //profit margin
        $restaurant_commission = 100 - (round($admin_commission,0) + round($driver_commission,0));

        $ajaxEarningUrl = route('payments.byMonth',['api_token'=>auth()->user()->api_token]);
        //        dd($ajaxEarningUrl);
        return view('payments.index')
            ->with("ajaxEarningUrl", $ajaxEarningUrl)
            ->with("earning", $earning)
            ->with("login_id", $login_id)
            ->with("admin_commission", round($admin_commission,0))
            ->with("driver_commission", round($driver_commission,0))
            ->with("profit_margin", $restaurant_commission)
            ->with("yearnings", $yearnings)
            ->with("mearnings", $mearnings)
            ->with("order_status_yearly", $order_status_yearly)
            ->with("order_status_monthly", $order_status_monthly);
        
        /*return $paymentDataTable->render('payments.index');*/
    }

    /**
     * Show the form for creating a new Payment.
     *
     * @return Response
     */
    public function create()
    {
        $user = $this->userRepository->pluck('name','id');
        
        $hasCustomField = in_array($this->paymentRepository->model(),setting('custom_field_models',[]));
            if($hasCustomField){
                $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->paymentRepository->model());
                $html = generateCustomField($customFields);
            }
        return view('payments.create')->with("customFields", isset($html) ? $html : false)->with("user",$user);
    }

    /**
     * Store a newly created Payment in storage.
     *
     * @param CreatePaymentRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->paymentRepository->model());
        try {
            $payment = $this->paymentRepository->create($input);
            $payment->customFieldsValues()->createMany(getCustomFieldsValues($customFields,$request));
            
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully',['operator' => __('lang.payment')]));

        return redirect(route('payments.index'));
    }

    /**
     * Display the specified Payment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        return view('payments.show')->with('payment', $payment);
    }

    /**
     * Show the form for editing the specified Payment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $payment = $this->paymentRepository->findWithoutFail($id);
        $user = $this->userRepository->pluck('name','id');
        

        if (empty($payment)) {
            Flash::error(__('lang.not_found',['operator' => __('lang.payment')]));

            return redirect(route('payments.index'));
        }
        $customFieldsValues = $payment->customFieldsValues()->with('customField')->get();
        $customFields =  $this->customFieldRepository->findByField('custom_field_model', $this->paymentRepository->model());
        $hasCustomField = in_array($this->paymentRepository->model(),setting('custom_field_models',[]));
        if($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('payments.edit')->with('payment', $payment)->with("customFields", isset($html) ? $html : false)->with("user",$user);
    }

    /**
     * Update the specified Payment in storage.
     *
     * @param  int              $id
     * @param UpdatePaymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentRequest $request)
    {
        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Payment not found');
            return redirect(route('payments.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->paymentRepository->model());
        try {
            $payment = $this->paymentRepository->update($input, $id);
            
            
            foreach (getCustomFieldsValues($customFields, $request) as $value){
                $payment->customFieldsValues()
                    ->updateOrCreate(['custom_field_id'=>$value['custom_field_id']],$value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully',['operator' => __('lang.payment')]));

        return redirect(route('payments.index'));
    }

    /**
     * Remove the specified Payment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        $this->paymentRepository->delete($id);

        Flash::success(__('lang.deleted_successfully',['operator' => __('lang.payment')]));

        return redirect(route('payments.index'));
    }

        /**
     * Remove Media of Payment
     * @param Request $request
     */
    public function removeMedia(Request $request)
    {
        $input = $request->all();
        $payment = $this->paymentRepository->findWithoutFail($input['id']);
        try {
            if($payment->hasMedia($input['collection'])){
                $payment->getFirstMedia($input['collection'])->delete();
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
