@extends('layouts.backend')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="page-title-box">
			<h4 class="page-title">PORTFOLIO</h4>
			<ol class="breadcrumb p-0 m-0">
				<li>
					<a href="{{ route('dashboard') }}">Dashboard</a>
				</li>
				<li class="active">
					Portfolio
				</li>
			</ol>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- end row -->
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<strong>Well done!</strong> {{ Session::get('success') }}
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<strong>Oops!</strong> {{ Session::get('error') }}
	message.
</div>
@endif


<div class="row">
	<div class="col-xs-12">

		<form action="{{ route('vendor.portfolio.upload') }}" enctype="multipart/form-data" method="post">
			@csrf

			<div align="left" class="col-md-12 text-danger">Note:- Please Provide all Images as 650px X 432px as ratio</div>

			<div class="col-md-12">
				<br/>
				<div class="form-group" style="float: left">
					<input type="file" class="form-control" name="images[]" multiple accept='image/jpeg , image/jpg, image/png'>
					@error('images')
					<span class="invalid-feedback" style="display: block; color: #f7871e;" role="alert">
						{{ $message }}
					</span>
					@enderror
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>

			</div>
			
		</form>
	</div>
</div>




<div class="col-xl-12 offset-xl-1 m-t-30">
	<div class="row">
		@forelse($images as $image)
		<div class="col-md-4">
			<div class="thumbnail mb-5">
				<img src="{{ asset($image->name) }}" height="200" width="200" alt="{{ asset($image->name) }}" class="img-fluid d-block">
			</div>        
		</div>
		@empty
		<div class="col-md-12">
			<div class="thumbnail mb-3">
				No Portfolio Added !
			</div>        
		</div>
		@endforelse

	</div>
</div>




</div>
<!-- end row -->
@endsection

@push('js')

@endpush