@component('mail::message')
# A new booking is comming from {{ $data['user_name'] }}
<strong>Booking Date: {{ $data['booking_date'] }}</strong>



@component('mail::button', ['url' => 'http://dev.ten/show/profile/'.$user_token])
Show User Profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
