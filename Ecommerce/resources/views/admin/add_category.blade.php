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
						<form  method="post" action="{{url('/save_category')}}"  class="form-horizontal">

							{{ csrf_field() }}

						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Category name</label>
							  <div class="controls">
								<input type="text" required="" class="input-xlarge" name="Category_name" id="">
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Category Details</label>
							  <div class="controls">
								<textarea class="cleditor" required="" name="Category_details" id="textarea2" rows="3"></textarea>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="exampleCheck1">Publication Status</label>
							  <div class="controls">
								<input type="checkbox" class="form-check-input" name="Publication_status" id="" value="1">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Category</button>
							 
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection()
