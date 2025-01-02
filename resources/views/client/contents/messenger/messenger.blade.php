<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">


<!-- Mirrored from connectme-html.themeyn.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Dec 2024 17:10:29 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Page Title -->
    <title>Messages </title>
    <!-- Page Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assetsMessenger/css/bundle0ae1.css?v1310') }} ">
    <link rel="stylesheet" href="{{ asset('assetsMessenger/css/app0ae1.css?v1310') }} ">

    <link rel="icon" type="image/png" href="{{ asset('assetsClient/images/favicon.png') }} ">
    <style>
        .tyn-reply-text {
            word-wrap: break-word;
            /* Tự động xuống dòng */
            white-space: pre-wrap;
            /* Giữ nguyên khoảng cách và xuống dòng tự nhiên */
            line-height: 1.5;
            /* Khoảng cách giữa các dòng */
            max-width: 300px;
            /* Đặt chiều rộng tối đa để nội dung tự xuống dòng */
            padding: 10px;
        }
    </style>
</head>

<body class="tyn-body">
    <div class="tyn-root">
        {{-- nav --}}
        @include('client.contents.messenger.nav')

        <div class="tyn-content tyn-content-full-height tyn-chat has-aside-base">
            {{-- sibar --}}
            @include('client.contents.messenger.sibar')

            @yield('content')
        </div> 
    </div><!-- .tyn-root -->
</body>

<script> 
    
    function uploadImg() {
        const fileInput = document.getElementById('file');
        const preview = document.getElementById('preview');
        const img = document.getElementById('img');
        const errorContainer = document.getElementById('error_upload');

        if (fileInput.files.length === 0) {
            errorContainer.textContent = 'Vui lòng chọn một ảnh!';
            return;
        }

        const file = fileInput.files[0];

        // Kiểm tra định dạng ảnh
        if (!file.type.startsWith('image/')) {
            errorContainer.textContent = 'Tệp được chọn không phải là ảnh!';
            return;
        }

        const reader = new FileReader();

        reader.onload = function(e) {
            img.src = e.target.result; // Hiển thị ảnh trong preview
            preview.style.display = 'block'; // Hiển thị khu vực preview
            errorContainer.textContent = ''; // Xóa lỗi (nếu có)
        };

        reader.onerror = function() {
            errorContainer.textContent = 'Đã xảy ra lỗi khi đọc tệp!';
        };

        reader.readAsDataURL(file);
    }


    function sendImg() {
        const fileInput = document.getElementById('file'); // Input file
        const errorContainer = document.getElementById('error_upload');
        const userId = document.getElementById('user_id').value; // Lấy ID người nhận

        if (fileInput.files.length === 0) {
            errorContainer.textContent = 'Vui lòng chọn một ảnh!';
            return;
        }

        const file = fileInput.files[0]; // Lấy tệp từ input

        // Tạo FormData để gửi file
        const formData = new FormData();
        formData.append('image', file); // Đính kèm tệp
        formData.append('user_id', userId); // Đính kèm ID người nhận

        // Gửi AJAX request
        fetch('/upload-image', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content'), // CSRF token
                },
                body: formData, // Gửi FormData
            })
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Lỗi khi gửi yêu cầu tới server!');
                }
                return response.json();
            })
            .then((data) => {
                if (data.success) {
                    console.log('Tin nhắn ảnh đã được gửi thành công:', data.image_url);

                    // Cuộn xuống cuối danh sách tin nhắn
                    const messageContainer = document.getElementById('tynChatBody');
                    if (messageContainer) {
                        messageContainer.scrollTop = messageContainer.scrollHeight;
                    }

                    // Load lại trang
                    location.reload();
                } else {
                    errorContainer.textContent = data.error || 'Đã xảy ra lỗi khi gửi ảnh!';
                }
            })
            .catch((error) => {
                console.error('Lỗi khi gửi ảnh:', error);
                errorContainer.textContent = 'Đã xảy ra lỗi khi gửi ảnh!';
            });
    }


    function showImageModal(imageUrl) {
        const modalImage = document.getElementById('modalImage');
        modalImage.src = imageUrl; // Gán đường dẫn ảnh cho modal
        $('#imageModal').modal('show'); // Hiển thị modal
    }




    document.addEventListener("DOMContentLoaded", function() {
        const messageContainer = document.getElementById("tynChatBody");

        // Cuộn xuống cuối danh sách tin nhắn
        if (messageContainer) {
            messageContainer.scrollTop = messageContainer.scrollHeight;
        }
    });


    document.getElementById('chatForm').addEventListener('submit', function(event) {
        const chatInput = document.getElementById('tynChatInput');
        const hiddenInput = document.getElementById('messageInputHidden');

        // Lấy nội dung từ div và gán vào input ẩn
        hiddenInput.value = chatInput.innerText.trim();

        // Kiểm tra nếu tin nhắn rỗng thì ngăn form gửi
        if (hiddenInput.value === '') {
            event.preventDefault();
        }
    });
</script> 
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="{{ asset('assetsMessenger/js/bundle0ae1.js?v1310') }} "></script>
{{-- <script src="{{ asset('assetsMessenger/js/app0ae1.js?v1310') }} "></script> --}}


</html>
