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
<meta name="friendId" content="{{ $friend->id }}">
<audio id="chatAudio">
  <source src="{{ asset('sounds/chat-audio.mp3') }}">
</audio>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
			
                <nav class="panel">
                    
                        <div class="panel-heading">
                            {{ $friend->name }}
                            
                       
                        <div class="contain is-pulled-right">
                            <a href="{{ url('/chats') }}" class="is-link"> <i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        <chats v-bind:chats="chats" v-bind:userid="{{ Auth::id() }}" v-bind:friendid="{{ $friend->id }}" ></chats>
                    </div>
                </nav>
            </div>
		</div>
	</div>
</section>
@endsection
@push('css')
<!-- ++++++ login form style +++++++++ -->
<link rel="stylesheet" type="text/css" href="{{  asset('frontAssets/css/headstyle.css') }}">
@endpush
