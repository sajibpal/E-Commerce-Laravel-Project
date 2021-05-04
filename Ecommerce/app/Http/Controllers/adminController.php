<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class adminController extends Controller
{



	public function Adminlogin(){

		if(Session::get('admin_name')){

		  return view ("admin.dashboard");

		}
		else{
              
	        return view("admin.login");
          
		}

	}       
	public function Adminlogout(){


         Session::put('admin_name',null);
         Session::put('admin_id',null);
        return Redirect::to('/');
	}

  public function Adminprofileupdate(Request $request){


          $validatedData = $request->validate([
                'password' => 'required|min:6',
                'mobile' => 'required|min:11',

               ]);

         $data=array();
	       $data['name']=$request->name;
	       $data['mobile']=$request->mobile;
	       $data['password']=$request->password;


	       $checkmessage=DB::table('admins')->where('id',Session::get('admin_id'))->update($data);

	        Session::put('admin_name',$request->name);

           return Redirect::to('/deshbord');

	}

	public function Adminprofile(){


         return view("admin.admin_profile");

	}

	public function Showdeshboard(Request $request){

		
		$admin_mail=$request->email;
		$admin_password=$request->password;
        
        $result=DB::table('admins')
                    ->where('email',$admin_mail)
                    ->where('password',$admin_password)
                    ->first();

              if($result) {
                 
                 Session::put('admin_name',$result->name);
                 Session::put('admin_id',$result->id);
                 Session::put('admin_email',$result->email);
                 Session::put('admin_mobile',$result->mobile);
                 return Redirect::to('/login');

              } else{

                 Session::put('messege','Email or password no valid');
                  return Redirect::to('/login');

              }    
     	}


   
	
    public function SearchItem(Request $request)
    {
          
          $search=$request->get('Product_name');
          $category=$request->get('Category_name');
          $brand=$request->get('Brand_name');

             $item=DB::table('products')
            ->join('brands','products.brand_id','=','brands.id')
            ->join('categorys','products.category_id','=','categorys.id')
            ->where('products.product_name','LIKE', '%'.$search.'%')
            ->orWhere('categorys.category_name','=',$category)
            ->orWhere('brands.brand_name','=',$brand)
             ->select('products.product_name','categorys.category_name','brands.brand_name')
            ->get();
            ;

         return view('admin.search_data',compact('item'));
       }
     
   

       public function SearchShow()
           {

             $item=DB::table('products')
                    ->join('brands','products.brand_id','=','brands.id')
                    ->join('categorys','products.category_id','=','categorys.id')
                    ->select('products.product_name','categorys.category_name','brands.brand_name')
                    ->get();

            return view('admin.search_data',compact('item')); 

 
        
         }
   
   
}
