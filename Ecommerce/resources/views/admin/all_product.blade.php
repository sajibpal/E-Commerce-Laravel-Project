@extends('admin.dashboard_layout')

@section('dashcontent')

        <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Brand</h2>
						  
					   <p class="alert-success">
		                  <?php
		                 
		                   $messege=Session::get('messag');

		                   if($messege){
		                       echo  $messege; 
		                       Session::put('messag',null);

		                       }
	                     ?>
	                 </p>

					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Product Id</th>
								  <th>Product Name</th>
								  <th>Product Image</th>
								  <th>Product Price</th>
								  <th>Category Name</th>
								  <th>Brand Name</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>

						  	@foreach($data as $row) 

							<tr>
								<td>{{$row->product_id}}</td>
								<td class="center">{{$row->product_name}}</td>
								<td class="center"><img src="{{ URL::to( $row->product_image) }}" style=" height: 60px; width: 80px;"></td>
								<td class="center">{{$row->product_price}}(TK)</td>
								<td class="center">{{$row->category_name}}</td>
								<td>{{$row->brand_name}}</td>
								<td class="center">
									@if($row->publication_status==1)
									  <span class="label label-success">Active</span>
                                    @else
                                       <span class="label label-danger">Unactive</span>
                                    @endif   
								</td>

								<td class="center">
									@if($row->publication_status==1)
										<a class="btn btn-danger" href="#">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									@else  
									    <a class="btn btn-success" href="#">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
                                     @endif

									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/product_delete/'.$row->product_id)}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							
						 @endforeach

						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection()
