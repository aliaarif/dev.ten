@component('mail::message')
# A new booking is comming from {{ $data['user_name'] }}
<strong>Booking Date: {{ $data['booking_date'] }}</strong>



@component('mail::button', ['url' => 'http://dev.ton-events/show/profile/'.$data['token']])
Show User Profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
