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
    <link rel="stylesheet" href="{{ asset('assetsMessenger/css/bundle0ae1.css?v1310') }}?v=1.0.0">
    <link rel="stylesheet" href="{{ asset('assetsMessenger/css/app0ae1.css?v1310') }}?v=1.0.0">

    <link rel="icon" type="image/png" href="{{ asset('assetsClient/images/favicon.png') }}?v=1.0.0">

</head>

<body class="tyn-body">

    <div class="tyn-root">
        <nav class="tyn-appbar">
            <div class="tyn-appbar-wrap">
                <div class="tyn-appbar-logo">
                    <div class="header__logo">
                        <a href="index.html">
                            <img src="{{ asset('assetsClient/images/logo/logo-3.png') }}" alt="logo">
                        </a>
                    </div>
                </div><!-- .tyn-appbar-logo -->
                <div class="tyn-appbar-content">
                    <ul class="tyn-appbar-nav tyn-appbar-nav-start">
                        <li class="tyn-appbar-item">
                            <a class="tyn-appbar-link" href="{{ route('home') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                                    viewBox="0 0 48 48">
                                    <path
                                        d="M 23.951172 4 A 1.50015 1.50015 0 0 0 23.072266 4.3222656 L 8.859375 15.519531 C 7.0554772 16.941163 6 19.113506 6 21.410156 L 6 40.5 C 6 41.863594 7.1364058 43 8.5 43 L 18.5 43 C 19.863594 43 21 41.863594 21 40.5 L 21 30.5 C 21 30.204955 21.204955 30 21.5 30 L 26.5 30 C 26.795045 30 27 30.204955 27 30.5 L 27 40.5 C 27 41.863594 28.136406 43 29.5 43 L 39.5 43 C 40.863594 43 42 41.863594 42 40.5 L 42 21.410156 C 42 19.113506 40.944523 16.941163 39.140625 15.519531 L 24.927734 4.3222656 A 1.50015 1.50015 0 0 0 23.951172 4 z M 24 7.4101562 L 37.285156 17.876953 C 38.369258 18.731322 39 20.030807 39 21.410156 L 39 40 L 30 40 L 30 30.5 C 30 28.585045 28.414955 27 26.5 27 L 21.5 27 C 19.585045 27 18 28.585045 18 30.5 L 18 40 L 9 40 L 9 21.410156 C 9 20.030807 9.6307412 18.731322 10.714844 17.876953 L 24 7.4101562 z">
                                    </path>
                                </svg>
                                <span class="d-none">Chats</span>
                            </a>
                        </li>
                    </ul><!-- .tyn-appbar-nav -->
                    <ul class="tyn-appbar-nav tyn-appbar-nav-end">
                        <li class="tyn-appbar-item">
                            <a class="d-inline-flex dropdown-toggle" data-bs-auto-close="outside"
                                data-bs-toggle="dropdown" href="#" data-bs-offset="0,10">
                                <div class="tyn-media tyn-size-lg tyn-circle">
                                    @if (Auth::user()->image == null)
                                        <img src="{{ asset('assetsMessenger/images/avatar/3.jpg') }}" alt="">
                                    @else
                                        <img src="{{ asset(Auth::user()->image) }}" alt="">
                                    @endif
                                </div>
                            </a><!-- .dropdown-toggle -->
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-gap">
                                    <div class="tyn-media-group">
                                        <div class="tyn-media tyn-size-lg">
                                            @if (Auth::user()->image == null)
                                                <img src="{{ asset('assetsMessenger/images/avatar/3.jpg') }}"
                                                    alt="">
                                            @else
                                                <img src="{{ asset(Auth::user()->image) }}" alt="">
                                            @endif
                                        </div>
                                        <div class="tyn-media-col">
                                            <div class="tyn-media-row">
                                                <h6 class="name">{{ Auth::user()->username }}</h6>
                                                {{-- <div class="indicator varified">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg><!-- check-circle-fill -->
                                                </div> --}}
                                            </div>
                                            <div class="tyn-media-row has-dot-sap">
                                                <p class="content">Happy nice day</p>
                                            </div>
                                        </div><!-- .tyn-media-col -->
                                    </div><!-- .tyn-media-group -->
                                </div><!-- .dropdown-gap -->
                                <ul class="tyn-list-links">
                                    <li>
                                        <a href="{{ route('home') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16"
                                                height="16" viewBox="0,0,300,150" style="fill:#FFFFFF;">
                                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                    stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                                    stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                                    font-weight="none" font-size="none" text-anchor="none"
                                                    style="mix-blend-mode: normal">
                                                    <g transform="scale(5.33333,5.33333)">
                                                        <path
                                                            d="M23.95117,4c-0.31984,0.01092 -0.62781,0.12384 -0.87891,0.32227l-14.21289,11.19727c-1.8039,1.42163 -2.85937,3.59398 -2.85937,5.89063v19.08984c0,1.36359 1.13641,2.5 2.5,2.5h10c1.36359,0 2.5,-1.13641 2.5,-2.5v-10c0,-0.29504 0.20496,-0.5 0.5,-0.5h5c0.29504,0 0.5,0.20496 0.5,0.5v10c0,1.36359 1.13641,2.5 2.5,2.5h10c1.36359,0 2.5,-1.13641 2.5,-2.5v-19.08984c0,-2.29665 -1.05548,-4.46899 -2.85937,-5.89062l-14.21289,-11.19727c-0.27738,-0.21912 -0.62324,-0.33326 -0.97656,-0.32227zM24,7.41016l13.28516,10.4668c1.0841,0.85437 1.71484,2.15385 1.71484,3.5332v18.58984h-9v-9.5c0,-1.91495 -1.58505,-3.5 -3.5,-3.5h-5c-1.91495,0 -3.5,1.58505 -3.5,3.5v9.5h-9v-18.58984c0,-1.37935 0.63074,-2.67883 1.71484,-3.5332z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span>Trang Chủ</span>
                                        </a>
                                    </li><!-- li -->
                                    <li>
                                        @php
    $messages = $messages ?? collect(); // Nếu $messages không tồn tại, dùng giá trị mặc định là một collection rỗng
