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

			<div class="search-bx2">
				<button type="submit"  class="btn-submit s-icon3">SEARCH</button>
			</div>
		</form>


	</div>


	<ul class="right-ul" id="filteredResults">
		@forelse($searchResults as $search)
		<li>
			<div class="servic-bx">
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
				<div class="book-now"><a href="{{ route('show.profile', $search->remember_token) }}">Book Now</a></div>
			</div>
		</li>
		@empty
		<div class="servic-bx">
			<div class="service-title">No Result Found.</div>
		</div>
		@endforelse

	</ul>
</div>

<div align="center" class="row" style="padding-left: 7px;">
	@if($searchResults){{ $searchResults->links() }}@endif
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



