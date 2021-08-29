<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title') | {{config('app.name')}}</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta content='{{csrf_token()}}' name='csrf-token' />
	<link rel="icon" href="{{ asset('images/icons/nav-icon.png') }}" type="image/x-icon"/>

    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
	<!-- Fonts and icons -->
	<script src="{{ asset('backend/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{ asset("backend/css/fonts.css") }}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/css/azzara.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" >

	<!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('backend/css/demo.css') }}">

    {{-- For Date Picker --}}
    <link rel="stylesheet" href="{{ asset('backend/datepicker/css/bootstrap-datepicker3.standalone.min.css') }}">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
	<div class="wrapper">

		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">

                <a href="{{ route('admin.dashboard') }}" class="logo"> <h3 class="display:4 text-light mt-3">Animal Info.</h3>
					{{-- <img src="{{ asset('backend/img/logoazzara.svg') }}" alt="navbar brand" class="navbar-brand"> --}}
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

            {{-- Header --}}
            @include('admin.layout.header')
            {{-- End Header --}}

		</div>


		{{-- Navigation --}}
        @include('admin.layout.navigation')
        {{-- End Navigation --}}

        @yield('content')
	</div>
</div>

<!--   Core JS Files   -->
<script src="{{ asset('backend/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('backend/js/core/popper.min.js') }}"></script>
<script src="{{ asset('backend/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('backend/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('backend/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('backend/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Moment JS -->
<script src="{{ asset('backend/js/plugin/moment/moment.min.js') }}"></script>

<!-- Chart JS -->
{{-- <script src="{{ asset('backend/js/plugin/chart.js/chart.min.js') }}"></script> --}}

<!-- jQuery Sparkline -->
<script src="{{ asset('backend/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

{{-- <!-- Chart Circle --> --}}
<script src="{{ asset('backend/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('backend/js/plugin/datatables/datatables.min.js') }}"></script>


<!-- Azzara JS -->
<script src="{{ asset('backend/js/ready.min.js') }}"></script>


<script src="{{ asset('backend/datepicker/js/bootstrap-datepicker.min.js') }}"></script>

@include('sweetalert::alert')

@stack('custom_scripts')

</body>
</html>

