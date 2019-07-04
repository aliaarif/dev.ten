@extends('layouts.backend')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="page-title-box">
			<h4 class="page-title">Invoice </h4>
			<ol class="breadcrumb p-0 m-0">
				<li>
					<a href="{{ route('user.profile') }}">Dashboard</a>
				</li>
				<li class="active">
					Invoice
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
	
	
	<div class="col-xs-12">

		<div class="table-rep-plugin">
			<div class="table-responsive mb-0" data-pattern="priority-columns">
				<table id="tech-companies-1" class="table table-striped mb-0">
					<thead>
						<tr>
							<th>My Invoices</th>
							

						</tr>
					</thead>
					<tbody>

						@forelse($myInvoices as $myInvoice)
						@php
						$vendor = App\User::find($myInvoice->user_id);
						@endphp

						<tr>
							<td>
								
								You have booked <span><strong>{{ $vendor->name }} ( {{ ucwords(str_replace('-', ' ', $vendor->user_type)) }} )</strong></span>  
								for 
								<span><strong>{{ \Carbon\Carbon::parse($myInvoice->booking_from_date)->format('M d Y') }}</strong></span>  to 
								<span><strong>{{ \Carbon\Carbon::parse($myInvoice->booking_to_date)->format('M d Y') }}</strong></span> 

							</td>


						</tr>
						@empty
						<tr>
							<th colspan="2">No Faq added!</th>
						</tr>

						@endforelse

					</tbody>
				</table>
			</div>

		</div>
	</div><!-- end col-->

</div>
<!-- end row -->
@endsection

@push('js')

@endpush