<?php

namespace App\Http\Controllers;

use App\DataTables\TermsDataTable;
use App\Http\Requests;
use App\Http\Requests\UpdateTermsRequest;
use App\Http\Requests\CreateTermRequest;
use App\Repositories\TermsRepository;
use App\Repositories\CustomFieldRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;
use Auth;

class TermsController extends Controller
{
    /** @var  TermsRepository */
    private $termsRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;



    public function __construct(TermsRepository $termsRepo, CustomFieldRepository $customFieldRepo )
    {
        parent::__construct();
        $this->termsRepository = $termsRepo;
        $this->customFieldRepository = $customFieldRepo;
    }

    /**
     * Display a listing of the Terms.
     *
     * @param TermsDataTable $TermsDataTable
     * @return Response
     */
    public function index(TermsDataTable $termsDataTable)
    {
         $user_id = Auth::user()->id;
 $terms = $this->termsRepository->get();
  $terms = json_decode( json_encode($terms), true);
        return $termsDataTable->render('terms.index')->with("terms", $terms);
    }
    
    /**
     * Show the form for creating a new Faq.
     *
     * @return Response
     */
 public function create()
     {
        
        $hasCustomField = in_array($this->termsRepository->model(),setting('custom_field_models',[]));
             if($hasCustomField){
                $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->faqRepository->model());
                 $html = generateCustomField($customFields);
            }
         return view('terms.create')->with("customFields", isset($html) ? $html : false);
     }

    /**
     * Store a newly created Faq in storage.
     *
     * @param CreateTermRequest $request
     *
     * @return Response
     */
     public function store(CreateTermRequest $request)
     {
         $input = $request->all();
        
         $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->termsRepository->model());
         try {
             $term = $this->termsRepository->create($input);
             $term->customFieldsValues()->createMany(getCustomFieldsValues($customFields,$request));
            
         } catch (ValidatorException $e) {
             Flash::error($e->getMessage());
         }

         Flash::success(__('lang.saved_successfully',['operator' => __('lang.term')]));

         return redirect(route('terms.index'));
     }

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
               $terms = $this->termsRepository->where('id',$id)->get();
        $term = $this->termsRepository->findWithoutFail($id);
        if (empty($term)) {
            Flash::error(__('lang.not_found'));

            return redirect(route('terms.index'));
        }
        $customFieldsValues = $term->customFieldsValues()->with('customField')->get();
        $customFields =  $this->customFieldRepository->findByField('custom_field_model', $this->termsRepository->model());
        $hasCustomField = in_array($this->termsRepository->model(),setting('custom_field_models',[]));
        if($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('terms.edit')->with('terms', $terms)->with('term', $term)->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Update the specified Faq in storage.
     *
     * @param  int              $id
     * @param UpdateFaqRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTermsRequest $request)
    {
     
        $terms = $this->termsRepository->findWithoutFail($id);

        if (empty($terms)) {
            Flash::error('Terms not found');
            return redirect(route('terms.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->termsRepository->model());
        try {
            $terms = $this->termsRepository->update($input, $id);
            
            
            foreach (getCustomFieldsValues($customFields, $request) as $value){
                $terms->customFieldsValues()
                    ->updateOrCreate(['custom_field_id'=>$value['custom_field_id']],$value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('updated successfully'));

        return redirect(route('terms.index'));
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
