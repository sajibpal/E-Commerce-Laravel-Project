@extends('welcome')
@section('contain') 
               <!--features_items-->
                 <h2 class="title text-center">Features Items</h2>

                  <?php
                    foreach ( $productitem as $product_value) { ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to($product_value->product_image) }}" style=" height: 180px; width: 170px;"></td>
                                            <h2>{{$product_value->product_price}}(TK)</h2>                <p>{{$product_value->product_name}}</p>
                                            <a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{$product_value->product_price}}(TK)</h2>
                                                <p>{{$product_value->product_name}}</p>
                                                <a href="{{URL::to('/product_details/'.$product_value->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>{{$product_value->brand_name}}</a></li>
                                        <li><a href="{{URL::to('/product_details/'.$product_value->product_id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    <?php }
                      ?>    
                    </div><!--features_items-->
                    
                    <div class="category-tab"><!--category-tab-->

                       
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
                                <li><a href="#kids" data-toggle="tab">Kids</a></li>
                                <li><a href="#poloshirt" data-toggle="tab">Polo Shirt</a></li>
                            </ul>
                        </div>
                          <?php

                            $productitem=DB::table('products')
                                ->join('brands','products.brand_id','=','brands.id')
                                ->join('categorys','products.category_id','=','categorys.id')
                                ->where('products.product_name','LIKE', '%'.'T-Shirt'.'%')
                                ->select('products.*','categorys.category_name','brands.brand_name')
                                ->where('products.publication_status',1)
                                ->limit(4) 
                                ->get();
                             ?>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tshirt" >
                                @foreach ( $productitem as $product_value)

                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{URL::to($product_value->product_image) }}" style="height: 150px; width: 150px;" alt="" />
                                                    <h4>{{$product_value->product_price}}Tk</h4>
                                                    <p>{{$product_value->product_name}}</p>
                                                    <a href="{{URL::to('/product_details/'.$product_value->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 @endforeach 
                               </div>
                               
                              <?php
                            $babyitem=DB::table('products')
                                ->join('brands','products.brand_id','=','brands.id')
                                ->join('categorys','products.category_id','=','categorys.id')
                                ->where('products.product_name','LIKE', '%'.'Baby'.'%')
                                ->select('products.*','categorys.category_name','brands.brand_name')
                                ->where('products.publication_status',1)
                                ->limit(4) 
                                ->get();
                             ?>  
                            
                            <div class="tab-pane fade" id="kids" >
                                 @foreach ($babyitem as $product_value)

                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{URL::to($product_value->product_image) }}"  style="height: 150px; width: 150px;" alt="" />
                                                    <h4>{{$product_value->product_price}}Tk</h4>
                                                    <p>{{$product_value->product_name}}</p>
                                                    <a href="{{URL::to('/product_details/'.$product_value->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                 </div>
                                 @endforeach 
                            </div>
                            
                          <?php
                             $shirtitem=DB::table('products')
                                ->join('brands','products.brand_id','=','brands.id')
                                ->join('categorys','products.category_id','=','categorys.id')
                                ->where('products.product_name','LIKE', '%'.'Shirt'.'%')
                                ->select('products.*','categorys.category_name','brands.brand_name')
                                ->where('products.publication_status',1)
                                ->limit(4) 
                                ->get();
                             ?>  
                                
                            <div class="tab-pane fade" id="poloshirt" >
                                @foreach ($shirtitem as $product_value)
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{URL::to($product_value->product_image) }}"  style="height: 150px; width: 150px;" alt="" />
                                                    <h4>{{$product_value->product_price}}Tk</h4>
                                                    <p>{{$product_value->product_name}}</p>
                                                    <a href="{{URL::to('/product_details/'.$product_value->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div><!--/category-tab-->

@endsection