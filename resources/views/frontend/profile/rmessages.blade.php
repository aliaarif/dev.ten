<div class="col-lg-6 col-md-6">
    @foreach($lastConversations as $con)
	    <div class="brnad-name">{{ $s_user->name }}: {{ $con->message }}</div>
    @endforeach
</div>

					