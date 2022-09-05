<?php

namespace App\Http\Controllers\API;


use App\Http\Requests\CreateTermsRequest;
use App\Http\Requests\CreateFavoriteRequest;
use App\Models\Cart;
use App\Repositories\TermsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Support\Facades\Response;
use Prettus\Repository\Exceptions\RepositoryException;
use Flash;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class CartController
 * @package App\Http\Controllers\API
 */

class TermsAPIController extends Controller
{
    /** @var  TermsRepository */
    private $termsRepository;

    public function __construct(TermsRepository $termsRepo)
    {
        $this->TermsRepository = $termsRepo;
    }

    /**
     * Display a listing of the Cart.
     * GET|HEAD /carts
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try{
            $this->termsRepository->pushCriteria(new RequestCriteria($request));
            $this->termsRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $terms = $this->termsRepository->all();

        return $this->sendResponse($terms->toArray(), 'Terms retrieved successfully');
    }

    /**
     * Display a listing of the Cart.
     * GET|HEAD /carts
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function count(Request $request)
    {
        try{
            $this->termsRepository->pushCriteria(new RequestCriteria($request));
            $this->termsRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $count = $this->termsRepository->count();

        return $this->sendResponse($count, 'Terms retrieved successfully');
    }

    /**
     * Display the specified Cart.
     * GET|HEAD /carts/{id}
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        /** @var Cart $about */
        if (!empty($this->termsRepository)) {
            $terms = $this->termsRepository->findWithoutFail($id);
        }

        if (empty($about)) {
            return $this->sendError('Terms not found');
        }

        return $this->sendResponse($cart->toArray(), 'Terms retrieved successfully');
    }
    /**
     * Store a newly created Cart in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        try {
            if(isset($input['reset']) && $input['reset'] == '1'){
                // delete all items in the cart of current user
                $this->termsRepository->deleteWhere(['user_id'=> $input['user_id']]);
            }
            $terms = $this->termsRepository->create($input);
        } catch (ValidatorException $e) {
            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($about->toArray(), __('lang.saved_successfully',['operator' => __('lang.cart')]));
    }

    /**
     * Update the specified Cart in storage.
     *
     * @param int $id
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $terms = $this->termsRepository->findWithoutFail($id);

        if (empty($cart)) {
            return $this->sendError('Cart not found');
        }
        $input = $request->all();

        try {
//            $input['extras'] = isset($input['extras']) ? $input['extras'] : [];
            $terms = $this->termsRepository->update($input, $id);

        } catch (ValidatorException $e) {
            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($terms->toArray(), __('lang.saved_successfully',['operator' => __('lang.cart')]));
    }

    /**
     * Remove the specified Favorite from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $terms = $this->termsRepository->findWithoutFail($id);

        if (empty($terms)) {
            return $this->sendError('Cart not found');

        }

        $terms = $this->termsRepository->delete($id);

        return $this->sendResponse($terms, __('lang.deleted_successfully',['operator' => __('lang.cart')]));

    }

}
