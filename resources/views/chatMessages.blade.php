@extends('layouts.frontend')
@section('content')
<div class="container">	
	<div class="row">
		<vue-chat :users="{{ $users }}" :auth-user="{{Auth::user()}}" :today="'{{Carbon\Carbon::today()->format('d-M-Y')}}'" :yesterday="'{{Carbon\Carbon::yesterday()->format('d-M-Y')}}'"></vue-chat>
	</div>
</div>
@endsection

