@extends('category_brand_show_home')
@section('contain') 
	
	<section id="cart_items">
		<div class="container">			
			<div class="register-req">
				<p>Fill Up ---------</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form>
									<input type="text" placeholder="Company Name">
									<input type="text" placeholder="Email*">
									<input type="text" placeholder="Title">
									<input type="text" placeholder="First Name *">
									<input type="text" placeholder="Middle Name">
									<input type="text" placeholder="Last Name *">
									<input type="text" placeholder="Address 1 *">
									<input type="text" placeholder="Address 2">
									<input type="submit" class="btn btn-default" name="" value="Submit">
								</form>
							</div>
						</div>
					</div>
								
				</div>
			</div>	
		</div>
	</section> <!--/#cart_items-->
		
@endsection('contain') 		