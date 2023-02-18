@extends('backend.layout.template')

@section('body')

<div class="br-pagetitle">
	<i class="icon ion-ios-home-outline"></i>
	<div>
	  <h4>Edit Existing Division</h4>
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
	          <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Update Division Information</h6>
	        </div>
	      </div><!-- d-flex -->

	      <div class="pd-l-25 pd-r-15 pd-b-25">
	        <div class="bd rounded table-responsive">
	        	<form action="{{ route('division.update', $division->id ) }}" method="POST" enctype="multipart/form-data" class="p-5">
	        		<!-- this is the security token and no one can embad this with iframe tag -->
	        		@csrf
	        		<div class="form-group">
	        			<label>Division Name</label>
	        			<input type="text" name="name" class="form-control" placeholder="Division Name" value="{{ $division->name }}">
	        		</div>
	        		<div class="form-group">
	        			<label>Division Prority</label>
	        			<input type="text" name="priority" class="form-control" placeholder="Division Priority" value="{{ $division->priority }}">
	        		</div>
	        		
	        		<div class="form-group">
	        			<input type="submit" class="btn btn-md btn-success" name="UpdateDivision" value="Save Changes">
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