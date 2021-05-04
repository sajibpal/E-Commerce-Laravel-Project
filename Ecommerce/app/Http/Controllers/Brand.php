<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class Brand extends Controller
{
    //

      public function Allbrand(){

    	
           $data=DB::table('brands')->get();

	       return view('admin.all_brand',compact('data')); 

      }


     public function Addbrand(){

    	return view("admin.add_brand");
     }

      public function Savebrand(Request $request){

    	   $data=array();
	       $data['brand_name']=$request->brand_name;
	       $data['brand_descption']=strip_tags($request->brand_details);
	       $data['brand_status']=$request->brand_status;

	          DB::table('brands')->insert($data);

              Session::put('messege','  Data add successfully');
              return Redirect::to('/all_brand');
          }

          public function ActiveBrand($id){


              DB::table('brands')->where('id',$id)->update(['brand_status'=>1]);
              Session::put('messag','  Data Deactive successfully');
              
              return Redirect::to('/all_brand');
           }

        public function DeactiveBrand($id){


              DB::table('brands')->where('id',$id)->update(['brand_status'=>0]);
              Session::put('messag','  Data Deactive successfully');
              
              return Redirect::to('/all_brand');
        }


          public function DeleteBrand($id){


              DB::table('brands')->where('id',$id)->delete();
              Session::put('messag','  Data Delete successfully');
              
              return Redirect::to('/all_brand');
        }


        public function EditBrand($id){


            $data= DB::table('brands')->where('id',$id)->first();
            return view('admin.edit_brand',compact('data')); 
         }


      public function UpdateBrand(Request $request,$id){

         $data=array();
         $data['brand_name']=$request->brand_name;
         $data['brand_descption']=strip_tags($request->brand_details);
         $data['brand_status']=$request->brand_status;

         DB::table('brands')->where('id',$id)->update($data);

         Session::put('messag','  Data Update successfully');
         return Redirect::to('/all_brand');
    }


}
