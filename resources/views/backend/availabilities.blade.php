@extends('layouts.backend')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="page-title-box">
			<h4 class="page-title">FREEZ THE DATES</h4>
			<ol class="breadcrumb p-0 m-0">
				<li>
					<a href="{{ route('dashboard') }}">Dashboard</a>
				</li>
				<li class="active">
					Freez The Dates
				</li>
			</ol>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- end row -->
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<strong>Well done!</strong> {{ Session::get('success') }}
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<strong>Oops!</strong> {{ Session::get('error') }}
	message.
</div>
@endif
<div class="row">
	<div class="col-md-12">
		<input type="hidden" name="freezed_dates" id="freezed_dates" value="{{ Auth::user()->freezed_dates }}">
		<div id='calendar'></div>
	</div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css"/>
<style>
	.customBGColor1{
		background-color: #1ab394;	
	}
	.customBGColor2{
		background-color: red;	
	}
	th.ui-widget-header {
		font-size: 9pt;
		font-family: Verdana, Arial, Sans-Serif;
	}
</style>
@endpush
@push('js')
<!-- <script src="{{ asset('frontAssets/js/jquery-3.1.1.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.3.0/fullcalendar.min.js"></script> -->
<script>

	$(function () {



		let myEvents = [];
		let freezed_dates =  $('#freezed_dates').val().split(',');
		if(freezed_dates.length==1){
			freezed_dates=[];
			myEvents = freezed_dates;
		}else{			
			$.each(freezed_dates, function( index, value ) {
				myEvents.push({
					title : 'I am not available',
					start : value,
					allDay : true,
					backgroundColor: '#f00'
				});
			});
		}
		
		$('#calendar').fullCalendar({
			selectable: true,
			selectAllow: function(selectInfo) {
				return moment().diff(selectInfo.start) <= 0
			},

			showNonCurrentDates: false,
			showNonCurrentDay: false,

			eventSources: [{
				events: myEvents				
			}],
			weekends: true,

			select: function(start, end) {
				if(start.isBefore(moment())) {
					$('#calendar').fullCalendar('unselect');
					return false;
				}
			},
			
			dayClick: function(date, jsEvent, view) {
				if((date >= new Date())){
					let idx = freezed_dates.indexOf(date.format());
					$toggleC = $(this).attr('class');
					//$(this).toggleClass('customBGColor1');
					if(idx !== -1) { 
						freezed_dates.splice(idx, 1);
						if($toggleC == 'customBGColor1'){
							$(this).toggleClass('customBGColor2');
						}else{
							$(this).toggleClass('customBGColor1');
						}
						$('#freezed_dates').val(freezed_dates.toString());
					}else {
						freezed_dates.push(date.format());
						if($toggleC == 'customBGColor2'){
							$(this).toggleClass('customBGColor1');
						}else{
							$(this).toggleClass('customBGColor2');
						}
						$('#freezed_dates').val(freezed_dates.toString());
					}

				}else{
					alert(`You can't freez this date`);
				}


				let dates = $('#freezed_dates').val();
				$.ajax({
					type: "POST",
					url: '{{ route("vendor.manage.availabilities") }}',
					data: {dates: dates, _token: '{{csrf_token()}}' },
					success: function (res) {
						//$('#freezed_dates').val(res)
						console.log(res);

					},
					error: function (err, textStatus, errorThrown) {
						console.log(err);

					},
				});




			},




		});



	});

</script>
@endpush