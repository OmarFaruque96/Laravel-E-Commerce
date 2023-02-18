@extends('backend.layout.template')

@section('body')

<div class="br-pagetitle">
	<i class="icon ion-ios-home-outline"></i>
	<div>
	  <h4>Edit & Update Product</h4>
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
	          <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">How Engaged Our Users Daily</h6>
	        </div>
	      </div><!-- d-flex -->

	      <div class="pd-l-25 pd-r-15 pd-b-25">
	        <div class="bd rounded table-responsive">
	        	<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="p-3">
	        		<!-- this is the security token and no one can embad this with iframe tag -->
	        		@csrf

	        		<div class="row">
	        			<!-- first col -->
	        			<div class="col-md-4 col-sm-4 col-lg-4">

	        				<div class="form-group">
			        			<label>Product Title</label>
			        			<input type="text" name="title" class="form-control" placeholder="" value="{{ $product->title }}">
			        		</div>

			        		<div class="form-group">
			        			<label>Regular Price</label>
			        			<input type="number" name="regular_price" class="form-control" placeholder="" value="{{ $product->regular_price }}">
			        		</div>

			        		<div class="form-group">
			        			<label>Offer Price</label>
			        			<input type="number" name="offer_price" class="form-control" placeholder="" value="{{ $product->offer_price }}">
			        			<small>Set the offer price if any otherwise leave blank.</small>
			        		</div>

			        		<div class="form-group">
			        			<label>SKU Code</label>
			        			<input type="text" name="sku_code" class="form-control" placeholder="" value="{{ $product->sku_code }}">
			        		</div>

			        		<div class="form-group">
			        			<label>Stock Quantity</label>
			        			<input type="number" name="quantity" class="form-control" placeholder="" value="{{ $product->quantity }}">
			        		</div>

			        		<div class="form-group">
			        			<label>Product Tags</label>
			        			<input type="text" name="tags" class="form-control" placeholder="Tags" value="{{ $product->tags }}">
			        			<small>Seperate with comma (,)</small>
			        		</div>


	        			</div>

	        			<!-- middle col -->
	        			<div class="col-md-4 col-sm-4 col-lg-4">

	        				<div class="form-group">
			        			<label>Is Featured</label>
			        			<select name="featured_item" class="form-control">
			        				<option value="0">Please select the Featured Status</option>
			        				<option value="0" @if($product->featured_item == 0) selected @endif>Not Featured</option>
			        				<option value="1" @if($product->featured_item == 1) selected @endif>Featured</option>
			        			</select>
			        		</div>

			        		<div class="form-group">
			        			<label>Select Brand</label>
			        			<select name="brand_id" class="form-control">
			        				<option value="0">Please select the Brand</option>

			        				@foreach(App\Models\Backend\Brand::orderBy('name','asc')->get() as $brand)
			        					<option value="{{ $brand->id }}" @if($product->brand_id == $brand->id) selected @endif>{{ $brand->name }}</option>
			        				@endforeach
			        				
			        			</select>
			        		</div>

			        		<div class="form-group">
			        			<label>Select Category</label>
			        			<select name="category_id" class="form-control">
				        			<option value="0">Please select the parent Category if any</option>

				        			@foreach(App\Models\Backend\Category::orderby('name','asc')->where('is_parent', 0)->get() as $p_cat)

				        				<option value="{{ $p_cat->id }}" @if($product->category_id == $p_cat->id) selected @endif>{{$p_cat->name}}</option>
				        				@foreach(App\Models\Backend\Category::orderby('name','asc')->where('is_parent', $p_cat->id)->get() as $c_cat)

					        				<option value="{{ $c_cat->id }}" @if($product->category_id == $c_cat->id) selected @endif>- {{ $c_cat->name }}</option>

					        			@endforeach
				        			@endforeach
			        			</select>
			        		</div>

			        		<div class="form-group">
			        			<label>Status</label>
			        			<select name="status" class="form-control">
			        				<option value="0">Please select the Product status</option>
			        				<option value="1" @if($product->status==1) selected @endif>Active</option>
			        				<option value="0" @if($product->status==0) selected @endif>InActive</option>
			        			</select>
			        		</div>

			        		<div class="form-group">
			        			<label>Product Type</label>
			        			<select name="product_type" class="form-control">
			        				<option value="0">Please select the Product type</option>
			        				<option value="0" @if($product->product_type==0) selected @endif>New</option>
			        				<option value="1" @if($product->product_type==1) selected @endif>Old</option>
			        			</select>
			        		</div>

	        			</div>

	        			<!-- last col -->
	        			<div class="col-lg-4 col-md-4 col-sm-4">

	        				<div class="form-group">
			        			<label>Product Description</label>
			        			<textarea type="text" name="desc" class="form-control" placeholder="Product Description">{{ $product->desc }}</textarea>
			        		</div>

			        		<div class="form-group">
			        			<label>Product Short Description</label>
			        			<textarea type="text" name="short_desc" class="form-control" placeholder="Product Short Description">{{ $product->short_desc }}</textarea>
			        		</div>

			        		<div class="form-group">

			        			@if( !is_null($product->image) )
							      	<img src="{{ asset('Backend/img/product') }}/{{ $product->image }}" width="100">
						      	@else
						      		No Thumbnail
						      	@endif

			        			<label>Product Image</label>
			        			<input type="file" class="form-control" name="image">
			        		</div>
			        		

	        			</div>
	        		</div>

	        		<div class="form-group">
	        			<input type="submit" class="btn btn-md btn-success" name="addProduct" value="Add New product">
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