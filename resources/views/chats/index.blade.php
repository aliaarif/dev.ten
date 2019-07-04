@extends('layouts.frontend')
@section('content')
<section class="w-100 head-bg p-tb-25">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="paging">
					<h1 class="h1-title"><span>Chats</span></h1>                     
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a>Chats</a></li>
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
				

        
   
            <div class="column is-7">
                <div class="panel">
                    
                        <div class="panel-heading">
                            List of all friends
                        </div>
                    

                    
                    @forelse($friends as $friend)
                    
                        <a  href="{{ route('chats.show', $friend->id) }}" class="panel-block">
							{{ $friend->name }}
						</a>
                       
                    @empty
                    <div class="panel-block">
                    You don't have any friend. 
                    </div>
                    @endforelse    
                    
                    
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