@endphp

                                        <a href="{{ route('detailUser', Auth::user()->username) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                            </svg><!-- person -->
                                            <span>Profile</span>
                                        </a>
                                    </li><!-- li -->
                                    <li class="dropdown-divider"></li><!-- li -->
                                    <li>
                                        <a href="{{ route('logout') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                                                <path d="M7.5 1v7h1V1z" />
                                                <path
                                                    d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812" />
                                            </svg><!-- power -->
                                            <span>Đăng Xuất</span>
                                        </a>
                                    </li><!-- li -->
                                </ul><!-- .tyn-list-links -->
                            </div><!-- .dropdown-menu -->
                        </li><!-- .tyn-appbar-item -->
                    </ul><!-- .tyn-appbar-nav -->
                </div><!-- .tyn-appbar-content -->
            </div><!-- .tyn-appbar-wrap -->
        </nav><!-- .tyn-appbar -->
        <div class="tyn-content tyn-content-full-height tyn-chat has-aside-base">
            <div class="tyn-aside tyn-aside-base">
                <div class="tyn-aside-head">
                    <div class="tyn-aside-head-text">
                        <h3 class="tyn-aside-title">Chats</h3>
                    </div><!-- .tyn-aside-head-text -->
                </div><!-- .tyn-aside-head -->
                <div class="tyn-aside-body" data-simplebar>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="all-chats" tabindex="0" role="tabpanel">
                            <ul class="tyn-aside-list">
                                @foreach ($chatUsers as $chatUser)
                                    <li class="tyn-aside-item js-toggle-main active">
                                        <div class="tyn-media-group">
                                            <div class="tyn-media tyn-size-lg">
                                                @if ($chatUser['user']->image == null)
                                                    <img src="{{ asset('assetsMessenger/images/avatar/1.jpg') }}"
                                                        alt="">
                                                @else
                                                    <img src="{{ asset($chatUser['user']->image) }}" alt="">
                                                @endif
                                            </div><!-- .tyn-media -->
                                            <div class="tyn-media-col">
                                                <div class="tyn-media-row">
                                                    <h6 class="name">{{ $chatUser['user']->username }}</h6>
                                                    {{-- <span class="typing">typing ...</span> --}}
                                                </div>
                                                <div class="tyn-media-row has-dot-sap">
                                                    <p class="content">
                                                        {{ Str::limit($chatUser['last_message'], 30, '...') }}</p>
                                                    <span
                                                        class="meta">{{ $chatUser['last_message_time']->diffForHumans() }}</span>
                                                </div>
                                            </div><!-- .tyn-media-col -->
                                        </div><!-- .tyn-media-group -->
                                    </li><!-- .tyn-aside-item -->
                                @endforeach
                            </ul><!-- .tyn-aside-list -->
                        </div><!-- .tab-pane -->
                    </div><!-- .tab-content -->
                </div><!-- .tyn-aside-body -->
            </div><!-- .tyn-aside -->
            <div class="tyn-main tyn-chat-content" id="tynMain">
                <div class="tyn-chat-head">
                    <ul class="tyn-list-inline d-md-none ms-n1">
                        <li><button class="btn btn-icon btn-md btn-pill btn-transparent js-toggle-main">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                                </svg><!-- arrow-left -->
                            </button></li>
                    </ul>
                    <div class="tyn-media-group">
                        <div class="tyn-media tyn-size-lg d-none d-sm-inline-flex">
                            <img src="{{ asset('assetsMessenger/images/avatar/1.jpg') }}" alt="">
                        </div><!-- .tyn-media -->
                        <div class="tyn-media tyn-size-rg d-sm-none">
                            <img src="{{ asset('assetsMessenger/images/avatar/1.jpg') }}" alt="">
                        </div><!-- .tyn-media -->
                        <div class="tyn-media-col">
                            <div class="tyn-media-row">
                                <h6 class="name">Jasmine <span class="d-none d-sm-inline-block">Thompson</span></h6>
                            </div>
                            <div class="tyn-media-row has-dot-sap">
                                <span class="meta">Active</span>
                            </div>
                        </div><!-- .tyn-media-col -->
                    </div>
                </div><!-- .tyn-chat-head -->
                {{-- <div class="tyn-chat-body js-scroll-to-end" id="tynChatBody">
                    <div class="tyn-reply" id="tynReply"> 
                        <div class="tyn-reply-item incoming">
                            <div class="tyn-reply-avatar">
                                <div class="tyn-media tyn-size-md tyn-circle">
                                    <img src="{{ asset('assetsMessenger/images/avatar/2.jpg') }}" alt="">
                                </div>
                            </div><!-- .tyn-reply-avatar -->
                            <div class="tyn-reply-group">
                                <div class="tyn-reply-bubble">
                                    <div class="tyn-reply-text">
                                        <h6>chào bạn</h6>
                                    </div>
                                </div><!-- .tyn-reply-bubble -->
                            </div><!-- .tyn-reply-group -->
                        </div><!-- .tyn-reply-item -->
                        <div class="tyn-reply-item outgoing">
                            <div class="tyn-reply-group">
                                <div class="tyn-reply-bubble">
                                    <div class="tyn-reply-link has-thumb">
                                        <div class="tyn-reply-link-thumb">
                                            <h6 class="tyn-reply-link-title">Hello</h6>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .tyn-reply-group -->
                        </div><!-- .tyn-reply-item -->
                    </div><!-- .tyn-reply -->
                </div><!-- .tyn-chat-body --> --}}
                <div class="tyn-chat-body js-scroll-to-end" id="tynChatBody">
                    <div class="tyn-reply" id="tynReply">
                        @foreach ($messages as $message)
                            @if ($message->sender_id === Auth::id())
                                <!-- Outgoing Message (You) -->
                                <div class="tyn-reply-item outgoing">
                                    <div class="tyn-reply-group">
                                        <div class="tyn-reply-bubble">
                                            <div class="tyn-reply-link has-thumb">
                                                <div class="tyn-reply-link-thumb">
                                                    <h6 class="tyn-reply-link-title">{{ $message->message }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <!-- Incoming Message (Other User) -->
                                <div class="tyn-reply-item incoming">
                                    <div class="tyn-reply-avatar">
                                        <div class="tyn-media tyn-size-md tyn-circle">
                                            <img src="{{ $message->sender->image ? asset($message->sender->image) : asset('assetsMessenger/images/avatar/2.jpg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="tyn-reply-group">
                                        <div class="tyn-reply-bubble">
                                            <div class="tyn-reply-text">
                                                <h6>{{ $message->message }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="tyn-chat-form">
                    <div class="tyn-chat-form-insert">
                        <ul class="tyn-list-inline gap gap-3">
                            <li class="dropup">
                                <button class="btn btn-icon btn-light btn-md btn-pill" data-bs-toggle="dropdown"
                                    data-bs-offset="0,10">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                    </svg><!-- plus-lg -->
                                </button>
                                <div class="dropdown-menu">
                                    <ul class="tyn-list-links">
                                        <li><a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-person-video2"
                                                    viewBox="0 0 16 16">
                                                    <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                                    <path
                                                        d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zM1 3a1 1 0 0 1 1-1h2v2H1zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3zm-4-2h3v2H2a1 1 0 0 1-1-1zm3-1H1V8h3zm0-3H1V5h3z" />
                                                </svg><!-- person-video2 -->
                                                <span>New Group</span></a></li>
                                        <li><a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-mic" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5" />
                                                    <path
                                                        d="M10 8a2 2 0 1 1-4 0V3a2 2 0 1 1 4 0zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3" />
                                                </svg><!-- mic -->
                                                <span>Voice Clip</span></a></li>
                                    </ul>
                                </div>
                            </li><!-- li -->
                            <li class="d-none d-sm-block"><button class="btn btn-icon btn-light btn-md btn-pill">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        <path
                                            d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z" />
                                    </svg><!-- card-image -->
                                </button></li><!-- li -->
                            <li class="d-none d-sm-block"><button class="btn btn-icon btn-light btn-md btn-pill">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-emoji-smile-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5M4.285 9.567a.5.5 0 0 1 .683.183A3.5 3.5 0 0 0 8 11.5a3.5 3.5 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8" />
                                    </svg><!-- emoji-smile-fill -->
                                </button></li><!-- li -->
                        </ul>
                    </div><!-- .tyn-chat-form-insert -->
                    <div class="tyn-chat-form-enter">
                        <div class="tyn-chat-form-input" id="tynChatInput" contenteditable></div>
                        <ul class="tyn-list-inline me-n2 my-1">
                            <li><button class="btn btn-icon btn-white btn-md btn-pill">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-mic-fill" viewBox="0 0 16 16">
                                        <path d="M5 3a3 3 0 0 1 6 0v5a3 3 0 0 1-6 0z" />
                                        <path
                                            d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5" />
                                    </svg><!-- mic-fill -->
                                </button></li>
                            <li><button class="btn btn-icon btn-white btn-md btn-pill" id="tynChatSend">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z" />
                                    </svg><!-- send-fill -->
                                </button></li>
                        </ul>
                    </div><!-- .tyn-chat-form-enter -->
                </div><!-- .tyn-chat-form -->
                <div class="tyn-chat-content-aside" id="tynChatAside" data-simplebar>
                    <div class="tyn-chat-cover">
                        <img src="{{ asset('assetsMessenger/images/cover/1.jpg') }}" alt="">
                    </div><!-- .tyn-chat-cover -->
                    <div class="tyn-media-group tyn-media-vr tyn-media-center mt-n4">
                        <div class="tyn-media tyn-size-xl border border-2 border-white">
                            <img src="images/avatar/1.jpg" alt="">
                        </div>
                        <div class="tyn-media-col">
                            <div class="tyn-media-row">
                                <h6 class="name">Konstantin Frank</h6>
                            </div>
                            <div class="tyn-media-row has-dot-sap">
                                <span class="meta">Active Now</span>
                            </div>
                        </div><!-- .tyn-media-col -->
                    </div><!-- .tyn-media-group -->
                    <div class="tyn-aside-row">
                        <ul class="nav nav-btns nav-btns-stretch nav-btns-light">
                            <li class="nav-item">
                                <button class="nav-link js-chat-mute-toggle tyn-chat-mute" type="button">
                                    <span class="icon unmuted-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
                                        </svg><!-- bell-fill -->
                                    </span>
                                    <span class="unmuted-icon">Mute</span>
                                    <span class="icon muted-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-bell-slash-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M5.164 14H15c-1.5-1-2-5.902-2-7q0-.396-.06-.776zm6.288-10.617A5 5 0 0 0 8.995 2.1a1 1 0 1 0-1.99 0A5 5 0 0 0 3 7c0 .898-.335 4.342-1.278 6.113zM10 15a2 2 0 1 1-4 0zm-9.375.625a.53.53 0 0 0 .75.75l14.75-14.75a.53.53 0 0 0-.75-.75z" />
                                        </svg><!-- bell-slash-fill -->
                                    </span>
                                    <span class="muted-icon">Muted</span>
                                </button>
                            </li><!-- .nav-item -->
                        </ul><!-- .nav-btns -->
                    </div><!-- .tyn-aside-row -->
                </div><!-- .tyn-chat-content-aside -->
            </div><!-- .tyn-main -->
        </div><!-- .tyn-content -->

    </div><!-- .tyn-root -->


</body>
<script>
    const userList = document.getElementById('userList');
    const tynReply = document.getElementById('tynReply');
    const chatBody = document.getElementById('tynChatBody');

    // Xử lý khi click vào một user
    userList.addEventListener('click', function(e) {
        if (e.target.closest('.user-item')) {
            const userId = e.target.closest('.user-item').id.split('-')[1];

            // Gửi AJAX để lấy tin nhắn
            fetch(`/messages/${userId}`)
                .then((response) => response.json())
                .then((messages) => {
                    tynReply.innerHTML = ''; // Xóa tin nhắn cũ

                    messages.forEach((msg) => {
                        const messageItem = document.createElement('div');
                        messageItem.className = `tyn-reply-item ${
                        msg.sender_id === {{ Auth::id() }} ? 'outgoing' : 'incoming'
                    }`;

                        if (msg.sender_id === {{ Auth::id() }}) {
                            // Outgoing
                            messageItem.innerHTML = `
                            <div class="tyn-reply-group">
                                <div class="tyn-reply-bubble">
                                    <div class="tyn-reply-link has-thumb">
                                        <div class="tyn-reply-link-thumb">
                                            <h6 class="tyn-reply-link-title">${msg.message}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        } else {
                            // Incoming
                            messageItem.innerHTML = `
                            <div class="tyn-reply-avatar">
                                <div class="tyn-media tyn-size-md tyn-circle">
                                    <img src="${msg.sender.image || '/assetsMessenger/images/avatar/2.jpg'}" alt="">
                                </div>
                            </div>
                            <div class="tyn-reply-group">
                                <div class="tyn-reply-bubble">
                                    <div class="tyn-reply-text">
                                        <h6>${msg.message}</h6>
                                    </div>
                                </div>
                            </div>
                        `;
                        }

                        tynReply.appendChild(messageItem);
                    });

                    // Cuộn xuống cuối tin nhắn
                    chatBody.scrollTop = chatBody.scrollHeight;
                });
        }
    });




    // Gửi tin nhắn
    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(chatForm);

        fetch('{{ route('chat.send') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then((response) => response.json())
            .then((data) => {
                const messageItem = document.createElement('div');
                messageItem.className = 'tyn-reply-item outgoing';
                messageItem.innerHTML = `
                    <div class="tyn-reply-bubble">
                        <div class="tyn-reply-text">
                            <h6>${data.message.message}</h6>
                        </div>
                    </div>
                `;
                tynReply.appendChild(messageItem);

                // Cuộn xuống cuối tin nhắn
                chatBody.scrollTop = chatBody.scrollHeight;

                // Reset form
                chatForm.reset();
            });
    });
</script>


<script src="{{ asset('assetsMessenger/js/bundle0ae1.js?v1310') }}?v=1.0.0"></script>
<script src="{{ asset('assetsMessenger/js/app0ae1.js?v1310') }}?v=1.0.0"></script>

</html>
