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
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2 style="width:150px"><i class="halflings-icon edit"></i><span class="break"></span>Add Category   </h2>

					<p class="alert-success">
	                  <?php
	                 
	                   $messege=Session::get('messege');

	                   if($messege){
	                       echo  $messege; 
	                       Session::put('messege',null);

	                       }
	                     ?>
	                 </p>
						
					</div>
					<div class="box-content">
						<form  method="post" action="{{url('/save_product')}}"  class="form-horizontal" enctype="multipart/form-data">

							{{ csrf_field() }}

						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="date01">Product name</label>
							  <div class="controls">
								<input type="text"  class="input-xlarge" name="Product_name" id="">
							  </div>
							</div>
							<div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
								  <select id="selectError3"  name="Product_Category_id">
									<option>Select Category</option>

									  <?php 

			                             $data=DB::table('categorys')
			                             ->where('category_status',1)
			                             ->get();
			                         
			                         foreach ( $data as $value) { ?>
			                           
			                           <option value="{{$value->id}}">{{$value->category_name}}</option>
			                           
			                         <?php }
			                        ?>
								  </select>
								</div>
							 </div>
							 <div class="control-group">
								<label class="control-label" for="selectError3">Brand Category</label>
								<div class="controls">
								  <select id="selectError3" name="Brand_Category_id">
									<option>Select Brand</option>
									   <?php 

			                             $dataitem=DB::table('brands')
			                             ->where('brand_status',1)
			                             ->get();
			                         
			                         foreach ( $dataitem as $values) { ?>
			                           
			                           <option value="{{$values->id}}">{{$values->brand_name}}</option>
			                           
			                         <?php }
			                        ?>
								  </select>
								</div>
							 </div>
                             <div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<input class="input-file  uniform_on" required="" name="Image" id="fileInput" type="file">
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Description</label>
							  <div class="controls">
								<textarea class="cleditor"  name="Product_Short_description" id="textarea2" rows="3"></textarea>
							  </div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea class="cleditor"  name="Product_Long_description" id="textarea2" rows="3"></textarea>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" required="" class="input-xlarge" name="Product_price" id="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label"  for="date01">Product Size</label>
							  <div class="controls">
								<input type="text"  required="" class="input-xlarge" name="Product_size" id="">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Product Color</label>
							  <div class="controls">
								<input type="text" required="" class="input-xlarge" name="Product_color" id="">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="exampleCheck1">Publication Status</label>
							  <div class="controls">
								<input type="checkbox" class="form-check-input" name="Publication_status" id="" value="1">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							 
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection()
