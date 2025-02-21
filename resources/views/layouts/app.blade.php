<!doctype html>
<html lang="en" dir="rtl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KidSteck</title>
    <link rel="icon" href="{{ asset('imgs/logo.png') }}"> 
	
	<link rel="stylesheet" type="text/css" href="{{ asset('site/css/all.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('common/css/bootstrap.rtl.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('site/css/owl.carousel.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('site/css/owl.theme.default.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('site/css/slick.css') }}">
	<!-- Popup CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('site/css/magnific-popup.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('site/css/meanmenu.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('site/css/font-family/font-family-two.css') }}">
	<link rel="stylesheet" href="{{ asset('site/css/preloader.css') }}">
	<!-- KIDS CSS -->
	<link href="{{ asset('site/css/style.css') }}" rel="stylesheet">
	<!-- responsive css -->
	<link href="{{ asset('site/css/responsive.css') }}" rel="stylesheet">
    
</head>


<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- =======================
    end Preloader
======================== -->
<body class="homepage-two">
    @include('partials.site._header_top')
    <!-- Header-top -->
    @include('partials.site._navbar')
 
    @yield('content')
 
 

 
 


    @include('partials.site._footer')
   <!-- Theme Need JS -->
   <script src="{{ asset('site/js/jquery.min.js') }}"></script>
   <script src="{{ asset('site/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('site/js/jquery.sticky.js') }}"></script>
   <script src="{{ asset('site/js/waypoints.min.js') }}"></script>
   <script src="{{ asset('site/js/jquery.counterup.min.js') }}"></script>
   <script src="{{ asset('site/js/owl.carousel.min.js') }}"></script>
   <script src="{{ asset('site/js/slick.min.js') }}"></script>
   <script src="{{ asset('site/js/isotope.pkgd.min.js') }}"></script>
   <script src="{{ asset('site/js/jquery.magnific-popup.min.js') }}"></script>
   <script src="{{ asset('site/js/jquery.meanmenu.min.js') }}"></script>
   <script src="{{ asset('site/js/kids.js') }}"></script>
   
   
</body>
</html>