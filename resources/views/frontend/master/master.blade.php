<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="{{ asset('').'frontend/' }}">
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/custome.css">
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
</head>

<body>
	<!--header -->
		@include('frontend.master.header')
		<!-- End header -->
		@yield('content')
		<!-- subscribe -->
		@include('frontend.master.subscribe')
		<!--end  subscribe -->
		<!-- footer -->
		@include('frontend.master.footer')
		<!--end  footer -->

		<!-- jQuery -->
		@section('script')
		<script src="js/jquery.min.js"></script>

		<!-- Bootstrap -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Waypoints -->
		<script src="js/jquery.waypoints.min.js"></script>
		<!-- Flexslider -->
		<script src="js/jquery.flexslider-min.js"></script>

		<!-- Magnific Popup -->
		<script src="js/jquery.magnific-popup.min.js"></script>
		
		


		<!-- Main -->
		<script src="js/main.js"></script>

		@show()
		


	</body>

	</html>