@extends('layouts.frontend')
@section('content')
<section class="w-100 p-tb-25 user">
  <div class="container">
      <div class="user_options-container">
          <div class="user_options-text">
              <div class="user_options-unregistered">
                <h2 class="user_unregistered-title">Have an account? </h2>
                <p class="user_unregistered-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad </p>
                <button type="button" onclick="window.location.href='{{ route('login') }}'" class="user_unregistered-signup" id="signup-button">Go to Login Panel</button>
            </div>
            
        </div>

        <div class="user_options-forms form-h2" id="user_options-forms">
          <div class="user_forms-login">
            <h2 align="center" class="forms_title">Reset Password Panel</h2>
            <form class="forms_form" method="POST" action="{{ route('password.update') }}">
                @csrf
                <fieldset class="forms_fieldset">



                    <div class="forms_field">
                        <input id="email" type="text" class="forms_field-input @error('email') is-invalid @enderror" placeholder="Please Provide your Email" name="email" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" style="display: block; color: #f7871e;" role="alert">
                           {{ $message }}
                       </span>
                       @enderror
                   </div>

                   <div class="forms_field">
                    <input id="password" type="password" class="forms_field-input @error('password') is-invalid @enderror" placeholder="New Password" name="password" required autocomplete="password">

                    @error('password')
                    <span class="invalid-feedback" style="display: block; color: #f7871e;" role="alert">
                     {{ $message }}
                 </span>
                 @enderror
             </div>

             <div class="forms_field">
                <input id="password_confirmation" type="password" class="forms_field-input @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" name="password_confirmation" required autocomplete="password_confirmation">
            </div>
        </fieldset>
        <div class="forms_buttons">
          <!-- <a class="forms_buttons-forgot" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a> -->
            <button type="submit" class="forms_buttons-action">
             {{ __('Reset Password') }}
         </button>
     </div>
 </form>
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


