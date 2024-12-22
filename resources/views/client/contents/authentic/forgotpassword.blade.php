@extends('client.layouts.main')
@section('content')
    <section class="page-header-section style-1">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-inner">
                    <div class="page-title">
                        <h2>Quên Mật Khẩu? </h2>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Quên Mật Khẩu</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="login-section padding-top padding-bottom">
        <div class=" container">
            <div class="row g-5 align-items-center flex-md-row-reverse">
                <div class="col-lg-5">
                    <div class="account-wrapper">
                        <h3 class="title">Quên Mật Khẩu</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="account-form" action="{{ route('forgotPassword') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Địa Chỉ Email</label>
                            </div>
                            <!-- Thêm thông báo nếu có lỗi khi nhập email -->
                            @if ($errors->has('email'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <div class="form-group px-3">
                                <div class="d-flex justify-content-between flex-wrap pt-sm-2">
                                    <a href="{{ route('showLoginForm') }}">Đăng Nhập</a>
                                    <a href="{{ route('showRegisterForm') }}">Đăng Kí</a>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <button class="d-block default-btn move-top"><span>Gửi Mã Đến Email</span></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="account-img">
                        <img src="{{ asset('assetsClient/images/account/01.png') }}" alt="shape-image">
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
