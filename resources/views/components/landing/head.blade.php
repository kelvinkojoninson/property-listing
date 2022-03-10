<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title> Paydaily - Affordable Houses For All @yield('page-name')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/jquery-ui.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="font/flaticon.css">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/fontawesome-5-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/font-awesome.min.css') }}">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/aos2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/lightcase.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/maps.css') }}">
    <link rel="stylesheet" id="color" href="{{ asset('assets/landing/css/colors/pink.css') }}">
    <script src="{{ asset('assets/landing/js/jquery-3.5.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="http://maps.google.com/maps/api/js"></script>

  	<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>


    @php
        $userid = Auth::user() ? Auth::user()->userid : '';
    @endphp
    <script>
        var APP_URL = "{{ config('app.url') }}";
        const CREATEUSER = "{!! $userid !!}";

    </script>
</head>
