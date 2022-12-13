<!doctype html>
<html lang="zxx">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/odometer.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/slick.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/dark.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">

    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('frontend/assets/img/favicon.png')}}">
</head>

<body data-bs-spy="scroll" data-bs-offset="120">

    <div class="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
@include('frontend.layouts.header')
@yield('content')
@include('frontend.layouts.footer')

<div class="go-top">
    <i class="fa fa-chevron-up"></i>
    <i class="fa fa-chevron-up"></i>
</div>

<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/jquery.appear.js')}}"></script>

<script src="{{asset('frontend/assets/js/odometer.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/particles.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/jquery.ripples-min.js')}}"></script>

<script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/jquery.ajaxchimp.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/form-validator.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/contact-form-script.js')}}"></script>

<script src="{{asset('frontend/assets/js/main.js')}}"></script>
@yield('js')
</body>

</html>
