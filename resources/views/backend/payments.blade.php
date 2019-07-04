@extends('layouts.backend')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="page-title-box">
			<h4 class="page-title">PAYMENTS</h4>
			<ol class="breadcrumb p-0 m-0">
				<li>
					<a href="{{ route('dashboard') }}">Dashboard</a>
				</li>
				<li class="active">
					Payments
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
		

		<div class="col-xs-12">

			<div class="table-rep-plugin">
				<div class="table-responsive mb-0" data-pattern="priority-columns">
					<table id="tech-companies-1" class="table table-striped mb-0">
						<thead>
							<tr>
								<th>Amounts</th>
								<th>Recieved At </th>
								<th style="text-align: right">From</th>

							</tr>
						</thead>
						<tbody>
							@forelse($payments as $payment)
							@php
							$from = App\User::find($payment->user_id); 
							@endphp
							<tr>
								<th>{{ $payment->total_amount }}</th>
								<th>{{ $payment->created_at }}</th>
								<td align="right">{{ $from->name }}</td>
							</tr>

							@empty
							<tr>
								<th colspan="2">No Payments recieved!</th>
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