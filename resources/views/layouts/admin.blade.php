<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Warehouse - Dashboard</title>
    
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="{{ asset('asset/vendor/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('asset/vendor/simplebar/simplebar.css') }}" rel="stylesheet" />

  <!-- VENDOR CSS STYLE -->
  <link href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/vendor/nprogress/nprogress.css') }}" rel="stylesheet" />
  <link href="{{ asset('asset/vendor/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('asset/vendor/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
  <link href="{{ asset('asset/vendor/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link href="{{ asset('asset/vendor/toaster/toastr.min.css') }}" rel="stylesheet" />

  <!-- MAIN CSS -->
  <link id="main-css-href" rel="stylesheet" href="{{ asset('asset/css/style-admin.css') }}" />

  <!-- FAVICON -->
  <link href="{{ asset('asset/images/favicon.png') }}" rel="shortcut icon" />

  <script src="{{ asset('asset/vendor/nprogress/nprogress.js') }}"></script>
</head>


<body class="@auth navbar-fixed sidebar-fixed @else bg-light-gray @endauth " id="body">
    @auth
    <script>
        NProgress.configure({ showSpinner: false });
        NProgress.start();
    </script>
    @endauth
    
    @include('components.flasher.flasher')
    
    @auth

    <div class="wrapper">
        @include('partials.admin.sidebar')
        <div class="page-wrapper">
            
            @include('partials.admin.navbar')

            @yield('section')
            
            @include('partials.admin.footer')

        </div>
    </div>

    @else
    
    @yield('authentication')

    @endauth

    <script src="{{ asset('asset/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/simplebar/simplebar.min.js') }}"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
    <script src="{{ asset('asset/vendor/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('asset/vendor/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('asset/vendor/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>
    <script src="{{ asset('asset/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
        jQuery('input[name="dateRange"]').daterangepicker({
        autoUpdateInput: false,
        singleDatePicker: true,
        locale: {
            cancelLabel: 'Clear'
        }
        });
        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
            jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
        });
        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
            jQuery(this).val('');
        });
        });
    </script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="{{ asset('asset/vendor/toaster/toastr.min.js') }}"></script>
    <script src="{{ asset('asset/js/mono.js') }}"></script>
    <script src="{{ asset('asset/js/chart.js') }}"></script>
    <script src="{{ asset('asset/js/map.js') }}"></script>
    <script src="{{ asset('asset/js/custom.js') }}"></script>
  </body>
</html>