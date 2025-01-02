<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">


<!-- Mirrored from connectme-html.themeyn.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Dec 2024 17:10:29 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Page Title -->
    <title>Messages </title>
    <!-- Page Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assetsMessenger/css/bundle0ae1.css?v1310') }} ">
    <link rel="stylesheet" href="{{ asset('assetsMessenger/css/app0ae1.css?v1310') }} ">

    <link rel="icon" type="image/png" href="{{ asset('assetsClient/images/favicon.png') }} ">
</head>

<body class="tyn-body">
    <div class="tyn-root">
        {{-- nav --}}
        @include('client.contents.messenger.nav')

        <div class="tyn-content tyn-content-full-height tyn-chat has-aside-base">
            {{-- sibar --}}
            @include('client.contents.messenger.mobileChat.sibar')
 
        </div>

    </div><!-- .tyn-root -->
</body>
<script src="{{ asset('assetsMessenger/js/bundle0ae1.js?v1310') }} "></script>
{{-- <script src="{{ asset('assetsMessenger/js/app0ae1.js?v1310') }} "></script> --}}


</html>
