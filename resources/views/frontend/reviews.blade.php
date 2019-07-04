@extends('layouts.frontend')
@section('content')
<section class="w-100 head-bg p-tb-25">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="paging">
					<h1 class="h1-title"><span>{{ $vendor->name }}'s </span> All Reviews</h1>                     
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a href="../booking/{{ $vendor->remember_token }}">Vendor</a></li>
						<li><a>Portfolio</a></li>
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
						<img src="{{ asset($vendor->avatar) }}">
					</div>
					<div class="profile-title">
						{{ $vendor->name }}
					</div>
					<div class="user-type">
						{{ ucwords(str_replace('-', ' ', $vendor->user_type)) }}
						<br/>
						@if($vendor->averageRating >= 4.5)
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star  checked"></span>
						@elseif($vendor->averageRating < 4.5 && $vendor->averageRating > 3.5)
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star-half-o  checked"></span>
						@elseif($vendor->averageRating >= 3.5)
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star-o  "></span>
						@elseif($vendor->averageRating < 3.5 && $vendor->averageRating > 2.5)
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star-half-o  checked"></span>
						<span class="fa fa-star-o  "></span>
						@elseif($vendor->averageRating >= 2.5)
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star-o  "></span>
						<span class="fa fa-star-o  "></span>
						@elseif($vendor->averageRating < 2.5 && $vendor->averageRating > 1.5)
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star-half-o  checked"></span>
						<span class="fa fa-star-o  "></span>
						<span class="fa fa-star-o  "></span>
						@elseif($vendor->averageRating >= 1.5)
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star-o  "></span>
						<span class="fa fa-star-o  "></span>
						<span class="fa fa-star-o  "></span>
						@elseif($vendor->averageRating < 1.5 && $vendor->averageRating > 1.0)
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star-half-o  checked"></span>
						<span class="fa fa-star-o  "></span>
						<span class="fa fa-star-o  "></span>
						<span class="fa fa-star-o  "></span>
						@elseif($vendor->averageRating <= 1.0 && $vendor->averageRating > 0.5)
						<span class="fa fa-star  checked"></span>
						<span class="fa fa-star-o  "></span>
						<span class="fa fa-star-o  "></span>
						<span class="fa fa-star-o  "></span>
						<span class="fa fa-star-o  "></span>
						@elseif($vendor->averageRating <= 0.5)
						<span class="fa fa-star-half-o  checked"></span>
						<span class="fa fa-star-o  "></span>
						<span class="fa fa-star-o  "></span>
						<span class="fa fa-star-o  "></span>
						<span class="fa fa-star-o  "></span>
						@else
						<span class="fa fa-star-o  "></span>
						<span class="fa fa-star-o  "></span>
						<span class="fa fa-star-o  "></span>
						<span class="fa fa-star-o  "></span>
						<span class="fa fa-star-o  "></span>
						@endif

					</div>
					
					<div class="about-profile">
						{{ str_limit($vendor->description, $limit = 200, $end = '...')}}
					</div>
				</div>

			</div>
			<div class="col-lg-9 col-md-9">
				<div class="about-company">
					<div class="about-topsec">
						
						<div class="row">
							<div class="col-lg-12 col-md-12">
								{{ $vendor->name }} - @if($vendor->averageRating >= 4.5)
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star  checked"></span>
								@elseif($vendor->averageRating < 4.5 && $vendor->averageRating > 3.5)
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star-half-o  checked"></span>
								@elseif($vendor->averageRating >= 3.5)
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star-o  "></span>
								@elseif($vendor->averageRating < 3.5 && $vendor->averageRating > 2.5)
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star-half-o  checked"></span>
								<span class="fa fa-star-o  "></span>
								@elseif($vendor->averageRating >= 2.5)
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star-o  "></span>
								<span class="fa fa-star-o  "></span>
								@elseif($vendor->averageRating < 2.5 && $vendor->averageRating > 1.5)
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star-half-o  checked"></span>
								<span class="fa fa-star-o  "></span>
								<span class="fa fa-star-o  "></span>
								@elseif($vendor->averageRating >= 1.5)
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star-o  "></span>
								<span class="fa fa-star-o  "></span>
								<span class="fa fa-star-o  "></span>
								@elseif($vendor->averageRating < 1.5 && $vendor->averageRating > 1.0)
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star-half-o  checked"></span>
								<span class="fa fa-star-o  "></span>
								<span class="fa fa-star-o  "></span>
								<span class="fa fa-star-o  "></span>
								@elseif($vendor->averageRating <= 1.0 && $vendor->averageRating > 0.5)
								<span class="fa fa-star  checked"></span>
								<span class="fa fa-star-o  "></span>
								<span class="fa fa-star-o  "></span>
								<span class="fa fa-star-o  "></span>
								<span class="fa fa-star-o  "></span>
								@elseif($vendor->averageRating <= 0.5)
								<span class="fa fa-star-half-o  checked"></span>
								<span class="fa fa-star-o  "></span>
								<span class="fa fa-star-o  "></span>
								<span class="fa fa-star-o  "></span>
								<span class="fa fa-star-o  "></span>
								@else
								<span class="fa fa-star-o  "></span>
								<span class="fa fa-star-o  "></span>
								<span class="fa fa-star-o  "></span>
								<span class="fa fa-star-o  "></span>
								<span class="fa fa-star-o  "></span>
								@endif
							</div>
							
							<div class="col-lg-12 col-md-12">
								{{ $vendor->reviews }}
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
	.booking-now #customeSpan{
		padding:0;
	}


	[type="radio"]:checked,
	[type="radio"]:not(:checked) {
		position: absolute;
		left: -9999px;
	}
	[type="radio"]:checked + label,
	[type="radio"]:not(:checked) + label
	{
		position: relative;
		padding-left: 28px;
		cursor: pointer;
		line-height: 20px;
		display: inline-block;
		color: #666;
	}
	[type="radio"]:checked + label:before,
	[type="radio"]:not(:checked) + label:before {
		content: '';
		position: absolute;
		left: 0;
		top: 0;
		width: 18px;
		height: 18px;
		border: 1px solid #ddd;
		border-radius: 100%;
		background: #fff;
	}
	[type="radio"]:checked + label:after,
	[type="radio"]:not(:checked) + label:after {
		content: '';
		width: 12px;
		height: 12px;
		background: #f7871e;
		position: absolute;
		top: 3px;
		left: 3px;
		border-radius: 100%;
		-webkit-transition: all 0.2s ease;
		transition: all 0.2s ease;
	}
	[type="radio"]:not(:checked) + label:after {
		opacity: 0;
		-webkit-transform: scale(0);
		transform: scale(0);
	}
	[type="radio"]:checked + label:after {
		opacity: 1;
		-webkit-transform: scale(1);
		transform: scale(1);
	}

	.user-type{
		position: relative;
		top: -7px;
		font-size: 11px;
		color: #f7871e;

	}
	.checked {
		color: #ff7e00;
	}

	.fa-star-o{
		color: #ff7e00;	
	}

</style>
<!-- ++++++ login form style +++++++++ -->
<link rel="stylesheet" type="text/css" href="{{  asset('frontAssets/css/headstyle.css') }}">
<link rel="stylesheet" type="text/css" href="{{  asset('frontAssets/css/allservicestyle.css') }}">
@endpush

@push('js')

@endpush
