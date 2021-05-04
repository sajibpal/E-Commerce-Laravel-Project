<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class homecontroller extends Controller
{
    
   public function Home(){

     $productitem=DB::table('products')
                    ->join('brands','products.brand_id','=','brands.id')
                    ->join('categorys','products.category_id','=','categorys.id')
                    ->select('products.*','categorys.category_name','brands.brand_name')
                    ->where('products.publication_status',1)
                    ->limit(12)	
                    ->get();

	       return view('home',compact('productitem')); 

	}

     public function CategoryByProduct($id){


        $product=DB::table('products')
                    ->join('categorys','products.category_id','=','categorys.id')
                    ->select('products.*','categorys.category_name')
                     ->where('categorys.id',$id)
                    ->where('products.publication_status',1)
                    ->limit(18)  
                    ->get();

           return view('category_by_product_show',compact('product')); 

    }

    public function BrandByProduct($brand_id){

        $product_brand=DB::table('products')
                    ->join('brands','products.brand_id','=','brands.id')
                    ->where('brands.id',$brand_id)
                    ->select('products.*','brands.brand_name')
                    ->where('products.publication_status',1)
                    ->limit(18)  
                    ->get();

           return view('brand_by_product',compact('product_brand')); 

    }
  public function ProductDetails($product_id){

     $productitem=DB::table('products')
                    ->join('brands','products.brand_id','=','brands.id')
                    ->join('categorys','products.category_id','=','categorys.id')
                    ->select('products.*','categorys.category_name','brands.brand_name')
                    ->where('products.product_id',$product_id)
                    ->where('products.publication_status',1)
                    ->first();

           return view('product_details',compact('productitem')); 

    }
    
    

}
