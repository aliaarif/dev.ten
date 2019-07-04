@extends('layouts.frontend')
@section('content')


<section class="w-100 p-tb-25 user">
  <div class="container">
      <div class="user_options-container">
          <div class="user_options-text">
              <div class="user_options-unregistered">
                <h2 class="user_unregistered-title">{{ __('Verify Your Email Address') }}</h2>
                <p class="user_unregistered-text">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                </p>
                
                <span class="float-left">{{ __('If you did not receive the email') }}, 

                    <button type="button" onclick="window.location.href='{{ route('verification.resend') }}'" class="user_unregistered-signup float-left" id="signup-button">{{ __('click here to request another') }}</button>
                </div>


            </div>


        </div>
    </div>

</section>



@endsection

@push('css')
<!-- ++++++ login form style +++++++++ -->
<link rel="stylesheet" type="text/css" href="{{  asset('frontAssets/css/headstyle.css') }}">
<link rel="stylesheet" type="text/css" href="{{  asset('frontAssets/css/login-form.css') }}">
@endpush

