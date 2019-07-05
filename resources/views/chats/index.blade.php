@extends('layouts.frontend')
@section('content')
<section class="w-100 head-bg p-tb-25">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="paging">
					<h1 class="h1-title"><span>Booked Vendors</span></h1>                     
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a>List of my booked vendors</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</section>
<section>
	<div class="container">
		<div class="column-is-8 is-offset-2">
		  @forelse($friends as $friend)
			<a  href="{{ route('chats.show', $friend->id) }}" class="panel-block" >
				<div class="card" style="justify-content:space-between;" >
    				<div class="card-body" >
						{{ $friend->name }} 
					</div>
					<onlineusers v-bind:friend="{{ $friend }}" v-bind:onlineusers="onlineUsers" ><onlineusers>
  				</div>
				  <br/>
			</a>
			@emptY
			<div class="card">
    			<div class="card-body">
					You don't have any friend. 
				</div>
  			</div>
            @endforelse                       
	</div>
</div>
</section>
@endsection
@push('css')
<!-- ++++++ login form style +++++++++ -->
<link rel="stylesheet" type="text/css" href="{{  asset('frontAssets/css/headstyle.css') }}">
@endpush


