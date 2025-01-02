<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from odindesignthemes.com/vikinger-dark/?login_username=&login_password=&login_remember=on by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Dec 2024 07:57:46 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- bootstrap 4.3.1 -->
    <link rel="stylesheet" href="{{ asset('assetsShop/css/vendor/bootstrap.min.css') }}">
    <!-- styles -->
    <link rel="stylesheet" href="{{ asset('assetsShop/css/styles.min.css') }}">
    <!-- favicon -->
    <link rel="icon" href="{{ asset('assetsShop/img/faviconm.ico') }}">
    <title>Vikinger | Home</title>
    <style>
        /* Đảm bảo label không ảnh hưởng đến bố cục khi bị ẩn */
        .input-label {
            transition: visibility 0.2s ease, opacity 0.2s ease;
            opacity: 1;
            /* Mặc định label hiện */
        }

        .input-label[style*="hidden"] {
            opacity: 0;
            /* Làm mờ label khi bị ẩn */
            visibility: hidden;
            /* Ẩn hoàn toàn */
        }

        /* Tùy chỉnh hiển thị lỗi */
        .error-message {
            color: #ff4d4d;
            /* Đổi màu lỗi sang đỏ nhạt */
            font-size: 14px;
            /* Đặt kích thước chữ nhỏ hơn */
            margin-top: 5px;
            /* Tạo khoảng cách giữa checkbox và lỗi */
            font-weight: 500;
            /* Đặt độ dày chữ vừa phải */
            display: block;
            /* Hiển thị lỗi dưới checkbox */
        }

        /* Hiệu ứng input khi có lỗi */
        input:invalid {
            border-color: #ff4d4d;
            /* Đổi viền input sang đỏ khi có lỗi */
        }

        /* Kiểm tra checkbox khi có lỗi */
        .checkbox-wrap input:invalid+.checkbox-box {
            border-color: #ff4d4d;
            /* Viền của checkbox chuyển đỏ khi có lỗi */
        }
    </style>
</head>

