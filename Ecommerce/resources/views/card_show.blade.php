@extends('category_brand_show_home')
@section('contain') 

   <section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">

				<?php
				 $content=Cart::content();
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td class="total">Action</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					   @foreach($content as $v_rowcontent) 
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ URL::to( $v_rowcontent->options->image) }}" style=" height:60px; width:60px;" alt=""></a>
							</td>
							<td class="cart_description">
								<h5><a href="">{{( $v_rowcontent->name)}}</a></h5>
								
							</td>
							<td class="cart_price">
								<p>{{( $v_rowcontent->price)}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{url('/update_card')}}" method="post">
                                         {{ csrf_field() }}
									<input class="cart_quantity_input" type="text" name="quantity" value="{{( $v_rowcontent->qty)}}" autocomplete="off" size="2">
									<input  type="hidden" name="rowid" value="{{( $v_rowcontent->rowId)}}">
									 <input type="submit" name="submit" value="Update" class="btn btn-sm-btn-default">
								  </form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{($v_rowcontent->total)}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{url('/delete_cart/'.$v_rowcontent->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				
				<div class="col-sm-8">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
							<li>Eco Tax <span>{{Cart::tax()}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::total()}}</span></li>
						</ul>
							 <a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="{{url('/login_check')}}">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection