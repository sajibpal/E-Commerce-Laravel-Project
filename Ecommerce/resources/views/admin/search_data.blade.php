@extends('admin.dashboard_layout')

@section('dashcontent')

             <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>
			
			
				<form  method="post"  action="{{url('/search_item')}}"  class="form-horizontal">
                        {{ csrf_field() }}

						  <fieldset >
							
							 <div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="Product_name" id="">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Category name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="Category_name" id="">
							  </div>
							</div>

                             <div class="control-group">
							  <label class="control-label" for="date01">Barand name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="Brand_name" id="">
							  </div>
							</div>
							 <div class="control-group">
							   <label class="control-label" for="date01">  </label>
							 	 <div class="controls">
								  <button type="submit" class="btn btn-primary">Search</button>
								 <div>
							  </div>
						  </fieldset>
						</form> 

                      <div class="box-content">
						<table class="table table-striped table-bordered ">
						  <thead>
							  <tr>
								  <th>Product name</th>
								  <th>Category name</th>
								  <th>brand name</th>
								 
							  </tr>
						  </thead>   
						  <tbody>

						  	@foreach($item as $row)
							<tr>
								<td>{{$row->product_name}}</td>
								<td class="center">{{$row->category_name}} </td>
								<td class="center">{{$row->brand_name}}</td>
								
							</tr>
							@endforeach
						  </tbody>
						  
					  </table>
			 
    </div>
                
@endsection()
