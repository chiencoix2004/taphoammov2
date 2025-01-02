<!DOCTYPE html>
<html lang="en" class="no-js">


<!-- Mirrored from demos.codexcoder.com/labartisan/html/nft/enftomark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Dec 2024 06:46:12 GMT -->

<head>
    <meta charset="utf-8">

    <meta name="author" content="codexcoder">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Meta tags for Social Media(Better SEO) -->
    <!-- <meta property="og:title" content=""> -->
    <!-- <meta property="og:type" content=""> -->
    <!-- <meta property="og:url" content=""> -->
    <!-- <meta property="og:image" content=""> -->

    <!-- site favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assetsClient/images/favicon.png') }}?v=1.0.0">

    <!-- ====== All css file ========= -->
    <link rel="stylesheet" href="{{ asset('assetsClient/css/bootstrap.min.css') }}?v=1.0.0">
    <link rel="stylesheet" href="{{ asset('assetsClient/css/icofont.min.css') }}?v=1.0.0">
    <link rel="stylesheet" href="{{ asset('assetsClient/css/lightcase.css') }}?v=1.0.0">
    <link rel="stylesheet" href="{{ asset('assetsClient/css/animate.css') }}?v=1.0.0">
    <link rel="stylesheet" href="{{ asset('assetsClient/css/swiper-bundle.min.css') }}?v=1.0.0">
    <link rel="stylesheet" href="{{ asset('assetsClient/css/style.min.css') }}?v=1.0.0">


    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">

 

    <!-- site title -->
    <title>Enftomark</title>
    <style>
        /* Scoped cho phần sản phẩm nổi bật */
        .widget-instagram .widget-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            /* Khoảng cách giữa các sản phẩm */
            justify-content: center;
            padding: 10px;
        }

        .widget-instagram .widget-wrapper div,
        .widget-instagram .widget-wrapper li {
            background-color: #2C3051;
            /* Nền xanh đậm */
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .widget-instagram .widget-wrapper div:hover,
        .widget-instagram .widget-wrapper li:hover {
            transform: translateY(-5px);
            /* Hiệu ứng nổi lên khi hover */
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.3);
        }

        .widget-instagram .widget-wrapper img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .widget-instagram .widget-wrapper h5 {
            font-size: 14px;
            color: #F9A826;
            /* Màu cam */
            margin-bottom: 5px;
        }

        .widget-instagram .widget-wrapper p {
            font-size: 12px;
            color: #E0E0E0;
            /* Màu chữ nhẹ */
            margin: 0;
        }

        .widget-instagram .product-box h5 {
            font-size: 16px;
            color: #F9A826;
            /* Màu cam */
            margin-bottom: 8px;
            line-height: 1.4;
            word-wrap: break-word;
            /* Tự xuống dòng nếu tên dài */
        }


        /* Responsive chỉnh cho bản mobile */
        @media (max-width: 768px) {
            .widget-instagram .product-box {
                width: 90%;
                /* Tăng độ rộng box để cân đối */
                max-width: none;
                /* Gỡ giới hạn chiều rộng */
                margin: 0 auto;
                /* Căn giữa box */
                padding: 12px;
                /* Giảm padding trong box */
            }

            .widget-instagram .product-box img {
                border-radius: 6px;
            }

            .widget-instagram .product-box h5 {
                font-size: 14px;
                /* Giảm kích thước tên sản phẩm */
                line-height: 1.3;
                /* Giảm khoảng cách dòng */
            }

            .widget-instagram .product-box p {
                font-size: 12px;
                /* Giảm kích thước chữ giá và lượt mua */
                margin: 2px 0;
            }

            .widget-instagram .widget-wrapper {
                gap: 12px;
                /* Giảm khoảng cách giữa các box sản phẩm */
            }
        }

        /* Tùy chỉnh input form */
        .follow-wrapper .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .follow-wrapper .form-control {
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 10px;
            font-size: 14px;
        }

        .follow-wrapper .form-control:focus {
            border-color: #007BFF;
            /* Màu xanh nhạt khi focus */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }

        .follow-wrapper button {
            padding: 8px 20px;
            border-radius: 6px;
        }

        
    </style>
</head>

<body class="home-4">
    <!-- preloader start here -->
    {{-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> --}}
    <!-- preloader ending here -->



    <!-- ===============// header section start here \\================= -->
    @include('client.layouts.header')
    <!-- ===============//header section end here \\================= -->

    {{-- main --}}
    @yield('content')
    {{-- end main --}}

    <!-- ===============//footer section start here \\================= -->
    @include('client.layouts.footer')
    <!-- ===============//footer section end here \\================= -->



    <!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="icofont-stylish-up"></i></a>
    <!-- scrollToTop ending here -->
 
    

    <!-- All Scripts -->
    <script src="{{ asset('assetsClient/js/jquery-3.6.0.min.js') }}?v=1.0.0"></script>
    <script src="{{ asset('assetsClient/js/bootstrap.bundle.min.js') }}?v=1.0.0"></script>
    <script src="{{ asset('assetsClient/js/waypoints.min.js') }}?v=1.0.0"></script>
    <script src="{{ asset('assetsClient/js/lightcase.js') }}?v=1.0.0"></script>
    <script src="{{ asset('assetsClient/js/swiper-bundle.min.js') }}?v=1.0.0"></script>
    <script src="{{ asset('assetsClient/js/countdown.min.js') }}?v=1.0.0"></script>
    <script src="{{ asset('assetsClient/js/jquery.counterup.min.js') }}?v=1.0.0"></script>
    <script src="{{ asset('assetsClient/js/wow.min.js') }}?v=1.0.0"></script>
    <script src="{{ asset('assetsClient/js/isotope.pkgd.min.js') }}?v=1.0.0"></script>
    <script src="{{ asset('assetsClient/js/functions.js') }}?v=1.0.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Load Quill.js và CSS -->

    <script src="https://cdn.quilljs.com/1.3.7/quill.js"></script>

    <!-- Load Image Resize Module -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/quill-image-resize-module/3.0.0/image-resize.min.js"></script> --}}

    <script src="https://unpkg.com/quill-image-resize-module@3.0.0/image-resize.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>


    <!-- Kích hoạt Quill -->
    <script>
        // Quill Editor
        var quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Nhập nội dung bài viết...',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, false]
                    }],
                    [{
                        'size': ['small', false, 'large', 'huge']
                    }],
                    ['bold', 'italic', 'underline'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    ['blockquote'],
                    ['link', 'image', 'clean']
                ]
            }
        });

        // Gán nội dung vào input hidden khi submit form
        // function submitForm() {
        //     const contentInput = document.getElementById('content');
        //     contentInput.value = quill.root.innerHTML; // Lấy nội dung HTML từ Quill
        //     return true; // Cho phép form submit
        // } 
    </script>
 
</body>


<!-- Mirrored from demos.codexcoder.com/labartisan/html/nft/enftomark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Dec 2024 06:46:45 GMT -->

</html>
