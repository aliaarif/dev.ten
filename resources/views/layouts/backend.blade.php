<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="WebSiteName">
	<meta name="author" content="WebSiteName">

	<!-- App favicon -->
	<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
	<!-- App title -->
	<title>{{ config('app.name', 'Laravel') }}  {{ '| '.$pageTitle }}</title>

	<!-- date range picker -->
	<link href="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">


	<!-- Plugins css-->
	<link href="{{ asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/multiselect/css/multi-select.css') }}"  rel="stylesheet" type="text/css" />
	<link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />

	<!-- App css -->
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/menu.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('plugins/switchery/switchery.min.css') }}">

	<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>

    


    @stack('css')

</head>


<body class="fixed-left">

	<!-- Begin page -->
	<div id="wrapper">

		<!-- Top Bar Start -->
		<div class="topbar">

			<!-- LOGO -->
			<div class="topbar-left">
				<a href="{{ url('/') }}" class="logo"><span>Ton <span> Event</span></span><i class="mdi mdi-layers"></i></a>
			</div>

			<!-- Button mobile view to collapse sidebar menu -->
			<div class="navbar navbar-default" role="navigation">
				<div class="container">

					<!-- Navbar-left -->
					<ul class="nav navbar-nav navbar-left">
						<li>
							<button class="button-menu-mobile open-left waves-effect">
								<i class="mdi mdi-menu"></i>
							</button>
						</li>
					</ul>

					<!-- Right(Notification) -->
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown user-box">
							<a href="#" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
								<img src="{{ asset(Auth::user()->avatar) }}" alt="user-img" class="img-circle user-img">
							</a>

							<ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
								<li>
									<h5>Hi, {{ Auth::user()->name }}</h5>
								</li>
								<li><a href="{{ route('user.profile') }}"><i class="ti-user m-r-5"></i> Profile</a></li>
											<!-- <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i> Settings</a></li>
												<li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a></li> -->
												<li>
													<a href="{{ route('logout') }}"
													onclick="event.preventDefault();
													document.getElementById('logout-form').submit();"><i class="ti-power-off m-r-5"></i> {{ __('Logout') }}</a>
													<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
														@csrf
													</form>
												</li>
											</ul>
										</li>


									</ul> <!-- end navbar-right -->

								</div><!-- end container -->
							</div><!-- end navbar -->
						</div>
						<!-- Top Bar End -->


						<!-- ========== Left Sidebar Start ========== -->
						<div class="left side-menu">
							<div class="sidebar-inner slimscrollleft">

								<!--- Sidemenu -->
								<div id="sidebar-menu">
									<ul>
										<li class="menu-title">Navigation</li>

										<li class="has_sub">
											<a href="{{ url('/dashboard') }}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
										</li>

										

										@hasrole('vendor')
										<li class="has_sub">
											<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i><span> Profile </span> <span class="menu-arrow"></span></a>
											<ul class="list-unstyled">
												<li><a href="{{ route('user.profile') }}">Update</a></li>
												<li><a href="{{ route('user.invoice') }}">Invoice</a></li>
												<li><a href="javascript:;">Logout</a></li>
											</ul>
										</li>

										<li><a href="{{ route('vendor.portfolio') }}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Portfolio </span> </a></li>

										<li><a href="{{ route('vendor.availabilities') }}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> My Availablities </span> </a></li>
										@endhasrole
										



										@hasrole('admin')
										<li><a href="{{ route('admin.users.index') }}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Manage Users </span> </a></li>
										<li><a href="{{ route('admin.add.faq') }}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Add New Faq </span> </a></li>
										<li><a href="{{ route('admin.payments') }}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Payments </span> </a></li>
										@endhasrole

									</ul>
								</div>
								<!-- Sidebar -->
								<div class="clearfix"></div>

								<div class="help-box">
									<h5 class="text-muted m-t-0">For Help ?</h5>
									<p class=""><span class="text-custom">Email:</span> <br/> support@prestos.com</p>
									<p class="m-b-0"><span class="text-custom">Call:</span> <br/> (+123) 123 456 789</p>
								</div>

							</div>
							<!-- Sidebar -left -->

						</div>
						<!-- Left Sidebar End -->



						<!-- ============================================================== -->
						<!-- Start right Content here -->
						<!-- ============================================================== -->
						<div class="content-page">
							<!-- Start content -->
							<div class="content">
								<div class="container">


									@yield('content')


								</div> <!-- container -->

							</div> <!-- content -->

							<footer class="footer text-right">
								2019 © Ton Events.
							</footer>

						</div>

					</div>
					<!-- END wrapper -->



					<script>
						var resizefunc = [];
					</script>

					<!-- jQuery  -->
					<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

					<!-- <script src="{{ asset('frontAssets/js/jquery-3.1.1.min.js') }}"></script> -->


					<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
					<script src="{{ asset('assets/js/detect.js') }}"></script>
					<script src="{{ asset('assets/js/fastclick.js') }}"></script>
					<script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
					<script src="{{ asset('assets/js/waves.js') }}"></script>
					<script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
					<script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>
					<script src="{{ asset('plugins/switchery/switchery.min.js') }}"></script>

					<!-- Counter js  -->
					<script src="{{ asset('plugins/waypoints/jquery.waypoints.min.js') }}"></script>
					<script src="{{ asset('plugins/counterup/jquery.counterup.min.js') }}"></script>

					<script src="{{ asset('plugins/moment/moment.js') }}"></script>
					<script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>



					<script src="{{ asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}"></script>
					<script src="{{ asset('plugins/multiselect/js/jquery.multi-select.js') }}"></script>
					<script src="{{ asset('plugins/jquery-quicksearch/jquery.quicksearch.js') }}"></script>
					<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
					<script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
					<script src="{{ asset('plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
					<script src="{{ asset('plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>
					<script src="{{ asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>


					<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.3.0/fullcalendar.min.js"></script>

					<script src="{{ asset('plugins/autocomplete/jquery.mockjax.js') }}"></script>
					<script src="{{ asset('plugins/autocomplete/jquery.autocomplete.min.js') }}"></script>
					<script src="{{ asset('plugins/autocomplete/countries.js') }}"></script>






					<!-- <script src="{{ asset('assets/pages/jquery.autocomplete.init.js') }}"></script> -->

					<script src="{{ asset('assets/pages/jquery.form-advanced.init.js') }}"></script>

					<!-- App js -->
					<script src="{{ asset('assets/js/jquery.core.js') }}"></script>
					<script src="{{ asset('assets/js/jquery.app.js') }}"></script>
					<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
					<script type="text/javascript">
						$(() => {
							$('#state').on('change', () => {
								let state_id = $('#state').val();
								axios.get('/get-cities/'+state_id)
								.then(function (res) {
									//console.log(res);
									$('#city').html('');
									$('#city').append(res.data);
									$('#city').selectpicker('refresh');
								})
								.catch(function (err) {
									console.log(err);
								});


							});



						});
					</script>
					@stack('js')
				</body>

				</html>
