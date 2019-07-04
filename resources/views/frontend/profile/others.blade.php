@extends('layouts.frontend')
@section('content')
<section class="w-100 head-bg p-tb-25">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="paging">
					<h1 class="h1-title"><span>{{ $otherProfile->name }}'s Profile</h1>                     
						<ul>
							<li><a href="{{ url('/') }}">Home</a></li>
							<li><a>Profile</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</section>



	<section class="w-100 p-tb-70">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="profile-page">
						<div class="profile-img">
							<img src="{{ asset($otherProfile->avatar) }}">
						</div>
						<div class="profile-title">
							{{ $otherProfile->name }}
						</div>
						<div class="user-type">{{ ucwords(str_replace('-', ' ', $otherProfile->user_type)) }}</div>

						<div class="about-profile">
							{{ str_limit($otherProfile->description, $limit = 200, $end = '...')}}
						</div>
					</div>

				</div>
				<div class="col-lg-9 col-md-9">
					<div class="about-company">
						<div class="about-topsec">
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<div class="brnad-name">Brand Name:  <span>{{ $otherProfile->name }}</span>  </div>
								</div>

								<div class="col-lg-6 col-md-6">
									<div class="brnad-name">Address: <span>{{ $otherProfile->user_location }}</span></div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="brnad-name">Phone: <span>{{ $otherProfile->phone }}</span></div>
								</div>

								<div class="col-lg-6 col-md-6">
									<div class="brnad-name">Website: <span>{{ $otherProfile->website }}</span></div>
								</div>

								<div class="col-lg-6 col-md-6">
									<div class="brnad-name">Email: <span>{{ $otherProfile->email }}</span></div>
								</div>




							</div>


						</div>



					</div>



				</div>
			</div>
		</div>



	</section>
	@endsection
	@push('css')
	<style type="text/css">


	</style>
	<!-- ++++++ login form style +++++++++ -->
	<link rel="stylesheet" type="text/css" href="{{  asset('frontAssets/css/headstyle.css') }}">
	<link rel="stylesheet" type="text/css" href="{{  asset('frontAssets/css/allservicestyle.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('3rdparty/css/ui.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('3rdparty/css/pignose.calendar.min.css') }}"/>


	@endpush

	@push('js')


	<script type="text/javascript" src="{{ asset('3rdparty//js/pignose.calendar.full.min.js') }}"></script>
	<script type="text/javascript">

		$(function () {


		});

	</script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	@endpush
