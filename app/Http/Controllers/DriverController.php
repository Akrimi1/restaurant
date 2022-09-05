<?php
    namespace App\Http\Controllers;

use App\Criteria\Users\DriversCriteria;
use App\DataTables\DriverDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Repositories\DriverRepository;
use App\Repositories\CustomFieldRepository;
use App\Repositories\UserRepository;
use Flash;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class DriverController extends Controller
{
    /** @var  DriverRepository */
    private $driverRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
  * @var UserRepository
  */
private $userRepository;

    public function __construct(DriverRepository $driverRepo, CustomFieldRepository $customFieldRepo , UserRepository $userRepo)
    {
        parent::__construct();
        $this->driverRepository = $driverRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the Driver.
     *
     * @param DriverDataTable $driverDataTable
     * @return Response
     */
    public function index(DriverDataTable $driverDataTable)
    {
        
       
        
        return $driverDataTable->render('drivers.index');
    }

    /**
     * Show the form for creating a new Driver.
     *
     * @return Response
     */
    public function create()
    {
        // $drivers = $this->userRepository->getByCriteria(new DriversCriteria())->pluck('name', 'id');
       
        $this->userRepository->pushCriteria(new DriversCriteria());
        $drivers = $this->userRepository->all();
        
        
        foreach ($drivers as $driver){
            if(!empty($driver)){
                $this->driverRepository->firstOrCreate(['user_id'=>$driver->id]);
            }
        }
    
        
         
         $drivers = $this->userRepository->getByCriteria(new DriversCriteria())->pluck('name', 'id');
         
         $driversSelected = [];
        
        
        return view('drivers.create')->with("customFields", isset($html) ? $html : false)->with("driversSelected", $driversSelected)->with("drivers", $drivers);
        
        // return view('restaurants.create')->with("customFields", isset($html) ? $html : false)->with("user", $user)->with("drivers", $drivers)->with("usersSelected", $usersSelected)->with("driversSelected", $driversSelected)->with('cuisine', $cuisine)->with('cuisinesSelected', $cuisinesSelected)->with('daysSelected', $daysSelected);
        // return redirect(route('drivers.index'));
        // return redirect(route('drivers.create'));

    }

    /**
     * Store a newly created Driver in storage.
     *
     * @param CreateDriverRequest $request
     *
     * @return Response
     */
     
     
     
     
     
    public function store(CreateDriverRequest $request)
    {
        // echo "store"; die;
        
        $input = $request->all();
        $driver_id=$input['drivers'];
        $driver_name = DB::table('users')->where('id', $driver_id)->pluck('name')->first();
        $input['rider_name'] = $input['drivers'];
        unset($input['drivers']);
    $key = "rider_name";
        
        $input[$key] = $driver_name;
        
        //  print_r($input);  die;
        //  Array ( [_token] => u5W3E9XsNs6UkGL2CpQkFLMryYmRzlh9FrAxYAtF [latitude_field] => 30.11 [longitude_field] => 30.11 [proximity_field] => 3 [delivery_fee] => 4 [delivery_rating] => 5 [available] => 1 [rider_name] => robin )
        
        
        $update = DB::table('drivers')->where('user_id', $driver_id) ->update( [ 'delivery_fee' => $input['delivery_fee'], 'available' => $input['available'], 'rating' => $input['delivery_rating'], 'latitude_field' => $input['latitude_field'], 'longitude_field' => $input['longitude_field'], 'proximity_field' => $input['proximity_field'], 'name' => $input['rider_name'] ]);
        
        
        
        
        
       
        
        
        // $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->driverRepository->model());
        // try {
        //     $driver = $this->driverRepository->create($input);
        //     $driver->customFieldsValues()->createMany(getCustomFieldsValues($customFields,$request));
            
        // } catch (ValidatorException $e) {
        //     Flash::error($e->getMessage());
        // }

               if($update == 1)
               {
                   Flash::success(__('lang.saved_successfully',['operator' => __('lang.driver')])); 
               }
         
       

        return redirect(route('drivers.index'));
    }

    /**
     * Display the specified Driver.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $driver = $this->driverRepository->findWithoutFail($id);

        if (empty($driver)) {
            Flash::error('Driver not found');

            return redirect(route('drivers.index'));
        }

        return view('drivers.show')->with('driver', $driver);
    }

    /**
     * Show the form for editing the specified Driver.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
      
        $driver = $this->driverRepository->findWithoutFail($id);
        
       
        $driver_name = $driver['name'];
       
        
        $user = $this->userRepository->pluck('name','id');
        

        if (empty($driver)) {
            Flash::error(__('lang.not_found',['operator' => __('lang.driver')]));

            return redirect(route('drivers.index'));
        }
        $customFieldsValues = $driver->customFieldsValues()->with('customField')->get();
        $customFields =  $this->customFieldRepository->findByField('custom_field_model', $this->driverRepository->model());
        $hasCustomField = in_array($this->driverRepository->model(),setting('custom_field_models',[]));
        if($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }
        
        
        $this->userRepository->pushCriteria(new DriversCriteria());
        $drivers = $this->userRepository->all();
         $drivers = $this->userRepository->getByCriteria(new DriversCriteria())->pluck('name', 'id');
         
        
         $driversSelected = [];

        // return view('drivers.edit')->with('driver', $driver)->with("customFields", isset($html) ? $html : false)->with("user",$user);
        
        return view('drivers.edit')->with('driver', $driver)->with("customFields", isset($html) ? $html : false)->with("user",$user)->with("driversSelected", $driversSelected)->with("drivers", $drivers)->with("driver_name", $driver_name);
    }

    /**
     * Update the specified Driver in storage.
     *
     * @param  int              $id
     * @param UpdateDriverRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDriverRequest $request)
    {
       
        
        $driver = $this->driverRepository->findWithoutFail($id);

        if (empty($driver)) {
            Flash::error('Driver not found');
            return redirect(route('drivers.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->driverRepository->model());
        try {
            $driver = $this->driverRepository->update($input, $id);
            
            
            foreach (getCustomFieldsValues($customFields, $request) as $value){
                $driver->customFieldsValues()
                    ->updateOrCreate(['custom_field_id'=>$value['custom_field_id']],$value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully',['operator' => __('lang.driver')]));

        return redirect(route('drivers.index'));
    }

    /**
     * Remove the specified Driver from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $driver = $this->driverRepository->findWithoutFail($id);

        if (empty($driver)) {
            Flash::error('Driver not found');

            return redirect(route('drivers.index'));
        }

        $this->driverRepository->delete($id);

        Flash::success(__('lang.deleted_successfully',['operator' => __('lang.driver')]));

        return redirect(route('drivers.index'));
    }

        /**
     * Remove Media of Driver
     * @param Request $request
     */
    public function removeMedia(Request $request)
    {
        $input = $request->all();
        $driver = $this->driverRepository->findWithoutFail($input['id']);
        try {
            if($driver->hasMedia($input['collection'])){
                $driver->getFirstMedia($input['collection'])->delete();
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
