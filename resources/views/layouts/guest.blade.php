<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <title>Warehouse - Landing Page</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    
    <!-- GOOGLE FONTS -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/themify/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/magnific-popup/magnific-popup.css') }}">

    <!-- VENDOR CSS STYLE -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/slick/slick-theme.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/style-guest.css') }}">
    
    <!-- FAVICON -->
    <link rel="icon" href="{{ asset('asset/images/favicon.png') }}" type="image/x-icon">

</head>

<body>

    @include('partials.guest.header')

    @include('partials.guest.slider')

    @yield('section')

    @include('partials.guest.footer')

    @include('partials.guest.scroll')

    <!-- VENDOR JS -->
    <script src="{{ asset('asset/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/counterup/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/counterup/jquery.counterup.min.js') }}"></script>

    <!-- MAIN JS -->
    <script src="{{ asset('asset/js/script.js') }}"></script>

</body>

</html>
