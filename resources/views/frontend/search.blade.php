@extends('layouts.frontend')
@section('content')
<section class="w-100 head-bg p-tb-25">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="paging">
					<h1 class="h1-title"><span>All </span> Services</h1>                     
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						@if(request()->segment(2) != '')
						<li><a href="{{ route('get.search.result') }}">Services</a></li>
						<li><a>{{ ucwords(str_replace('-', ' ', request()->segment(2))) }}</a></li>
						@else
						<li><a>Services</a></li>
						@endif
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

				<ul class="arange-slider">
					
					<li>
						<form oninput="output.value = Math.round(range.valueAsNumber / 1000)">
							<h3>
								Filter By Rate ($<span id="output-2">50</span>)
							</h3>
							<div class="range">
								<input name="range" id="range" type="range" min="10" max="100000">
								<div class="range-output">
									<output style="display: none;" class="output" id="output" name="output" for="range"></output>
								</div>
							</div>
						</form>
					</li> 
				</ul>
				

				<!-- <h3>All Category</h3> -->
				<ul class="all-service">
					

					
					<li class="@if(request()->segment(2) == '') active @endif">
						<a href="{{ route('get.search.result') }}">All Category</a>
					</li> 

					<li class="@if(request()->segment(2) == 'photographer') active @endif">
						<a href="{{ route('get.search.result', 'photographer') }}">Photographer</a>
					</li>
					<li class="@if(request()->segment(2) == 'videographer') active @endif">
						<a href="{{ route('get.search.result', 'videographer') }}">Videographer</a>
					</li>
					<li class="@if(request()->segment(2) == 'dj') active @endif">
						<a href="{{ route('get.search.result', 'dj') }}">DJ</a>
					</li>
					<li class="@if(request()->segment(2) == 'photo-video-stand') active @endif">
						<a href="{{ route('get.search.result', 'photo-video-stand') }}">Photo / Video Stand</a>
					</li>
					<li class="@if(request()->segment(2) == 'caterer') active @endif">
						<a href="{{ route('get.search.result', 'caterer') }}">Caterer</a>
					</li>
					<li class="@if(request()->segment(2) == 'performers') active @endif">
						<a href="{{ route('get.search.result', 'performers') }}">Performers</a>
					</li>
					<li class="@if(request()->segment(2) == 'workshop-private-course') active @endif">
						<a href="{{ route('get.search.result', 'workshop-private-course') }}">Workshop / Private Course</a>
					</li>
					<li class="@if(request()->segment(2) == 'equipment-rental') active @endif">
						<a href="{{ route('get.search.result', 'equipment-rental') }}">Equipment Rental</a>
					</li>
					<li class="@if(request()->segment(2) == 'ephemeral-stand-show') active @endif">
						<a href="{{ route('get.search.result', 'ephemeral-stand-show') }}">Ephemeral Stand / Show</a>
					</li>
					<li class="@if(request()->segment(2) == 'company-animation') active @endif">
						<a href="{{ route('get.search.result', 'company-animation') }}">Company Animation</a>
					</li>
					<li class="@if(request()->segment(2) == 'excursions') active @endif">
						<a href="{{ route('get.search.result', 'excursions') }}">Excursions</a>
					</li>          
					<li class="@if(request()->segment(2) == 'booth-culinary-show') active @endif">
						<a href="{{ route('get.search.result', 'booth-culinary-show') }}">Booth / Culinary Show</a>
					</li>
					<li class="@if(request()->segment(2) == 'others') active @endif">
						<a href="{{ route('get.search.result', 'others') }}">Others</a>
					</li>
				</ul>
			</div>
			<div class="col-lg-9 col-md-9" id="filteredResults">
				
				<div class="row">
					<div class="search-form inner-search">
						<form id="searchFrom" action="{{ route('find.professionals') }}" method="POST" autocomplete="off">
							@csrf

							<div class="autocomplete search-bx2">
								<input id="user_type" type="text" name="user_type" placeholder="Professional Type" class="typeahead1 input-search2 s-icon1 " >
							</div>

							<div class="autocomplete search-bx2">
								<input id="user_location" type="text" name="user_location" placeholder="Location" class="typeahead2 input-search2 s-icon2 ">
							</div>

							<input type="hidden" id="appURL" value="{{ config('app.url') }}">

							<div class="search-bx2">
								<button type="submit"  class="btn-submit s-icon3">SEARCH</button>
							</div>
						</form>


					</div>


					<ul class="right-ul" >
						@forelse($searchResults as $search)


						<li>
							<div class="servic-bx">
								<a href="{{ route('show.profile', $search->remember_token) }}">
									<div class="service-img"><img src="{{  asset($search->avatar) }}"></div>
									<div class="service-title">{{ $search->name }}</div>
									<div class="service-dis">{{ str_limit(str_replace('-', ' ', $search->user_type), $limit = 70, $end = '...')}}</div>
									<div class="service-area">{{ $search->user_location }}</div>
									<div class="service-title service-star">$ {{ $search->rate }}/DAY</div>
									<div class="service-star">
										@if($search->averageRating >= 4.5)
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										@elseif($search->averageRating < 4.5 && $search->averageRating > 3.5)
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star-half-o checked"></span>
										@elseif($search->averageRating >= 3.5)
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star-o "></span>
										@elseif($search->averageRating < 3.5 && $search->averageRating > 2.5)
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star-half-o checked"></span>
										<span class="fa fa-star-o "></span>
										@elseif($search->averageRating >= 2.5)
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star-o "></span>
										<span class="fa fa-star-o "></span>
										@elseif($search->averageRating < 2.5 && $search->averageRating > 1.5)
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star-half-o checked"></span>
										<span class="fa fa-star-o "></span>
										<span class="fa fa-star-o "></span>
										@elseif($search->averageRating >= 1.5)
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star-o "></span>
										<span class="fa fa-star-o "></span>
										<span class="fa fa-star-o "></span>
										@elseif($search->averageRating < 1.5 && $search->averageRating > 1.0)
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star-half-o checked"></span>
										<span class="fa fa-star-o "></span>
										<span class="fa fa-star-o "></span>
										<span class="fa fa-star-o "></span>
										@elseif($search->averageRating <= 1.0 && $search->averageRating > 0.5)
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star-o "></span>
										<span class="fa fa-star-o "></span>
										<span class="fa fa-star-o "></span>
										<span class="fa fa-star-o "></span>
										@elseif($search->averageRating <= 0.5)
										<span class="fa fa-star-half-o checked"></span>
										<span class="fa fa-star-o "></span>
										<span class="fa fa-star-o "></span>
										<span class="fa fa-star-o "></span>
										<span class="fa fa-star-o "></span>
										@else
										<span class="fa fa-star-o "></span>
										<span class="fa fa-star-o "></span>
										<span class="fa fa-star-o "></span>
										<span class="fa fa-star-o "></span>
										<span class="fa fa-star-o "></span>
										@endif
									</div>
									
								</a>
							</div>
						</li>


						<!-- <div class="servic-bx" style="clear: both;">
							<div class="service-title">{{ $searchResults->links() }}</div>
						</div> -->
						@empty
						<div class="servic-bx">
							<div class="service-title">No Result Found.</div>
						</div>
						@endforelse



					</ul>
				</div>

				<div align="center" class="row" style="padding-left: 7px;">
					@if($searchResults->isNotEmpty()){{ $searchResults->links() }}@endif
					<!-- <ul class="inner-pager">
						<li><a href="#">01</a></li>
						<li><a href="#">02</a></li>
						<li><a href="#">03</a></li>
						<li><a href="#">04</a></li>
						<li><a href="#">05</a></li>
						<li><a href="#">06</a></li>
						<li><a href="#">...</a></li>
						<li><a href="#">next</a></li>
					</ul> -->
				</div>

			</div>
		</div>
	</div>

