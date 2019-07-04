@extends('layouts.frontend')
@section('content')
<section class="w-100 head-bg p-tb-25">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="paging">
					<h1 class="h1-title"><span> My </span> Invoices</h1>                     
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a>Your Invoices</a></li>
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
						<img src="{{ asset($myProfile->avatar) }}">
					</div>
					<div class="profile-title">
						{{ $myProfile->name }}
					</div>
					<div class="user-type">{{ ucwords(str_replace('-', ' ', $myProfile->user_type)) }}</div>
					
					<div class="about-profile">
						{{ str_limit($myProfile->description, $limit = 200, $end = '...')}}
					</div>
				</div>

			</div>
			<div class="col-lg-9 col-md-9">
				<div class="about-company">
					<div class="about-topsec">
						<div class="row">
							@forelse($myInvoices as $myInvoice)
							<div class="col-lg-12 col-md-12">
								<div class="brnad-name">
									@php
									$vendor = App\User::find($myInvoice->user_id);
									@endphp

									You have booked <span><strong>{{ $vendor->name }} ( {{ ucwords(str_replace('-', ' ', $vendor->user_type)) }} )</strong></span>  
									for 
									<span><strong>{{ \Carbon\Carbon::parse($myInvoice->booking_from_date)->format('M d Y') }}</strong></span>   {{ $myInvoice->hours }}
								</div>
							</div>
							@empty
							<div class="col-lg-12 col-md-12">
								<div class="brnad-name">
									You have no invoice.
								</div>
							</div>
							@endforelse


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
