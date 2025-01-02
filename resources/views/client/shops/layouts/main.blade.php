<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/html/semi-dark-menu/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Dec 2024 16:21:29 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>CORK Admin - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="https://designreset.com/cork/html/src/assets/img/favicon.ico"/>
    <link href="{{asset('assetsShop/layouts/semi-dark-menu/css/light/loader.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assetsShop/layouts/semi-dark-menu/css/dark/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assetsShop/layouts/semi-dark-menu/loader.js')}}"></script>
{{-- {{asset('assetsShop')}} --}}
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('assetsShop/src/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assetsShop/layouts/semi-dark-menu/css/light/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assetsShop/layouts/semi-dark-menu/css/dark/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{asset('assetsShop/src/plugins/src/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assetsShop/src/assets/css/light/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assetsShop/src/assets/css/dark/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<body class="layout-boxed">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    
    @include('client.shops.layouts.header')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        
        @include('client.shops.layouts.sibar')
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
           
            @yield('content')
            <!--  BEGIN FOOTER  -->
            
            @include('client.shops.layouts.footer')

            <!--  END FOOTER  -->
        </div>
        <!--  END CONTENT AREA  -->

    </div>

    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('assetsShop/src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assetsShop/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assetsShop/src/plugins/src/mousetrap/mousetrap.min.js')}}"></script>
    <script src="{{asset('assetsShop/src/plugins/src/waves/waves.min.js')}}"></script>
    <script src="{{asset('assetsShop/layouts/semi-dark-menu/app.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{asset('assetsShop/src/plugins/src/apex/apexcharts.min.js')}}"></script>
    <script src="{{asset('assetsShop/src/assets/js/dashboard/dash_1.js')}}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>

<!-- Mirrored from designreset.com/cork/html/semi-dark-menu/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Dec 2024 16:22:03 GMT -->
</html>