</section>
<input type="hidden" id="u_type"  value="{{ Request::segment(2) }}">
<input type="hidden" id="u_location" value="{{ Request::segment(3) }}">
@endsection
@push('css')
<!-- ++++++ login form style +++++++++ -->
<link rel="stylesheet" type="text/css" href="{{  asset('frontAssets/css/headstyle.css') }}">
<link rel="stylesheet" type="text/css" href="{{  asset('frontAssets/css/allservicestyle.css') }}">
<link rel="stylesheet" type="text/css" href="{{  asset('frontAssets/css/range.css') }}">




<style type="text/css">

	.page-link{
		color: #ff7d00;
		border: 1px solid #ff7d00;
	}
	.page-link:hover{
		color: #ff7d00;
	}
	.page-link:outline{
		border:0;
	}

	.page-item.active .page-link{
		background-color: #ff7d00;
		border-color: #ff7d00;
		
	}

	.page-item.disabled .page-link{
		border: 1px solid #ff7d00;
		outline: 0px;
	}
	.checked {
		color: #ff7e00;
	}

	.ajax-loader {
		visibility: hidden;
		background-color: rgba(255,255,255,0.7);
		position: absolute;
		z-index: +100 !important;
		width: 100%;
		height:100%;
	}

	.ajax-loader img {
		position: relative;
		top:50%;
		left:50%;
	}

</style>
@endpush






