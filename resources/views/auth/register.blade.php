@extends('layouts.frontend')
@section('content')
<section class="w-100 p-tb-25 user">
  <div class="container">
    <div class="user_options-container">
      <div class="user_options-text">
        <div class="user_options-unregistered">
          <h2 class="user_unregistered-title">Have an account?</h2>
          <p class="user_unregistered-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad </p>
          <button type="button" onclick="window.location.href='{{ route('login') }}'" class="user_unregistered-signup" id="signup-button">Go to Login Panel</button>
        </div>          
      </div>
      <div class="user_options-forms form-h4" id="user_options-forms">
        <div class="user_forms-login">
          <h2 align="center" class="forms_title">Registration Panel</h2>
          <form class="forms_form" method="POST" action="{{ route('register') }}">
            @csrf
            <fieldset class="forms_fieldset">



              <div class="forms_field">
                <div class="social-login">
                  <span>Register as </span>
                  <ul class="login-with">                

                    <li>
                      <p class="float-left">
                        <input type="radio" id="type1" name="user_type" value="{{  old('user_type') == 'user' ? 'user'  : 'user' }}" 
                        @if(old('user_type') == 'user') checked @endif>
                        <label for="type1"> User </label>&nbsp;
                      </p>
                    </li>
                    <li>
                      <p class="float-left">
                        &nbsp;
                        <input type="radio" id="type2" name="user_type" value="{{  old('user_type') == 'vendor' ? 'vendor'  : 'vendor' }}"
                        @if(old('user_type') == 'vendor') checked @endif>
                        <label for="type2"> Vendor </label>
                      </p>
                    </li>                

                  </ul>

                </div>  
                @error('user_type')
                <span class="invalid-feedback" style="display: block; color: #f7871e; text-align: center" role="alert">
                 {{ $message }}
               </span>
               @enderror         
             </div>


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
              <input id="name" type="text" class="forms_field-input @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

              @error('name')
              <span class="invalid-feedback" style="display: block; color: #f7871e;" role="alert">
               {{ $message }}
             </span>
             @enderror
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
          <span class="invalid-feedback" style="display: block; color: #f7871e;" role="alert">
           {{ $message }}
         </span>
         @enderror
       </div>



     </fieldset>
     <div class="forms_buttons">
      <a class="forms_buttons-forgot" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
      <button type="submit" class="forms_buttons-action">
        {{ __('Register') }}
      </button>

      <!-- <input type="submit" value="Log In" class="forms_buttons-action"> -->
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

<style type="text/css">

  [type="radio"]:checked,
  [type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
  }
  [type="radio"]:checked + label,
  [type="radio"]:not(:checked) + label
  {
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    line-height: 20px;
    display: inline-block;
    color: #666;
  }
  [type="radio"]:checked + label:before,
  [type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #ddd;
    border-radius: 100%;
    background: #fff;
  }
  [type="radio"]:checked + label:after,
  [type="radio"]:not(:checked) + label:after {
    content: '';
    width: 12px;
    height: 12px;
    background: #f7871e;
    position: absolute;
    top: 3px;
    left: 3px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
  }
  [type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
  }
  [type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
  }


</style>
@endpush

@push('js')
<script type="text/javascript">
  $(() => {
    //$('input[type=radio][name=user_type]').change(function() {
   //   $("#socialite_facebook").attr("href", "http://prestos/login/facebook/callback/"+this.value);
   //   $("#socialite_twitter").attr("href", "http://prestos/login/twitter/callback/"+this.value);
   //   $("#socialite_linkedin").attr("href", "http://prestos/login/linkedin/callback/"+this.value);
   // });
 });

</script>
@endpush

