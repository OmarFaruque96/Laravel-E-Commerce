@extends('backend.layout.template')

@section('body')

<div class="br-pagetitle">
	<i class="icon ion-ios-home-outline"></i>
	<div>
	  <h4>Manage All Products</h4>
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
	        	<table class="table table-bordered table-striped">
				  <thead>
				    <tr>
				      <th scope="col">#Sl.</th>
				      <th scope="col">Image</th>
				      <th scope="col">Name</th>
				      <th scope="col">Brand</th>
				      <th scope="col">Category</th>
				      <th scope="col">Quantity</th>
				      <th scope="col">Reg. Price</th>
				      <th scope="col">Offer Price</th>
				      <th scope="col">Is Featured</th>
				      <th scope="col">Status</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>

				  	@php $i=1; @endphp

				  	@foreach( $products as $product )
				  		
			  			<tr>
					      <th scope="row">{{ $i++ }}</th>
					      <td>
					      	@if( !is_null($product->image) )
					      		<img src="{{ asset('Backend/img/product') }}/{{ $product->image }}" width="40">
					      	@else
					      		No Thumbnail
					      	@endif
					      </td>
					      <td>{{ $product->title }}</td>
					      <td>{{ $product->brand->name }}</td>
					      <td>{{ $product->category->name }}</td>
					      <td>{{ $product->quantity }}</td>
					      <td>{{ $product->regular_price }}</td>
					      <td>{{ $product->offer_price }}</td>
					      <td>
					      	@if($product->featured_item == 0)
					      		<span class="badge badge-success">Normal</span>
					      	@else
					      		<span class="badge badge-danger">Featured</span>
					      	@endif
					      </td>
					      <td>
					      	@if($product->status == 1)
					      		<span class="badge badge-success">Active</span>
					      	@else
					      		<span class="badge badge-danger">Inactive</span>
					      	@endif
					      </td>
					      <td>
					      	<a href="{{ route('product.edit', $product->id) }}" class="mx-1"><i class="fa fa-edit"></i></a>
					      	<a href="" data-toggle="modal" data-target="#productDelete{{$product->id}}"><i class="fa fa-trash"></i></a>

					      	<div class="modal fade" id="productDelete{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>

							      </div>
							      <div class="modal-body text-center">
							        <form method="POST" action="{{ route('product.destroy', $product->id) }}">
							        	@csrf
							        	<input type="submit" name="delete" class="btn btn-md btn-danger" value="Delete">
							        	<button type="button" class="btn btn-md btn-success" data-dismiss="modal" aria-label="Close">No</button>
							        </form>
							      </div>
							    </div>
							  </div>
							</div>


					      </td>
					    </tr>

				  	@endforeach

				    

				  </tbody>
				</table>
	        </div>
	      </div>
	    </div>
	  		<!-- body content end-->
	  </div>
	</div>
</div>

@endsection