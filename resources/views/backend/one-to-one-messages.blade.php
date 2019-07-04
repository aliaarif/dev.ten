<div class="list-group bs-ui-list-group">
	<a href="#" class="list-group-item text-white active" >
		All Conversation With {{ $vendor->name }} 
	</a>


	@foreach($messages as $msg)
	<div class="container1">
		<img src="{{ $vendor->avatar }}" alt="Avatar" style="width:100%;">
		<p>Hello. How are you today?</p>
		<span class="time-right">11:00</span>
	</div>

	<div class="container1 darker">
		<img src="/w3images/avatar_g2.jpg" alt="Avatar" class="right" style="width:100%;">
		<p>Hey! I'm fine. Thanks for asking!</p>
		<span class="time-left">11:01</span>
	</div>
	@endforeach
	<a href="#" class="list-group-item ">
		<input type="text"  name="message" id="message" style="border: 0; width: 100%;  height: 40px;" placeholder="Type here and hit enter to start a conversation with {{ $vendor->name }}" />
	</a>
	
</div>