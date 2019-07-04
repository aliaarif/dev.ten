@extends('layouts.backend')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="page-title-box">
			<h4 class="page-title">ADD NEW FAQ </h4>
			<ol class="breadcrumb p-0 m-0">
				<li>
					<a href="{{ route('dashboard') }}">Dashboard</a>
				</li>
				<li class="active">
					Add FAQ
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
	<form method="POST" action="{{ route('admin.add.faq') }}">
		@csrf
		<div class="col-xs-12">

			<input type="text" id="question" name="question" class="form-control" placeholder="ADD a New Faq Here..." value="{{ old('question') }}" autofocus="question">
			@error('question')
			<span class="invalid-feedback" style="display: block; color: #f7871e;" role="alert">
				{{ $message }}
			</span>
			@enderror
			<br/>
			<textarea id="bodyField" name="answer" placeholder="Add The Answer"></textarea>

			@ckeditor('bodyField', ['height' => 150])

			<br/>
			<button type="submit" class="btn waves-effect waves-light btn-primary dropdown-toggle"aria-expanded="false">Add</button>

		</div>

		<div class="col-xs-12">

			<div class="table-rep-plugin">
				<div class="table-responsive mb-0" data-pattern="priority-columns">
					<table id="tech-companies-1" class="table table-striped mb-0">
						<thead>
							<tr>
								<th>Questions</th>
								<th style="text-align: right">Actions</th>

							</tr>
						</thead>
						<tbody>
							@forelse($faqs as $faq)
							<tr>
								<th>{{ $faq->question }}</th>
								<td align="right"><a href="{{ route('admin.show.edit.faq.form', $faq->id) }}">Edit</a> | <a href="{{ route('admin.delete.faq', $faq->id) }}">Delete</a></td>
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
	</form>
</div>
<!-- end row -->
@endsection

@push('js')

@endpush