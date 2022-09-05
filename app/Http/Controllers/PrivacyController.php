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

class PrivacyController extends Controller
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

 
       $privacy = DB::table("privacy")->select('*')->get();
       $privacy = json_decode( json_encode($privacy), true);
 
       return view('privacy.index')->with("privacy", $privacy);
    }

  public function edit($id)
  {
      $privacy = DB::table("privacy")->select('*')->where('id', $id)->get();
      
      //print_r($privacy);die;
      $privacy = json_decode( json_encode($privacy), true);
    
      return view('privacy.edit')->with('privacy',$privacy); 
  }
  
  public function update($id, Request $request)
{
     
     $content = $request->content;
      
      
      $privacy = DB::table("privacy")->where('id', $id)->update(['content' => $content]);
     
       $privacy = DB::table("privacy")->select('*')->get();
       $privacy = json_decode( json_encode($privacy), true);
  
       return view('privacy.index')->with("privacy", $privacy);
}

    
}
