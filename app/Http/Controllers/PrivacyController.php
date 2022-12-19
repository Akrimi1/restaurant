<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\DataTables\PrivacyDataTable;
use App\Http\Requests\CreatePrivacyRequest;
use App\Http\Requests;
use App\Repositories\CustomFieldRepository;
use App\Repositories\PrivacyRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class PrivacyController extends Controller
{

    /** @var  PrivacyRepository */
    private $PrivacyRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;




    public function __construct(CustomFieldRepository $customFieldRepo , PrivacyRepository $PrivacyRepository)
    {
        parent::__construct();
        $this->customFieldRepository = $customFieldRepo;
        $this->PrivacyRepository = $PrivacyRepository;
    }

    /**
     * Display a listing of the Faq.
     *
     * @param PrivacyDataTable $faqDataTable
     * @return Response
     */
    public function index()
    {

 
       $privacy = DB::table("privacy")->select('*')->get();
       $privacy = json_decode( json_encode($privacy), true);
 
       return view('privacy.index')->with("privacy", $privacy);
    }
    public function create()
    {
        $hasCustomField = in_array($this
        ->PrivacyRepository
        ->model() , setting('custom_field_models', []));
        
           return view('privacy.create')->with('customFields', $hasCustomField);
    }
    /**
     * Store a newly created Faq in storage.
     *
     * @param CreatePrivacyRequest $request
     *
     * @return Response
     */
    public function store(CreatePrivacyRequest $request)
    {
        $input = $request->all();
       
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->PrivacyRepository->model());
        try {
            $faq = $this->PrivacyRepository->create($input);
            $faq->customFieldsValues()->createMany(getCustomFieldsValues($customFields,$request));
           
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully',['operator' => __('lang.term')]));

        return redirect(route('privacy.index'));
    }

  public function edit($id)
  {
    $privacies = $this->PrivacyRepository->where('id',$id)->get();
    $privacy = $this->PrivacyRepository->findWithoutFail($id);
    if (empty($privacy)) {
        Flash::error(__('lang.not_found'));

        return redirect(route('terms.index'));
    }
    $customFieldsValues = $privacy->customFieldsValues()->with('customField')->get();
    $customFields =  $this->customFieldRepository->findByField('custom_field_model', $this->PrivacyRepository->model());
    $hasCustomField = in_array($this->PrivacyRepository->model(),setting('custom_field_models',[]));
    if($hasCustomField) {
        $html = generateCustomField($customFields, $customFieldsValues);
    }

    return view('privacy.edit')->with('privacies', $privacies)->with('privacy', $privacy)->with("customFields", isset($html) ? $html : false);

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
