@extends('backend.layout.template')

@section('body')

<div class="br-pagetitle">
	<i class="icon ion-ios-home-outline"></i>
	<div>
	  <h4>Edit Existing Category</h4>
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
	          <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Update Category Information</h6>
	        </div>
	      </div><!-- d-flex -->

	      <div class="pd-l-25 pd-r-15 pd-b-25">
	        <div class="bd rounded table-responsive">
	        	<form action="{{ route('category.update', $category->id ) }}" method="POST" enctype="multipart/form-data" class="p-5">
	        		<!-- this is the security token and no one can embad this with iframe tag -->
	        		@csrf
	        		<div class="form-group">
	        			<label>Category Name</label>
	        			<input type="text" name="name" class="form-control" placeholder="Category Name" value="{{ $category->name }}">
	        		</div>
	        		<div class="form-group">
	        			<label>Category Description</label>
	        			<textarea type="text" name="description" class="form-control" placeholder="Category Description" value="{{ $category->description }}">{{ $category->description }}</textarea>
	        		</div>
	        		<div class="form-group">
	        			<label>Set/Change the Parent Category</label>

	        			<select name="is_parent" class="form-control">

	        				@foreach(App\Models\Backend\Category::orderby('name','asc')->where('is_parent', 0)->get() as $p_cat)

	        				<option value="{{ $p_cat->id }}" @if($p_cat->id == $category->id) selected @endif>{{$p_cat->name}}</option>
	        					@foreach(App\Models\Backend\Category::orderby('name','asc')->where('is_parent', $p_cat->id)->get() as $c_cat)

		        				<option value="{{ $c_cat->id }}" @if($c_cat->id==$category->id) selected @endif>- {{ $c_cat->name }}</option>

		        				@endforeach
	        				@endforeach

	        			</select>

	        		</div>
	        		<div class="form-group">
	        			<label>Status</label>
	        			<select name="status" class="form-control">
	        				<option value="1" @if($category->status == 1)selected @endif>Active</option>
	        				<option value="2" @if($category->status == 2)selected @endif>InActive</option>
	        			</select>
	        		</div>
	        		<div class="form-group">
	        			<label>Category Image</label> <br>
	        			@if( !is_null($category->image) )
					      		<img src="{{ asset('Backend/img/category') }}/{{ $category->image }}" width="100">
				      	@else
				      		No Thumbnail
				      	@endif
	        			<input type="file" class="form-control" name="image">
	        		</div>
	        		<div class="form-group">
	        			<input type="submit" class="btn btn-md btn-success" name="UpdateCategory" value="Save Changes">
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