@push('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('frontAssets/js/range.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script>
	const appURL = $('#appURL').val();
	//console.log(appURL);

	$('.ajax-loader').hide();
	const END = 'change';
	const START = 'ontouchstart' in document ? 'touchstart' : 'mousedown';
	const INPUT = 'input';
	const MAX_ROTATION = 35;
	const SOFTEN_FACTOR = 3;

	class RangeInput {

		constructor(el) {
			this.el = el;

			this._handleEnd = this._handleEnd.bind(this);
			this._handleStart = this._handleStart.bind(this);
			this._handleInput = this._handleInput.bind(this);

    //Call the plugin
    $(this.el.querySelector('input[type=range]')).rangeslider({
      polyfill: false, //Never use the native polyfill
      rangeClass: 'rangeslider',
      disabledClass: 'rangeslider-disabled',
      horizontalClass: 'rangeslider-horizontal',
      verticalClass: 'rangeslider-vertical',
      fillClass: 'rangeslider-fill-lower',
      handleClass: 'rangeslider-thumb',
      onInit: function () {
        //No args are passed, so we can't change context of this
        const pluginInstance = this;

        //Move the range-output inside the handle so we can do all the stuff in css
        $(pluginInstance.$element).
        parents('.range').
        find('.range-output').
        appendTo(pluginInstance.$handle);
    } });


    this.sliderThumbEl = el.querySelector('.rangeslider-thumb');
    this.outputEl = el.querySelector('.range-output');
    this.inputEl = el.querySelector('input[type=range]');
    this._lastOffsetLeft = 0;
    this._lastTimeStamp = 0;

    this.el.querySelector('.rangeslider').addEventListener(START, this._handleStart);
}

_handleStart(e) {
	this._lastTimeStamp = new Date().getTime();
	this._lastOffsetLeft = this.sliderThumbEl.offsetLeft;

    //Wrap in raf because offsetLeft is updated by the plugin after this fires
    requestAnimationFrame(_ => {
      //Bind through jquery because plugin doesn't fire native event
      $(this.inputEl).on(INPUT, this._handleInput);
      $(this.inputEl).on(END, this._handleEnd);
  });
}

_handleEnd(e) {
    //Unbind through jquery because plugin doesn't fire native event
    $(this.inputEl).off(INPUT, this._handleInput);
    $(this.inputEl).off(END, this._handleEnd);

    requestAnimationFrame(_ => this.outputEl.style.transform = 'rotate(0deg)');
}

_handleInput(e) {
	let now = new Date().getTime();
	let timeElapsed = now - this._lastTimeStamp || 1;
	let distance = this.sliderThumbEl.offsetLeft - this._lastOffsetLeft;
	let direction = distance < 0 ? -1 : 1;
    let velocity = Math.abs(distance) / timeElapsed; //pixels / millisecond
    let targetRotation = Math.min(Math.abs(distance * velocity) * SOFTEN_FACTOR, MAX_ROTATION);

    requestAnimationFrame(_ => this.outputEl.style.transform = 'rotate(' + targetRotation * -direction + 'deg)');

    this._lastTimeStamp = now;
    this._lastOffsetLeft = this.sliderThumbEl.offsetLeft;
}}


new RangeInput(document.querySelector('.range'));

$('#range').on('change', () => {

	//console.log(appURL);

	let rate = Math.round($('#range').val()/1000);
	let u_type = $('#u_type').val();
	let u_location = $('#u_location').val();
	let path = appURL+'filter/'+rate;
	if(u_type == '' && u_location == ''){
		u_type = 'type';
		u_location = 'location';
		path = appURL+'filter/'+u_type+'/'+u_location+'/'+rate
	}else if(u_type != '' && u_location == ''){
		u_location = 'location';
		path = appURL+'filter/'+u_type+'/'+u_location+'/'+rate
	}else{
		u_type = u_type;
		u_location = u_location;  
		path = appURL+'filter/'+u_type+'/'+u_location+'/'+rate
	}
	

	$.get(path, { type: u_type, location: u_location, rate: rate, }, function (res) {
		//console.log(res.data);
		//$('.ajax-loader').show();

		$('#filteredResults').html(res);
		
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


$('input.typeahead1').on('change', function(){
	var myStr = $(this).val();
	var strArray = myStr.split("-");
	$(this).val(strArray[0]); 
});


var path1 = "{{ route('get.user_types') }}";
$('input.typeahead1').typeahead({
	source:  function (query, process) {

		return $.get(path1, { query: query }, function (data) {
			//console.log(data);
			return process(data);
		});
	}
});

var path2 = "{{ route('get.user_locations') }}";
var type = document.getElementById('user_type').value;

$('input.typeahead2').typeahead({
	source:  function (query, process) {
		return $.get(path2, { query: query, type: type }, function (data) {
			return process(data);
		});
	}
});


$('#range').on('change', function(){
	$('#output-2').html($('#output').html());
});

</script>
@endpush