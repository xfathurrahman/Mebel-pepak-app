<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    @isset($meta)
        {{ $meta }}
    @endisset

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Template Stisla CSS -->
    <link rel="stylesheet" href="{{asset('stisla/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/components.css')}}">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico')  }}" type="image/x-icon">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class="font-sans antialiased sidebar-style-1">

<div id="app">
    <div class="main-wrapper">
        @include('components.dashboard.navigation-menu')
        @include('components.dashboard.sidebar-menu')

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-body">
                    {{ $slot }}
                </div>
            </section>
        </div>

    </div>

    @stack('modals')

    @livewireScripts

    @include('components.dashboard.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    {{--NICE SCROLL untuk sidebar--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('stisla/js/scripts.js')}}"></script>
    <script src="{{ asset('stisla/js/custom.js')}}"></script>
    <script src="{{ asset('js/image-uploader.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/all.js') }}"></script>

    <script type="text/javascript">
        $("document").ready(function () {
            setTimeout(function () {
                $("div.alert").remove();
            }, 2500);
        });
    </script>

</div>
</body>

</html>
