<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();
use Cart;

class CardController extends Controller
{
      public function AddCard(Request $request){
              
             $quenty=$request->quenty; 
             $product_id=$request->product_id;
           
             $productsdetail= DB::table('products')
              ->where('product_id',$product_id)
              ->first();

               $data['qty']=$quenty;
               $data['id']=$productsdetail->product_id;
               $data['name']=$productsdetail->product_name;
               $data['price']=$productsdetail->product_price;
               $data['options']['image']=$productsdetail->product_image;
              
              Cart::add($data);

              return Redirect::to('/show_card');
       
        }

         public function ShowCard(){
              
          
              return view('card_show');
       
        }

         public function DeleteCard($card_id){
              
            
              Cart::update($card_id,0);
              return Redirect::to('/show_card');
       
        }

         public function UpdateCard(Request $request){
              
             $quenty=$request->quantity; 
             $id=$request->rowid;

              Cart::update( $id,$quenty);
              return Redirect::to('/show_card');
       
        }

}
