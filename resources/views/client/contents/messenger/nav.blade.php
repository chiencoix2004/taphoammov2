<nav class="tyn-appbar">
    <div class="tyn-appbar-wrap">
        <div class="tyn-appbar-logo">
            <a class="tyn-logo" href="{{ route('home') }}">
                <svg viewBox="0 0 43 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M37.2654 14.793C37.2654 14.793 45.0771 20.3653 41.9525 29.5311C41.9525 29.5311 41.3796 31.1976 39.0361 34.4264L42.4732 37.9677C42.4732 37.9677 43.3065 39.478 41.5879 39.9987H24.9229C24.9229 39.9987 19.611 40.155 14.8198 36.9782C14.8198 36.9782 12.1638 35.2076 9.76825 31.9787L18.6215 32.0308C18.6215 32.0308 24.298 31.9787 29.7662 28.3333C35.2344 24.6878 37.4217 18.6988 37.2654 14.793Z"
                        fill="#60A5FA" />
                    <path
                        d="M34.5053 12.814C32.2659 1.04441 19.3506 0.0549276 19.3506 0.0549276C8.31004 -0.674164 3.31055 6.09597 3.31055 6.09597C-4.24076 15.2617 3.6751 23.6983 3.6751 23.6983C3.6751 23.6983 2.99808 24.6357 0.862884 26.5105C-1.27231 28.3854 1.22743 29.3748 1.22743 29.3748H17.3404C23.4543 28.7499 25.9124 27.3959 25.9124 27.3959C36.328 22.0318 34.5053 12.814 34.5053 12.814ZM19.9963 18.7301H9.16412C8.41419 18.7301 7.81009 18.126 7.81009 17.3761C7.81009 16.6261 8.41419 16.022 9.16412 16.022H19.9963C20.7463 16.022 21.3504 16.6261 21.3504 17.3761C21.3504 18.126 20.7358 18.7301 19.9963 18.7301ZM25.3708 13.314H9.12245C8.37253 13.314 7.76843 12.7099 7.76843 11.96C7.76843 11.21 8.37253 10.6059 9.12245 10.6059H25.3708C26.1207 10.6059 26.7248 11.21 26.7248 11.96C26.7248 12.7099 26.1103 13.314 25.3708 13.314Z"
                        fill="#2563EB" />
                </svg>
            </a>
        </div><!-- .tyn-appbar-logo -->
        <div class="tyn-appbar-content">
            <ul class="tyn-appbar-nav tyn-appbar-nav-start">
                <li class="tyn-appbar-item active">
                    <a class="tyn-appbar-link" href="{{ route('messenger') }} ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-chat-text-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8c0 3.866-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M4.5 5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1z" />
                        </svg><!-- chat-text-fill -->
                        <span class="d-none">Chats</span>
                    </a>
                </li><!-- .tyn-appbar-item -->
                <li class="tyn-appbar-item ">
                    <a class="tyn-appbar-link" href="{{ route('home') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M8.354 1.146a.5.5 0 0 0-.708 0L1.5 7.293V14.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5V7.293l-6.146-6.147zm5.5 6.854V14h-3v-3a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v3H3V8l5-5 5 5z"/>
                        </svg><!-- house-door-fill -->
                        <span class="d-none">Home</span>
                    </a>
                </li>
                
            </ul><!-- .tyn-appbar-nav -->
            <ul class="tyn-appbar-nav tyn-appbar-nav-end">
                <li class="tyn-appbar-item dropdown">
                    <a class="tyn-appbar-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                        data-bs-offset="0,10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-grid-fill" viewBox="0 0 16 16">
                            <path
                                d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5z" />
                        </svg><!-- grid-fill -->
                        <span class="d-none">Menu</span>
                    </a><!-- .dropdown-toggle -->
                </li><!-- .tyn-appbar-item -->
                <li class="tyn-appbar-item">
                    <a class="tyn-appbar-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                        data-bs-offset="0,10" data-bs-auto-close="outside">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-app-indicator" viewBox="0 0 16 16">
                            <path
                                d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1z" />
                            <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        </svg><!-- app-indicator -->
                        <span class="d-none">Notifications</span>
                    </a><!-- .dropdown-toggle -->
                </li><!-- .tyn-appbar-item -->
                <li class="tyn-appbar-item">
                    <a class="d-inline-flex dropdown-toggle" data-bs-auto-close="outside"
                        data-bs-toggle="dropdown" href="#" data-bs-offset="0,10">
                        <div class="tyn-media tyn-size-lg tyn-circle">
                            @if (Auth::user()->image == null)
                                <img src="{{ asset('assetsClient/images/profile/Profile.jpg') }}"
                                    alt="DP">
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
                                        <img src="{{ asset('assetsClient/images/profile/Profile.jpg') }}"
                                            alt="DP">
                                    @else
                                        <img src="{{ asset(Auth::user()->image) }}" alt="">
                                    @endif
                                </div>
                                <div class="tyn-media-col">
                                    <div class="tyn-media-row">
                                        <h6 class="name">{{ Auth::user()->username }}</h6>
                                        <div class="indicator varified">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor"
                                                class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                            </svg><!-- check-circle-fill -->
                                        </div>
                                    </div>
                                    <div class="tyn-media-row has-dot-sap">
                                        <p class="content">Chào bạn!</p>
                                    </div>
                                </div><!-- .tyn-media-col -->
                            </div><!-- .tyn-media-group -->
                        </div><!-- .dropdown-gap -->
                        <ul class="tyn-list-links">
                            <li>
                                <a href="{{ route('home') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16"
                                        height="16" viewBox="0,0,300,150" style="fill:#FFFFFF;">
                                        <g fill="#ffffff" fill-rule="nonzero" stroke="none"
                                            stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter"
                                            stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                            font-family="none" font-weight="none" font-size="none"
                                            text-anchor="none" style="mix-blend-mode: normal">
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