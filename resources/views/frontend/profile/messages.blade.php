@extends('layouts.frontend')
@section('content')
<section class="w-100 head-bg p-tb-25">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="paging">
					<h1 class="h1-title"><span>All</span> Messages</h1>                     
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a>Message</a></li>
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
                @foreach($vendors as $vendor)
					<div class="profile-title" style="cursor:pointer" onclick="loadVendorMessages('{{ $vendor->id }}')">
						{{ $vendor->name }}
					</div>
				@endforeach
				</div>

			</div>
			<div class="col-lg-9 col-md-9">
				<div class="about-company">
					<div class="about-topsec">
						<div class="row" id="msgBox">
							<div class="col-lg-6 col-md-6">
							@foreach($lastConversations as $con)
	    					<div class="brnad-name">{{ $s_user->name }}: {{ $con->message }}</div>
    							@endforeach
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
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">

    function loadVendorMessages(s_id){
    	axios.get('/rmessages/'+s_id)
    	.then(function (res) {
        	$('#msgBox').html(res.data);
    	});
   }



	



</script>

@endpush
