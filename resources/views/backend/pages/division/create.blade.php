@extends('backend.layout.template')

@section('body')

<div class="br-pagetitle">
	<i class="icon ion-ios-home-outline"></i>
	<div>
	  <h4>Create New Division</h4>
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
	        	<form action="{{ route('division.store') }}" method="POST" enctype="multipart/form-data" class="p-5">
	        		<!-- this is the security token and no one can embad this with iframe tag -->
	        		@csrf
	        		<div class="form-group">
	        			<label>Division Name</label>
	        			<input type="text" name="name" class="form-control" placeholder="" required="required">
	        		</div>

	        		<div class="form-group">
	        			<label>Division Priority</label>
	        			<input type="number" name="priority" class="form-control" placeholder="" required="required">
	        		</div>
	        		
	        		
	        		<div class="form-group">
	        			<input type="submit" class="btn btn-md btn-success" name="addDivision" value="Add New Division">
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