<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tenant - Dashboard</title>

    <!-- VENDOR CSS -->
    <link href="{{ asset('assets/vendor/calendar-2/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/chartist/css/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/themify/fonts/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/owl-carousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/owl-carousel/assets/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/weather/css/weather-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style-tenant.css') }}" rel="stylesheet">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
</head>

<body>

    @include('components.flasher.flasher')

    @auth
        @include('partials.tenant.sidebar')

        @include('partials.tenant.navbar')

        <div class="content-wrap">
            <div class="main">
                @yield('section')
            </div>
        </div>
    @else
        @yield('authentication')
    @endauth

    <!-- VENDOR JS -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery/jquery.nanoscroller.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/menubar/sidebar.js') }}"></script>
    <script src="{{ asset('assets/vendor/preloader/pace.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/calendar-2/js/moment.latest.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/calendar-2/js/pignose.calendar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/calendar-2/js/pignose.init.js') }}"></script>
    <script src="{{ asset('assets/vendor/weather/js/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/weather/js/weather-init.js') }}"></script>
    <script src="{{ asset('assets/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/circle-progress/circle-progress-init.js') }}"></script>
    <script src="{{ asset('assets/vendor/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sparklinechart/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sparklinechart/sparkline.init.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl-carousel/owl.carousel-init.js') }}"></script>

    <!-- MAIN JS -->
    <script src="{{ asset('assets/js/dashboard2.js') }}"></script>
    <script src="{{ asset('assets/js/scripts-tenant.js') }}"></script>

</body>

</html>