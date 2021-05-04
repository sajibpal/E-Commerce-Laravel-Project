<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();
class ProductController extends Controller
{
    //

     public function AddProduct(){

    	return view("admin.add_product");
    }

      public function SaveProduct(Request $request){

    	   $data=array();
	       $data['product_name']=$request->Product_name;
	       $data['category_id']=$request->Product_Category_id;
	       $data['brand_id']=$request->Brand_Category_id;
	       $data['product_short_description']=strip_tags($request->Product_Short_description);
	       $data['product_long_description']=strip_tags($request->Product_Long_description);
	       $data['product_price']=$request->Product_price;
	       $data['product_size']=$request->Product_size;
	       $data['product_color']=$request->Product_color;
	       $data['publication_status']=$request->Publication_status; 


	        $validatedData = $request->validate([
                 'Image' =>  'required|mimes:jpeg,png,jpg,bmp,svg|max:2048',
                ]);
	       
	        $image=$request->file('Image'); 

	        $imagenameurl = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath ='public/imagefile/';
	        $image->move($destinationPath, $imagenameurl);
	        $data['product_image']=$destinationPath.$imagenameurl;

	       DB::table('products')->insert($data);

           Session::put('messege','  Data add successfully');
              //return Redirect::to('/add_category');

              return view("admin.add_product");
    }


     public function AllProduct(){

    	
           $data=DB::table('products')
                    ->join('brands','products.brand_id','=','brands.id')
                    ->join('categorys','products.category_id','=','categorys.id')	
                    ->get();

	       return view('admin.all_product',compact('data')); 

    }

   public function DeleteProduct($id){


              DB::table('products')->where('product_id',$id)->delete();
              Session::put('message','  Data Delete successfully');
              
            return Redirect::to('/all_product');
      }

}

