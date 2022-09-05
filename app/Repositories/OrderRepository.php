<?php

namespace App\Repositories;

use App\Models\Order;
use InfyOm\Generator\Common\BaseRepository;
use DB;

/**
 * Class OrderRepository
 * @package App\Repositories
 * @version August 31, 2019, 11:11 am UTC
 *
 * @method Order findWithoutFail($id, $columns = ['*'])
 * @method Order find($id, $columns = ['*'])
 * @method Order first($columns = ['*'])
*/
class OrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'order_status_id',
        'tax',
        'hint',
        'delivery_time',
        'payment_id',
        'delivery_address_id',
        'active',
        'driver_id',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        
        //   $restaurant_id = DB::table('orders')->pluck('restaurant_id');
        //   $restaurant_id = json_decode( json_encode($restaurant_id), true);
        
           
        //   print_r($restaurant_id);  die;
         
//   $aaa =   DB::table("quotes")->insert(["quote_no"=>$quote_no,"user_id"=>$user_id,"freelancer_id"=>$freelancer_id,"status"=>$status]);
        
        
        return Order::class;
    }
}
