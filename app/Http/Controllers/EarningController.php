<?php

namespace App\Http\Controllers;

use App\DataTables\EarningDataTable;
use App\Http\Requests\CreateEarningRequest;
use App\Http\Requests\UpdateEarningRequest;
use App\Repositories\CustomFieldRepository;
use App\Repositories\EarningRepository;
use App\Repositories\OrderRepository;
use App\Repositories\RestaurantRepository;
use Flash;
use DB;
use Auth;
use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;



class EarningController extends Controller
{
    /** @var  EarningRepository */
    private $earningRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
  * @var RestaurantRepository
  */
private $restaurantRepository;
    /**
     * @var OrderRepository
     */
    private $orderRepository;

    public function __construct(EarningRepository $earningRepo, CustomFieldRepository $customFieldRepo , RestaurantRepository $restaurantRepo, OrderRepository $orderRepository)
    {
        parent::__construct();
        
        $this->earningRepository = $earningRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->restaurantRepository = $restaurantRepo;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the Earning.
     *
     * @param EarningDataTable $earningDataTable
     * @return Response
     */
    public function index(EarningDataTable $earningDataTable)
    {
        
        
      
       
         return $earningDataTable->render('earnings.index');
         
         
    }

    /**
     * Show the form for creating a new Earning.
     *
     * @return Response
     */
    public function create()
    {

        $restaurants = $this->restaurantRepository->all();
        
        foreach ($restaurants as $restaurant){
            $restaurantId = $restaurant->id;
            $this->earningRepository->firstOrCreate(['restaurant_id'=>$restaurantId])->first();
        }
        return redirect(route('earnings.index'));
    }

    /**
     * Store a newly created Earning in storage.
     *
     * @param CreateEarningRequest $request
     *
     * @return Response
     */
    public function store(CreateEarningRequest $request)
    {
        $input = $request->all();
        
        print_r($input); die;
        
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->earningRepository->model());
        try {
            $earning = $this->earningRepository->create($input);
            $earning->customFieldsValues()->createMany(getCustomFieldsValues($customFields,$request));
            
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully',['operator' => __('lang.earning')]));

        return redirect(route('earnings.index'));
    }

    /**
     * Display the specified Earning.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $earning = $this->earningRepository->findWithoutFail($id);

        if (empty($earning)) {
            Flash::error('Earning not found');

            return redirect(route('earnings.index'));
        }

        return view('earnings.show')->with('earning', $earning);
    }

    /**
     * Show the form for editing the specified Earning.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $earning = $this->earningRepository->findWithoutFail($id);
        $restaurant = $this->restaurantRepository->pluck('name','id');
        

        if (empty($earning)) {
            Flash::error(__('lang.not_found',['operator' => __('lang.earning')]));

            return redirect(route('earnings.index'));
        }
        $customFieldsValues = $earning->customFieldsValues()->with('customField')->get();
        $customFields =  $this->customFieldRepository->findByField('custom_field_model', $this->earningRepository->model());
        $hasCustomField = in_array($this->earningRepository->model(),setting('custom_field_models',[]));
        if($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('earnings.edit')->with('earning', $earning)->with("customFields", isset($html) ? $html : false)->with("restaurant",$restaurant);
    }

    /**
     * Update the specified Earning in storage.
     *
     * @param  int              $id
     * @param UpdateEarningRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEarningRequest $request)
    {
        $earning = $this->earningRepository->findWithoutFail($id);

        if (empty($earning)) {
            Flash::error('Earning not found');
            return redirect(route('earnings.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->earningRepository->model());
        try {
            $earning = $this->earningRepository->update($input, $id);
            
            
            foreach (getCustomFieldsValues($customFields, $request) as $value){
                $earning->customFieldsValues()
                    ->updateOrCreate(['custom_field_id'=>$value['custom_field_id']],$value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully',['operator' => __('lang.earning')]));

        return redirect(route('earnings.index'));
    }

    /**
     * Remove the specified Earning from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $earning = $this->earningRepository->findWithoutFail($id);

        if (empty($earning)) {
            Flash::error('Earning not found');

            return redirect(route('earnings.index'));
        }

        $this->earningRepository->delete($id);

        Flash::success(__('lang.deleted_successfully',['operator' => __('lang.earning')]));

        return redirect(route('earnings.index'));
    }

        /**
     * Remove Media of Earning
     * @param Request $request
     */
    public function removeMedia(Request $request)
    {
        $input = $request->all();
        $earning = $this->earningRepository->findWithoutFail($input['id']);
        try {
            if($earning->hasMedia($input['collection'])){
                $earning->getFirstMedia($input['collection'])->delete();
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
	public function totalEarning(Request $request){
		$user_id = Auth::user()->id;
		
		$today = today(); 
		$date_current = []; 

		for($i=1; $i<=$today->daysInMonth; ++$i) {
			$date_current[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('d m y');
		}
		//print_r($dates);die;
		$str_date = json_encode($date_current);
		//echo $str_date;die;
		//$match_date = DB::table('earnings')->select('created_at')->get();
		//print_r($match_date);die;
			$totalearnings = DB::table("earnings")->select('total_earning','created_at')->get();
		

		//print_r($has_restaurant);die;
		 $dailyearnings=DB::table('earnings')
			 ->select(DB::raw('sum(total_earning) as total'),DB::raw('date(created_at) as dates'),'user_restaurants.user_id', 'user_restaurants.restaurant_id')
			 ->join('user_restaurants', 'user_restaurants.restaurant_id', '=', 'earnings.restaurant_id')
			 ->groupBy('dates')
			 ->whereMonth('created_at', Carbon::now()->month)
			 ->whereYear('created_at', Carbon::now()->year)
			 ->where('user_id',$user_id)
			 ->orderBy('id','desc')
			 ->take(5)
			 ->get()
			 ->reverse();
			// print_r($dailyearnings);die;

		
		$monthlyearnings=DB::table('earnings')
			 ->select (DB::raw('sum(total_earning) as total'),DB::raw('YEAR(created_at) as year'),DB::raw('monthname(created_at) as month'),'user_restaurants.user_id', 'user_restaurants.restaurant_id')
			 ->join('user_restaurants', 'user_restaurants.restaurant_id', '=', 'earnings.restaurant_id')
			 ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
			 ->whereYear('created_at', Carbon::now()->year)
			 ->where('user_id',$user_id)
			 ->orderBy('id','desc')
			 ->take(5)
			 ->get()
			 ->reverse();
			 
		$yearlyearnings=DB::table('earnings')
			 ->select (DB::raw('sum(total_earning) as total'),DB::raw('YEAR(created_at) as year'),'user_restaurants.user_id', 'user_restaurants.restaurant_id')
			 ->join('user_restaurants', 'user_restaurants.restaurant_id', '=', 'earnings.restaurant_id')
			 ->groupBy(DB::raw('YEAR(created_at)'))
			 ->where('user_id',$user_id)
			 ->orderBy('id','desc')
			 ->take(5)
			 ->get()
			 ->reverse();
		
		$results = DB::table('earnings')
			->select(DB::raw('MONTHNAME(created_at) as month'), 
                     DB::raw("DATE_FORMAT(created_At,'%Y-%m-%d') as dayNum"),    
                     DB::raw('sum(total_earning) as total'))
			->orderBy('dayNum')
			->groupBy('dayNum')
			->get();
 
		$results = collect($results)->keyBy('dayNum')->map(function ($item) {
			$item->dayNum = \Carbon\Carbon::parse($item->dayNum);

			return $item;
		});
       
		$periods = new DatePeriod($results->min('dayNum'), \Carbon\CarbonInterval::month(), $results->max('dayNum')->addMonth());

		$graph = array_map(function ($period) use ($results) {

			$month = $period->format('M-d-y');

			return (object)[
				'dayNum'  => $period->format('M d y'),
				'totalearnings' => $results->has($month) ? $results->get($month)->total : 0,
			];

		}, iterator_to_array($periods));
		
	    // print_r($graph);die;
       // print_r($monthlyearnings);die; 

		
	 
			// print_r($monthlysales);die;
		//print_r($dailyData);die;
		
		//print_r($totalEarningdaily);die;
		//print_r($totalearnings);die;
		
		return view("earnings.earning_report", 
		array(
		'earnings' => $totalearnings,
		'daily' => $dailyearnings,
		//'all_days'=> $dates,
		'monthly' => $monthlyearnings,
		'yearly' => $yearlyearnings
		));
			
	}
}
