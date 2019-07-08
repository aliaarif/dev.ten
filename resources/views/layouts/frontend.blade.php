<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="{{ asset('frontAssets/images/favicon.png') }}" sizes="16x16" type="image/png">
<link href="https://fonts.googleapis.com/css?family=Dosis:500,600|Roboto:400,500" rel="stylesheet">
<!-- <script src="https://use.fontawesome.com/54eae9f565.js') }}"></script>  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('frontAssets/css/portfolio.css') }}">
<link rel="stylesheet" href="{{ asset('frontAssets/css/owl.carousel.min.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('frontAssets/css/owl.theme.default.min.css') }}"> -->
<link rel="stylesheet" href="{{ asset('frontAssets/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('frontAssets/css/lightbox.min.css') }}">

<link rel="stylesheet" href="{{ asset('frontAssets/css/responsive.css') }}">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="userId" content="{{ Auth::check() ? Auth::id() : null }}">
<!-- Scripts -->
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/app.js') }}" defer></script>
@stack('css')


<!-- Scripts -->
<script>
  window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
    ]) !!};
  </script>
  <script src="https://js.stripe.com/v3/"></script>
  <!-- Styles -->
  <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
  <meta name="description" itemprop="description" content="">
  <meta name="keywords" itemprop="keywords" content=""> 
  <meta name="robots" content="noindex, nofollow">
  <meta name="title" content="{{ config('app.name', 'Laravel') }}  {{ '| '.$pageTitle }}">
  <title>{{ config('app.name', 'Laravel') }}  {{ '| '.$pageTitle }}</title>
  <style>
    #header {
      height: 100%;
    }

    .chat {
      height: 100%;
      max-height: 100%;
      display: flex;
      flex-direction: column;
    }

    .main-wrapper {
      flex: 1;
      overflow: hidden;
      margin: 0 !important;
    }

    .message-input-wrapper {
      margin: 0;
      display: flex;
      align-items: center;
      padding: .5rem;
    }
  </style>
</head>
<body>
  <div id="wrapper">
    <header class="header" >

      <nav id="nav" class="navbar navbar-light navbar-expand-lg mainmenu">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{  asset('frontAssets/images/logo.png') }}" alt="{{ config('app.name', 'Laravel') }}">
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">


      <!--       <li class="@if(Request::segment(1) == null) active @endif"><a href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a></li>
        <li class="@if(Request::segment(1) == 'about') active @endif"><a href="{{ route('about') }}">About</a></li> -->                        

        <li class="@if(Request::segment(1) == 'professional') active @endif"><a href="{{ route('professional') }}">Are You Professional?</a></li>
        <li class="@if(Request::segment(1) == 'contact') active @endif"><a href="{{ route('contact') }}">Contact</a></li>


        @guest
        @if (Route::has('register'))
        <li class="@if(Request::segment(1) == 'register') active @endif">
          <a  href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
        <li class="@if(Request::segment(1) == 'login') active @endif">
          <a href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>

        @else



        <li class="dropdown">
          <a class="dropdown-toggle" href="javascript:;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
             <a href="{{ route('user.profile') }}">
               Profile
             </a>
           </li>
           <li>
            <a href="{{ route('user.invoice') }}">
              My Invoices
            </a>
          </li> 

          <li>
           <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
           {{ __('Logout') }}
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li> 




    </ul>
  </li> 

  @endguest



            <!--     
                <li class="dropdown">
                <a class="dropdown-toggle" href="javascript:;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Log In</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a href="registration.php">Registration</a></li>
                <li><a href="forgot-password.php">Forgot Password?</a></li>
                <li><a href="reset-password.php">Reset Password?</a></li>                            
                </ul>
                </li> 
              -->


            </ul>
          </div>
        </div>
      </nav>


      <!--End Header-->
      <!-- End here header section -->  

    </header>


    @include('partials.alert')
    
    @yield('content')



    <!-- ++++++++start footer section +++++++++++ -->
    <!--footer Area-->






    @include('frontend.includes.footer')

    <a href="#" id="scroll" style="display: none;"><span></span></a>

  </div>
  <!-- <script src="{{ asset('js/app.js') }}"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="{{ asset('frontAssets/js/lightbox-plus-jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontAssets/js/portfolio.js') }}"></script>
  <script src="{{ asset('frontAssets/js/owl.carousel.min.js') }}"></script>

  <script type="text/javascript" src="{{ asset('frontAssets/js/custom.js') }}"></script>
  
  <!-- <script type="text/javascript" src="{{ asset('frontAssets/js/login-form.js') }}"></script> -->
  @stack('js')
</body>
</html>
<!--End Here footer Area-->



