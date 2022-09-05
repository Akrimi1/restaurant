<?php
/**
 * File name: RestaurantReviewController.php
 * Last modified: 2020.05.04 at 09:04:19
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

namespace App\Http\Controllers;

use App\Criteria\RestaurantReviews\RestaurantReviewsOfUserCriteria;
use App\DataTables\RestaurantReviewDataTable;
use App\Repositories\CustomFieldRepository;
use App\Repositories\FoodRestaurantReviewRepository;
use App\Repositories\RestaurantRepository;
use App\Repositories\UserRepository;
use Flash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

use Illuminate\Http\Request;
use Auth;
class FoodRestaurantReviewController extends Controller
{
    /** @var  RestaurantReviewRepository */
    private $foodRestaurantReviewRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var RestaurantRepository
     */
    private $restaurantRepository;

    public function __construct(FoodRestaurantReviewRepository $foodRestaurantReviewRepo, CustomFieldRepository $customFieldRepo, UserRepository $userRepo
        , RestaurantRepository $restaurantRepo)
    {
        parent::__construct();
        $this->foodRestaurantReviewRepository = $foodRestaurantReviewRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->userRepository = $userRepo;
        $this->restaurantRepository = $restaurantRepo;
    }

    /**
     * Display a listing of the RestaurantReview.
     *
     * @param RestaurantReviewDataTable $restaurantReviewDataTable
     * @return Response
     */
    public function index(RestaurantReviewDataTable $restaurantReviewDataTable)
    {
        $user_id = Auth::user()->id;
 $reviews = $this->foodRestaurantReviewRepository->where('restaurant_id',$user_id)->get();
  $reviews = json_decode( json_encode($reviews), true);
        return $restaurantReviewDataTable->render('foodrestaurant_reviews.index')->with("reviews", $reviews);
    }

 

}
