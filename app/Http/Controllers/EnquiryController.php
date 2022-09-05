<?php

namespace App\Http\Controllers;

use DB;
use Auth;
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

class EnquiryController extends Controller
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
       $role_id="";
       
       // $t = date("H");
        
        // if ($role_id == "1") {
            
        //   echo "Admin";
        // } 
        // elseif ($role_id == "2") {
            
        //   echo "Manager";
        // }
        // elseif ($role_id == "3") {
        //   echo "Customer";
        // }
        // else {
        //   echo "Driver";
        // }
    
    
      $login_id = \Auth::user()->id;

      // $role_id = "3";
       $enquiries = DB::table("support")->select('*')->orderBy('id', 'DESC')->get();
       
   
       
       
       $enquiries = json_decode( json_encode($enquiries), true);
       
       
    //       echo "<pre>";
       
    //   print_r($enquiries);   die;
       
       DB::table('support')->update(['support_status' => 1]);
  
    //  echo "Add Created successfully";
       return view('enquiry.index')->with("enquiries", $enquiries);
    }

 
   public function delete($id)
  {
      $status = DB::table('support')->delete($id);
      if($status == 1)
      {
          return redirect('/enquiry');
      }
      else{
          
           return redirect('/enquiry');
      }

  }

    
}
