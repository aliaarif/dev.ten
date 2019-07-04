@component('mail::message')
# Congratulations you have successfully booked {{ $data['vendor_name'] }} for the date {{ $data['booking_date'] }}

@component('mail::button', ['url' => 'http://dev.ton-events/booking/'.$data['token']])
Show {{ $data['vendor_name'] }}'s Profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent