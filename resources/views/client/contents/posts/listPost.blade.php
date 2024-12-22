@extends('client.layouts.main')
@section('content')
    <!-- ==========Page Header Section Start Here========== -->
    <section class="page-header-section style-1">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-inner">
                    <div class="page-title">
                        <h2>Bài Viết</h2>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Danh Sách Bài Viết</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Page Header Section Ends Here========== -->


    <!-- ==========Blog Section start Here========== -->
    <section class="blog-section padding-top padding-bottom">
        <div class="container">
            <div class="main-blog">
                <div class="row g-5">
                    <div class="col-xl-9 col-12">
                        <div class="blog-wrapper">
                            <div class="row justify-content-center gx-4 gy-3">
                                @foreach ($listPost as $item)
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="nft-item blog-item">
                                            <div class="nft-inner">
                                                <div class="nft-thumb">
                                                    <img src="{{ asset('assetsClient/images/blog/01.gif') }}"
                                                        alt="blog-img">
                                                </div>
                                                <div class="nft-content">
                                                    <div class="author-details">
                                                        <h4>
                                                            <a href="{{ route('detailPost', ['slug' => $item->slug]) }}">
                                                                {{ $item->title }}
                                                            </a>
                                                        </h4>
                                                        <div class="meta-info">
                                                            <p class="date"><span><i
                                                                        class="icofont-ui-calendar"></i></span>
                                                                {{ $item->created_at }}</p>
                                                            <p><span><i class="icofont-user"></i></span>
                                                                {{ $item->user->username }}</p>
                                                            <p><span><i class="icofont-eye"></i></span>
                                                                {{ $item->view }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="paginations">
                            <ul class="lab-ul d-flex flex-wrap justify-content-center mb-1">
                                <li>
                                    {{ $listPost->links('pagination::bootstrap-4') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    @include('client.contents.posts.sibarPost')
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Blog Section ends Here========== -->
@endsection
