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

class ColorController extends Controller
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
     
       $getdata = DB::table("appColors")->select('*')->get();
       
       
       $getdata = json_decode( json_encode($getdata), true);
       
       return view('settings.mobile.color')->with("getdata",  $getdata);
    }
    
     public function update(Request $request)
    {
       $getdata = DB::table("appColors")->select('*')->get();
       
       
       $getdata = json_decode( json_encode($getdata), true);
       
     $walkthrough_bg_color = $request->walkthrough_bg_color;
     $walkthroughtext_color = $request->walkthroughtext_color;
     $walkthroughIcon_color = $request->walkthroughIcon_color;
     $main_app_color = $request->main_app_color;
     $button_color = $request->button_color;
     $popupButton_color = $request->popupButton_color; 
     $appTitle_color = $request->appTitle_color; 
     $appSubtitle_color = $request->appSubtitle_color;  
     $appText_Color = $request->appText_Color; 
     $popupText_color = $request->popupText_color; 
     $profile_menu_color = $request->profile_menu_color; 
     $profile_menu_selected_color = $request->profile_menu_selected_color; 
     $allScreenLink_color = $request->allScreenLink_color; 
     
    
      
     $result = DB::table('appColors')
    ->update([
        'walkthrough_bg_color' => $walkthrough_bg_color,
        'walkthroughtext_color' =>$walkthroughtext_color,
        'walkthroughIcon_color' => $walkthroughIcon_color,
        'main_app_color' => $main_app_color,
        'button_color' => $button_color,
        'popupButton_color' =>$popupButton_color,
        'appTitle_color' =>$appTitle_color,
        'appSubtitle_color' =>$appSubtitle_color,
        'appText_Color' =>$appText_Color,
        'popupText_color' => $popupText_color,
        'profile_menu_color' =>$profile_menu_color,
        'profile_menu_selected_color' =>$profile_menu_selected_color,
        'allScreenLink_color' =>$allScreenLink_color
    ]);
   
       return view('settings.mobile.color')->with("result", $result)->with("getdata",  $getdata);
   
    } 
    
}
