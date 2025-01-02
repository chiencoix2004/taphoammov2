@extends('client.layouts.main')
@section('content')
    <!-- ==========Page Header Section Start Here========== -->
    {{-- <section class="page-header-section style-1">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-inner">
                    <div class="page-title">
                        <h2>Nạp Tiền </h2>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Nạp Tiền</li>
                    </ol>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ==========Page Header Section Ends Here========== -->


    <!-- ==========wallet Section start Here========== -->
    <section class="wallet-section padding-top padding-bottom">
        <div class="container">
            <div class="wallet-inner">
                <div class="wallet-title">
                    <h3 class="mb-3">Nạp Tiền</h3>
                </div>
                <div class="row g-3">
                    @foreach ($listBank as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="wallet-item">
                                <div class="wallet-item-inner">
                                    <div class="wallet-thumb">
                                        @if ($item->bank_name == 970422)
                                            <img src="{{ asset('assets3/images/logos/mb.jpg') }}"
                                                class="rounded-circle thumb-md me-1 d-inline" alt="" width="40px"
                                                height="40px">
                                        @elseif($item->bank_name == 970416)
                                            <img src="{{ asset('assets3/images/logos/logo-acb.jpg') }}" alt=""
                                                width="40px" height="40px" class="rounded-circle thumb-md me-1 d-inline">
                                        @endif
                                    </div>
                                    <div class="wallet-content">
                                        @if ($item->bank_name == 970422)
                                            <h5><a href="#!">MBBank</a></h5>
                                        @elseif($item->bank_name == 970416)
                                            <h5><a href="#!">ACB</a></h5>
                                        @endif
                                        <li class="crypto-copy" style="color: aqua">
                                            STK:
                                            <a href="javascript:void(0);" onclick="copyText('{{ $item->account_number }}')"
                                                style="cursor: pointer;">
                                                {{ $item->account_number }}
                                            </a>
                                        </li>
                                        <li class="crypto-copy" style="color: aqua">
                                            Tên TK:
                                            <a href="javascript:void(0);" onclick="copyText('{{ $item->bankers }}')"
                                                style="cursor: pointer;">
                                                {{ $item->bankers }}
                                            </a>
                                        </li>
                                        {{-- <li class="crypto-copy" style="color: aqua">
                                            Nội Dung: <a href="#!">{{ $user->username }}{{ $user->id }}</a>
                                        </li>  --}}
                                        <li class="crypto-copy" style="color: aqua">
                                            Nội Dung:
                                            <a href="javascript:void(0);"
                                                onclick="copyText('{{ Auth::user()->username . ' ' . Auth::user()->id }}')"
                                                style="cursor: pointer; color:rgb(243, 240, 53)">
                                                {{ Auth::user()->username }} {{ Auth::user()->id }}
                                            </a>
                                        </li>

                                        <div id="copy-alert" class="copy-alert">
                                            Đã sao chép!
                                        </div>
                                        <br>
                                        <span style="color: red">Hoặc quét mã Qrcode</span>
                                        <p> <img src="https://img.vietqr.io/image/{{ $item->bank_name }}-{{ $item->account_number }}-compact.png?addInfo={{Auth::user()->username}}%20{{Auth::user()->id}}"
                                                width="300px" height="300px"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>
                <hr>
                <h3 class="mb-3">*Lưu ý khi nạp tiền:</h3>
                <p class="mt-5 mb-0 wallet-notice"><span class="me-1 theme-color">
                        <i class="icofont-bulb-alt"></i></span> - Vui lòng điền chính xác nội dung chuyển khoản để thực hiện
                    nạp tiền tự động.</p>
                <p class="mt-5 mb-0 wallet-notice"><span class="me-1 theme-color">
                        <i class="icofont-bulb-alt"></i></span>- Tiền sẽ vào tài khoảng trong vòng 1-10 phút kể từ khi giao
                    dịch thành công. Tuy nhiên đôi lúc do
                    một
                    vài lỗi khách quan, tiền có thể sẽ vào chậm hơn một chút.</p>
                <p class="mt-5 mb-0 wallet-notice"><span class="me-1 theme-color">
                        <i class="icofont-bulb-alt"></i></span>- Vietcombank trong khoảng 23-3h không thể kiểm tra lịch sử
                    giao dịch, các giao dịch trong khung giờ
                    này có thể mất từ 15 phút đến 2 giờ tiền mới vào tài khoản. Bạn có thể tránh nạp tiền trong khung
                    giờ này để đỡ mất thời gian chờ đợi nhé.</p>
                <p class="mt-5 mb-0 wallet-notice"><span class="me-1 theme-color">
                        <i class="icofont-bulb-alt"></i></span>- Nếu quá lâu không thấy cập nhật số dư, Vui lòng liên hệ hỗ
                    trợ viên: <a href="signup.html">Tại đây.</a></p>

            </div>
        </div>
    </section>
    <!-- ==========wallet Section ends Here========== -->

    <style>
        .copy-alert {
            display: none;
            /* Ẩn thông báo ban đầu */
            position: fixed;
            bottom: 20px;
            /* Vị trí thông báo từ dưới lên */
            right: 20px;
            /* Vị trí thông báo từ phải qua */
            background-color: #4CAF50;
            /* Màu nền */
            color: white;
            /* Màu chữ */
            padding: 10px 20px;
            /* Khoảng cách bên trong */
            border-radius: 5px;
            /* Góc bo tròn */
            font-size: 14px;
            /* Kích thước chữ */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            /* Hiệu ứng đổ bóng */
            z-index: 9999;
            /* Luôn hiển thị trên cùng */
            animation: fadeout 2s ease-in-out forwards;
            /* Hiệu ứng biến mất */
        }

        /* Hiệu ứng mờ dần */
        @keyframes fadeout {
            0% {
                opacity: 1;
            }

            80% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }
    </style>

    <script>
        function copyText(text) {
            // Tạo một textarea ẩn để chứa nội dung cần sao chép
            const tempTextarea = document.createElement("textarea");
            tempTextarea.value = text;
            document.body.appendChild(tempTextarea);

            // Chọn nội dung trong textarea
            tempTextarea.select();
            tempTextarea.setSelectionRange(0, 99999); // Dành cho thiết bị di động

            // Thực hiện sao chép
            try {
                document.execCommand("copy");

                // Hiển thị thông báo đẹp
                const alertBox = document.getElementById("copy-alert");
                alertBox.style.display = "block";

                // Ẩn thông báo sau 2 giây
                setTimeout(() => {
                    alertBox.style.display = "none";
                }, 2000);
            } catch (err) {
                console.error("Sao chép thất bại: ", err);
            }

            // Xóa textarea ẩn
            document.body.removeChild(tempTextarea);
        }
    </script>
@endsection
