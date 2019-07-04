@if(Session::has('success'))
<div align="center" class="alert alert-success alert-dismissible">
	<a href="javascript:;" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Success!</strong> {{  Session::get('success')  }}
</div>
@endif
@if(Session::has('error'))
<div align="center" class="alert alert-danger alert-dismissible">
	<a href="javascript:;" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Error!</strong> {{ Session::get('error')  }}
</div>
@endif
