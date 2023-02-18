@extends('backend.layout.template')

@section('body')

<div class="br-pagetitle">
	<i class="icon ion-ios-home-outline"></i>
	<div>
	  <h4>Edit Existing Brand</h4>
	  <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
	</div>
</div>
<div class="br-pagebody">
	<div class="row row-sm">
	  <div class="col-sm-6 col-xl-12 col-md-12">
	  		<!-- body content start-->
	  	<div class="card bd-0 shadow-base">
	      <div class="d-md-flex justify-content-between pd-25">
	        <div>
	          <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Update Brand Information</h6>
	        </div>
	      </div><!-- d-flex -->

	      <div class="pd-l-25 pd-r-15 pd-b-25">
	        <div class="bd rounded table-responsive">
	        	<form action="{{ route('brand.update', $brand->id ) }}" method="POST" enctype="multipart/form-data" class="p-5">
	        		<!-- this is the security token and no one can embad this with iframe tag -->
	        		@csrf
	        		<div class="form-group">
	        			<label>Brand Name</label>
	        			<input type="text" name="name" class="form-control" placeholder="Brand Name" value="{{ $brand->name }}">
	        		</div>
	        		<div class="form-group">
	        			<label>Brand Description</label>
	        			<textarea type="text" name="description" class="form-control" placeholder="Brand Description" value="{{ $brand->description }}">{{ $brand->description }}</textarea>
	        		</div>
	        		<div class="form-group">
	        			<label>Is Featured</label>
	        			<select name="is_featured" class="form-control">
	        				<option value="1" @if($brand->is_featured == 1)selected @endif >Yes Featured</option>
	        				<option value="2" @if($brand->is_featured == 2)selected @endif >Not Featured</option>
	        			</select>
	        		</div>
	        		<div class="form-group">
	        			<label>Status</label>
	        			<select name="status" class="form-control">
	        				<option value="1" @if($brand->status == 1)selected @endif>Active</option>
	        				<option value="2" @if($brand->status == 2)selected @endif>InActive</option>
	        			</select>
	        		</div>
	        		<div class="form-group">
	        			<label>Brand Image</label> <br>
	        			@if( !is_null($brand->image) )
					      		<img src="{{ asset('Backend/img/brand') }}/{{ $brand->image }}" width="100">
				      	@else
				      		No Thumbnail
				      	@endif
	        			<input type="file" class="form-control" name="image">
	        		</div>
	        		<div class="form-group">
	        			<input type="submit" class="btn btn-md btn-success" name="UpdateBrand" value="Save Changes">
	        		</div>

	        	</form>
	        </div>
	      </div>
	    </div>
	  		<!-- body content end-->
	  </div>
	</div>
</div>

@endsection