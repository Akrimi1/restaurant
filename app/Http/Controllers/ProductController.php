<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  App\Product;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;


//use DB;

//use App\Http\Controllers\Product;
//use App\Product;


class ProductController extends Controller
{
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
            // 'name' => 'required|unique:product',
            // 'amount' => 'required|numeric',
			// 'image' => 'required',
            // 'company' => 'required',
            // 'available' => 'required',
            // 'description' => 'required'
        // ]);
		
	$data = $request->all();
	print_r($data);die;

    if($file = $request->file('image')){

        $name = $file->getClientOriginalName();
        $file->move('images', $name);
        $data['image'] = $name;

    }

    Product::create($data);

     // Product::create([
        // 'name' =>$request->name,
        // 'company' => $request->company,
		// 'image' => $request->image,
        // 'amount' => $request->amount,
        // 'available' => $request->available,
        // 'description' => $request->description
        // ]);
    
        return view('restaurants/products');

    }
	
	public function storeProduct(Request $request){
		
		 DB::table('products')->insert(
                  [
					  'name' => $request->name,
					  'company' => $request->company,
                      'amount' => $request->amount,
                      'available' => $request->available,
					  'description' => $request->description
					  
				  ]
                  );
					
		 return view('restaurants/products');
		 //return back();
		
	}
}
