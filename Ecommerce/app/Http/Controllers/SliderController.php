<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class SliderController extends Controller
{
    
    public function AddSlider(){


         return view("admin.add_slider");

	}

	  public function SaveSlider(Request $request){

    	   $data=array();
	       $data['publication_status']=$request->Publication_status; 


	        $validatedData = $request->validate([
                 'Image' =>  'required|mimes:jpeg,png,jpg,bmp,svg|max:2048',
                ]);
	       
	        $image=$request->file('Image'); 

	        $imagenameurl = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath ='public/imagefile/';
	        $image->move($destinationPath, $imagenameurl);
	        $data['slider_image']=$destinationPath.$imagenameurl;

	       DB::table('sliders')->insert($data);

           Session::put('messege','  Data add successfully');
              //return Redirect::to('/add_category');

              return view("admin.add_slider");
    }

        public function AllSlider(){

    	
           $data=DB::table('sliders')->get();
	        return view('admin.all_slider',compact('data')); 

       }


     public function DeleteSlider($id){


              DB::table('sliders')->where('id',$id)->delete();
              Session::put('messag','  Data Delete successfully');
              
              return Redirect::to('/all_slider');
       }

    public function ActiveSlider($id){


              DB::table('sliders')->where('id',$id)->update(['Publication_status'=>1]);
              Session::put('messag','  Data Active successfully');
              
              return Redirect::to('/all_slider');
   }

   public function DeactiveSlider($id){


              DB::table('sliders')->where('id',$id)->update(['Publication_status'=>0]);
              Session::put('messag','  Data Deactive successfully');
              
              return Redirect::to('/all_slider');
       }


}
