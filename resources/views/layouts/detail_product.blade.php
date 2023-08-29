<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="shortcut icon" href="{{asset('storage/assets/favicon_io/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('storage/assets/favicon_io/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('storage/assets/favicon_io/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('storage/assets/favicon_io/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('storage/assets/favicon_io/site.webmanifest')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">


    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/detailpage.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/footer-main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/easyzoom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.css') }}">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- CSS Libraries -->
</head>
<body class="antialiased">
<div class="main-wrapper">
    <!-- Header -->
    <div class="fixed top-0 header-nav w-full mr-0">
        @include('components.navs-menu')
        @include('components.navbar-menu')
    </div>
    <!-- Main Content -->
    <div class="main-content" id="refreshaddcart">
        @include('components.detailpage.breadcrumb')
        <section class="product-slider-section">
            @include('components.detailpage.content')
        </section>
    </div>
    <div class="wrap-main-footer p-0 m-0 bg-dark">
        <!-- Footer -->
        @include('components.footer')
        {{--@if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->level == 0 )
        <div class="spacer bg-dark m-0 p-0"></div>
        @endif--}}
    </div>
</div>

<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
        crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/detailpage.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/all.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/detailproduct.js') }}"></script>

{{--CAROUSEL PRODUCTS--}}
<script>
    $(document).ready(function () {
        $('.sc-products-carousel').owlCarousel({
            loop: false,
            center: false,
            margin: 3,
            lazyLoad: true,
            autoWidth: true,
            nav: true,
            item: 7,
            slideBy: 7,
            navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            dots: false,
            responsive: {
                350: {
                    items: 2,
                    slideBy: 2,
                    margin: 5,
                },
                600: {
                    items: 4,
                    slideBy: 4
                },
                1000: {
                    items: 5,
                    slideBy: 5
                }
            }
        })
    });
</script>

</body>
</html>
