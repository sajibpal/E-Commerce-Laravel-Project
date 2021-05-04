<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\Category;
use App\Http\Controllers\Brand;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CheckoutController;




//home route
Route::get('/',[homecontroller::class,'Home']);
Route::get('/category_by_product/{id}',[homecontroller::class,'CategoryByProduct']);
Route::get('/brand_by_product/{brand_id}',[homecontroller::class,'BrandByProduct']);
Route::get('/product_details/{product_id}',[homecontroller::class,'ProductDetails']);


//admin route
//prevent back press middleware
Route::group(['middleware' => 'prevent-back-history'],function(){

Route::get('/login',[adminController::class,'Adminlogin']);
});
Route::get('/logout',[adminController::class,'Adminlogout']);
Route::get('/profile',[adminController::class,'Adminprofile']);
Route::post('/profileupdate',[adminController::class,'Adminprofileupdate']);
Route::get('/deshbord',[adminController::class,'Adminlogin']);
Route::post('/admin_deshbord',[adminController::class,'Showdeshboard']);
Route::get('/search_show',[adminController::class,'SearchShow']);
Route::post('/search_item',[adminController::class,'SearchItem']);

//category route
Route::get('/all_category',[Category::class,'AllCategory']);
Route::get('/add_category',[Category::class,'AddCategory']);
Route::get('/edit/product/{id}',[Category::class,'EditCategory']);
Route::post('/update_category/{id}',[Category::class,'UpdateCategory']);
Route::get('/deactive/product/{id}',[Category::class,'DeactiveCategory']);
Route::get('/Active/product/{id}',[Category::class,'ActiveCategory']);
Route::get('/delete/product/{id}',[Category::class,'DeleteCategory']);
Route::post('/save_category',[Category::class,'SaveCategory']);


//brand route
Route::get('/all_brand',[Brand::class,'Allbrand']);
Route::get('/add_brand',[Brand::class,'Addbrand']);
Route::post('/save_brand',[Brand::class,'Savebrand']);
Route::get('/brand/deactive/product/{id}',[Brand::class,'DeactiveBrand']);
Route::get('/brand/Active/product/{id}',[Brand::class,'ActiveBrand']);
Route::get('/brand/delete/product/{id}',[Brand::class,'DeleteBrand']);
Route::get('/brand/edit/product/{id}',[Brand::class,'EditBrand']);
Route::post('/update_brand/{id}',[Brand::class,'UpdateBrand']);

//Product route
Route::get('/add_product',[ProductController::class,'AddProduct']);
Route::post('/save_product',[ProductController::class,'SaveProduct']);
Route::get('/all_product',[ProductController::class,'AllProduct']);
Route::get('/product_delete/{id}',[ProductController::class,'DeleteProduct']);


//Slider  Route
Route::get('/add_slider',[SliderController::class,'AddSlider']);
Route::post('/save_slider',[SliderController::class,'SaveSlider']);
Route::get('/all_slider',[SliderController::class,'AllSlider']);
Route::get('/Active/slider/{id}',[SliderController::class,'ActiveSlider']);
Route::get('/Deactive/slider/{id}',[SliderController::class,'DeactiveSlider']);
Route::get('/delete/slider/{id}',[SliderController::class,'DeleteSlider']);


//Card Route
Route::post('/add_card',[CardController::class,'AddCard']);
Route::get('/show_card',[CardController::class,'ShowCard']);
Route::get('/delete_cart/{card_id}',[CardController::class,'DeleteCard']);
Route::post('/update_card',[CardController::class,'UpdateCard']);


//Checkout Route
Route::get('/login_check',[CheckoutController::class,'LoginShow']);
Route::post('/sign_up',[CheckoutController::class,'SignUp']);
Route::post('/sign_in',[CheckoutController::class,'SignIn']);