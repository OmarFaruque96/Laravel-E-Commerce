@extends('backend.layout.template')

@section('body')

<div class="br-pagetitle">
	<i class="icon ion-ios-home-outline"></i>
	<div>
	  <h4>Manage All Districts</h4>
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
				      <th scope="col">District Name</th>
				      <th scope="col">Division Name</th>
				      <th scope="col">Action</th>
				    </tr> 
				  </thead>
				  <tbody>

				  	@php $i=1; @endphp

				  	@foreach( $districts as $district )
				  		
				  		<tr>
					      <th scope="row">{{ $i++ }}</th>
					      <td>{{ $district->name }}</td>
					      <td>{{ $district->division->name }}</td>
					      <td>
					      	<a href="{{ route('district.edit', $district->id) }}" class="mx-1"><i class="fa fa-edit"></i></a>
					      	<a href="" data-toggle="modal" data-target="#districtDelete{{$district->id}}"><i class="fa fa-trash"></i></a>

					      	<div class="modal fade" id="districtDelete{{$district->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>

							      </div>
							      <div class="modal-body text-center">
							        <form method="POST" action="{{ route('district.destroy', $district->id) }}">
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