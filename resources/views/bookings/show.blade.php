

@extends('layouts.frontend')
@section('content')
<section class="w-100 head-bg p-tb-25">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="paging">
					<h1 class="h1-title"><span>Chat with {{ $friend->name }}</span></h1>                     
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a>Chat with {{ $friend->name }}</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</section>
<section class="w-100 p-tb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
			<div class="panel">
                    <div class="panel-heading">
                            {{ $friend->name }}
                        <div class="contain is-pulled-right">
                            <a href="{{ url('/chat') }}" class="is-link"> <i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        <chat></chat> 
                    </div>
				</div>
            </div>
		</div>
	</div>
</section>
@endsection
@push('css')
<!-- ++++++ login form style +++++++++ -->
<link rel="stylesheet" type="text/css" href="{{  asset('frontAssets/css/headstyle.css') }}">
@endpush