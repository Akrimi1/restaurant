<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use File;
use Illuminate\Support\Facades\Storage;
use App\DataTables\FaqDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Repositories\FaqRepository;
use App\Repositories\CustomFieldRepository;
use App\Repositories\FaqCategoryRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class ContentController extends Controller
{
    /** @var  FaqRepository */
    private $faqRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
  * @var FaqCategoryRepository
  */
private $faqCategoryRepository;

    public function __construct(FaqRepository $faqRepo, CustomFieldRepository $customFieldRepo , FaqCategoryRepository $faq_categoryRepo)
    {
        parent::__construct();
        $this->faqRepository = $faqRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->faqCategoryRepository = $faq_categoryRepo;
    }

    /**
     * Display a listing of the Faq.
     *
     * @param FaqDataTable $faqDataTable
     * @return Response
     */
    public function index()
    {
       $getdata = DB::table("appContent")->select('*')->get();
       
       
       $getdata = json_decode( json_encode($getdata), true);
       
       
       return view('settings.mobile.content')->with("getdata",  $getdata);
    }
    
     public function update(Request $request)
    {
      
       if ($request->hasFile('logo')) {
        $image = $request->file('logo');
        $image_name = time().'.'.$image->getClientOriginalExtension();
        
       // $destinationPath =base_path('api/assets/images');
        //print_r( $destinationPath);die;
        //$destinationPath = public_path('/images');
        
        $destinationPath =  Storage::disk('api')->put($image->getFilename().'.'.$image_name,  File::get($image));
        //print_r($destinationPath);die;
    
    
        $image->move($destinationPath, $image_name);
            } else {
            dd('Request Has No File');
            }
                  
     
     $walkthrough1_title = $request->walkthrough1_title;
     $walkthrough1_content = $request->walkthrough1_content;
     $walkthrough2_title = $request->walkthrough2_title;
     $walkthrough2_content = $request->walkthrough2_content;
     $walkthrough3_title = $request->walkthrough3_title;
     $walkthrough3_content = $request->walkthrough3_content; 
     $walkthrough4_title = $request->walkthrough4_title; 
     $walkthrough4_content = $request->walkthrough4_content;  
     $addLocation_title = $request->addLocation_title; 
     $noCard_title = $request->noCard_title; 
     $noCard_content = $request->noCard_content; 
     $emptyOrder_title = $request->emptyOrder_title; 
     $emptyOrder_content = $request->emptyOrder_content; 
     
    
      
     $result = DB::table('appContent')
    ->update([
        'logo' => $image_name,
        'walkthrough1_title' => $walkthrough1_title,
        'walkthrough1_content' =>$walkthrough1_content,
        'walkthrough2_title' => $walkthrough2_title,
        'walkthrough2_content' => $walkthrough2_content,
        'walkthrough3_title' => $walkthrough3_title,
        'walkthrough3_content' =>$walkthrough3_content,
        'walkthrough4_title' =>$walkthrough4_title,
        'walkthrough4_content' =>$walkthrough4_content,
        'addLocation_title' =>$addLocation_title,
        'noCard_title' => $noCard_title,
        'noCard_content' =>$noCard_content,
        'emptyOrder_title' =>$emptyOrder_title,
        'emptyOrder_content' =>$emptyOrder_content
    ]);
   
       return view('settings.mobile.content')->with("result", $result);
   
    } 
    
}
