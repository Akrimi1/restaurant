<?php

namespace App\Http\Controllers;

use App\DataTables\AboutDataTable;
use App\DataTables\CouponDataTable;
use App\Http\Requests;
use App\Http\Requests\UpdateAboutRequest;
use App\Repositories\AboutRepository;
use App\Repositories\CustomFieldRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;
use Auth;
use DB;
class PushNotificationsController extends Controller
{
    /** @var  AboutRepository */
    private $aboutRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;



    public function __construct(AboutRepository $aboutRepo, CustomFieldRepository $customFieldRepo )
    {
        parent::__construct();
        $this->aboutRepository = $aboutRepo;
        $this->customFieldRepository = $customFieldRepo;
    }

   
    public function index(CouponDataTable $couponDataTable )
    {
        $users = DB::table("customers")->select('*')->get();
        $users = json_decode( json_encode($users), true);
    
    
        return $couponDataTable->render('push.index')->with("users", $users);
    }
    
    // public function send_notification(CouponDataTable $couponDataTable, Request $request){
        
    //     $users = DB::table("customers")->select('*')->get();
    //     $users = json_decode( json_encode($users), true);
        
    //     $customer_name = DB::table("customers")->pluck('name');
        
    //     $customer_name = $request->customer_name;
    //     $device_type = DB::table("customers")->where('name', $customer_name)->value('device_type');
    //     $customer_id = DB::table("customers")->where('name', $customer_name)->value('id');
    //     $device_token = DB::table("customers")->where('name', $customer_name)->value('device_token');
        
    //     //$device_token = json_decode( json_encode($device_token), true);
        
        
    //     $title = $request->title;
    //     $message = $request->message;
        
        
    //     DB::table('customer_push_notifications')->insert(
    //         ['customer_name' => $customer_name, 'title' => $title, 'message' => $message, 'device_token'=>$device_token, 'customer_id'=>$customer_id ,'device_type' => $device_type]
    //     );
        
        
    //     Flash::success(__('Data inserted successfully'));     
    //     return $couponDataTable->render('push.index')->with("users", $users);
        
    // }
    
   public function sendGCM($message, $id) {
       
    $url = 'https://fcm.googleapis.com/fcm/send';
    $fields = array (
            'registration_ids' => array (
                    $id
            ),
            'data' => array (
                    "message" => $message
            )
    );
    $fields = json_encode ( $fields );
    $headers = array (
            'Authorization: key=' . "AAAAnh_g2a0:APA91bE7s4-llG8u8qT-Rvu02aH7G87DI_hutc2Jo9nRPPaaqb8bWkA4guNdwEdh5zLv4ChbtSs3mtFplK1sWjjPzECrjJKgdEHigLguRfCGmAvqaaJ4VybbW_JGZmPnyKt923lzVdpW",
            'Content-Type: application/json'
    );
    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
    $result = curl_exec ( $ch );
    echo $result;
    curl_close ( $ch );
}
   
   
   
    
    
      public function send_notification(CouponDataTable $couponDataTable, Request $request){
        
        $users = DB::table("customers")->select('*')->get();
        $users = json_decode( json_encode($users), true);
        
        $customer_name = DB::table("customers")->pluck('name');
        
        $customer_name = $request->customer_name;
        $device_type = DB::table("customers")->where('name', $customer_name)->value('device_type');
        $customer_id = DB::table("customers")->where('name', $customer_name)->value('id');
        $device_token = DB::table("customers")->where('name', $customer_name)->value('device_token');
        
        //$device_token = json_decode( json_encode($device_token), true);
        
        
        $title = $request->title;
        $message = $request->message;
        
        
        $data =DB::table('customer_push_notifications')->insert(
            ['customer_name' => $customer_name, 'title' => $title, 'message' => $message, 'device_token'=>$device_token, 'customer_id'=>$customer_id ,'device_type' => $device_type]
        );
        
        if(empty($data)){
            Flash::error('Data not found');
            return redirect(route('push.index'));
        }
         
         $tokens = DB::table("customers")->where('name', $customer_name)->value('device_token');
         
         $url = 'https://fcm.googleapis.com/fcm/send';
         $fields = array (
                'registration_ids' => array (
                        $tokens
                ),
                'data' => array (
                        "message" => $message
                )
        );
        $fields = json_encode ( $fields );
        $headers = array (
                'Authorization: key=' . "AAAAnh_g2a0:APA91bE7s4-llG8u8qT-Rvu02aH7G87DI_hutc2Jo9nRPPaaqb8bWkA4guNdwEdh5zLv4ChbtSs3mtFplK1sWjjPzECrjJKgdEHigLguRfCGmAvqaaJ4VybbW_JGZmPnyKt923lzVdpW",
                'Content-Type: application/json'
        );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
        $result = curl_exec ( $ch );
        echo $result;
        curl_close ( $ch );
    
        //print_r($tokens);die;
        Flash::success(__('Data inserted successfully'));     
        return $couponDataTable->render('push.index')->with("users", $users);  
    }
    
    
    
