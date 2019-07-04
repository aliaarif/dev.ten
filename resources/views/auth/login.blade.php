@extends('layouts.frontend')
@section('content')
<section class="w-100 p-tb-25 user">
  <div class="container">
    <div class="user_options-container">
      <div class="user_options-text">
        <div class="user_options-unregistered">
          <h2 class="user_unregistered-title">Have not an account yet?</h2>
          <p class="user_unregistered-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad </p>
          <button type="button" onclick="window.location.href='{{ route('register') }}'" class="user_unregistered-signup" id="signup-button">Go to Register Panel</button>
        </div>


      </div>
      
      <div class="user_options-forms form-h1" id="user_options-forms">
        <div class="user_forms-login">
          <h2 align="center" class="forms_title">Login Panel</h2>
          <form class="forms_form" method="POST" action="{{ route('login') }}">
            @csrf
            <fieldset class="forms_fieldset">
              <div class="forms_field">
                <div class="social-login">
                  <span>Connect with</span>
                  <ul class="login-with">                
                    <li><a id="socialite_facebook" href="http://dev.ton-events/auth/facebook" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a id="socialite_twitter" href="http://dev.ton-events/auth/twitter"  title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>                
                    <li><a id="socialite_linkedin" href="http://dev.ton-events/auth/linkedin"  title="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                  </ul>
                  <span>or</span>
                </div>           
              </div>
              <div class="forms_field">
                <input id="email" type="email" class="forms_field-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" style="display: block; color: #f7871e;" role="alert">
                 {{ $message }}
               </span>
               @enderror


             </div>
             <div class="forms_field">
              <input id="password" type="password" class="forms_field-input @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </fieldset>
          <div class="forms_buttons">
            <a class="forms_buttons-forgot" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
            <button type="submit" class="forms_buttons-action">
              {{ __('Login') }}
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
