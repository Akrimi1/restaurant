<?php
/**
 * File name: Cart.php
 * Last modified: 2020.06.11 at 16:10:52
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 */




namespace App;
//use Eloquent as Model;
use DB;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 * @package App\Models
 * @version September 4, 2019, 3:38 pm UTC
 *
 * @property \App\Models\Food food
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection extras
 * @property integer food_id
 * @property integer user_id
 * @property integer quantity
 */
 
 
 
 
class Product extends Model
{
	protected $table='product';
	
	public function  abc()
	{
		echo "deepak"; die;
	}

	protected $fillable = [
    'name', 
    'company', 
    'amount', 
    'available',
    'description'

];
}