    public function indexabout(CouponDataTable $couponDataTable)
    {
         $user_id = Auth::user()->id;
         $about = $this->aboutRepository->get();
         $about = json_decode( json_encode($about), true);
        return $couponDataTable->render('about.about')->with("about", $about);
    }

    /**
     * Show the form for creating a new Faq.
     *
     * @return Response
     */
    // public function create()
    // {
    //     $faqCategory = $this->faqCategoryRepository->pluck('name','id');
        
    //     $hasCustomField = in_array($this->faqRepository->model(),setting('custom_field_models',[]));
    //         if($hasCustomField){
    //             $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->faqRepository->model());
    //             $html = generateCustomField($customFields);
    //         }
    //     return view('faqs.create')->with("customFields", isset($html) ? $html : false)->with("faqCategory",$faqCategory);
    // }

    /**
     * Store a newly created Faq in storage.
     *
     * @param CreateFaqRequest $request
     *
     * @return Response
     */
    // public function store(CreateFaqRequest $request)
    // {
    //     $input = $request->all();
    //     $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->faqRepository->model());
    //     try {
    //         $faq = $this->faqRepository->create($input);
    //         $faq->customFieldsValues()->createMany(getCustomFieldsValues($customFields,$request));
            
    //     } catch (ValidatorException $e) {
    //         Flash::error($e->getMessage());
    //     }

    //     Flash::success(__('lang.saved_successfully',['operator' => __('lang.faq')]));

    //     return redirect(route('faqs.index'));
    // }

    /**
     * Display the specified Faq.
     *
     * @param  int $id
     *
     * @return Response
     */


    /**
     * Show the form for editing the specified Faq.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
               $abouts = $this->aboutRepository->where('id',$id)->get();
        $about = $this->aboutRepository->findWithoutFail($id);
        if (empty($about)) {
            Flash::error(__('lang.not_found'));

            return redirect(route('about.index'));
        }
        $customFieldsValues = $about->customFieldsValues()->with('customField')->get();
        $customFields =  $this->customFieldRepository->findByField('custom_field_model', $this->aboutRepository->model());
        $hasCustomField = in_array($this->aboutRepository->model(),setting('custom_field_models',[]));
        if($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('about.edit')->with('abouts', $abouts)->with('about', $about)->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Update the specified Faq in storage.
     *
     * @param  int              $id
     * @param UpdateFaqRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAboutRequest $request)
    {
     
        $about = $this->aboutRepository->findWithoutFail($id);

        if (empty($about)) {
            Flash::error('About Us not found');
            return redirect(route('about.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->aboutRepository->model());
        try {
            $faq = $this->aboutRepository->update($input, $id);
            
            
            foreach (getCustomFieldsValues($customFields, $request) as $value){
                $faq->customFieldsValues()
                    ->updateOrCreate(['custom_field_id'=>$value['custom_field_id']],$value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('updated successfully'));

        return redirect(route('about.index'));
    }

    /**
     * Remove the specified Faq from storage.
     *
     * @param  int $id
     *
     * @return Response
     */


        /**
     * Remove Media of Faq
     * @param Request $request
     */

}
