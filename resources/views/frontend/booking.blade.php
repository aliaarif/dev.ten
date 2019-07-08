@extends('layouts.frontend')
@section('content')
<section class="w-100 head-bg p-tb-25">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="paging">
					<h1 class="h1-title"><span>{{ $vendor->name }}'s </span> Profile</h1>                     
					<ul>

						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a href="{{ route('get.search.result') }}">Search</a></li>
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
					<div class="user-type">{{ ucwords(str_replace('-', ' ', $vendor->user_type)) }}</div>

					<div class="about-profile">
						{{ str_limit($vendor->description, $limit = 200, $end = '...')}}
					</div>
				</div>

			</div>
			<div class="col-lg-9 col-md-9">
				<div class="about-company">
					<div class="about-topsec">

						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="brnad-name">Brand Name:  <span>{{ $vendor->name }}</span>  </div>
							</div>
							<div class="col-lg-6 col-md-6">
								Ratting: <br/>
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
								<br/>

								@if(Auth::check())
								<button type="button" class="process" data-toggle="modal" data-target="#exampleModal">
									Want to rate?
								</button>
								@endif

							</div>
							<div class="col-lg-6 col-md-6">
								<div class="brnad-name">Address: <span>{{ $vendor->address }}</span></div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="brnad-name">Rate: <span align="left"><b class="base-pric" style="position: relative; top: 2px;">${{ $vendor->rate + config('app.tax', 10) }} /HOUR</b></span></div>
							</div>

							<div class="col-lg-12 col-md-12">
								<div class="brnad-name">Description: <span>{{ $vendor->details }}</span></div>
							</div>

							<!-- <div class="col-lg-6 col-md-6">
								<div class="brnad-name">Website: <span>{{ $vendor->website }}</span></div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="brnad-name">Email: <span>{{ $vendor->email }}</span></div>
							</div> -->

							



							<div class="ol-lg-12 col-md-12 booking-now">
								@if(Session::has('msg'))
								<span class="success-feedback" style="display: block; color: #f7871e;" role="alert">
									{{ Session::get('msg') }}
								</span>
								<br/>
								@endif
								

								<!-- <div align="left" id="submitBtn">
									<a  class="process btn btn-md text-white pt-2 cursor-pointer" @if(Auth::check()) data-toggle="modal" data-target="#bookingModal"  @else href="{{ route('login') }}"  @endif>Book Now</a>
								</div> -->
								@if(Auth::check())

								<div align="left" id="submitBtn">
									<a  class="process btn btn-md text-white pt-2 cursor-pointer" data-toggle="modal" data-target="#bookingModal"  >Book Now</a>
								</div>

								@endif
								
							</div>
						</div>


					</div>

					<div class="about-gallery-section">
						<h2>About Portfolio</h2>
						<ul class="about-gallery">
							@php
							$images = App\Image::where('user_id', $vendor->id)->orderBy('id', 'desc')->take(6)->get()
							@endphp

							@forelse($images as $image)
							<li>
								<a class="example-image-link" href="{{  asset($image->name) }}" data-lightbox="example-1">
									<img class="example-image" src="{{  asset($image->name) }}" alt="Portfolio Image"  /></a>
								</li>

								@empty
								<li>
									No Portfolio Added!
								</li>

								@endforelse

							</ul>
						</div>

					</div>



				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Rate {{ $vendor->name }}</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="{{ route('rate') }}" method="POST">
						@csrf 
						<div class="modal-body">

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

							<!-- <a class="text-primary" href="{{ route('show.reviews', Request::segment(2)) }}">All Reviews</a> -->
							<br/>



							@php

							$myRating = willvincent\Rateable\Rating::where('user_id', Auth::id())->where('rateable_id', $vendor->id)->first();

							@endphp

							<?php 
							if($myRating != null){
								$rating = $myRating->rating;
								$reviews = $myRating->reviews;
							}else{
								$rating = 1;
								$reviews = '';
							}
							?>
							<ul>                

								<li class="float-left">
									<p class="float-left">
										<input type="radio" id="rate1" name="rating" value="1" 
										@if($rating == 1) checked @endif>
										<label for="rate1">1 Star </label>&nbsp;&nbsp;&nbsp;
									</p>
								</li>
								<li class="float-left">
									<p class="float-left">
										<input type="radio" id="rate2" name="rating" value="2" @if($rating == 2) checked @endif>
										<label for="rate2">2 Star </label>&nbsp;&nbsp;&nbsp;
									</p>
								</li>
								<li class="float-left">
									<p class="float-left">
										<input type="radio" id="rate3" name="rating" value="3" @if($rating == 3) checked @endif>
										<label for="rate3">3 Star </label>&nbsp;&nbsp;&nbsp;
									</p>
								</li>
								<li class="float-left">
									<p class="float-left">
										<input type="radio" id="rate4" name="rating" value="4" @if($rating == 4) checked @endif>
										<label for="rate4">4 Star </label>&nbsp;&nbsp;&nbsp;
									</p>
								</li>
								<li class="float-left">
									<p class="float-left">
										<input type="radio" id="rate5" name="rating" value="5" @if($rating == 5) checked @endif>
										<label for="rate5">5 Star </label>&nbsp;&nbsp;&nbsp;
									</p>
								</li>


							</ul> 
							<br/>

							<div class="form-group">
								<label for="reviews">Write your reviews</label>
								<textarea class="form-control" id="reviews" name="reviews" rows="3">{{ $reviews }}</textarea>
							</div>

						</div>
						<div class="modal-footer">
							<input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
							<button type="submit" class="process">Submit</button>
						</div>
					</form>
				</div>
			</div>

		</div>


		<!-- Modal -->
		<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="bookingModalLabel">Pay with Stripe to Book {{ $vendor->name }}</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					

					<form action="{{ route('send.mail.to.all') }}" method="POST" id="payment-form">
						@csrf

						<div class="row">
							
							<div class="col-md-12">
								<span style="float:left; width: 80%;">
									<input class="calendar" type="text" style="width: 100%; border: 1; outline: 0; text-align: left" placeholder="Choose a date"  name="booking_date" id="text-calendar" >
								</span>
								<!-- <span  style="float:left; width: 40%;">
									<input class="calendar" type="text"style="width: 100%; border: 1; outline: 0; text-align: left" placeholder="Choose a to date" name="booking_to_date" id="text-calendar2">
								</span> -->
								<span  style="float:left; width: 20%;">
									<input  type="number"style="width: 100%; border: 1; outline: 0; text-align: center" placeholder="Hours" name="hours" id="hours" value="2" min="1" max="10">
								</span>
								<!-- <span id="btnBookingSlots" style="float:right; font-size: 30px; width: 5%; cursor: pointer;">+</span> -->
							</div>


						</div>

						<div class="row" id="bookingSlotsBoxContainer">




						</div>
						
						<br/>

						<div id="card-element">
							<!-- A Stripe Element will be inserted here. -->
						</div>
						<br/>
						<!-- Used to display form errors. -->
						<div id="card-errors" role="alert"></div>

						<input type="hidden" name="vendor_token" value="{{ Request::segment(2) }}">
						<input type="hidden" name="user_token" value="{{ Auth::user()->remember_token }}">
						<input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
						<input type="hidden" name="vendor_name" value="{{ $vendor->name }}">

						@php
						Session::put('freezed_dates', $vendor->freezed_dates);

						@endphp

						@auth
						<input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
						@else
						<input type="hidden" name="user_name" value="Dummy User">
						@endauth
						<button>Pay Now</button>
					</form>
				</div>
			</div>

		</div>

	</section>
	@endsection
	@push('css')


	<!-- ++++++ login form style +++++++++ -->
	<link rel="stylesheet" type="text/css" href="{{  asset('frontAssets/css/custom-booking.css') }}">
	<link rel="stylesheet" type="text/css" href="{{  asset('frontAssets/css/headstyle.css') }}">
	<link rel="stylesheet" type="text/css" href="{{  asset('frontAssets/css/allservicestyle.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('3rdparty/css/ui.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('3rdparty/css/pignose.calendar.min.css') }}"/>

	<style type="text/css">
		.cursor-pointer{
			cursor: pointer;
		}
	</style>
	@endpush

	@push('js')
	<script type="text/javascript" src="{{ asset('3rdparty/js/pignose.calendar.full.min.js') }}"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
	<script type="text/javascript">
		$(() => {



			var freezed_dates = $('#freezed_dates').val();


			//$('#wrapper .version strong').text('v' + $.fn.pignoseCalendar.version);
			function onSelectHandler(date, context) {
				var $element = context.element;
				var $calendar = context.calendar;
				var $box = $element.siblings('.box').show();
				var text = 'You selected date ';
				//alert(JSON.stringify(context.storage.activaDates));
				if (date[0] !== null) {
					text += date[0].format('YYYY-MM-DD');
				}
				if (date[0] !== null && date[1] !== null) {
					text += ' ~ ';
				}
				else if (date[0] === null && date[1] == null) {
					text += 'nothing';
				}
				if (date[1] !== null) {
					text += date[1].format('YYYY-MM-DD');
				}
				$box.text(text);
			}
			function onApplyHandler(date, context) {
				var $element = context.element;
				var $calendar = context.calendar;
				var $box = $element.siblings('.box').show();
				var text = 'You applied date ';

				if (date[0] !== null) {
					text += date[0].format('YYYY-MM-DD');
				}
				if (date[0] !== null && date[1] !== null) {
					text += ' ~ ';
				}
				else if (date[0] === null && date[1] == null) {
					text += 'nothing';
				}
				if (date[1] !== null) {
					text += date[1].format('YYYY-MM-DD');
				}
				$box.text(text);
			}
			$('.input-calendar').pignoseCalendar({
				apply: onApplyHandler,
				buttons: true, 
			});
			var $btn = $('.btn-calendar').pignoseCalendar({
				apply: onApplyHandler,
				modal: true, 
				buttons: true
			});
			$('.calendar-dark').pignoseCalendar({
				theme: 'dark', 
				select: onSelectHandler
			});	
			$('.calendar').pignoseCalendar({
				//multiple: true,
				select: onSelectHandler,

				<?php 
				//$bookedDates = App\Booking::where('user_id', $vendor->id)->get();
				$fDates =  Session::get('freezed_dates');
				$freezedDates = explode(',', $fDates);
				$booking_dates1 = '';
				$booking_dates2 = '';	

				// foreach ($bookedDates as $value) {
				// 	$booking_date1 .= $value->booking_dates.', ';
				// }

				foreach ($freezedDates as $value) {
					$booking_dates2 .= "'".$value."',";
				}

				?>
				disabledDates: <?php echo '['.$booking_dates2.'],'; ?>
				/*disabledRanges: <?php //echo '['.$booking_dates1.'],'; ?>*/
				minDate: '<?php echo date('Y-m-d', strtotime(date('Y-m-d') . "+0 months") ) ?>',
				maxDate: '<?php echo date('Y-m-d', strtotime(date('Y-m-d') . "+3 months") ) ?>'
			});	

			
			var path1 = "{{ route('get.user_types') }}";
		$('input.typeahead1').typeahead({
			source:  function (query, process) {

				return $.get(path1, { query: query }, function (data) {

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
		
		var stripe = Stripe('pk_test_k1YJeZ7GK3nItqh7iaLHRek5');
		var elements = stripe.elements();
		var style = {
			base: {
				color: '#32325d',
				fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
				fontSmoothing: 'antialiased',
				fontSize: '16px',
				'::placeholder': {
					color: '#aab7c4'
				}
			},
			invalid: {
				color: '#fa755a',
				iconColor: '#fa755a'
			}
		};
		var card = elements.create('card', {style: style});
		card.mount('#card-element');
		card.addEventListener('change', function(event) {
			var displayError = document.getElementById('card-errors');
			if (event.error) {
				displayError.textContent = event.error.message;
			} else {
				displayError.textContent = '';
			}
		});
		var form = document.getElementById('payment-form');
		form.addEventListener('submit', function(event) {
			event.preventDefault();
			var fromDate = $('#text-calendar');
			var hours = $('#hours');
			var regHours = `/^(([ 01]?[1-9])|2[0-5])$/`;
			if(fromDate.val() == ''){
				fromDate.trigger('click');
			}else if(hours.val() == '' || hours.val() == 0  || hours.val().length > 25 || hours.val().length < 1  ){
				hours.focus();
			}else{
				stripe.createToken(card).then(function(result) {
					if (result.error) {
						var errorElement = document.getElementById('card-errors');
						errorElement.textContent = result.error.message;
					} else {
						stripeTokenHandler(result.token);
					}
				});
			}
		});
		function stripeTokenHandler(token) {
			//console.log(token);
			var form = document.getElementById('payment-form');

			var hiddenInput1 = document.createElement('input');
			hiddenInput1.setAttribute('type', 'hidden');
			hiddenInput1.setAttribute('name', 'stripeToken');
			hiddenInput1.setAttribute('value', token.id);


			var hiddenInput2 = document.createElement('input');
			hiddenInput2.setAttribute('type', 'hidden');
			hiddenInput2.setAttribute('name', 'address_zip');
			hiddenInput2.setAttribute('value', token.card.address_zip);

			form.appendChild(hiddenInput1);
			form.appendChild(hiddenInput2);
			form.submit();
		}
	</script>
	<script type="text/javascript">


		$(document).ready(function() {



			var isCtrl = false;

			$("body").on("contextmenu",function(){
				//alert('Not Allowed!');
				//isCtrl=false;
				//return false;
			}); 

			$('body').bind('cut copy paste', function (e) {
				//e.preventDefault();
				//alert('Not Allowed!');
				//isCtrl=false;
				//return false;
			});


			// document.onkeyup=function(e)
			// {
			// 	if(e.which == 17)
			// 		isCtrl=false;
			// }
			// document.onkeydown=function(e)
			// {
			// 	if(e.which == 17)
			// 		isCtrl=true;
			// 	if((e.which == 85) || (e.which == 67) &amp;&amp; isCtrl == true)
			// 	{
			// 		alert('Keyboard shortcuts are cool!');
			// 		return false;
			// 	}
			// }
			// var isNS = (navigator.appName == "Netscape") ? 1 : 0;
			// if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
			// function mischandler(){
			// 	return false;
			// }
			// function mousehandler(e){
			// 	var myevent = (isNS) ? e : event;
			// 	var eventbutton = (isNS) ? myevent.which : myevent.button;
			// 	if((eventbutton==2)||(eventbutton==3)) return false;
			// }
			// document.oncontextmenu = mischandler;
			// document.onmousedown = mousehandler;
			// document.onmouseup = mousehandler;

			//let counterID = 0;
	/*		$('#btnBookingSlots').click(function(){
				counterID = counterID+1;
				var today = new Date();


				$("#bookingSlotsBoxContainer").append('<div class="col-md-12" id="bookingSlotsBox'+counterID+'"><span style="float:left; width: 80%;"><input class="calendar'+counterID+'" type="text" style="width: 100%; border: 1; outline: 0; text-align: left" placeholder="Choose a date"  name="booking_date'+counterID+'" id="text-calendar'+counterID+'" value="'+formatDate(today)+'" onclick="showCalendar('+counterID+')"></span><span  style="float:left; width: 15%;"><input  type="number"style="width: 100%; border: 1; outline: 0; text-align: center" placeholder="Hours" name="hours" value="1" min="1" max="24" ></span><span id="btnRemoveBookingSlots" onclick="return removeBookingSlotBox('+counterID+');" style="float:right; font-size: 30px; width: 5%; cursor: pointer;">-</span></div>');



			});*/





			// $('.calendar' + counterID).pignoseCalendar({  
			// 	format: 'YYYY-MM-DD'
			// });


			// $("#btn-id").on('dblclick', function() {
			// 	console.clear();
			// 	console.log("You double-clicked!");
			// });




		});

		// function removeBookingSlotBox(id){
		// 	document.getElementById("bookingSlotsBox"+id).remove()
		// }



	/*	function showCalendar(id){
			//$('#text-calendar'+id).each(function(){$(this).triggerHandler('click');});
			//$('#text-calendar'+id).focus();
			//$('#text-calendar'+id).trigger('click');
			

			$('.calendar').pignoseCalendar({  
				format: 'YYYY-MM-DD'
			});	



		}*/




	</script>
	@endpush
