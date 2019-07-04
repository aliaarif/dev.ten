@extends('layouts.backend')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="page-title-box">
			<h4 class="page-title">Profile </h4>
			<ol class="breadcrumb p-0 m-0">
				<li>
					<a href="{{ route('dashboard') }}">Dashboard</a>
				</li>
				<li class="active">
					Profile
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



		<div class="card-box">
			<div class="row">
				<form action="{{ route('vendor.update.profile') }}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="col-lg-12">

						<div class="row">
							<div class="col-md-6">
								<div class="demo-box">
									<h6 class="text-muted"><b>My Name/Brand</b></h6>
									<input type="text" class="form-control @error('name') is-invalid @enderror"  maxlength="70" name="name" id="name" value="{{ Auth::user()->name }}" autocomplete="name" />
									@error('name')
									<span class="invalid-feedback" style="display: block; color: #f7871e;" role="alert">
										{{ $message }}
									</span>
									@enderror
								</div>
								<div class="demo-box">
									<h6 class="text-muted"><b>My Phone</b></h6>
									<input type="text" class="form-control @error('phone') is-invalid @enderror" maxlength="10" name="phone" id="phone" value="{{ Auth::user()->phone }}" autocomplete="phone"  />
									@error('phone')
									<span class="invalid-feedback" style="display: block; color: #f7871e;" role="alert">
										{{ $message }}
									</span>
									@enderror
								</div>
								<div class="demo-box">
									<h6 class="text-muted"><b>My Rate</b></h6>
									<input type="text" class="form-control @error('rate') is-invalid @enderror" minlength="2" maxlength="3" name="rate" id="rate" value="{{ Auth::user()->rate-env('MY_VALUE', 5) }}" autocomplete="rate" />
									@error('rate')
									<span class="invalid-feedback" style="display: block; color: #f7871e;" role="alert">
										{{ $message }}
									</span>
									@enderror
								</div>

								<div class="demo-box">
									<h6 class="text-muted"><b>My Website</b></h6>
									<input type="text" class="form-control" maxlength="100" name="website" id="website" value="{{ Auth::user()->website }}" />
								</div>
							</div>


							@php
							$states = App\State::where('country_id', Auth::user()->country_id)->get(['id', 'name']);
							@endphp


							<div class="col-md-6">
								<div class="demo-box">

									<h6 class="text-muted"><b>My State</b></h6>
									<p class="text-muted m-b-15 font-13">
										<select class="selectpicker" data-live-search="true"  data-style="btn-success" id="state" name="state" style="overflow-y: hidden;">
											@forelse($states as $state)
											<option value="{{ $state->id }}" @if(Auth::user()->state_id == $state->id) selected @endif>{{ $state->name }}</option>
											@empty
											<option value="0">No States Found</option>
											@endforelse
										</select>
									</p>
								</div>

								@php
								$cities = App\City::where('state_id', Auth::user()->state_id)->get(['id', 'name']);
								@endphp
								<div class="demo-box">
									<h6 class="text-muted"><b>My City</b></h6>
									<p class="text-muted m-b-15 font-13" id="cityHtml">
										<select class="selectpicker" data-live-search="true"  data-style="btn-success" id="city" name="city">
											@forelse($cities as $city)
											<option value="{{ $city->id }}" @if(Auth::user()->city_id == $city->id) selected @endif>{{ $city->name }}</option>
											@empty
											<option value="0">No Cities Found</option>
											@endforelse
										</select>
									</p>
								</div>

								@php
								$vTypes = App\VendorType::all();
								@endphp
								<div class="demo-box">
									<h6 class="text-muted"><b>My Vendor Type</b></h6>
									<p class="text-muted m-b-15 font-13" id="cityHtml">
										<select class="selectpicker" data-live-search="true"  data-style="btn-success" id="vendor_type" name="vendor_type">
											<option value="{{ Auth::user()->user_type }}" selected>{{ str_replace('-', ' ', ucwords(Auth::user()->user_type)) }}</option>

											@forelse($vTypes as $type)
											<option value="{{ $type->name }}">{{ str_replace('-', ' ', ucwords($type->name)) }}</option>
											@empty
											<option >No Vendor Type Available</option>
											@endforelse
										</select>
									</p>
								</div>

								<div class="demo-box">
									<h6 class="text-muted"><b>My Avatar/Logo (leave empty if not change)</b></h6>
									<p class="text-muted m-b-15 font-13">
										<input type="file" name="avatar" id="avatar" value="{{ Auth::user()->avatar }}" class="filestyle" data-iconname="fa fa-cloud-upload" accept="image/jpeg, image/png, image/jpg" >
									</p>
								</div>
								
							</div>
							<div class="col-md-12">
								<div class="demo-box">
									<h6 class="text-muted"><b>About Me</b></h6>
									<p class="text-muted m-b-15 font-13">
										<textarea class="form-control" name="description" rows="5">{{ Auth::user()->description }}</textarea>
									</p>
								</div>





								<div class="demo-box">
									<button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">Update Profile</button> 
									<a href="{{ route('user.profile') }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5">Refresh</a>
								</div>
							</div>
						</div>
					</div>
					<!-- end row -->

				</div> <!-- end col -->

			</form>

		</div>
		<!-- end row -->

		<!-- {{ Auth::user()->leads }} -->
	</div> <!-- end card-box -->
</div><!-- end col-->
</div>
<!-- end row -->
@endsection

@push('js')

@endpush