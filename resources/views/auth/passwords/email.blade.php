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

      <div class="user_options-forms form-h3" id="user_options-forms">
        <div class="user_forms-login">

          
          @if (session('status'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          @endif
          <h2 align="center" class="forms_title">Forgot password Panel</h2>
          <form class="forms_form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <fieldset class="forms_fieldset">
             <div class="forms_field">
              <input id="email" type="email" class="forms_field-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

              @error('email')
              <span class="invalid-feedback" style="display: block; color: #f7871e;" role="alert">
               {{ $message }}
             </span>
             @enderror


           </div>
         </fieldset>
         <div class="forms_buttons">
          <button type="submit" class="forms_buttons-action">
            {{ __('Send Password Reset Link') }}
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

