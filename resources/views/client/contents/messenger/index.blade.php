<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/chatvia/layouts/index-dark.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Dec 2024 16:30:04 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Chat | Chatvia - Responsive Bootstrap 5 Chat App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive Bootstrap 5 Chat App" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assetsChat/images/favicon.ico') }}?v=1.0.0">

    <!-- magnific-popup css -->
    <link href="{{ asset('assetsChat/libs/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />

    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ asset('assetsChat/libs/owl.carousel/assets/owl.carousel.min.css') }}?v=1.0.0">

    <link rel="stylesheet" href="{{ asset('assetsChat/libs/owl.carousel/assets/owl.theme.default.min.css') }}?v=1.0.0">
    <!-- Bootstrap Css -->
    <link href="{{ asset('assetsChat/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assetsChat/css/icons.min.css') }}?v=1.0.0" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assetsChat/css/app.min.css') }}?v=1.0.0" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-bs-theme="dark">
    <div class="layout-wrapper d-lg-flex">
        <!-- Start left sidebar-menu -->
        <div class="side-menu flex-lg-column me-lg-1 ms-lg-0">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assetsChat/images/logo.svg') }}" alt="" height="30">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assetsChat/images/logo.svg') }}" alt="" height="30">
                    </span>
                </a>
            </div>
            <!-- end navbar-brand-box -->

            <!-- Start side-menu nav -->
            <div class="flex-lg-column my-auto">
                <ul class="nav nav-pills side-menu-nav justify-content-center" role="tablist">
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Profile">
                        <a class="nav-link" id="pills-user-tab" href="{{ route('home') }}">
                            <i class="ri-home-2-line"></i>
                        </a>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Chats">
                        <a class="nav-link active" id="pills-chat-tab" data-bs-toggle="pill" href="#pills-chat"
                            role="tab">
                            <i class="ri-message-3-line"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- end side-menu nav -->

            <div class="flex-lg-column d-none d-lg-block">
                <ul class="nav side-menu-nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link light-dark-mode" href="#" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-placement="right" title="Dark / Light Mode">
                            <i class='ri-sun-line theme-mode-icon'></i>
                        </a>
                    </li>

                    <li class="nav-item btn-group dropup profile-user-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            @if (Auth::user()->image == null)
                                <img src="{{ asset('assetsChat/images/users/avatar-1.jpg') }}" alt=""
                                    class="profile-user rounded-circle">
                            @else
                                <img src="{{ asset(Auth::user()->image) }}" alt=""
                                    class="profile-user rounded-circle">
                            @endif
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Profile <i
                                    class="ri-profile-line float-end text-muted"></i></a>
                            <a class="dropdown-item" href="#">Setting <i
                                    class="ri-settings-3-line float-end text-muted"></i></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất<i
                                    class="ri-logout-circle-r-line float-end text-muted"></i></a>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Side menu user -->
        </div>
        <!-- end left sidebar-menu -->

        <!-- start chat-leftsidebar -->
        <div class="chat-leftsidebar me-lg-1 ms-lg-0">

            <div class="tab-content">

                <!-- Start chats tab-pane -->
                <div class="tab-pane fade show active" id="pills-chat" role="tabpanel"
                    aria-labelledby="pills-chat-tab">
                    <!-- Start chats content -->
                    <div>
                        <div class="px-4 pt-4">
                            <h4 class="mb-4">Tin nhắn</h4>
                            <div class="search-box chat-search-box">
                                <div class="input-group mb-3 rounded-3">
                                    <span class="input-group-text text-muted bg-light pe-1 ps-3" id="basic-addon1">
                                        <i class="ri-search-line search-icon font-size-18"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light"
                                        placeholder="Tìm kiếm Username" aria-label="Tìm kiếm Username"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div> <!-- Search Box-->
                        </div> <!-- .p-4 -->

                        <!-- Start chat-message-list -->
                        <div class="">
                            <h5 class="mb-3 px-3 font-size-16">Gần đây</h5>
                            <div class="chat-message-list px-2" data-simplebar>

                                <ul class="list-unstyled chat-list chat-user-list">
                                    {{-- <li class="active">
                                        <a href="#">
                                            <div class="d-flex">
                                                <div class="chat-user-img online align-self-center me-3 ms-0">
                                                    <img src="assets/images/users/avatar-2.jpg"
                                                        class="rounded-circle avatar-xs" alt="">
                                                    <span class="user-status"></span>
                                                </div>

                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate font-size-15 mb-1">Patrick Hendricks</h5>
                                                    <p class="chat-user-message text-truncate mb-0">Hey! there I'm
                                                        available</p>
                                                </div>
                                                <div class="font-size-11">05 min</div>
                                            </div>
                                        </a>
                                    </li> --}}
                                    @if ($chatUsers->isEmpty())
                                        <li class="active">
                                            <a href="#">
                                                <div class="d-flex">
                                                    Chưa có tin nhắn nào.
                                                </div>
                                            </a>
                                        </li>
                                    @else
                                        @foreach ($chatUsers as $index => $chatUser)
                                            <li
                                                class="{{ request('user_id') == $chatUser['user']->id ? 'active' : '' }}">
                                                <a
                                                    href="{{ route('messages', ['user_id' => $chatUser['user']->id]) }}">
                                                    <div class="d-flex">
                                                        <div class="chat-user-img away align-self-center me-3 ms-0">
                                                            @if ($chatUser['user']->image == null)
                                                                <img src="{{ asset('assetsClient/images/profile/Profile.jpg') }}"
                                                                    alt="DP" width="50px" height="50px"
                                                                    style="border-radius: 5px">
                                                            @else
                                                                <img src="{{ asset($chatUser['user']->image) }}"
                                                                    alt="DP" width="50px" height="50px"
                                                                    style="border-radius: 5px">
                                                            @endif
                                                        </div>
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <h5 class="text-truncate font-size-15 mb-1">
                                                                {{ $chatUser['user']->username }}</h5>
                                                            <p class="chat-user-message text-truncate mb-0">
                                                                {{ Str::limit($chatUser['last_message'], 15, '...') }}
                                                            </p>
                                                        </div>
                                                        <div class="font-size-11">
                                                            {{ $chatUser['last_message_time']->diffForHumans() }}
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    {{-- <li class="unread">
                                        <a href="#">
                                            <div class="d-flex">
                                                <div class="chat-user-img away align-self-center me-3 ms-0">
                                                    <img src="assets/images/users/avatar-3.jpg"
                                                        class="rounded-circle avatar-xs" alt="">
                                                    <span class="user-status"></span>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate font-size-15 mb-1">Mark Messer</h5>
                                                    <p class="chat-user-message text-truncate mb-0"><i
                                                            class="ri-image-fill align-middle me-1 ms-0"></i> Images
                                                    </p>
                                                </div> 
                                                <div class="font-size-11">12/07</div>
                                                <div class="unread-message">
                                                    <span class="badge badge-soft-danger rounded-pill">02</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#">
                                            <div class="d-flex">
                                                <div class="chat-user-img online align-self-center me-3 ms-0">
                                                    <img src="assets/images/users/avatar-4.jpg"
                                                        class="rounded-circle avatar-xs" alt="">
                                                    <span class="user-status"></span>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate font-size-15 mb-1">Doris Brown</h5>
                                                    <p class="chat-user-message text-truncate mb-0">Nice to meet you
                                                    </p>
                                                </div>
                                                <div class="font-size-11">10:12 AM</div>
                                            </div>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <!-- End chat-message-list -->
                    </div>
                    <!-- Start chats content -->
                </div>
                <!-- End chats tab-pane -->
            </div>
            <!-- end tab content -->

        </div>
        <!-- end chat-leftsidebar -->

        <!-- Start User chat -->
        <div class="user-chat w-100 overflow-hidden ">
            <div class="d-lg-flex">
                <!-- start chat conversation section -->
                <div class="w-100 overflow-hidden position-relative">

                    <div class="p-3 p-lg-4 border-bottom user-chat-topbar">
                        <div class="row align-items-center">
                            <div class="col-sm-4 col-8">
                                <div class="d-flex align-items-center">
                                    <div class="d-block d-lg-none me-2 ms-0">
                                        <a href="javascript: void(0);"
                                            class="user-chat-remove text-muted font-size-16 p-2"><i
                                                class="ri-arrow-left-s-line"></i></a>
                                    </div>
                                    <div class="me-3 ms-0">
                                        <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs"
                                            alt="">
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-0 text-truncate"><a href="#"
                                                class="text-reset user-profile-show">{{$chatUser['user']->username}}</a> <i
                                                class="ri-record-circle-fill font-size-10 text-success d-inline-block ms-1"></i>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 col-4">
                                <ul class="list-inline user-chat-nav text-end mb-0">
                                    <li class="list-inline-item">
                                        <div class="dropdown">
                                            <button class="btn nav-btn dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-search-line"></i>
                                            </button>
                                            {{-- <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-md">
                                                <div class="search-box p-2">
                                                    <input type="text" class="form-control bg-light border-0"
                                                        placeholder="Search..">
                                                </div>
                                            </div> --}}
                                        </div>
                                    </li>

                                    <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                                        <button type="button" class="btn nav-btn" data-bs-toggle="modal"
                                            data-bs-target="#audiocallModal">
                                            <i class="ri-phone-line"></i>
                                        </button>
                                    </li>

                                    <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                                        <button type="button" class="btn nav-btn" data-bs-toggle="modal"
                                            data-bs-target="#videocallModal">
                                            <i class="ri-vidicon-line"></i>
                                        </button>
                                    </li>

                                    <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                                        <button type="button" class="btn nav-btn user-profile-show">
                                            <i class="ri-user-2-line"></i>
                                        </button>
                                    </li>

                                    <li class="list-inline-item">
                                        <div class="dropdown">
                                            <button class="btn nav-btn dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-fill"></i>
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end chat user head -->

                    <!-- start chat conversation -->
                    <div class="chat-conversation p-3 p-lg-4" data-simplebar>
                        <ul class="list-unstyled mb-0">
                            @foreach ($messages as $message)
                                <li class="{{ $message->sender_id == auth()->id() ? 'right' : '' }}">
                                    <div class="conversation-list">
                                        <div class="chat-avatar">  
                                            <img src="{{ asset($message->sender->image ?? 'assetsClient/images/profile/Profile.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="user-chat-content">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <p class="mb-0">{{ $message->message }}</p>
                                                    <p class="chat-time mb-0">
                                                        <i class="ri-time-line align-middle"></i>
                                                        <span
                                                            class="align-middle">{{ $message->created_at->format('H:i') }}</span>
                                                    </p>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- end chat conversation end -->

                    <!-- start chat input section -->
                      <div class="chat-input-section p-3 p-lg-4 border-top mb-0">
                            
                            <div class="row g-0">
                                
                                <div class="col">
                                    <input type="text" class="form-control form-control-lg bg-light border-light" placeholder="Enter Message...">
                                </div>
                                <div class="col-auto">
                                    <div class="chat-input-links ms-md-2 me-md-0">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Emoji">
                                                <button type="button" class="btn btn-link text-decoration-none font-size-16 btn-lg waves-effect">
                                                    <i class="ri-emotion-happy-line"></i>
                                                </button>
                                            </li>
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Attached File">  
                                                <button type="button" class="btn btn-link text-decoration-none font-size-16 btn-lg waves-effect">
                                                    <i class="ri-attachment-line"></i>
                                                </button>
                                            </li>
                                            <li class="list-inline-item">
                                                <button type="submit" class="btn btn-primary font-size-16 btn-lg chat-send waves-effect waves-light">
                                                    <i class="ri-send-plane-2-fill"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    <!-- end chat input section -->
                </div>
                <!-- end chat conversation section -->
            </div>
            <!-- End User chat -->
        </div> 
        <!-- end  layout wrapper -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assetsChat/libs/jquery/jquery.min.js') }}?v=1.0.0"></script>
        <script src="{{ asset('assetsChat/libs/bootstrap/js/bootstrap.bundle.min.js') }}?v=1.0.0"></script>
        <script src="{{ asset('assetsChat/libs/simplebar/simplebar.min.js') }}?v=1.0.0"></script>
        <script src="{{ asset('assetsChat/libs/node-waves/waves.min.js') }}?v=1.0.0"></script>

        <!-- Magnific Popup-->
        <script src="{{ asset('assetsChat/libs/magnific-popup/jquery.magnific-popup.min.js') }}?v=1.0.0"></script>

        <!-- owl.carousel js -->
        <script src="{{ asset('assetsChat/libs/owl.carousel/owl.carousel.min.js') }}?v=1.0.0"></script>

        <!-- page init -->
        <script src="{{ asset('assetsChat/js/pages/index.init.js') }}?v=1.0.0"></script>

        <script src="{{ asset('assetsChat/js/app.js') }}?v=1.0.0"></script>
</body>

<!-- Mirrored from themesbrand.com/chatvia/layouts/index-dark.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Dec 2024 16:30:10 GMT -->
<script></script>

</html>
