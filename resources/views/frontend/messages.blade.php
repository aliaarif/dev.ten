@extends('layouts.frontend')
@section('content')
<section class="w-100 head-bg p-tb-25">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="paging">
					<h1 class="h1-title"><span>MESSAGE</span></h1>                     
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a>Messages</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</section>
<section class="w-100 p-tb-70" id="app">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<vue-chat :channels="{{ $channels }}"></vue-chat>
			</div>
		</div>
	</div>

</section>
@endsection
@push('css')

@endpush
