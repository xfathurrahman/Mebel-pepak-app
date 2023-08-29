<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer-main.css') }}">
    <!-- General CSS Files -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="http://example.com/image-uploader.min.css">
    <!-- CSS Libraries -->
    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico')  }}" type="image/x-icon">
</head>
<body>
<div class="main-wrapper">
    <!-- Header -->
    <div class="fixed top-0 header-nav w-full mr-0">
        @include('components.navs-menu')
        @include('components.navbar-menu')
    </div>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body text-center">
                @include('components.checkout.breadcrumb')
                @include('components.checkout.content')
            </div>
        </section>
    </div>
    <!-- Footer -->
    @include('components.footer')
</div>

<!-- Scripts -->

<script src="{{ mix('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="{{ asset('js/image-uploader-checkout.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/all.js') }}"></script>

<script type="text/javascript">
    $("document").ready(function () {
        setTimeout(function () {
            $("div.alert").remove();
        }, 2500);
    });
</script>

<script>
    $('.input-images-1').imageUploader({
        imagesInputName: 'files',
        maxSize: 2 * 1024 * 1024,
        maxFiles: 1
    });
</script>

</body>
</html>
