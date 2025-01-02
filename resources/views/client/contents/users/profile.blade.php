@extends('client.layouts.main')
@section('content')
    <!-- ==========Page Header Section Start Here========== -->
    {{-- <section class="page-header-section style-1">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-inner">
                    <div class="page-title">
                        <h2>Thông Tin Của Bạn</h2>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">{{ Auth::user()->username }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ==========Page Header Section Ends Here========== -->


    <!-- ==========Profile Section Start Here========== -->
    <section class="profile-section padding-top padding-bottom">
        <div class="container">
            <div class="section-wrapper">
                <div class="member-profile">
                    <div class="profile-item">
                        <div class="profile-cover">
                            <img src="{{ asset('assetsClient/images/profile/cover.jpg') }}" alt="cover-pic">
                            {{-- <div class="edit-photo custom-upload">
                                <div class="file-btn"><i class="icofont-camera"></i>
                                    Edit Photo</div>
                                <input type="file">
                            </div> --}}
                        </div>
                        <div class="profile-information">
                            <div class="profile-pic">
                                @if ($user->image == null)
                                    <img src="{{ asset('assetsClient/images/profile/Profile.jpg') }}" alt="DP">
                                @else
                                    <img src="{{ asset($user->image) }}" alt="DP">
                                @endif

                                @if ($user->id === Auth::id())
                                    <div class="custom-upload">
                                        <div class="file-btn">
                                            <span class="d-none d-lg-inline-block"> <i class="icofont-camera"></i>
                                                Edit</span>
                                            <span class="d-lg-none mr-0"><i class="icofont-plus"></i></span>
                                        </div>
                                        <input type="file">
                                    </div>
                                @endif
                            </div>
                            <div class="profile-name">
                                <h4>{{ $user->fullname }}</h4>
                                <h4><img width="24" height="24" src="https://img.icons8.com/fluency/48/email.png"
                                        alt="email" />{{ $user->username }}</h4>
                            </div>
                            <ul class="profile-contact">
                                {{-- <li class="crypto-copy">
                                <div id="cryptoCode" class="crypto-page">
                                    <input id="cryptoLink" value="0x731F9FBF4163D47B0F581DD9EC45C9" readonly>
                                    <div id="cryptoCopy" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Copy Address">
                                        <span class="copy-icon">
                                            <i class="icofont-ui-copy" aria-hidden="true"
                                                data-copytarget="#cryptoLink"></i>
                                        </span>

                                    </div>
                                </div>

                            </li> --}}
                                {{-- <li>
                                <a href="#">
                                    <div class="icon"><i class="icofont-ui-rate-add"></i></div>
                                    <div class="text">
                                        <p>Follow</p>
                                    </div>
                                </a>
                            </li> --}}
                                {{-- <li>
                                    <a href="{{ route('messenger', ['user_id' => Auth::user()->id]) }}">
                                        <div class="icon"><i class="icofont-speech-comments"></i></div>
                                        <div class="text">
                                            <p>Send Message</p>
                                        </div>
                                    </a>
                                </li> --}}
                                @if ($user->id !== Auth::id())
                                    <li>
                                        <a href="{{ route('messages', $user->username) }}">
                                            <div class="icon"><i class="icofont-speech-comments"></i></div>
                                            <div class="text">
                                                <p>Gửi tin nhắn</p>
                                            </div>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="profile-details">
                        <nav class="profile-nav">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                {{-- <button class="nav-link active" id="nav-allNft-tab" data-bs-toggle="tab"
                                data-bs-target="#allNft" type="button" role="tab" aria-controls="allNft"
                                aria-selected="true">All NFT's</button> --}}
                                <button class="nav-link active" id="nav-about-tab" data-bs-toggle="tab"
                                    data-bs-target="#about" type="button" role="tab" aria-controls="about"
                                    aria-selected="true">Thông Tin</button>
                                <button class="nav-link" id="nav-activity-tab" data-bs-toggle="tab"
                                    data-bs-target="#activity" type="button" role="tab" aria-controls="activity"
                                    aria-selected="false">Gian Hàng</button>

                                {{-- <button class="nav-link" id="nav-following-tab" data-bs-toggle="tab"
                                    data-bs-target="#following" type="button" role="tab" aria-controls="following"
                                    aria-selected="false">Following <span class="item-number">145</span></button> --}}
                                <button class="nav-link" id="nav-wallet-tab" data-bs-toggle="tab" data-bs-target="#wallet"
                                    type="button" role="tab" aria-controls="wallet" aria-selected="false">Bài
                                    Viết</button>
                                {{-- <div class="dropdown">
                                    <a class="btn dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Setting
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Edit Thông Tin</a></li>
                                        <li><a class="dropdown-item" href="#">Privacy</a></li>
                                        <li><a class="dropdown-item" href="#">Block user</a></li>
                                    </ul> 
                                </div> --}}
                                @if ($user->id === Auth::id())
                                    <button class="nav-link" id="nav-follower-tab" data-bs-toggle="tab"
                                        data-bs-target="#follower" type="button" role="tab" aria-controls="follower"
                                        aria-selected="false">Sửa Thông Tin</button>
                                @endif
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <!-- All NFT tab -->
                            <!-- about tab -->
                            <div class="tab-pane tab-pane activity-page fade show active" id="about" role="tabpanel">
                                <div>
                                    <div class="row">
                                        <div class="col-xl-9">
                                            <article>
                                                @if (session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif
                                                <div class="info-card">
                                                    <div class="info-card-title">
                                                        <h4>Thông Tin Cá Nhân</h4>
                                                    </div>
                                                    <div class="info-card-content">
                                                        <ul class="info-list">
                                                            <!-- Thanh Level -->
                                                            {{-- <li>
                                                                <p class="info-name"> 
                                                                    Level
                                                                </p>
                                                                <div style="margin: 10px 0;">
                                                                    <!-- Thanh tiến độ -->
                                                                    <div
                                                                        style="background: #ddd; border-radius: 10px; height: 20px; width: 100%; position: relative;">
                                                                        <div
                                                                            style="background: #4caf50; height: 100%; width: 20%; border-radius: 10px;">
                                                                        </div>
                                                                    </div>
                                                                    <p style="margin-top: 5px; color: red;">Hãy mua/bán
                                                                        thêm đ để đạt level tiếp
                                                                        theo.</p>
                                                                </div>
                                                            </li> --}}
                                                            <li>
                                                                <p class="info-name">
                                                                    <img width="24" height="24"
                                                                        src="https://img.icons8.com/cute-clipart/64/name.png"
                                                                        alt="name" />
                                                                    Họ Tên
                                                                </p>
                                                                <p class="info-details">{{ $user->fullname }}</p>
                                                            </li>
                                                            <li>
                                                                <p class="info-name">
                                                                    <img width="24" height="24"
                                                                        src="https://img.icons8.com/stickers/50/username.png"
                                                                        alt="username" />
                                                                    UserName
                                                                </p>
                                                                <p class="info-details">
                                                                    <img width="24" height="24"
                                                                        src="https://img.icons8.com/fluency/48/email.png"
                                                                        alt="email" />{{ $user->username }}
                                                                </p>
                                                            </li>
                                                            @if ($user->id === Auth::id())
                                                                <li>
                                                                    <p class="info-name">
                                                                        <img width="24" height="24"
                                                                            src="https://img.icons8.com/flat-round/50/cheap-2--v1.png"
                                                                            alt="cheap-2--v1" />
                                                                        Số Dư
                                                                    </p>
                                                                    <p class="info-details">
                                                                        {{ number_format(Auth::user()->wallet ? Auth::user()->wallet->cash : 0, 0, ',', '.') }}
                                                                        VNĐ</p>
                                                                </li>
                                                            @endif
                                                            <li>
                                                                <p class="info-name">
                                                                    <img width="24" height="24"
                                                                        src="https://img.icons8.com/color/48/online-store.png"
                                                                        alt="online-store" />
                                                                    Gian Hàng
                                                                </p>
                                                                <p class="info-details">{{ $totalShops }}</p>
                                                            </li>
                                                            <li>
                                                                <p class="info-name">
                                                                    <img width="24" height="24"
                                                                        src="https://img.icons8.com/color/48/signing-a-document.png"
                                                                        alt="signing-a-document" />
                                                                    Bài Viết
                                                                </p>
                                                                <p class="info-details">
                                                                    {{ $totalPostUser }}
                                                                </p>

                                                            </li>
                                                            <li>
                                                                <p class="info-name">
                                                                    <img width="24" height="24"
                                                                        src="https://img.icons8.com/fluency/48/calendar--v1.png"
                                                                        alt="calendar--v1" />
                                                                    Ngày Tạo
                                                                </p>
                                                                <p class="info-details">
                                                                    {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}
                                                                </p>

                                                            </li>
                                                            <li>
                                                                <p class="info-name">
                                                                    <img width="24" height="24"
                                                                        src="https://img.icons8.com/color/48/sell-stock.png"
                                                                        alt="sell-stock" />
                                                                    Đã Mua
                                                                </p>
                                                                <p class="info-details">0 Sản Phẩm</p>
                                                            </li>
                                                            <li>
                                                                <p class="info-name">
                                                                    <img width="24" height="24"
                                                                        src="https://img.icons8.com/bubbles/100/buy.png"
                                                                        alt="buy" />
                                                                    Đã Bán
                                                                </p>
                                                                <p class="info-details">0 Sản Phẩm</p>
                                                            </li>
                                                            <li>
                                                                <p class="info-name">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                        width="24" height="24"
                                                                        viewBox="0 0 48 48">
                                                                        <path fill="#29b6f6"
                                                                            d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z">
                                                                        </path>
                                                                        <path fill="#fff"
                                                                            d="M33.95,15l-3.746,19.126c0,0-0.161,0.874-1.245,0.874c-0.576,0-0.873-0.274-0.873-0.274l-8.114-6.733 l-3.97-2.001l-5.095-1.355c0,0-0.907-0.262-0.907-1.012c0-0.625,0.933-0.923,0.933-0.923l21.316-8.468 c-0.001-0.001,0.651-0.235,1.126-0.234C33.667,14,34,14.125,34,14.5C34,14.75,33.95,15,33.95,15z">
                                                                        </path>
                                                                        <path fill="#b0bec5"
                                                                            d="M23,30.505l-3.426,3.374c0,0-0.149,0.115-0.348,0.12c-0.069,0.002-0.143-0.009-0.219-0.043 l0.964-5.965L23,30.505z">
                                                                        </path>
                                                                        <path fill="#cfd8dc"
                                                                            d="M29.897,18.196c-0.169-0.22-0.481-0.26-0.701-0.093L16,26c0,0,2.106,5.892,2.427,6.912 c0.322,1.021,0.58,1.045,0.58,1.045l0.964-5.965l9.832-9.096C30.023,18.729,30.064,18.416,29.897,18.196z">
                                                                        </path>
                                                                    </svg>
                                                                    Telegram
                                                                </p>
                                                                <p class="info-details">Chưa Bật</p>
                                                            </li>
                                                            <li>
                                                                <p class="info-name">
                                                                    <img width="24" height="24"
                                                                        src="https://img.icons8.com/nolan/64/api.png"
                                                                        alt="api" />
                                                                    Mua Hàng API
                                                                </p>
                                                                <p class="info-details">Chưa Bật</p>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                </div>
                                            </article>
                                        </div>

                                        @include('client.contents.users.sibarUser')
                                    </div>
                                </div>
                            </div>
                            <!-- activity Tab -->
                            <div class="tab-pane fade" id="activity" role="tabpanel"
                                aria-labelledby="nav-activity-tab">
                                <div>
                                    <div class="row">
                                        <div class="col-xl-9">
                                            <article>
                                                <h4 class="h4-title">Gian Hàng</h4>
                                                <div class="row gy-3">
                                                    @foreach ($listShopUser as $item)
                                                        <div class="col-12">
                                                            <div class="activity-item">
                                                                <div
                                                                    class="lab-inner d-flex flex-wrap align-items-center p-3 p-md-4">
                                                                    <div class="lab-thumb me-3 me-md-4">
                                                                        <img src="{{ asset('assetsClient/images/activity/01.gif') }}"
                                                                            alt="img">
                                                                        {{-- <img src="{{asset($item->image)}}" alt="img"> --}}
                                                                    </div>
                                                                    <div class="lab-content">
                                                                        <h4><a
                                                                                href="nft-single.html">{{ $item->title }}</a>
                                                                        </h4>
                                                                        <p class="mb-2">{{ $item->short_description }}
                                                                        </p>
                                                                        <p class="mb-2">Giá:</p>
                                                                        <p class="user-id">Lượt Đánh Giá <a
                                                                                href="author.html">0</a></p>
                                                                        <p>Đã Bán </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </article>
                                        </div>

                                        <!-- Aside Part -->
                                        @include('client.contents.users.sibarUser')
                                    </div>
                                </div>
                            </div>
                            <!-- wallet Tab -->
                            <div class="tab-pane fade" id="wallet" role="tabpanel" aria-labelledby="nav-wallet-tab">
                                <div>
                                    <div class="row">
                                        <div class="col-xl-9">
                                            <div class="wallet-wrapper">
                                                <div class="wallet-title">
                                                    <h4>Bài Viết</h4>
                                                    <p>Tất Cả Bài Viết Của {{ $user->username }} ở đây.
                                                        <a href="{{ route('showAddPost') }}">Tạo Bài Viết Của Bạn Ngay</a>
                                                    </p>
                                                </div>
                                                <div class="wallet-section">
                                                    <div class="wallet-inner">
                                                        <div class="row g-3">
                                                            @if ($user->id === Auth::id()) 
                                                            @foreach ($postUserHidden as $item)
                                                                <div class="col-lg-4 col-sm-6">
                                                                    <div class="nft-item blog-item">
                                                                        <div class="nft-inner">
                                                                            <div class="nft-thumb">
                                                                                @if ($item->image == null)
                                                                                    <img src="{{ asset('assetsClient/images/blog/01.gif') }}"
                                                                                        alt="wallet-img" width=""
                                                                                        height="">
                                                                                @else
                                                                                    <img src="{{ asset($item->image) }}"
                                                                                        alt="wallet-img">
                                                                                @endif
                                                                            </div>
                                                                            <div class="nft-content">
                                                                                <div class="author-details">
                                                                                    <h4> <a href="{{ route('detailPost', ['slug' => $item->slug]) }}"
                                                                                            style="word-wrap: break-word;">
                                                                                            {{ $item->title }}
                                                                                        </a></h4>
                                                                                    <div class="meta-info">
                                                                                        <p class="date">Danh Mục: <label
                                                                                                style="color: rgb(31, 212, 31)"
                                                                                                for="">
                                                                                                {{ $item->category }}</label>
                                                                                        </p>
                                                                                        <p class="date"><span><i
                                                                                                    class="icofont-ui-calendar"></i></span>{{ $item->created_at }}
                                                                                        </p>
                                                                                        <p><span><i
                                                                                                    class="icofont-eye"></i></span>{{ $item->view }}
                                                                                        </p> 
                                                                                            <div
                                                                                                class="status-container d-flex justify-content-center align-items-center">
                                                                                                @if ($item->status == 1)
                                                                                                    <p class="m-0">
                                                                                                        <span
                                                                                                            class="badge rounded text-warning bg-warning-subtle p-2">Chưa
                                                                                                            Duyệt</span>
                                                                                                    </p>
                                                                                                @else
                                                                                                    <p class="m-0">
                                                                                                        <span
                                                                                                            class="badge rounded text-success bg-success-subtle p-2">Đã
                                                                                                            Duyệt</span>
                                                                                                    </p>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div
                                                                                                class="status-container d-flex justify-content-center align-items-center">
                                                                                                <p class="m-0">
                                                                                                    <a
                                                                                                        href="{{ route('showEditPost', ['slug' => $item->slug]) }}">
                                                                                                        <span
                                                                                                            class="badge rounded text-primary bg-primary-subtle p-2">Sửa
                                                                                                            Bài
                                                                                                            Viết</span>
                                                                                                    </a>
                                                                                                </p>
                                                                                            </div> 
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            @endif 
                                                            @foreach ($postUser as $item)
                                                                <div class="col-lg-4 col-sm-6">
                                                                    <div class="nft-item blog-item">
                                                                        <div class="nft-inner">
                                                                            <div class="nft-thumb">
                                                                                @if ($item->image == null)
                                                                                    <img src="{{ asset('assetsClient/images/blog/01.gif') }}"
                                                                                        alt="wallet-img" width=""
                                                                                        height="">
                                                                                @else
                                                                                    <img src="{{ asset($item->image) }}"
                                                                                        alt="wallet-img">
                                                                                @endif
                                                                            </div>
                                                                            <div class="nft-content">
                                                                                <div class="author-details">
                                                                                    <h4> <a href="{{ route('detailPost', ['slug' => $item->slug]) }}"
                                                                                            style="word-wrap: break-word;">
                                                                                            {{ $item->title }}
                                                                                        </a></h4>
                                                                                    <div class="meta-info">
                                                                                        <p class="date">Danh Mục: <label
                                                                                                style="color: rgb(31, 212, 31)"
                                                                                                for="">
                                                                                                {{ $item->category }}</label>
                                                                                        </p>
                                                                                        <p class="date"><span><i
                                                                                                    class="icofont-ui-calendar"></i></span>{{ $item->created_at }}
                                                                                        </p>
                                                                                        <p><span><i
                                                                                                    class="icofont-eye"></i></span>{{ $item->view }}
                                                                                        </p>
                                                                                        @if ($user->id === Auth::id()) 
                                                                                        <div
                                                                                            class="status-container d-flex justify-content-center align-items-center">
                                                                                            @if ($item->status == 1)
                                                                                                <p class="m-0">
                                                                                                    <span
                                                                                                        class="badge rounded text-warning bg-warning-subtle p-2">Chưa
                                                                                                        Duyệt</span>
                                                                                                </p>
                                                                                            @else
                                                                                                <p class="m-0">
                                                                                                    <span
                                                                                                        class="badge rounded text-success bg-success-subtle p-2">Đã
                                                                                                        Duyệt</span>
                                                                                                </p>
                                                                                            @endif
                                                                                        </div>
                                                                                        @endif 

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Aside Part -->
                                        @include('client.contents.users.sibarUser')
                                    </div>
                                </div>
                            </div>
                            <!-- follower Tab -->
                            {{-- <div class="tab-pane fade" id="follower" role="tabpanel"
                                aria-labelledby="nav-follower-tab">
                                <div>
                                    <div class="row">
                                        <div class="col-xl-9">
                                            <div class="follow-wrapper">
                                                <h4 class="h4-title">Chỉnh Sửa Thông Tin Của Bạn</h4> 

                                            </div>
                                        </div>

                                        <!-- Aside Part -->
                                         @include('client.contents.users.sibarUser')
                                    </div>
                                </div>
                            </div> --}}
                            <div class="tab-pane fade" id="follower" role="tabpanel"
                                aria-labelledby="nav-follower-tab">
                                <div>
                                    <div class="row">
                                        <!-- Phần chỉnh sửa thông tin -->
                                        <div class="col-xl-9">
                                            <div class="follow-wrapper">
                                                <h4 class="h4-title mb-4">Chỉnh Sửa Thông Tin Của Bạn</h4>
                                                <div class="create-nft py-5 px-4">
                                                    @if (session('success'))
                                                        <div class="alert alert-success">
                                                            {{ session('success') }}
                                                        </div>
                                                    @endif

                                                    @if (session('error'))
                                                        <div class="alert alert-danger">
                                                            {{ session('error') }}
                                                        </div>
                                                    @endif
                                                    {{-- <form class="create-nft-form" method="post"
                                                        action="{{ route('updateProfile') }}">
                                                        @csrf
                                                        <!-- item name input -->
                                                        <div class="form-floating item-name-field mb-3">
                                                            <input type="text" class="form-control" id="itemNameInput"
                                                                name="fullname" placeholder="Item Name"
                                                                value="{{ Auth::user()->fullname }}">
                                                            <label for="itemNameInput">Họ Và Tên</label>
                                                        </div>
                                                        @error('fullname')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                        <!-- submit button -->
                                                        <div class="submit-btn-field text-center">
                                                            <button type="submit">Lưu Thông Tin</button>
                                                        </div>
                                                    </form> --}}
                                                    <form class="create-nft-form" method="post"
                                                        action="{{ route('updateProfile') }}">
                                                        @csrf <!-- CSRF Token -->
                                                        <!-- Họ Và Tên Input -->
                                                        <div class="form-floating item-name-field mb-3">
                                                            <input type="text"
                                                                class="form-control @error('fullname') is-invalid @enderror"
                                                                id="itemNameInput" name="fullname"
                                                                placeholder="Item Name"
                                                                value="{{ Auth::user()->fullname }}">
                                                            <label for="itemNameInput">Họ Và Tên</label>
                                                            @error('fullname')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <!-- submit button -->
                                                        <div class="submit-btn-field text-center">
                                                            <button type="submit" class="btn btn-primary">Lưu Thông
                                                                Tin</button>
                                                        </div>
                                                    </form>

                                                </div>
                                                <hr>
                                                <div class="create-nft py-5 px-4">
                                                    <form class="create-nft-form">
                                                        <!-- submit button -->
                                                        <div class="submit-btn-field ">
                                                            <button type="submit">Liên Kết Telegram</button>
                                                        </div>
                                                        <br>
                                                        <div class="submit-btn-field">
                                                            <button type="submit">Bật Token Mua Hàng Qua API</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Aside Part -->
                                        @include('client.contents.users.sibarUser')
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Profile Section Ends Here========== -->
    <style>
        /* Container bọc các span */
        .status-container {
            display: flex;
            /* Sử dụng flexbox */
            justify-content: center;
            /* Căn giữa theo chiều ngang */
            align-items: center;
            /* Căn giữa theo chiều dọc */
            padding: 2px;
            /* Tạo khoảng cách giữa container và nội dung bên trong */
            gap: 2px;
            /* Khoảng cách giữa các phần tử bên trong */
            border: 1px solid #ddd;
            /* Viền nhẹ cho đẹp mắt */
            border-radius: 8px;
            /* Bo góc cho container */
            background-color: #f8f9fa;
            /* Nền nhạt */
        }

        /* Tùy chỉnh badge */
        .badge {
            font-size: 11px;
            /* Kích thước chữ trong badge */
            padding: 2px 4px;
            /* Padding lớn hơn cho badge */
            border-radius: 6px;
            /* Bo góc nhẹ cho badge */
        }

        /* Màu cụ thể cho các trạng thái */
        .bg-warning-subtle {
            background-color: #fff3cd;
            /* Vàng nhạt */
            color: #856404;
            /* Màu chữ vàng đậm */
        }

        .bg-success-subtle {
            background-color: #d4edda;
            /* Xanh nhạt */
            color: #155724;
            /* Màu chữ xanh đậm */
        }
    </style>
@endsection
