@extends('layouts.frontend')
@section('content')
<section class="w-100 header-bg p-tb-70">
	<div class="search-section">
		<div class="search-section-inner">
			<h1>une expérience incomparable à chaque fois</h1>
			<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua tempor incididunt ut labore et dolore magna aliqua.</h3>

			<div class="search-form">
				<!-- <div id="autocomplete" class="autocomplete">
						<input class="autocomplete-input" placeholder="Search for a country" aria-label="Search for a country"
						>
						<ul class="autocomplete-results"></ul>
					</div> -->

					

					<form id="searchFrom" action="{{ route('find.professionals') }}" method="POST" autocomplete="off" onsubmit="return validateSearchForm();">
						@csrf

						<div class="autocomplete search-bx">
							<input id="user_type" type="text" name="user_type" placeholder="Professional Type" class="typeahead1 input-search s-icon1 ">
						</div>

						<div class="autocomplete search-bx">
							<input id="user_location" type="text" name="user_location" placeholder="Location" class="typeahead2 input-search s-icon2 ">
						</div>

						<div class="search-bx">
							<button type="submit"  class="btn-submit s-icon3">SEARCH</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<!-- +++++++++ end header section +++++++++++-->

	<!-- +++++++++++++++ start main content +++++++++++++-->
	<section class="w-100 bg-w-ab p-tb-70 ">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 text-center">
					<h2 class="h2-title">HOW IT WORK</h2>


					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate </p>
					<a href="javascript:;" class="read-more">Read More</a>        
				</div>      
			</div>

			<div class="row">
				<div class="col-lg-12 col-md-12 text-center">
					<ul class="ul-item p-t-40 text-center">
						<li>
							<a href="javascript:;">
								<div class="step-now">
									<div class="step-icon"> <img src="{{ asset('frontAssets/images/sw-icon.png') }}"></div>
									<h3>Search Catogery</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. </p>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:;">
								<div class="step-now">
									<div class="step-icon"> <img src="{{ asset('frontAssets/images/w-loc-icon.png') }}"></div>
									<h3>Choose Location</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. </p>
								</div>
							</a>
						</li>

						<li>
							<a href="javascript:;">
								<div class="step-now">
									<div class="step-icon"> <img src="{{ asset('frontAssets/images/book-now.png') }}"></div>
									<h3>Book Now</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. </p>
								</div>
							</a>
						</li>
					</ul>

					<a class="signup-btn" href="javascript:;">Sign Up</a>
				</div>

			</div>
		</div>  
	</section>

	<!--++++++++ start portfolio section ++++++++++-->
	<section class="portfolio_mainblock p-tb-70">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="about_innerblock text-center">
						<h2 class="h2-title">Les services de nos professionnels</h2>                    
					</div>
				</div>
			</div>
		</div>

		<div class="container">    
			<div class="filter_main_block">
				<main class="cd-main-content">
					<div class="cd-tab-filter-wrapper">
						<div class="cd-tab-filter">
							<ul class="cd-filters">
								<li class="placeholder"><a data-type="all" href="javascript:;">All</a> <!-- selected option on mobile --></li> 
								<li class="filter"><a class="selected" href="javascript:;" data-type="all">All</a></li>
								<li class="filter" data-filter=".color-1"><a href="javascript:;" data-type="color-1">Photographer</a></li>
								<li class="filter" data-filter=".color-2"><a href="javascript:;" data-type="color-2">Videographer</a></li>
								<li class="filter" data-filter=".color-3"><a href="javascript:;" data-type="color-3">DJ</a></li>
								<li class="filter" data-filter=".color-4"><a href="javascript:;" data-type="color-4">Photo / Video Stand</a></li>
								<li class="filter" data-filter=".color-5"><a href="javascript:;" data-type="color-5">Caterer</a></li>
								<li class="filter" data-filter=".color-6"><a href="javascript:;" data-type="color-6">Performers</a></li>
								<li class="filter" data-filter=".color-7"><a href="javascript:;" data-type="color-7">Workshop / Private Course</a></li>
								<li class="filter" data-filter=".color-8"><a href="javascript:;" data-type="color-8">Equipment Rental</a></li>
								<li class="filter" data-filter=".color-9"><a href="javascript:;" data-type="color-9">Ephemeral Stand / Show</a></li>
								<li class="filter" data-filter=".color-10"><a href="javascript:;" data-type="color-10">Company Animation</a></li>
								<li class="filter" data-filter=".color-11"><a href="javascript:;" data-type="color-11">Excursions</a></li>
								<li class="filter" data-filter=".color-12"><a href="javascript:;" data-type="color-12">Booth / Culinary Show</a></li>
								<!-- <li class="filter" data-filter=".color-13"><a href="javascript:;" data-type="color-13">Others</a></li> -->
							</ul> <!-- cd-filters -->
						</div> <!-- cd-tab-filter -->
					</div> <!-- cd-tab-filter-wrapper -->

					<section class="cd-gallery">
						<ul class="grid cs-style-3">
							<li class="mix color-1 check1 radio2 option3">
								<figure>
									<img src="{{ asset('frontAssets/images/gallery/img1.jpg') }}">
									<div class="blur_bg">
										<a href="{{ url('services/photographer') }}" class="goto_link">Photographer</a>
									</div>
								</figure>
							</li>
							<li class="mix color-2 check2 radio2 option2">
								<figure>
									<img src="{{ asset('frontAssets/images/gallery/img2.jpg') }}">
									<div class="blur_bg">
										<a href="{{ url('services/videographer') }}" class="goto_link">Videographer</a>
									</div>
								</figure>
							</li>
							<li class="mix color-3 check3 radio3 option1">
								<figure>
									<img src="{{ asset('frontAssets/images/gallery/img3.jpg') }}">
									<div class="blur_bg">
										<a href="{{ url('services/dj') }}" class="goto_link">DJ</a>
									</div>
								</figure>
							</li>
							<li class="mix color-4 check3 radio2 option4">
								<figure>
									<img src="{{ asset('frontAssets/images/gallery/img4.jpg') }}">
									<div class="blur_bg">
										<a href="{{ url('services/photo-video-stand') }}" class="goto_link">Photo / Video Stand</a>
									</div>
								</figure>
							</li>
							<li class="mix color-5 check1 radio3 option2">
								<figure>
									<img src="{{ asset('frontAssets/images/gallery/img5.jpg') }}">
									<div class="blur_bg">
										<a href="{{ url('services/caterer') }}" class="goto_link">Caterer</a>
									</div>
								</figure>
							</li>
							<li class="mix color-6 check2 radio3 option3">
								<figure>
									<img src="{{ asset('frontAssets/images/gallery/img6.jpg') }}">
									<div class="blur_bg">
										<a href="{{ url('services/performers') }}" class="goto_link">Performers</a>
									</div>
								</figure>
							</li>
							<li class="mix color-7 check2 radio2 option1">
								<figure>
									<img src="{{ asset('frontAssets/images/gallery/img7.jpg') }}">
									<div class="blur_bg">
										<a href="{{ url('services/workshop-private-course') }}" class="goto_link">Workshop / Private Course</a>
									</div>
								</figure>
							</li>
							<li class="mix color-8 check1 radio3 option4">
								<figure>
									<img src="{{ asset('frontAssets/images/gallery/img8.jpg') }}">
									<div class="blur_bg">
										<a href="{{ url('services/equipment-rental') }}" class="goto_link">Equipment Rental</a>
									</div>
								</figure>
							</li>
							<li class="mix color-9 check1 radio2 option3">
								<figure>
									<img src="{{ asset('frontAssets/images/gallery/img9.jpg') }}">
									<div class="blur_bg">
										<a href="{{ url('services/ephemeral-stand-show') }}" class="goto_link">Ephemeral Stand / Show</a>
									</div>
								</figure>
							</li>
							<li class="mix color-10 check3 radio2 option4">
								<figure>
									<img src="{{ asset('frontAssets/images/gallery/img10.jpg') }}">
									<div class="blur_bg">
										<a href="{{ url('services/company-animation') }}" class="goto_link">Company Animation</a>
									</div>
								</figure>
							</li>
							<li class="mix color-11 check3 radio3 option2">
								<figure>
									<img src="{{ asset('frontAssets/images/gallery/img11.jpg') }}">
									<div class="blur_bg">
										<a href="{{ url('services/excursions') }}" class="goto_link">Excursions</a>
									</div>
								</figure>
							</li>
							<li class="mix color-12 check1 radio3 option1">
								<figure>
									<img src="{{ asset('frontAssets/images/gallery/img12.jpg') }}">
									<div class="blur_bg">
										<a href="{{ url('services/booth-culinary-show') }}" class="goto_link">Booth / Culinary Show</a>
									</div>
								</figure>
							</li>
							<!-- <li class="mix color-13 check1 radio3 option1">
								<figure>
									<img src="{{ asset('frontAssets/images/gallery/img13.jpg') }}">
								</figure>
							</li> -->
							<li class="gap"></li>
							<li class="gap"></li>
							<li class="gap"></li>
						</ul>
						<div class="cd-fail-message">No results found</div>
					</section> <!-- cd-gallery -->


				</main> <!-- cd-main-content -->



			</div>  
		</div>
	</section>

	<!-- ++++++++++end portfolio section ++++++++++++++ -->


	<section class="w-100 bg-w review-abg p-tb-70">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 text-center">
					<h2 class="h2-title">what our users says</h2>
					<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</h3>
				</div>
			</div>

			<div class="row">
				<div id="slider1" class="owl-carousel owl-theme owl-loaded">
					<div class="owl-stage-outer">
						<div class="owl-stage">
							<div class="owl-item">
								<div class="client-bx">                    
									<div class="client-txt">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,  </p>
									</div>
									<div class="client-star"><img src="{{ asset('frontAssets/images/1star.png') }}"></div>
									<div class="client-name">
										<p>Jessi Jully </p>
										<p>Direcor adipisicing elit.com</p>
									</div>
								</div>
							</div>

							<div class="owl-item">
								<div class="client-bx">                    
									<div class="client-txt">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex </p>
									</div>
									<div class="client-star"><img src="{{ asset('frontAssets/images/2star.png') }}"></div>
									<div class="client-name">
										<p>Jessi Jully </p>
										<p>Direcor adipisicing elit.com</p>
									</div>
								</div>
							</div>

							<div class="owl-item">
								<div class="client-bx">                    
									<div class="client-txt">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et </p>
									</div>
									<div class="client-star"><img src="{{ asset('frontAssets/images/3star.png') }}"></div>
									<div class="client-name">
										<p>Jessi Jully </p>
										<p>Direcor adipisicing elit.com</p>
									</div>
								</div>
							</div>

							<div class="owl-item">
								<div class="client-bx">                    
									<div class="client-txt">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex </p>
									</div>
									<div class="client-star"><img src="{{ asset('frontAssets/images/4star.png') }}"></div>
									<div class="client-name">
										<p>Jessi Jully </p>
										<p>Direcor adipisicing elit.com</p>
									</div>
								</div>
							</div>

							<div class="owl-item">
								<div class="client-bx">                    
									<div class="client-txt">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex </p>
									</div>
									<div class="client-star"><img src="{{ asset('frontAssets/images/5star.png') }}"></div>
									<div class="client-name">
										<p>Jessi Jully </p>
										<p>Direcor adipisicing elit.com</p>
									</div>
								</div>
							</div>

							<div class="owl-item">
								<div class="client-bx">                    
									<div class="client-txt">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex </p>
									</div>
									<div class="client-star"><img src="{{ asset('frontAssets/images/1star.png') }}"></div>
									<div class="client-name">
										<p>Jessi Jully </p>
										<p>Direcor adipisicing elit.com</p>
									</div>
								</div>
							</div>

							<div class="owl-item">
								<div class="client-bx">                    
									<div class="client-txt">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex </p>
									</div>
									<div class="client-star"><img src="{{ asset('frontAssets/images/1star.png') }}"></div>
									<div class="client-name">
										<p>Jessi Jully </p>
										<p>Direcor adipisicing elit.com</p>
									</div>
								</div>
							</div>

							<div class="owl-item">
								<div class="client-bx">                    
									<div class="client-txt">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex </p>
									</div>
									<div class="client-star"><img src="{{ asset('frontAssets/images/1star.png') }}"></div>
									<div class="client-name">
										<p>Jessi Jully </p>
										<p>Direcor adipisicing elit.com</p>
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>  
	</section>

	<!-- +++++++++++++++ end main content +++++++++++++-->
	@endsection
	@push('css')

	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->

	<style type="text/css">

	</style>

	@endpush

	@push('js')
	<!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->


	<script src="{{ asset('frontAssets/js/bootstrap3-typeahead.min.js') }}"></script>
	<script>





		function validateSearchForm(){
			event.preventDefault();
			var type1 = document.getElementById('user_type');
			var location1 = document.getElementById('user_location');
			var form = document.getElementById('searchFrom');
			if(type1.value == ''){
				type1.focus();
			}else{
				form.submit();
			}
		}


		$(() => {
		$('input.typeahead1').on('change', function(){
			var myStr = $(this).val();
			var strArray = myStr.split("-");
			$(this).val(strArray[0]); 
		});


		var path1 = "{{ route('get.user_types') }}";

		$('input.typeahead1').typeahead({
			source:  function (query, process) {

				return $.get(path1, { query: query }, function (data) {
					console.log(data);

					return process(data);

				});
			}
		});

		var path2 = "{{ route('get.user_locations') }}";
		$('input.typeahead2').typeahead({
			source:  function (query, process) {
				return $.get(path2, { query: query }, function (data) {
					return process(data);
				});
			}
		});



});


	</script>
	@endpush