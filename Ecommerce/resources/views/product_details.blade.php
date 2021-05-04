@extends('category_brand_show_home')
@section('contain') 
             
                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{URL::to($productitem->product_image)}}" alt="" />
                                 
                            </div>
                           
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                               <img src="{{asset('fontend/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                                <h2>{{($productitem->product_name)}}</h2>
                                <p>Color:{{($productitem->product_color)}}</p>
                                 <img src="{{asset('fontend/images/product-details/rating.png')}}" alt="" />
                                <span>
                                    <span>{{($productitem->product_name)}}</span>
                                    <form action="{{url('/add_card')}}" method="post">
                                         {{ csrf_field() }}
                                        <label>Quantity:</label>
                                        <input type="text" name="quenty" value="1" />
                                        <input type="hidden" value="{{($productitem->product_id)}}" name="product_id">
                                        <button type="Submit" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </button>
                                    </form>
                                </span>
                                <p><b>Brand:{{($productitem->brand_name)}}</b> In Stock</p>
                                <p><b>Category:{{($productitem->category_name)}}</b> New</p>
                                <p><b>Size:{{($productitem->product_size)}}</b> E-SHOPPER</p>
                                <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details--> 

              <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li><a href="#details" data-toggle="tab">Details</a></li>
                                <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                                <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="details" >
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <p>{{($productitem->product_long_description)}}</p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="companyprofile" > 
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery4.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
            
                            
                            <div class="tab-pane fade active in" id="reviews" >
                                <div class="col-sm-12">
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i>BD</a></li>
                                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i>31 MAY 2021</a></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    <p><b>Write Your Review</b></p>
                                    
                                    <form action="#">
                                        <span>
                                            <input type="text" placeholder="Your Name"/>
                                            <input type="email" placeholder="Email Address"/>
                                        </span>
                                        <textarea name="" ></textarea>
                                        <b>Rating: </b> <img src="{{asset('fontend/images/product-details/rating.png')}}" alt="" />
                                        <button type="button" class="btn btn-default pull-right">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div><!--/category-tab-->             
             
@endsection