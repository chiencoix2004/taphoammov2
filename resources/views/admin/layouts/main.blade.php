<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="dark" data-bs-theme="dark">


<!-- Mirrored from mannatthemes.com/approx/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Nov 2024 13:37:52 GMT -->

<head>


    <meta charset="utf-8" />
    <title>Dashboard | Approx - Admin & Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets3/images/favicon.ico') }}">

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/iconoir/4.5/css/iconoir.css" rel="stylesheet"> --}}


    <!-- App css -->
    <link href="{{ asset('assets3/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets3/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets3/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <style>
        html[data-bs-theme="dark"] {
            background-color: #333 !important;
            color: #fff !important;
        }

       
    </style>

</head>

<body>

    <!-- Top Bar Start -->
    @include('admin.layouts.nav')
    <!-- Top Bar End -->
    <!-- leftbar-tab-menu -->
    @include('admin.layouts.sidebar')
    <!--end startbar-->
    <div class="startbar-overlay d-print-none"></div>
    <!-- end leftbar-tab-menu-->

    <div class="page-wrapper">

        <!-- Page Content-->
        @yield('content')

        @include('admin.layouts.footer')
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <!-- vendor js --> 
    <script src="{{ asset('assets3/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets3/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets3/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets3/apexcharts.com/samples/assets/stock-prices.js') }}"></script>
    <script src="{{ asset('assets3/js/pages/index.init.js') }}"></script>
    <script src="{{ asset('assets3/js/DynamicSelect.js') }}"></script>
    <script src="{{ asset('assets3/js/app.js') }}"></script>


</body>
<!--end body-->


<!-- Mirrored from mannatthemes.com/approx/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Nov 2024 13:38:33 GMT -->

</html>
