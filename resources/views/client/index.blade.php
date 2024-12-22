@extends('client.layouts.main')
@section('content')
    <!-- ===============//banner section start here \\================= -->
    <section class="banner-section home-4" style="background-image: url({{ asset('assetsClient/images/banner/bg-4.jpg') }});">
        <div class="container">
            <div class="banner-wrapper">
                <div class="row align-items-center g-5">
                    <div class="col-lg-7">
                        <div class="banner-content">

                            @php
                                $lines = str_split($titleClient->title, 20); // Chia thành các đoạn 20 ký tự
                            @endphp

                            <h1>
                                @foreach ($lines as $index => $line)
                                    @if ($index == 0)
                                        @php
                                            $words = explode(' ', $line);
                                            $words[0] = '<span class="theme-color-4">' . $words[0] . '</span>';
                                            $line = implode(' ', $words);
                                        @endphp
                                    @endif
                                    {!! $line !!}<br>
                                @endforeach
                            </h1>


                            {{-- <h1> <span class="theme-color-4">Create</span>
                                , Collect And
                                <span class="theme-color-4"> <br> Sell</span>
                                Digital Items.
                            </h1> --}}
                            {{-- <h1>{{$titleClient->title}}</h1> --}}



                            {{-- <p>Digital Marketplace For Crypto Collectibles And Non-Fungible Tokens.
                                Buy, Sell, And Discover Exclusive Digital.</p> --}}
                            <p>{{ $titleClient->content }}</p>
                            <div class="banner-btns d-flex flex-wrap">
                                <a data-blast="bgColor" href="explore.html" class="default-btn move-top"><span>Mua
                                        Ngay</span> </a>
                                <a href="#!" class="default-btn move-right"><span>Đăng Kí Bán Hàng</span> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="nft-slider-wrapper">
                            <div class="swiper banner-item-slider-2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="nft-item home-4">
                                            <div class="nft-inner">
                                                <!-- nft top part -->
                                                <div class="nft-item-top d-flex justify-content-between align-items-center">
                                                    <div class="author-part">
                                                        <ul class="author-list d-flex">
                                                            <li class="single-author d-flex align-items-center">
                                                                <a href="author.html" class="veryfied"><img loading="lazy"
                                                                        src="{{ asset('assetsClient/images/seller/04.png') }}"
                                                                        alt="author-img"></a>
                                                                <h6><a href="author.html">rasselmrh</a></h6>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="more-part">
                                                        <div class=" dropstart">
                                                            <a class=" dropdown-toggle" href="#" role="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false"
                                                                data-bs-offset="25,0">
                                                                <i class="icofont-flikr"></i>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#"><span>
                                                                            <i class="icofont-warning"></i>
                                                                        </span> Report </a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#"><span><i
                                                                                class="icofont-reply"></i></span>
                                                                        Share</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- nft-bottom part -->
                                                <div class="nft-item-bottom">
                                                    <div class="nft-thumb">
                                                        <img loading="lazy"
                                                            src="{{ asset('assetsClient/images/banner/01.gif') }}"
                                                            alt="nft-img">

                                                        <!-- nft countdwon -->
                                                        <!-- <ul class="nft-countdown count-down" data-date="July 05, 2022 21:14:01">
                                                                                                                                    <li>
                                                                                                                                        <span class="days">34</span><span class="count-txt">D</span>
                                                                                                                                    </li>
                                                                                                                                    <li>
                                                                                                                                        <span class="hours">09</span><span class="count-txt">H</span>
                                                                                                                                    </li>
                                                                                                                                    <li>
                                                                                                                                        <span class="minutes">32</span><span class="count-txt">M</span>
                                                                                                                                    </li>
                                                                                                                                    <li>
                                                                                                                                        <span class="seconds">32</span><span class="count-txt">S</span>
                                                                                                                                    </li>
                                                                                                                                </ul> -->
                                                    </div>
                                                    <div class="nft-content">
                                                        <h4><a href="item-details.html">Black Cat </a> </h4>
                                                        <div
                                                            class="price-like d-flex justify-content-between align-items-center">
                                                            <p class="nft-price">Price: <span class="yellow-color">0.34
                                                                    ETH</span>
                                                            </p>
                                                            <a href="#" class="nft-like"><i class="icofont-heart"></i>
                                                                230</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="nft-item home-4">
                                            <div class="nft-inner">
                                                <!-- nft top part -->
                                                <div class="nft-item-top d-flex justify-content-between align-items-center">
                                                    <div class="author-part">
                                                        <ul class="author-list d-flex">
                                                            <li class="single-author d-flex align-items-center">
                                                                <a href="author.html" class="veryfied"><img loading="lazy"
                                                                        src="{{ asset('assetsClient/images/seller/04.png') }}"
                                                                        alt="author-img"></a>
                                                                <h6><a href="author.html">Gucci Lucas</a></h6>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="more-part">
                                                        <div class=" dropstart">
                                                            <a class=" dropdown-toggle" href="#" role="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false"
                                                                data-bs-offset="25,0">
                                                                <i class="icofont-flikr"></i>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#"><span>
                                                                            <i class="icofont-warning"></i>
                                                                        </span> Report </a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#"><span><i
                                                                                class="icofont-reply"></i></span>
                                                                        Share</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- nft-bottom part -->
                                                <div class="nft-item-bottom">
                                                    <div class="nft-thumb">
                                                        <img loading="lazy"
                                                            src="{{ asset('assetsClient/images/banner/06.jpg') }}"
                                                            alt="nft-img">

                                                        <!-- nft countdwon -->
                                                        <!-- <ul class="nft-countdown count-down" data-date="July 05, 2022 21:14:01">
                                                                                                                                                                        <li>
                                                                                                                                                                            <span class="days">34</span><span class="count-txt">D</span>
                                                                                                                                                                        </li>
                                                                                                                                                                        <li>
                                                                                                                                                                            <span class="hours">09</span><span class="count-txt">H</span>
                                                                                                                                                                        </li>
                                                                                                                                                                        <li>
                                                                                                                                                                            <span class="minutes">32</span><span class="count-txt">M</span>
                                                                                                                                                                        </li>
                                                                                                                                                                        <li>
                                                                                                                                                                            <span class="seconds">32</span><span class="count-txt">S</span>
                                                                                                                                                                        </li>
                                                                                                                                                                    </ul> -->
                                                    </div>
                                                    <div class="nft-content">
                                                        <h4><a href="item-details.html">EUPHORIA de</a> </h4>
                                                        <div
                                                            class="price-like d-flex justify-content-between align-items-center">
                                                            <p class="nft-price">Price: <span class="yellow-color">0.34
                                                                    ETH</span>
                                                            </p> 
                                                            <a href="#" class="nft-like"><i
                                                                    class="icofont-heart"></i>
                                                                230</a>
                                                                
                                                        </div>
                                                        <div
                                                            class="price-like d-flex justify-content-between align-items-center">
                                                            <p class="nft-price">Price: <span class="yellow-color">0.34
                                                                    ETH</span>
                                                            </p> 
                                                            <a href="#" class="nft-like"><i
                                                                    class="icofont-eye"></i>
                                                                230</a>
                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="nft-item home-4">
                                            <div class="nft-inner">
                                                <!-- nft top part -->
                                                <div
                                                    class="nft-item-top d-flex justify-content-between align-items-center">
                                                    <div class="author-part">
                                                        <ul class="author-list d-flex">
                                                            <li class="single-author d-flex align-items-center">
                                                                <a href="author.html" class="veryfied"><img
                                                                        loading="lazy"
                                                                        src="{{ asset('assetsClient/images/seller/03.png') }}"
                                                                        alt="author-img"></a>
                                                                <h6><a href="author.html">Imo35 ucas</a></h6>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="more-part">
                                                        <div class=" dropstart">
                                                            <a class=" dropdown-toggle" href="#" role="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false"
                                                                data-bs-offset="25,0">
                                                                <i class="icofont-flikr"></i>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#"><span>
                                                                            <i class="icofont-warning"></i>
                                                                        </span> Report </a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#"><span><i
                                                                                class="icofont-reply"></i></span>
                                                                        Share</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- nft-bottom part -->
                                                <div class="nft-item-bottom">
                                                    <div class="nft-thumb">
                                                        <img loading="lazy"
                                                            src="{{ asset('assetsClient/images/banner/05.jpg') }}"
                                                            alt="nft-img">

                                                        <!-- nft countdwon -->
                                                        <!-- <ul class="nft-countdown count-down" data-date="July 05, 2022 21:14:01">
                                                                                                                                                                        <li>
                                                                                                                                                                            <span class="days">34</span><span class="count-txt">D</span>
                                                                                                                                                                        </li>
                                                                                                                                                                        <li>
                                                                                                                                                                            <span class="hours">09</span><span class="count-txt">H</span>
                                                                                                                                                                        </li>
                                                                                                                                                                        <li>
                                                                                                                                                                            <span class="minutes">32</span><span class="count-txt">M</span>
                                                                                                                                                                        </li>
                                                                                                                                                                        <li>
                                                                                                                                                                            <span class="seconds">32</span><span class="count-txt">S</span>
                                                                                                                                                                        </li>
                                                                                                                                                                    </ul> -->
                                                    </div>
                                                    <div class="nft-content">
                                                        <h4><a href="item-details.html">Future Rocket</a> </h4>
                                                        <div
                                                            class="price-like d-flex justify-content-between align-items-center">
                                                            <p class="nft-price">Price: <span class="yellow-color">0.34
                                                                    ETH</span>
                                                            </p>
                                                            <a href="#" class="nft-like"><i
                                                                    class="icofont-heart"></i>
                                                                230</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="nft-item home-4">
                                            <div class="nft-inner">
                                                <!-- nft top part -->
                                                <div
                                                    class="nft-item-top d-flex justify-content-between align-items-center">
                                                    <div class="author-part">
                                                        <ul class="author-list d-flex">
                                                            <li class="single-author d-flex align-items-center">
                                                                <a href="author.html" class="veryfied"><img
                                                                        loading="lazy"
                                                                        src="{{ asset('assetsClient/images/seller/04.png') }}"
                                                                        alt="author-img"></a>
                                                                <h6><a href="author.html">lcus x3</a></h6>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="more-part">
                                                        <div class=" dropstart">
                                                            <a class=" dropdown-toggle" href="#" role="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false"
                                                                data-bs-offset="25,0">
                                                                <i class="icofont-flikr"></i>
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#"><span>
                                                                            <i class="icofont-warning"></i>
                                                                        </span> Report </a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#"><span><i
                                                                                class="icofont-reply"></i></span>
                                                                        Share</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- nft-bottom part -->
                                                <div class="nft-item-bottom">
                                                    <div class="nft-thumb">
                                                        <img loading="lazy"
                                                            src="{{ asset('assetsClient/images/banner/02.gif') }}"
                                                            alt="nft-img">
                                                    </div>
                                                    <div class="nft-content">
                                                        <h4><a href="item-details.html">Silly C4T de</a> </h4>
                                                        <div
                                                            class="price-like d-flex justify-content-between align-items-center">
                                                            <p class="nft-price">Price: <span class="yellow-color">0.34
                                                                    ETH</span>
                                                            </p>
                                                            <a href="#" class="nft-like"><i
                                                                    class="icofont-heart"></i>
                                                                230</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===============//banner section end here \\================= -->


    <!-- ==========wallet Section start Here========== -->
    <section class="wallet-section padding-top padding-bottom">
        <div class="container">

            <div class="section-header style-4">
                <div class="header-shape"><span></span></div>
                <h3>Sản Phẩm Kỹ Thuật Số</h3>
            </div>

            <div class="wallet-inner">
                <div class="row g-3">
                    <div class="col-lg-2 col-sm-4 col-6">
                        <div class="wallet-item home-4">
                            <div class="wallet-item-inner text-center">
                                <div class="wallet-thumb">
                                    <a href="#!">
                                        <img src="{{ asset('assetsClient/images/wallet/06.png') }}" alt="wallet-img">
                                    </a>
                                </div>
                                <div class="wallet-content">
                                    <h5><a href="#!">Meta Mask</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-6">
                        <div class="wallet-item home-4">
                            <div class="wallet-item-inner text-center">
                                <div class="wallet-thumb">
                                    <a href="#!">
                                        <img src="{{ asset('assetsClient/images/wallet/07.png') }}" alt="wallet-img">
                                    </a>
                                </div>
                                <div class="wallet-content">
                                    <h5><a href="#!">Binance</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-6">
                        <div class="wallet-item home-4">
                            <div class="wallet-item-inner text-center">
                                <div class="wallet-thumb">
                                    <a href="#!">
                                        <img src="{{ asset('assetsClient/images/wallet/08.png') }}" alt="wallet-img">
                                    </a>
                                </div>
                                <div class="wallet-content">
                                    <h5><a href="#!">Formatic</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-6">
                        <div class="wallet-item home-4">
                            <div class="wallet-item-inner text-center">
                                <div class="wallet-thumb">
                                    <a href="#!">
                                        <img src="{{ asset('assetsClient/images/wallet/01.png') }}" alt="wallet-img">
                                    </a>
                                </div>
                                <div class="wallet-content">
                                    <h5><a href="#!">Autherum</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-6">
                        <div class="wallet-item home-4">
                            <div class="wallet-item-inner text-center">
                                <div class="wallet-thumb">
                                    <a href="#!">
                                        <img src="{{ asset('assetsClient/images/wallet/03.png') }}" alt="wallet-img">
                                    </a>
                                </div>
                                <div class="wallet-content">
                                    <h5><a href="#!">Coinbase</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-6">
                        <div class="wallet-item home-4">
                            <div class="wallet-item-inner text-center">
                                <div class="wallet-thumb">
                                    <a href="#!">
                                        <img src="{{ asset('assetsClient/images/wallet/05.png') }}" alt="wallet-img">
                                    </a>
                                </div>
                                <div class="wallet-content">
                                    <h5><a href="#!">Portis</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========wallet Section ends Here========== -->


    <!-- ===============//auction section start here \\================= -->
    <section class="auction-section padding-bottom">
        <div class="container">
            <div class="section-header style-4">
                <div class="header-shape"><span></span></div>
                <h3>Live Auctions</h3>
            </div>
            <div class="section-wrapper">
                <div class="auction-holder">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="nft-item home-4">
                                <div class="nft-inner">
                                    <!-- nft top part -->
                                    <div class="nft-item-top d-flex justify-content-between align-items-center">
                                        <div class="author-part">
                                            <ul class="author-list d-flex">
                                                <li class="single-author">
                                                    <a href="author.html"><img
                                                            src="{{ asset('assetsClient/images/seller/01.png') }}"
                                                            alt="author-img"></a>
                                                </li>
                                                <li class="single-author d-flex align-items-center">
                                                    <a href="author.html" class="veryfied"><img
                                                            src="{{ asset('assetsClient/images/seller/01.gif') }}"
                                                            alt="author-img"></a>
                                                    <h6><a href="author.html">Jhon Doe</a></h6>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="more-part">
                                            <div class=" dropstart">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-offset="25,0">
                                                    <i class="icofont-flikr"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><span>
                                                                <i class="icofont-warning"></i>
                                                            </span> Report </a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><span><i
                                                                    class="icofont-reply"></i></span> Share</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- nft-bottom part -->
                                    <div class="nft-item-bottom">
                                        <div class="nft-thumb">
                                            <img src="{{ asset('assetsClient/images/nft-item/04.gif') }}" alt="nft-img">

                                            <!-- nft countdwon -->
                                            <ul class="nft-countdown count-down" data-date="July 05, 2022 21:14:01"
                                                data-blast="bgColor">
                                                <li>
                                                    <span class="days">34</span><span class="count-txt">D</span>
                                                </li>
                                                <li>
                                                    <span class="hours">09</span><span class="count-txt">H</span>
                                                </li>
                                                <li>
                                                    <span class="minutes">32</span><span class="count-txt">M</span>
                                                </li>
                                                <li>
                                                    <span class="seconds">32</span><span class="count-txt">S</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="nft-content">
                                            <h4><a href="item-details.html">Walking On
                                                    Air</a> </h4>
                                            <div class="price-like d-flex justify-content-between align-items-center">
                                                <p class="nft-price">Price: <span class="yellow-color">0.34 ETH</span>
                                                </p>
                                                <a href="#" class="nft-like"><i class="icofont-heart"></i>
                                                    230</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="nft-item home-4">
                                <div class="nft-inner">
                                    <!-- nft top part -->
                                    <div class="nft-item-top d-flex justify-content-between align-items-center">
                                        <div class="author-part">
                                            <ul class="author-list d-flex">
                                                <li class="single-author">
                                                    <a href="author.html"><img
                                                            src="{{ asset('assetsClient/images/seller/01.png') }}"
                                                            alt="author-img"></a>
                                                </li>
                                                <li class="single-author">
                                                    <a href="author.html"><img
                                                            src="{{ asset('assetsClient/images/seller/02.gif') }}"
                                                            alt="author-img"></a>
                                                </li>
                                                <li class="single-author d-flex align-items-center">
                                                    <a href="author.html" class="veryfied"><img
                                                            src="{{ asset('assetsClient/images/seller/02.png') }}"
                                                            alt="author-img"></a>
                                                    <h6><a href="author.html">Gucci L.</a></h6>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="more-part">
                                            <div class=" dropstart">
                                                <a class="dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-offset="25,0">
                                                    <i class="icofont-flikr"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><span>
                                                                <i class="icofont-warning"></i>
                                                            </span> Report </a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><span><i
                                                                    class="icofont-reply"></i></span> Share</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- nft-bottom part -->
                                    <div class="nft-item-bottom">
                                        <div class="nft-thumb">
                                            <img src="{{ asset('assetsClient/images/nft-item/03.jpg') }}" alt="nft-img">

                                            <!-- nft countdwon -->
                                            <ul class="nft-countdown count-down" data-date="July 05, 2022 21:14:01"
                                                data-blast="bgColor">
                                                <li>
                                                    <span class="days">34</span><span class="count-txt">D</span>
                                                </li>
                                                <li>
                                                    <span class="hours">09</span><span class="count-txt">H</span>
                                                </li>
                                                <li>
                                                    <span class="minutes">32</span><span class="count-txt">M</span>
                                                </li>
                                                <li>
                                                    <span class="seconds">32</span><span class="count-txt">S</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="nft-content">
                                            <h4><a href="item-details.html">EUPHORIA de</a> </h4>
                                            <div class="price-like d-flex justify-content-between align-items-center">
                                                <p class="nft-price">Price: <span class="yellow-color">0.34 ETH</span>
                                                </p>
                                                <a href="#" class="nft-like"><i class="icofont-heart"></i>
                                                    230</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="nft-item home-4">
                                <div class="nft-inner">
                                    <!-- nft top part -->
                                    <div class="nft-item-top d-flex justify-content-between align-items-center">
                                        <div class="author-part">
                                            <ul class="author-list d-flex">
                                                <li class="single-author d-flex align-items-center">
                                                    <a href="author.html" class="veryfied"><img
                                                            src="{{ asset('assetsClient/images/seller/04.png') }}"
                                                            alt="author-img"></a>
                                                    <h6><a href="author.html">Rassel mrh</a></h6>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="more-part">
                                            <div class=" dropstart">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-offset="25,0">
                                                    <i class="icofont-flikr"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><span>
                                                                <i class="icofont-warning"></i>
                                                            </span> Report </a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><span><i
                                                                    class="icofont-reply"></i></span> Share</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- nft-bottom part -->
                                    <div class="nft-item-bottom">
                                        <div class="nft-thumb">
                                            <img src="{{ asset('assetsClient/images/nft-item/04.jpg') }}" alt="nft-img">

                                            <!-- nft countdwon -->
                                            <ul class="nft-countdown count-down" data-date="July 05, 2022 21:14:01"
                                                data-blast="bgColor">
                                                <li>
                                                    <span class="days">34</span><span class="count-txt">D</span>
                                                </li>
                                                <li>
                                                    <span class="hours">09</span><span class="count-txt">H</span>
                                                </li>
                                                <li>
                                                    <span class="minutes">32</span><span class="count-txt">M</span>
                                                </li>
                                                <li>
                                                    <span class="seconds">32</span><span class="count-txt">S</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="nft-content">
                                            <h4><a href="item-details.html">Futuristic cols</a> </h4>
                                            <div class="price-like d-flex justify-content-between align-items-center">
                                                <p class="nft-price">Price: <span class="yellow-color">0.34 ETH</span>
                                                </p>
                                                <a href="#" class="nft-like"><i class="icofont-heart"></i>
                                                    130</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="nft-item home-4">
                                <div class="nft-inner">
                                    <!-- nft top part -->
                                    <div class="nft-item-top d-flex justify-content-between align-items-center">
                                        <div class="author-part">
                                            <ul class="author-list d-flex">
                                                <li class="single-author">
                                                    <a href="author.html"><img
                                                            src="{{ asset('assetsClient/images/seller/04.png') }}"
                                                            alt="author-img"></a>
                                                </li>
                                                <li class="single-author">
                                                    <a href="author.html"><img
                                                            src="{{ asset('assetsClient/images/seller/05.png') }}"
                                                            alt="author-img"></a>
                                                </li>
                                                <li class="single-author d-flex align-items-center">
                                                    <a href="author.html" class="veryfied"><img
                                                            src="{{ asset('assetsClient/images/seller/04.gif') }}"
                                                            alt="author-img"></a>
                                                    <h6><a href="author.html">Blexa z</a></h6>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="more-part">
                                            <div class=" dropstart">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-offset="25,0">
                                                    <i class="icofont-flikr"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><span>
                                                                <i class="icofont-warning"></i>
                                                            </span> Report </a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><span><i
                                                                    class="icofont-reply"></i></span> Share</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- nft-bottom part -->
                                    <div class="nft-item-bottom">
                                        <div class="nft-thumb">
                                            <img src="{{ asset('assetsClient/images/nft-item/05.gif') }}" alt="nft-img">

                                            <!-- nft countdwon -->
                                            <ul class="nft-countdown count-down" data-date="July 05, 2022 21:14:01"
                                                data-blast="bgColor">
                                                <li>
                                                    <span class="days">34</span><span class="count-txt">D</span>
                                                </li>
                                                <li>
                                                    <span class="hours">09</span><span class="count-txt">H</span>
                                                </li>
                                                <li>
                                                    <span class="minutes">32</span><span class="count-txt">M</span>
                                                </li>
                                                <li>
                                                    <span class="seconds">32</span><span class="count-txt">S</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="nft-content">
                                            <h4><a href="item-details.html">Space Crafts</a> </h4>
                                            <div class="price-like d-flex justify-content-between align-items-center">
                                                <p class="nft-price">Price: <span class="yellow-color">0.34 ETH</span>
                                                </p>
                                                <a href="#" class="nft-like"><i class="icofont-heart"></i>
                                                    230</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ===============//auction section end here \\================= -->



    <!-- ===============//Category section start here \\================= -->
    <section class="category-section padding-top padding-bottom">
        <div class="container">
            <div class="section-header style-4">
                <div class="header-shape"><span></span></div>
                <h3>Browse By Catergory</h3>
            </div>
            <div class="section-wrapper">

                <div class="category-wrapper">
                    <div class="row justify-content-center g-4">
                        <div class="col-lg-4 col-sm-6">
                            <div class="nft-item home-4 cat-item">
                                <div class="nft-inner">
                                    <div class="nft-cat-thumb ">
                                        <div class="thumb-list swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/01.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/02.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/03.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nft-content">
                                        <div class="author-details">
                                            <h4><a href="explore.html">Digital Art</a> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="nft-item home-4 cat-item">
                                <div class="nft-inner">
                                    <div class="nft-cat-thumb ">
                                        <div class="thumb-list swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/04.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/05.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/06.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nft-content">
                                        <div class="author-details">
                                            <h4><a href="explore.html">Music</a> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="nft-item home-4 cat-item">
                                <div class="nft-inner">
                                    <div class="nft-cat-thumb ">
                                        <div class="thumb-list swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/07.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/08.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/09.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nft-content">
                                        <div class="author-details">
                                            <h4><a href="explore.html">Domain Name </a> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="nft-item home-4 cat-item">
                                <div class="nft-inner">
                                    <div class="nft-cat-thumb ">
                                        <div class="thumb-list swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/10.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/11.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/12.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nft-content">
                                        <div class="author-details">
                                            <h4><a href="explore.html">Sports </a> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="nft-item home-4 cat-item">
                                <div class="nft-inner">
                                    <div class="nft-cat-thumb ">
                                        <div class="thumb-list swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/13.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/14.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/15.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nft-content">
                                        <div class="author-details">
                                            <h4><a href="explore.html">Utilities</a> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="nft-item home-4 cat-item">
                                <div class="nft-inner">
                                    <div class="nft-cat-thumb ">
                                        <div class="thumb-list swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/16.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/17.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="single-thumb"><img
                                                        src="{{ asset('assetsClient/images/nft-item/category/18.jpg') }}"
                                                        alt="cat-image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nft-content">
                                        <div class="author-details">
                                            <h4><a href="explore.html">All NFT's</a> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===============//Category section end here \\================= -->


    <!-- ===============//Top Seller section start here \\================= -->
    <section class="topseller-section padding-bottom">
        <div class="container">
            <div class="section-header style-4">
                <div class="header-shape"><span></span></div>
                <h3>Top Sellers</h3>
            </div>
            <div class="section-wrapper">
                <div class="nft-sell-wrapper">
                    <div class="row justify-content-center gx-4 gy-3">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="nft-item home-4 style-2">
                                <div class="nft-inner">
                                    <div class="nft-thumb">
                                        <img src="{{ asset('assetsClient/images/nft-item/style-2/01.jpg') }}"
                                            alt="nft-img">
                                    </div>
                                    <div class="nft-content">
                                        <div class="author-thumb">
                                            <a href="author.html" class="veryfied"><img
                                                    src="{{ asset('assetsClient/images/seller/04.png') }}"
                                                    alt="author-img"></a>
                                        </div>
                                        <div class="author-details d-flex flex-wrap align-items-center gap-15">
                                            <div class="author-number">
                                                <h3 class="fs-36">01</h3>
                                            </div>
                                            <div class="author-det-info">
                                                <h5><a href="author.html">Gihan Fernindo</a> </h5>
                                                <p class="nft-price yellow-color">$23,002.98</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="nft-item home-4 style-2">
                                <div class="nft-inner">
                                    <div class="nft-thumb">
                                        <img loading="lazy"
                                            src="{{ asset('assetsClient/images/nft-item/style-2/02.jpg') }}"
                                            alt="nft-img">
                                    </div>
                                    <div class="nft-content">
                                        <div class="author-thumb">
                                            <a href="author.html" class="veryfied"><img loading="lazy"
                                                    src="{{ asset('assetsClient/images/seller/02.gif') }}"
                                                    alt="author-img"></a>
                                        </div>
                                        <div class="author-details d-flex flex-wrap align-items-center gap-15">
                                            <div class="author-number">
                                                <h3 class="fs-36">02</h3>
                                            </div>
                                            <div class="author-det-info">
                                                <h5><a href="author.html">liao 5er</a> </h5>
                                                <p class="nft-price yellow-color">$23,002.98</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="nft-item home-4 style-2">
                                <div class="nft-inner">
                                    <div class="nft-thumb">
                                        <img loading="lazy"
                                            src="{{ asset('assetsClient/images/nft-item/style-2/03.jpg') }}"
                                            alt="nft-img">
                                    </div>
                                    <div class="nft-content">
                                        <div class="author-thumb">
                                            <a href="author.html" class="veryfied"><img loading="lazy"
                                                    src="{{ asset('assetsClient/images/seller/03.png') }}"
                                                    alt="author-img"></a>
                                        </div>
                                        <div class="author-details d-flex flex-wrap align-items-center gap-15">
                                            <div class="author-number">
                                                <h3 class="fs-36">03</h3>
                                            </div>
                                            <div class="author-det-info">
                                                <h5><a href="author.html">xox3 nindo</a> </h5>
                                                <p class="nft-price yellow-color">$23,002.98</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="nft-item home-4 style-2">
                                <div class="nft-inner">
                                    <div class="nft-thumb">
                                        <img loading="lazy"
                                            src="{{ asset('assetsClient/images/nft-item/style-2/04.jpg') }}"
                                            alt="nft-img">
                                    </div>
                                    <div class="nft-content">
                                        <div class="author-thumb">
                                            <a href="author.html" class="veryfied"><img loading="lazy"
                                                    src="{{ asset('assetsClient/images/seller/05.gif') }}"
                                                    alt="author-img"></a>
                                        </div>
                                        <div class="author-details d-flex flex-wrap align-items-center gap-15">
                                            <div class="author-number">
                                                <h3 class="fs-36">04</h3>
                                            </div>
                                            <div class="author-det-info">
                                                <h5><a href="author.html">raxel mrh</a> </h5>
                                                <p class="nft-price yellow-color">$23,002.98</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="nft-item home-4 style-2">
                                <div class="nft-inner">
                                    <div class="nft-thumb">
                                        <img loading="lazy"
                                            src="{{ asset('assetsClient/images/nft-item/style-2/05.jpg') }}"
                                            alt="nft-img">
                                    </div>
                                    <div class="nft-content">
                                        <div class="author-thumb">
                                            <a href="author.html" class="veryfied"><img loading="lazy"
                                                    src="{{ asset('assetsClient/images/seller/02.png') }}"
                                                    alt="author-img"></a>
                                        </div>
                                        <div class="author-details d-flex flex-wrap align-items-center gap-15">
                                            <div class="author-number">
                                                <h3 class="fs-36">05</h3>
                                            </div>
                                            <div class="author-det-info">
                                                <h5><a href="author.html">lsr 33xr </a> </h5>
                                                <p class="nft-price yellow-color">$23,002.98</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="nft-item home-4 style-2">
                                <div class="nft-inner">
                                    <div class="nft-thumb">
                                        <img loading="lazy"
                                            src="{{ asset('assetsClient/images/nft-item/style-2/06.jpg') }}"
                                            alt="nft-img">
                                    </div>
                                    <div class="nft-content">
                                        <div class="author-thumb">
                                            <a href="author.html" class="veryfied"><img loading="lazy"
                                                    src="{{ asset('assetsClient/images/seller/07.gif') }}"
                                                    alt="author-img"></a>
                                        </div>
                                        <div class="author-details d-flex flex-wrap align-items-center gap-15">
                                            <div class="author-number">
                                                <h3 class="fs-36">06</h3>
                                            </div>
                                            <div class="author-det-info">
                                                <h5><a href="author.html">Gihan Fernindo</a> </h5>
                                                <p class="nft-price yellow-color">$23,002.98</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="nft-item home-4 style-2">
                                <div class="nft-inner">
                                    <div class="nft-thumb">
                                        <img loading="lazy"
                                            src="{{ asset('assetsClient/images/nft-item/style-2/07.jpg') }}"
                                            alt="nft-img">
                                    </div>
                                    <div class="nft-content">
                                        <div class="author-thumb">
                                            <a href="author.html" class="veryfied"><img loading="lazy"
                                                    src="{{ asset('assetsClient/images/seller/05.png') }}"
                                                    alt="author-img"></a>
                                        </div>
                                        <div class="author-details d-flex flex-wrap align-items-center gap-15">
                                            <div class="author-number">
                                                <h3 class="fs-36">07</h3>
                                            </div>
                                            <div class="author-det-info">
                                                <h5><a href="author.html">xihan f3rd</a> </h5>
                                                <p class="nft-price yellow-color">$23,002.98</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="nft-item home-4 style-2">
                                <div class="nft-inner">
                                    <div class="nft-thumb">
                                        <img loading="lazy"
                                            src="{{ asset('assetsClient/images/nft-item/style-2/08.jpg') }}"
                                            alt="nft-img">
                                    </div>
                                    <div class="nft-content">
                                        <div class="author-thumb">
                                            <a href="author.html" class="veryfied"><img loading="lazy"
                                                    src="{{ asset('assetsClient/images/seller/04.gif') }}"
                                                    alt="author-img"></a>
                                        </div>
                                        <div class="author-details d-flex flex-wrap align-items-center gap-15">
                                            <div class="author-number">
                                                <h3 class="fs-36">08</h3>
                                            </div>
                                            <div class="author-det-info">
                                                <h5><a href="author.html">Leo F3s </a> </h5>
                                                <p class="nft-price yellow-color">$23,002.98</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===============//Top Seller section end here \\================= -->


    <!-- ===============//Exclusive drops section start here \\================= -->
    <section class="ex-drop-section padding-bottom">
        <div class="container">
            <div class="section-header style-4">
                <div class="header-shape"><span></span></div>
                <h3>Exclusive aNFT Drops</h3>
            </div>
            <div class="section-wrapper">
                <div class="ex-drop-wrapper">
                    <div class="row justify-content-center gx-4 gy-3">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="nft-item home-4">
                                <div class="nft-inner">
                                    <!-- nft top part -->
                                    <div class="nft-item-top d-flex justify-content-between align-items-center">
                                        <div class="author-part">
                                            <ul class="author-list d-flex">
                                                <li class="single-author d-flex align-items-center">
                                                    <a href="author.html" class="veryfied"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/04.png') }}"
                                                            alt="author-img"></a>
                                                    <h6><a href="author.html">Gucci Lucas</a></h6>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="more-part">
                                            <div class=" dropstart">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-offset="25,0">
                                                    <i class="icofont-flikr"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><span>
                                                                <i class="icofont-warning"></i>
                                                            </span> Report </a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><span><i
                                                                    class="icofont-reply"></i></span> Share</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- nft-bottom part -->
                                    <div class="nft-item-bottom">
                                        <div class="nft-thumb">
                                            <img loading="lazy" src="{{ asset('assetsClient/images/nft-item/01.gif') }}"
                                                alt="nft-img">

                                            <!-- nft countdwon -->
                                            <!-- <ul class="nft-countdown count-down" data-date="July 05, 2022 21:14:01">
                                                                    <li>
                                                                        <span class="days">34</span><span class="count-txt">D</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="hours">09</span><span class="count-txt">H</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="minutes">32</span><span class="count-txt">M</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="seconds">32</span><span class="count-txt">S</span>
                                                                    </li>
                                                                </ul> -->
                                        </div>
                                        <div class="nft-content">
                                            <h4><a href="item-details.html">EUPHORIA de</a> </h4>
                                            <div class="price-like d-flex justify-content-between align-items-center">
                                                <p class="nft-price">Price: <span class="yellow-color">0.34 ETH</span>
                                                </p>
                                                <a href="#" class="nft-like"><i class="icofont-heart"></i>
                                                    230</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="nft-item home-4">
                                <div class="nft-inner">
                                    <!-- nft top part -->
                                    <div class="nft-item-top d-flex justify-content-between align-items-center">
                                        <div class="author-part">
                                            <ul class="author-list d-flex">
                                                <li class="single-author">
                                                    <a href="author.html"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/01.png') }}"
                                                            alt="author-img"></a>
                                                </li>
                                                <li class="single-author">
                                                    <a href="author.html"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/01.gif') }}"
                                                            alt="author-img"></a>
                                                </li>
                                                <li class="single-author d-flex align-items-center">
                                                    <a href="author.html" class="veryfied"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/02.png') }}"
                                                            alt="author-img"></a>
                                                    <h6><a href="author.html">Ecalo jers</a></h6>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="more-part">
                                            <div class=" dropstart">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-offset="25,0">
                                                    <i class="icofont-flikr"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><span>
                                                                <i class="icofont-warning"></i>
                                                            </span> Report </a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><span><i
                                                                    class="icofont-reply"></i></span> Share</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- nft-bottom part -->
                                    <div class="nft-item-bottom">
                                        <div class="nft-thumb">
                                            <img loading="lazy" src="{{ asset('assetsClient/images/nft-item/02.jpg') }}"
                                                alt="nft-img">

                                            <!-- nft countdwon -->
                                            <!-- <ul class="nft-countdown count-down" data-date="July 05, 2022 21:14:01">
                                                                    <li>
                                                                        <span class="days">34</span><span class="count-txt">D</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="hours">09</span><span class="count-txt">H</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="minutes">32</span><span class="count-txt">M</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="seconds">32</span><span class="count-txt">S</span>
                                                                    </li>
                                                                </ul> -->
                                        </div>
                                        <div class="nft-content">
                                            <h4><a href="item-details.html">Mewao com de</a> </h4>
                                            <div class="price-like d-flex justify-content-between align-items-center">
                                                <p class="nft-price">Price: <span class="yellow-color">0.34 ETH</span>
                                                </p>
                                                <a href="#" class="nft-like"><i class="icofont-heart"></i>
                                                    278</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="nft-item home-4">
                                <div class="nft-inner">
                                    <!-- nft top part -->
                                    <div class="nft-item-top d-flex justify-content-between align-items-center">
                                        <div class="author-part">
                                            <ul class="author-list d-flex">
                                                <li class="single-author">
                                                    <a href="author.html"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/02.png') }}"
                                                            alt="author-img"></a>
                                                </li>
                                                <li class="single-author">
                                                    <a href="author.html"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/05.png') }}"
                                                            alt="author-img"></a>
                                                </li>
                                                <li class="single-author d-flex align-items-center">
                                                    <a href="author.html" class="veryfied"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/04.png') }}"
                                                            alt="author-img"></a>
                                                    <h6><a href="author.html">Hola moc</a></h6>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="more-part">
                                            <div class=" dropstart">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-offset="25,0">
                                                    <i class="icofont-flikr"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><span>
                                                                <i class="icofont-warning"></i>
                                                            </span> Report </a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><span><i
                                                                    class="icofont-reply"></i></span> Share</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- nft-bottom part -->
                                    <div class="nft-item-bottom">
                                        <div class="nft-thumb">
                                            <img loading="lazy" src="{{ asset('assetsClient/images/nft-item/03.jpg') }}"
                                                alt="nft-img">

                                            <!-- nft countdwon -->
                                            <!-- <ul class="nft-countdown count-down" data-date="July 05, 2022 21:14:01">
                                                                    <li>
                                                                        <span class="days">34</span><span class="count-txt">D</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="hours">09</span><span class="count-txt">H</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="minutes">32</span><span class="count-txt">M</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="seconds">32</span><span class="count-txt">S</span>
                                                                    </li>
                                                                </ul> -->
                                        </div>
                                        <div class="nft-content">
                                            <h4><a href="item-details.html">pet mice rio</a> </h4>
                                            <div class="price-like d-flex justify-content-between align-items-center">
                                                <p class="nft-price">Price: <span class="yellow-color">0.34 ETH</span>
                                                </p>
                                                <a href="#" class="nft-like"><i class="icofont-heart"></i>
                                                    340</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="nft-item home-4">
                                <div class="nft-inner">
                                    <!-- nft top part -->
                                    <div class="nft-item-top d-flex justify-content-between align-items-center">
                                        <div class="author-part">
                                            <ul class="author-list d-flex">
                                                <li class="single-author">
                                                    <a href="author.html"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/06.png') }}"
                                                            alt="author-img"></a>
                                                </li>
                                                <li class="single-author d-flex align-items-center">
                                                    <a href="author.html" class="veryfied"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/05.gif') }}"
                                                            alt="author-img"></a>
                                                    <h6><a href="author.html">Logicto pen</a></h6>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="more-part">
                                            <div class=" dropstart">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-offset="25,0">
                                                    <i class="icofont-flikr"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><span>
                                                                <i class="icofont-warning"></i>
                                                            </span> Report </a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><span><i
                                                                    class="icofont-reply"></i></span> Share</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- nft-bottom part -->
                                    <div class="nft-item-bottom">
                                        <div class="nft-thumb">
                                            <img loading="lazy"
                                                src="{{ asset('assetsClient/images/nft-item/06.gif') }}"
                                                alt="nft-img">

                                            <!-- nft countdwon -->
                                            <!-- <ul class="nft-countdown count-down" data-date="July 05, 2022 21:14:01">
                                                                    <li>
                                                                        <span class="days">34</span><span class="count-txt">D</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="hours">09</span><span class="count-txt">H</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="minutes">32</span><span class="count-txt">M</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="seconds">32</span><span class="count-txt">S</span>
                                                                    </li>
                                                                </ul> -->
                                        </div>
                                        <div class="nft-content">
                                            <h4><a href="item-details.html">Logical Impact </a> </h4>
                                            <div class="price-like d-flex justify-content-between align-items-center">
                                                <p class="nft-price">Price: <span class="yellow-color">0.34 ETH</span>
                                                </p>
                                                <a href="#" class="nft-like"><i class="icofont-heart"></i>
                                                    330</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="nft-item home-4">
                                <div class="nft-inner">
                                    <!-- nft top part -->
                                    <div class="nft-item-top d-flex justify-content-between align-items-center">
                                        <div class="author-part">
                                            <ul class="author-list d-flex">
                                                <li class="single-author">
                                                    <a href="author.html"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/06.png') }}"
                                                            alt="author-img"></a>
                                                </li>
                                                <li class="single-author">
                                                    <a href="author.html"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/07.gif') }}"
                                                            alt="author-img"></a>
                                                </li>
                                                <li class="single-author d-flex align-items-center">
                                                    <a href="author.html" class="veryfied"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/09.png') }}"
                                                            alt="author-img"></a>
                                                    <h6><a href="author.html">unique lo</a></h6>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="more-part">
                                            <div class=" dropstart">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-offset="25,0">
                                                    <i class="icofont-flikr"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><span>
                                                                <i class="icofont-warning"></i>
                                                            </span> Report </a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><span><i
                                                                    class="icofont-reply"></i></span> Share</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- nft-bottom part -->
                                    <div class="nft-item-bottom">
                                        <div class="nft-thumb">
                                            <img loading="lazy"
                                                src="{{ asset('assetsClient/images/nft-item/09.jpg') }}"
                                                alt="nft-img">

                                            <!-- nft countdwon -->
                                            <!-- <ul class="nft-countdown count-down" data-date="July 05, 2022 21:14:01">
                                                                    <li>
                                                                        <span class="days">34</span><span class="count-txt">D</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="hours">09</span><span class="count-txt">H</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="minutes">32</span><span class="count-txt">M</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="seconds">32</span><span class="count-txt">S</span>
                                                                    </li>
                                                                </ul> -->
                                        </div>
                                        <div class="nft-content">
                                            <h4><a href="item-details.html">Fly on high</a> </h4>
                                            <div class="price-like d-flex justify-content-between align-items-center">
                                                <p class="nft-price">Price: <span class="yellow-color">0.34 ETH</span>
                                                </p>
                                                <a href="#" class="nft-like"><i class="icofont-heart"></i>
                                                    355</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="nft-item home-4">
                                <div class="nft-inner">
                                    <!-- nft top part -->
                                    <div class="nft-item-top d-flex justify-content-between align-items-center">
                                        <div class="author-part">
                                            <ul class="author-list d-flex">
                                                <li class="single-author d-flex align-items-center">
                                                    <a href="author.html" class="veryfied"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/05.gif') }}"
                                                            alt="author-img"></a>
                                                    <h6><a href="author.html">Monica bel</a></h6>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="more-part">
                                            <div class=" dropstart">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-offset="25,0">
                                                    <i class="icofont-flikr"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><span>
                                                                <i class="icofont-warning"></i>
                                                            </span> Report </a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><span><i
                                                                    class="icofont-reply"></i></span> Share</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- nft-bottom part -->
                                    <div class="nft-item-bottom">
                                        <div class="nft-thumb">
                                            <img loading="lazy"
                                                src="{{ asset('assetsClient/images/nft-item/06.jpg') }}"
                                                alt="nft-img">

                                            <!-- nft countdwon -->
                                            <!-- <ul class="nft-countdown count-down" data-date="July 05, 2022 21:14:01">
                                                                    <li>
                                                                        <span class="days">34</span><span class="count-txt">D</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="hours">09</span><span class="count-txt">H</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="minutes">32</span><span class="count-txt">M</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="seconds">32</span><span class="count-txt">S</span>
                                                                    </li>
                                                                </ul> -->
                                        </div>
                                        <div class="nft-content">
                                            <h4><a href="item-details.html">kiara rodri de</a> </h4>
                                            <div class="price-like d-flex justify-content-between align-items-center">
                                                <p class="nft-price">Price: <span class="yellow-color">0.34 ETH</span>
                                                </p>
                                                <a href="#" class="nft-like"><i class="icofont-heart"></i>
                                                    60</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="nft-item home-4">
                                <div class="nft-inner">
                                    <!-- nft top part -->
                                    <div class="nft-item-top d-flex justify-content-between align-items-center">
                                        <div class="author-part">
                                            <ul class="author-list d-flex">
                                                <li class="single-author">
                                                    <a href="author.html"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/08.gif') }}"
                                                            alt="author-img"></a>
                                                </li>
                                                <li class="single-author">
                                                    <a href="author.html"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/01.png') }}"
                                                            alt="author-img"></a>
                                                </li>
                                                <li class="single-author d-flex align-items-center">
                                                    <a href="author.html" class="veryfied"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/11.png') }}"
                                                            alt="author-img"></a>
                                                    <h6><a href="author.html">Gucci L.</a></h6>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="more-part">
                                            <div class=" dropstart">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-offset="25,0">
                                                    <i class="icofont-flikr"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><span>
                                                                <i class="icofont-warning"></i>
                                                            </span> Report </a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><span><i
                                                                    class="icofont-reply"></i></span> Share</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- nft-bottom part -->
                                    <div class="nft-item-bottom">
                                        <div class="nft-thumb">
                                            <img loading="lazy"
                                                src="{{ asset('assetsClient/images/nft-item/04.gif') }}"
                                                alt="nft-img">

                                            <!-- nft countdwon -->
                                            <!-- <ul class="nft-countdown count-down" data-date="July 05, 2022 21:14:01">
                                                                    <li>
                                                                        <span class="days">34</span><span class="count-txt">D</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="hours">09</span><span class="count-txt">H</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="minutes">32</span><span class="count-txt">M</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="seconds">32</span><span class="count-txt">S</span>
                                                                    </li>
                                                                </ul> -->
                                        </div>
                                        <div class="nft-content">
                                            <h4><a href="item-details.html">EUPHORIA de</a> </h4>
                                            <div class="price-like d-flex justify-content-between align-items-center">
                                                <p class="nft-price">Price: <span class="yellow-color">0.34 ETH</span>
                                                </p>
                                                <a href="#" class="nft-like"><i class="icofont-heart"></i>
                                                    230</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="nft-item home-4">
                                <div class="nft-inner">
                                    <!-- nft top part -->
                                    <div class="nft-item-top d-flex justify-content-between align-items-center">
                                        <div class="author-part">
                                            <ul class="author-list d-flex">
                                                <li class="single-author">
                                                    <a href="author.html"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/01.png') }}"
                                                            alt="author-img"></a>
                                                </li>
                                                <li class="single-author">
                                                    <a href="author.html"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/07.png') }}"
                                                            alt="author-img"></a>
                                                </li>
                                                <li class="single-author d-flex align-items-center">
                                                    <a href="author.html" class="veryfied"><img loading="lazy"
                                                            src="{{ asset('assetsClient/images/seller/09.png') }}"
                                                            alt="author-img"></a>
                                                    <h6><a href="author.html">ptrax elm.</a></h6>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="more-part">
                                            <div class=" dropstart">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-offset="25,0">
                                                    <i class="icofont-flikr"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><span>
                                                                <i class="icofont-warning"></i>
                                                            </span> Report </a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><span><i
                                                                    class="icofont-reply"></i></span> Share</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- nft-bottom part -->
                                    <div class="nft-item-bottom">
                                        <div class="nft-thumb">
                                            <img loading="lazy"
                                                src="{{ asset('assetsClient/images/nft-item/08.jpg') }}"
                                                alt="nft-img">

                                            <!-- nft countdwon -->
                                            <!-- <ul class="nft-countdown count-down" data-date="July 05, 2022 21:14:01">
                                                                    <li>
                                                                        <span class="days">34</span><span class="count-txt">D</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="hours">09</span><span class="count-txt">H</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="minutes">32</span><span class="count-txt">M</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="seconds">32</span><span class="count-txt">S</span>
                                                                    </li>
                                                                </ul> -->
                                        </div>
                                        <div class="nft-content">
                                            <h4><a href="item-details.html">Homies wall</a> </h4>
                                            <div class="price-like d-flex justify-content-between align-items-center">
                                                <p class="nft-price">Price: <span class="yellow-color">0.34 ETH</span>
                                                </p>
                                                <a href="#" class="nft-like"><i class="icofont-heart"></i>
                                                    930</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- ===============//Exclusive drops section end here \\================= -->



    <!-- ===============//blog section start here \\================= -->
    <section class="blog-section pb-120">
        <div class="container">
            <div class="section-header style-4">
                <div class="header-shape"><span></span></div>
                <h3>Our Blog Posts</h3>
            </div>
            <div class="section-wrapper">

                <div class="blog-wrapper">
                    <div class="row justify-content-center gx-4 gy-2">
                        <div class="col-lg-4 col-sm-6">
                            <div class="nft-item home-4 blog-item">
                                <div class="nft-inner">
                                    <div class="nft-thumb">
                                        <img src="{{ asset('assetsClient/images/nft-item/blog/02.jpg') }}"
                                            alt="blog-img">
                                    </div>
                                    <div class="nft-content">
                                        <div class="author-details">
                                            <h4><a href="blog-single.html">The Rise of the Non Fungible Tokens
                                                    (NFTs)</a> </h4>
                                            <div class="meta-info">
                                                <p><span><i class="icofont-ui-calendar"
                                                            data-blast="color"></i></span>July 20 2022
                                                </p>
                                                <p><span><i class="icofont-user" data-blast="color"></i></span>Jhon doe
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="nft-item home-4 blog-item">
                                <div class="nft-inner">
                                    <div class="nft-thumb">
                                        <img src="{{ asset('assetsClient/images/nft-item/blog/03.jpg') }}"
                                            alt="blog-img">
                                    </div>
                                    <div class="nft-content">
                                        <div class="author-details">
                                            <h4><a href="blog-single.html"> Top 5 Most Popular NFT Games in 2022</a>
                                            </h4>
                                            <div class="meta-info">
                                                <p><span><i class="icofont-ui-calendar"
                                                            data-blast="color"></i></span>July 20 2022
                                                </p>
                                                <p><span><i class="icofont-user" data-blast="color"></i></span>Rassel H.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="nft-item home-4 blog-item">
                                <div class="nft-inner">
                                    <div class="nft-thumb">
                                        <img src="{{ asset('assetsClient/images/nft-item/blog/01.jpg') }}"
                                            alt="blog-img">
                                    </div>
                                    <div class="nft-content">
                                        <div class="author-details">
                                            <h4><a href="blog-single.html">Best NFT Selling Marketplace website</a>
                                            </h4>
                                            <div class="meta-info">
                                                <p><span><i class="icofont-ui-calendar"
                                                            data-blast="color"></i></span>July 20 2022
                                                </p>
                                                <p><span><i class="icofont-user" data-blast="color"></i></span>Alex zym
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===============//blog section end here \\================= -->
@endsection
