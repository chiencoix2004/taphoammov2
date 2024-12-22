@extends('client.layouts.main')
@section('content')
    <div class="login-section padding-top padding-bottom">
        <div class=" container">
            <div class="row g-5 align-items-center flex-md-row-reverse">
                <div class="col-lg-5">
                    <div class="account-wrapper">
                        <h3 class="title">Đăng Nhập</h3>
                        @if (session('message'))
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                        @endif 
                        {{-- <form class="account-form" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="email"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Nhập Email Của Bạn</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword" name="password"
                                    placeholder="Password">
                                <label for="floatingPassword">Nhập Mật Khẩu</label>
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between flex-wrap pt-sm-2">
                                    <div class="checkgroup">
                                        <input type="checkbox" name="remember" id="remember">
                                        <label for="remember">Nhớ Mật Khẩu</label>
                                    </div>
                                    <a href="forgot-pass.html">Quên Mật Khẩu?</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="d-block default-btn move-top"> <span>Đăng Nhập</span> </button>
                                <input type="submit" value="">Đăng Nhập
                            </div>
                        </form> --}}

                        <form class="account-form" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="email"
                                    placeholder="name@example.com" value="{{ old('email') }}">
                                <label for="floatingInput">Nhập Email Của Bạn</label>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword" name="password"
                                    placeholder="Password">
                                <label for="floatingPassword">Nhập Mật Khẩu</label>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="form-group">
                                <div class="d-flex justify-content-between flex-wrap pt-sm-2">
                                    <div class="checkgroup">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">Nhớ Mật Khẩu</label>
                                    </div>
                                    <a href="{{route('forgotPasswordForm')}}">Quên Mật Khẩu?</a>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <button class="d-block default-btn move-top"> <span>Đăng Nhập</span> </button>
                                {{-- <input type="submit" class="d-block default-btn move-top" value="Đăng Nhập"> --}}
                            </div>
                        </form>
                        
                        <div class="account-bottom">
                            <span class="d-block cate pt-10">Bạn Chưa Có Tài Khoản <a
                                    href="{{ route('showRegisterForm') }}">Đăng Kí</a></span>
                            <span class="or"><span>or</span></span>
                            <h5 class="subtitle">Login With Social Media</h5>
                            <ul class="social-media social-color lab-ul d-flex justify-content-center">
                                <li>
                                    <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="pinterest"><i class="icofont-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
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
