<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class Category extends Controller
{
    //
    public function AddCategory(){

    	return view("admin.add_category");
    }

     public function AllCategory(){

    	
         $data=DB::table('categorys')->get();
	        return view('admin.all_category',compact('data')); 

    }

     public function SaveCategory(Request $request){

    	   $data=array();
	       $data['category_name']=$request->Category_name;
	       $data['category_descption']=strip_tags($request->Category_details);
	       $data['category_status']=$request->Publication_status;

	          DB::table('categorys')->insert($data);

              Session::put('messege','  Data add successfully');
              return Redirect::to('/add_category');
    }


     
     public function EditCategory($id){


            $data= DB::table('categorys')->where('id',$id)->first();
            return view('admin.edit_category',compact('data')); 
     }

     public function UpdateCategory(Request $request,$id){

         $data=array();
         $data['category_name']=$request->Category_name;
         $data['category_descption']=strip_tags($request->Category_details);
         $data['category_status']=$request->Publication_status;

         DB::table('categorys')->where('id',$id)->update($data);

         Session::put('messag','  Data Update successfully');
         return Redirect::to('/all_category');
    }


     public function DeleteCategory($id){


              DB::table('categorys')->where('id',$id)->delete();
              Session::put('messag','  Data Delete successfully');
              
              return Redirect::to('/all_category');
       }

    public function ActiveCategory($id){


              DB::table('categorys')->where('id',$id)->update(['category_status'=>1]);
              Session::put('messag','  Data Active successfully');
              
              return Redirect::to('/all_category');
   }

   public function DeactiveCategory($id){


              DB::table('categorys')->where('id',$id)->update(['category_status'=>0]);
              Session::put('messag','  Data Deactive successfully');
              
              return Redirect::to('/all_category');
       }

     
  } 
