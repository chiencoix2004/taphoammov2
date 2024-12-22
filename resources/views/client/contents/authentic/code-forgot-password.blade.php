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

                        <!-- Hiển thị thông báo lỗi nếu có -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('message'))
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form method="POST" class="account-form" action="{{ route('verifyResetCode') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingCode" name="reset_code"
                                    placeholder="Mã xác nhận">
                                <label for="floatingCode">Mã xác nhận</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Xác Nhận</button>
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
