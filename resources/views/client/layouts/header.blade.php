<header class="header home-4">
    <div class="container-fluid">
        <div class="header__content">
            <div class="header__logo">
                <a href="index.html">
                    <img src="{{ asset('assetsClient/images/logo/logo-3.png') }}" alt="logo">
                </a>
            </div>

            <form action="#" class="header__search">
                <input type="text" placeholder="Tìm kiếm sản phẩm">
                <button type="button"><i class="icofont-search-2"></i></button>
                <button type="button" class="close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M13.41,12l6.3-6.29a1,1,0,1,0-1.42-1.42L12,10.59,5.71,4.29A1,1,0,0,0,4.29,5.71L10.59,12l-6.3,6.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l6.29,6.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z" />
                    </svg></button>
            </form>
            <div class="header__menu ms-auto">
                <ul class="header__nav mb-0">
                    <li class="header__nav-item">
                        <a href="{{ route('home') }}" class="header__nav-link">Home</a>
                    </li>
                    {{-- <li class="header__nav-item">
                        <a class="header__nav-link active home-4" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            data-bs-offset="0,10">Trang Chủ</a>

                        <ul class="dropdown-menu header__nav-menu">
                            <li><a class="drop-down-item  " href="index-2.html">Trang Chủ Two</a></li>
                            <li><a class="drop-down-item active" href="index.html">Home One <span
                                        class="badge bg-theme ms-3">New</span> </a></li>
                            <li><a class="drop-down-item  " href="index-2.html">Home Two</a></li>
                            <li><a class="drop-down-item" href="index-3.html">Home Three</a></li>
                            <li><a class="drop-down-item" href="index-4.html">Home Four</a></li>
                        </ul>
                    </li> --}}
                    <li class="header__nav-item">
                        <a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" data-bs-offset="0,10">Danh Mục</a>

                        <ul class="dropdown-menu header__nav-menu">
                            @foreach ($categories as $category)
                                <li><a class="drop-down-item" href="#">{{ $category->name }}</a></li>
                                {{-- <li class="dropdown-menu header__nav-menu"> --}}
                                @foreach ($category->children as $child)
                                    <a href="{{ route('listShop', ['slug' => $child->slug]) }}"
                                        class="nav-link toggle-menu">+ {{ $child->name }}</a>
                                @endforeach
                            @endforeach
                            {{-- <li><a class="drop-down-item" href="auction.html">Auction Page</a></li> --}}
                        </ul>
                    </li>
                    <li class="header__nav-item">
                        <a href="{{ route('listPost') }}" class="header__nav-link">Bài Viết</a>
                    </li>
                    {{-- <li class="header__nav-item">
                        <a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" data-bs-offset="0,10">Blog</a>

                        <ul class="dropdown-menu header__nav-menu">
                            <li><a class="drop-down-item" href="blog.html">Blog style 1</a></li>
                            <li><a class="drop-down-item" href="blog-2.html">Blog style 2</a></li>
                            <li><a class="drop-down-item" href="blog-3.html">Blog style 3</a></li>
                            <li><a class="drop-down-item" href="blog-single.html">Blog Single </a></li>
                            <li><a class="drop-down-item" href="blog-single-2.html">Blog Single 2</a></li>
                        </ul>
                    </li>
                    <li class="header__nav-item">
                        <a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" data-bs-offset="0,10">Pages</a>

                        <ul class="dropdown-menu header__nav-menu">
                            <li><a class="drop-down-item" href="item-details.html">NFT Details</a></li>
                            <li><a class="drop-down-item" href="all-authors.html">ALL Authors</a></li>
                            <li><a class="drop-down-item" href="all-authors-2.html">ALL Authors 2</a></li>
                            <li><a class="drop-down-item" href="author.html">Author Profile</a></li>
                            <li><a class="drop-down-item" href="wallet.html">Wallet Connect</a></li>
                            <li><a class="drop-down-item" href="404.html">404</a></li>
                            <li><a class="drop-down-item" href="forgot-pass.html">Forgot Password</a></li>

                        </ul>
                    </li> --}}
                    <li class="header__nav-item">
                        <a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" data-bs-offset="0,10"><svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M12,10a2,2,0,1,0,2,2A2,2,0,0,0,12,10ZM5,10a2,2,0,1,0,2,2A2,2,0,0,0,5,10Zm14,0a2,2,0,1,0,2,2A2,2,0,0,0,19,10Z" />
                            </svg></a>

                        <ul class="dropdown-menu header__nav-menu">
                            <li><a class="drop-down-item" href="contact.html">Contact </a></li>
                            <li><a class="drop-down-item" href="coming-soon.html">Coming soon</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="header__actions">
                <div class="header__action header__action--search">
                    <button class="header__action-btn" type="button"><i class="icofont-search-1"></i></button>
                </div>

                {{-- <div class="header__action header__action--profile">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="{{ route('login') }}" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="-100,10">
                            <span data-blast="bgColor"><i class="icofont-user"></i></span>
                            <span class="d-none d-md-inline">Đăng Nhập</span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="author.html"><span class="me-1"><i
                                            class="icofont-options"></i></span>
                                    Profile</a></li>
                            <li><a class="dropdown-item" href="activity.html"><span class="me-1"><i
                                            class="icofont-lightning-ray"></i></span>
                                    Activity</a></li>
                            <li><a class="dropdown-item" href="signup.html"><span class="me-1"><i
                                            class="icofont-space-shuttle"></i></span>
                                    Sign
                                    Up</a></li>
                            <li><a class="dropdown-item" href="signin.html"><span class="me-1"><i
                                            class="icofont-login"></i></span> Sign
                                    In</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li><a class="dropdown-item" href="#"> Sign
                                    Out <span class="ms-1"><i class="icofont-logout"></i></span></a></li>
                        </ul>
                    </div>
                </div> --}}

                {{-- <div class="header__action header__action--profile">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="{{ route('showLoginForm') }}">
                            <span data-blast="bgColor"><i class="icofont-user"></i></span>
                            <span class="d-none d-md-inline">Đăng Nhập</span>
                        </a> 
                    </div>
                </div> --}}

                @guest
                    <div class="header__action header__action--profile">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="{{ route('showLoginForm') }}">
                                <span data-blast="bgColor"><i class="icofont-user"></i></span>
                                <span class="d-none d-md-inline">Đăng Nhập</span>
                            </a>
                        </div>
                    </div>
                @else
                    <div class="header__action header__action--profile">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="{{ route('login') }}" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-offset="-100,10">
                                <span data-blast="bgColor"><i class="icofont-user"></i></span>
                                <span class="d-none d-md-inline">{{ Auth::user()->username }}</span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('detailUser', Auth::user()->username) }}"><span
                                            class="me-1"><i class="icofont-options"></i></span>
                                        Profile</a></li>
                                <li><a class="dropdown-item" href=""><span class="me-1"><i
                                                class="icofont-lightning-ray"></i></span>
                                        Activity</a></li>
                                {{-- <li><a class="dropdown-item" href="signup.html"><span class="me-1"><i class="icofont-space-shuttle"></i></span> Sign Up</a></li>
                                <li><a class="dropdown-item" href="signin.html"><span class="me-1"><i class="icofont-login"></i></span> Sign In</a></li> --}}
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li><a class="dropdown-item" href="{{ route('logout') }}"> Đăng Xuất <span
                                            class="ms-1"><i class="icofont-logout"></i></span></a></li>
                            </ul>
                        </div> 
                    </div>
                    <div class="wallet-btn">
                        <a href="{{ route('wallet') }}"><span><i class="icofont-wallet"
                                    data-blast="color"></i></span>
                            <span class="d-none d-md-inline">
                                {{-- {{ Auth::user()->fullname }}VNĐ --}}
                                {{ number_format(Auth::user()->wallet ? Auth::user()->wallet->cash : 0, 0, ',', '.') }}VNĐ
                                {{-- 100000000000VNĐ --}}
                            </span> </a>
                    </div>

                    {{-- <div class="wallet-btn">
                        <a href="{{ route('messenger') }}"><span><i class="icofont-chat" data-blast="color"></i></span>
                            <span class="d-none d-md-inline"> 
                            </span> </a>
                    </div>  --}}
                    <div class="wallet-btn">
                        <a href="{{ route('messenger') }}" class="position-relative">
                            <span>
                                <i class="icofont-chat" data-blast="color"></i>
                            </span>
                            @if ($unreadMessagesCount > 0)
                                <span class="badge badge-pill badge-primary position-absolute"
                                      style="top: -5px; right: -10px; background-color: #007bff; color: white; font-size: 12px;">
                                    {{ $unreadMessagesCount }}
                                </span>
                            @endif
                            <span class="d-none d-md-inline"></span>
                        </a>
                    </div>
                    
                @endguest
                {{-- <div class="wallet-btn">
                    <a href="wallet.html"><span><i class="icofont-wallet" data-blast="color"></i></span> <span
                            class="d-none d-md-inline">0VND</span> </a>
                </div> --}}
            </div>

            <button class="menu-trigger header__btn" id="menu05">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>
