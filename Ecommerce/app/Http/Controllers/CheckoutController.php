<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class CheckoutController extends Controller
{
      public function LoginShow(){
              
           
          return view('/account_login');
       
        }

      public function SignUp(Request $request){
              
           
           $data=array();
	       $data['name']=$request->name;
	       $data['email']=$request->email;
	       $data['password']=$request->password;

	          $coustomerid=DB::table('posts')->insertGetId($data);
               
                if ($coustomerid){

                	 Session::put('customer_id',$coustomerid);
                     Session::put('customer_name',$request->email);
                     return view('checkout');
                     
                  }
                else{

                    return view('/account_login');
                }
	            
       
          }

       public function SignIn(Request $request){
              
           
             $user_mail=$request->email;
		     $user_password=$request->password;
        
             $result=DB::table('posts')
                    ->where('email',$user_mail)
                    ->where('password',$user_password)
                    ->first();
                
                if ($result){

                	return view('checkout');
                  }    
             
                else{

                    return view('/account_login');
                }
          }
             
}