<body>

    <!-- LANDING -->
    <div class="landing">
        <!-- LANDING DECORATION -->
        <div class="landing-decoration"></div>
        <!-- /LANDING DECORATION -->

        <!-- LANDING INFO -->
        <div class="landing-info">
            <!-- LOGO -->
            <div class="logo">
                <!-- ICON LOGO VIKINGER -->
                <svg class="icon-logo-vikinger">
                    <use xlink:href="#svg-logo-vikinger"></use>
                </svg>
                <!-- /ICON LOGO VIKINGER -->
            </div>
            <!-- /LOGO -->

            <!-- LANDING INFO PRETITLE -->
            <h2 class="landing-info-pretitle">Welcome to</h2>
            <!-- /LANDING INFO PRETITLE -->

            <!-- LANDING INFO TITLE -->
            <h1 class="landing-info-title">TapHoaMMO</h1>
            <!-- /LANDING INFO TITLE -->

            <!-- LANDING INFO TEXT -->
            {{-- <p class="landing-info-text">The next generation social network &amp; community! Connect with your friends and play with our quests and badges gamification system!</p> --}}
            <!-- /LANDING INFO TEXT -->

            <p class="landing-info-text">Thị trường kỹ thuật số dành cho đồ sưu tầm tiền điện tử và token . Mua, bán và
                khám phá kỹ thuật số độc quyền.</p>
            <!-- TAB SWITCH -->
            {{-- <div class="tab-switch">
        <!-- TAB SWITCH BUTTON -->
        <p class="tab-switch-button login-register-form-trigger">Login</p>
        <!-- /TAB SWITCH BUTTON -->

        <!-- TAB SWITCH BUTTON -->
        <p class="tab-switch-button login-register-form-trigger">Register</p>
        <!-- /TAB SWITCH BUTTON -->
      </div> --}}
            <!-- /TAB SWITCH -->
        </div>
        <!-- /LANDING INFO -->

        <!-- LANDING FORM -->
        <div class="landing-form">
            <!-- FORM BOX -->
            {{-- <div class="form-box login-register-form-element">
        <!-- FORM BOX DECORATION -->
        <img class="form-box-decoration overflowing" src="img/landing/rocket.png" alt="rocket">
        <!-- /FORM BOX DECORATION -->

        <!-- FORM BOX TITLE -->
        <h2 class="form-box-title">Account Login</h2>
        <!-- /FORM BOX TITLE -->
    
        <!-- FORM -->
        <form class="form">
          <!-- FORM ROW -->
          <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
              <!-- FORM INPUT -->
              <div class="form-input">
                <label for="login-username">Username or Email</label>
                <input type="text" id="login-username" name="login_username">
              </div>
              <!-- /FORM INPUT -->
            </div>
            <!-- /FORM ITEM -->
          </div>
          <!-- /FORM ROW -->
    
          <!-- FORM ROW -->
          <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
              <!-- FORM INPUT -->
              <div class="form-input">
                <label for="login-password">Password</label>
                <input type="password" id="login-password" name="login_password">
              </div>
              <!-- /FORM INPUT -->
            </div>
            <!-- /FORM ITEM -->
          </div>
          <!-- /FORM ROW -->
    
          <!-- FORM ROW -->
          <div class="form-row space-between">
            <!-- FORM ITEM -->
            <div class="form-item">
              <!-- CHECKBOX WRAP -->
              <div class="checkbox-wrap">
                <input type="checkbox" id="login-remember" name="login_remember" checked>
                <!-- CHECKBOX BOX -->
                <div class="checkbox-box">
                  <!-- ICON CROSS -->
                  <svg class="icon-cross">
                    <use xlink:href="#svg-cross"></use>
                  </svg>
                  <!-- /ICON CROSS -->
                </div>
                <!-- /CHECKBOX BOX -->
                <label for="login-remember">Remember Me</label>
              </div>
              <!-- /CHECKBOX WRAP -->
            </div>
            <!-- /FORM ITEM -->
    
            <!-- FORM ITEM -->
            <div class="form-item">
              <!-- FORM LINK -->
              <a class="form-link" href="#">Forgot Password?</a>
              <!-- /FORM LINK -->
            </div>
            <!-- /FORM ITEM -->
          </div>
          <!-- /FORM ROW -->
    
          <!-- FORM ROW -->
          <div class="form-row">
            <!-- FORM ITEM -->
            <div class="form-item">
              <!-- BUTTON -->
              <button class="button medium secondary">Login to your Account!</button>
              <!-- /BUTTON -->
            </div>
            <!-- /FORM ITEM -->
          </div>
          <!-- /FORM ROW -->
        </form>
        <!-- /FORM -->
    
        <!-- LINED TEXT -->
        <p class="lined-text">Login with your Social Account</p>
        <!-- /LINED TEXT -->
    
        <!-- SOCIAL LINKS -->
        <div class="social-links">
          <!-- SOCIAL LINK -->
          <a class="social-link facebook" href="#">
            <!-- ICON FACEBOOK -->
            <svg class="icon-facebook">
              <use xlink:href="#svg-facebook"></use>
            </svg>
            <!-- /ICON FACEBOOK -->
          </a>
          <!-- /SOCIAL LINK -->
    
          <!-- SOCIAL LINK -->
          <a class="social-link twitter" href="#">
            <!-- ICON TWITTER -->
            <svg class="icon-twitter">
              <use xlink:href="#svg-twitter"></use>
            </svg>
            <!-- /ICON TWITTER -->
          </a>
          <!-- /SOCIAL LINK -->
    
          <!-- SOCIAL LINK -->
          <a class="social-link twitch" href="#">
            <!-- ICON TWITCH -->
            <svg class="icon-twitch">
              <use xlink:href="#svg-twitch"></use>
            </svg>
            <!-- /ICON TWITCH -->
          </a>
          <!-- /SOCIAL LINK -->
    
          <!-- SOCIAL LINK -->
          <a class="social-link youtube" href="#">
            <!-- ICON YOUTUBE -->
            <svg class="icon-youtube">
              <use xlink:href="#svg-youtube"></use>
            </svg>
            <!-- /ICON YOUTUBE -->
          </a>
          <!-- /SOCIAL LINK -->
        </div>
        <!-- /SOCIAL LINKS -->
      </div> --}}
            <!-- /FORM BOX -->

            <!-- FORM BOX -->
            <div class="form-box login-register-form-element">
                <!-- FORM BOX DECORATION -->
                <img class="form-box-decoration" src="{{ asset('assetsShop/img/landing/rocket.png') }}" alt="rocket">
                <!-- /FORM BOX DECORATION -->

                <!-- FORM BOX TITLE -->
                <h2 class="form-box-title">Đăng Kí Bán Hàng</h2>
                <!-- /FORM BOX TITLE -->

                <!-- FORM -->
                <form class="form" method="POST" action="{{ route('registerShop') }}">
                    @csrf
                    <!-- FORM ROW -->
                    <div class="form-row">
                        <!-- FORM ITEM -->
                        <div class="form-item">
                            <!-- FORM INPUT -->
                            <div class="form-input">
                                {{-- <label for="email">Email Của Bạn</label> --}}
                                <input type="text" onfocus="hideLabel(this)" placeholder="Email Của Bạn"
                                    onblur="showLabel(this)" id="register-email" name="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <span class="error-message" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- /FORM INPUT -->
                        </div>
                        <!-- /FORM ITEM -->
                    </div>
                    <div class="form-row">
                        <!-- FORM ITEM -->
                        <div class="form-item">
                            <!-- FORM INPUT -->
                            <div class="form-input">
                                {{-- <label for="phone">Số Điện Thoại Của Bạn</label> --}}
                                <input type="text" placeholder="Số Điện Thoại Của Bạn" onfocus="hideLabel(this)"
                                    onblur="showLabel(this)" id="register-username" name="phone"
                                    value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="error-message" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- /FORM INPUT -->
                        </div>
                        <!-- /FORM ITEM -->
                    </div>
                    <div class="form-row">
                        <!-- FORM ITEM -->
                        <div class="form-item">
                            <!-- FORM INPUT -->
                            <div class="form-input">
                                {{-- <label for="nameBank">Tên Chủ Ngân Hàng</label> --}}
                                <input type="text" onfocus="hideLabel(this)" onblur="showLabel(this)"
                                    placeholder="Tên Chủ Ngân Hàng" id="register-password" name="nameBank"
                                    value="{{ old('nameBank') }}">
                                @error('nameBank')
                                    <span class="error-message" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- /FORM INPUT -->
                        </div>
                        <!-- /FORM ITEM -->
                    </div>
                    <div class="form-row">
                        <!-- FORM ITEM -->
                        <div class="form-item">
                            <!-- CHECKBOX WRAP -->
                            <div class="checkbox-wrap">
                                <input type="checkbox" id="register-newsletter" name="register_terms"
                                    {{ old('register_terms') ? 'checked' : '' }}>
                                <!-- CHECKBOX BOX -->
                                <div class="checkbox-box">
                                    <!-- ICON CROSS -->
                                    <svg class="icon-cross">
                                        <use xlink:href="#svg-cross"></use>
                                    </svg>
                                    <!-- /ICON CROSS -->
                                </div>
                                <!-- /CHECKBOX BOX -->
                                <label for="register-newsletter">Đồng ý các điều khoản của chúng tôi.
                                    <a href="#!" style="color: rgb(0, 255, 55)">Tại Đây !</a>
                                </label>
                                @error('register_terms')
                                    <label class="error-message" style="color: red;">{{ $message }}</label>
                                @enderror
                            </div>
                            <!-- /CHECKBOX WRAP -->
                        </div>
                        <!-- /FORM ITEM -->
                    </div>
                    <div class="form-row">
                        <!-- FORM ITEM -->
                        <div class="form-item">
                            <!-- BUTTON -->
                            <button class="button medium primary">Đăng Ký Ngay</button>
                            <!-- /BUTTON -->
                        </div>
                        <!-- /FORM ITEM -->
                    </div>
                </form>



                <!-- FORM TEXT -->
                <p class="form-text">Khi bạn đồng ý với các điều khoản của chúng tôi thì cũng
                    đồng thời tự chịu trách nhiệm về các hành động liên quan, chúng tôi không chịu trách nhiệm pháp lý.
                    <a href="#!" style="color: red">Điều Khoản</a></label>
                </p>
                <!-- /FORM TEXT -->
            </div>

            <!-- /FORM BOX -->
        </div>
        <!-- /LANDING FORM -->
    </div>
    <!-- /LANDING -->

    <!-- app -->
    {{-- <script src="{{asset('assetsShop/app.bundle.min.js')}}"></script> --}}
    <script>
        function hideLabel(input) {
            const label = input.previousElementSibling;
            if (label) {
                label.style.visibility = 'hidden'; // Ẩn label khi bắt đầu nhập
            }
        }

        function showLabel(input) {
            const label = input.previousElementSibling;
            if (label && input.value.trim() === '') {
                label.style.visibility = 'visible'; // Hiện label nếu input trống
            }
        }
    </script>
</body>


</html>
