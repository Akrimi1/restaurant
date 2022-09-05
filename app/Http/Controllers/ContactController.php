<?php

namespace App\Http\Controllers;

use App\Criteria\Coupons\CouponsOfManagerCriteria;
use App\Criteria\Coupons\CouponsOfUserCriteria;
use App\Criteria\Foods\FoodsOfUserCriteria;
use App\Criteria\Restaurants\ActiveCriteria;
use App\Criteria\Restaurants\RestaurantsOfUserCriteria;
use App\DataTables\CouponDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateContactRequest;

use App\Repositories\ContactRepository;
use App\Repositories\CustomFieldRepository;
use App\Repositories\DiscountableRepository;
use App\Repositories\FoodRepository;
use App\Repositories\RestaurantRepository;
use App\Repositories\CategoryRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;
use Auth;
class ContactController extends Controller
{
    /** @var  CouponRepository */
    private $contactRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var FoodRepository
     */
    private $foodRepository;
    /**
     * @var RestaurantRepository
     */
    private $restaurantRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var DiscountableRepository
     */
    private $discountableRepository;

    public function __construct(ContactRepository $contactRepo, CustomFieldRepository $customFieldRepo, FoodRepository $foodRepo
        , RestaurantRepository $restaurantRepo
        , CategoryRepository $categoryRepo , DiscountableRepository $discountableRepository)
    {
        parent::__construct();
        $this->contactRepository = $contactRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->foodRepository = $foodRepo;
        $this->restaurantRepository = $restaurantRepo;
        $this->categoryRepository = $categoryRepo;
        $this->discountableRepository = $discountableRepository;
    }

    /**
     * Display a listing of the Coupon.
     *
     * @param CouponDataTable $couponDataTable
     * @return Response
     */
    public function index(CouponDataTable $couponDataTable)
    {
        return $couponDataTable->render('contact.index');
    }

    /**
     * Show the form for creating a new Contact.
     *
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function create()
    {
        $hasCustomField = in_array($this->contactRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->contactRepository->model());
            $html = generateCustomField($customFields);
        }
        print_r($html);
        die;
        return view('contact.index')->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Store a newly created Contact in storage.
     *
     * @param CreateContactRequest $request
     *
     * @return Response
     */
    public function store(CreateContactRequest $request)
    {
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->contactRepository->model());
        try {
            $contact = $this->contactRepository->create($input);
            $contact->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));

        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('Support Ticket Created Succesfully. We Will Revert You Within 24-48 Hours'));

        return view('contact.index');
    }
    public function show(CouponDataTable $couponDataTable)
    {
          $user_id = Auth::user()->id;
 $contact = $this->contactRepository->where('restaurant_id',$user_id)->where('role_id','4')->get();
  $contact = json_decode( json_encode($contact), true);
        return $couponDataTable->render('contact.show')->with("contact", $contact);

    }
      public function showManager(CouponDataTable $couponDataTable)
    {
          $user_id = Auth::user()->id;
 $contact = $this->contactRepository->where('manager_id',$user_id)->where('role_id','3')->get();
  $contact = json_decode( json_encode($contact), true);
        return $couponDataTable->render('contact.showManager')->with("contact", $contact);

    }
}
