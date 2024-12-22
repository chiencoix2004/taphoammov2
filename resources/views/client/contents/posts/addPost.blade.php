@extends('client.layouts.main')
@section('content')
    <!-- ==========Page Header Section Start Here========== -->
    <section class="page-header-section style-1">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-inner">
                    <div class="page-title">
                        <h2>Tạo Bài Viết</h2>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Tạo Bài Viết</li>
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
                            <div id="respond" class="comment-respond">
                                <div class="add-comment">
                                    <div class="widget-title">
                                        <h3>Tạo Bài Viết</h3>
                                    </div>

                                    <form action="{{ route('updatePost') }}" method="POST" class="comment-form"
                                        id="uploadForm" enctype="multipart/form-data" onsubmit="return submitForm();">

                                        @csrf
                                        <div class="row w-100 g-3">
                                            <div class="col-12 mt-3">
                                                <label>Ảnh Bài Viết</label>
                                                <div style="width: 70%; text-align: center; border: 1px solid red">
                                                    <img id="previewImage" src="#" alt="Ảnh xem trước"
                                                        style="max-width: 100%; height: auto; display: none; border: 1px solid #ccc; border-radius: 6px;">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-floating">
                                                    <select name="category"
                                                        class="form-select w-100 comment-input form-control"
                                                        id="authorName">
                                                        <option value="" selected>Lựa chọn danh mục</option>
                                                        <option value="Youtube">Youtube</option>
                                                        <option value="Facebook">Facebook</option>
                                                        <option value="Zalo">Zalo</option>
                                                        <option value="Telegram">Telegram</option>
                                                        <option value="Tiktok">Tiktok</option>
                                                        <option value="Blockchain">Blockchain</option>
                                                        <option value="Other">Khác</option>
                                                    </select>
                                                    <label for="authorName">Chọn Danh Mục</label>
                                                </div>
                                                @error('category')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6">
                                                <label for="image" class="custom-file-label">Chọn Hình Ảnh</label>
                                                <input type="file" name="image" class="form-control custom-file-input"
                                                    id="image" accept="image/*">
                                                @error('croppedImage')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <div class="form-floating w-100">
                                                    <input type="text" class="w-100 comment-input form-control"
                                                        id="cmntSub" placeholder="Subject" name="title">
                                                    <label for="cmntSub">Tiêu Đề Bài Viết</label>
                                                </div>
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <label for="editor">Nội dung bài viết<span
                                                        style="color: red;">*</span></label>
                                                <div id="editor" style="height: 500px;"></div>
                                                <input type="hidden" name="content" id="content">
                                                <div id="error-message" class="text-danger" style="display: none;">Nội dung
                                                    bài viết không được để trống.</div>
                                                @error('content')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <button type="submit" class="default-btn move-right"><span>Gửi</span></button>
                                            <input type="hidden" name="croppedImage" id="croppedImage">
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                    @include('client.contents.posts.sibarPost')
                </div>
            </div>
        </div>
    </section>
    <script>
        let cropper; // Biến để lưu trữ Cropper instance
        let quill; // Biến Quill Editor

        document.addEventListener('DOMContentLoaded', function() {
            // Khởi tạo Quill Editor
            quill = new Quill('#editor', {
                theme: 'snow',
                placeholder: 'Nhập nội dung bài viết...'
            });

            // Xử lý thay đổi file ảnh
            document.getElementById('image').addEventListener('change', function(event) {
                const file = event.target.files[0]; // Lấy file ảnh được chọn
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const previewImage = document.getElementById('previewImage');
                        previewImage.src = e.target.result; // Gán đường dẫn ảnh vào src
                        previewImage.style.display = 'block'; // Hiển thị ảnh

                        // Khởi tạo Cropper.js
                        if (cropper) {
                            cropper.destroy(); // Hủy instance cũ nếu có
                        }
                        cropper = new Cropper(previewImage, {
                            aspectRatio: 2, // Tỉ lệ khung hình
                            viewMode: 2, // Chế độ hiển thị
                        });
                    };

                    reader.readAsDataURL(file); // Đọc file dưới dạng URL base64
                }
            });
        });

        function submitForm() {
            // Lấy nội dung từ Quill editor và gán vào input ẩn
            const contentInput = document.getElementById('content');
            const editorContent = quill.getText().trim(); // Lấy text thực tế từ Quill Editor

            if (!editorContent) {
                // Hiển thị thông báo lỗi nếu nội dung trống
                document.getElementById('error-message').style.display = 'block';
                return false; // Ngừng submit form nếu nội dung trống
            }
            contentInput.value = quill.root.innerHTML; // Gán nội dung HTML từ Quill vào input ẩn

            // Kiểm tra xem có cropper và ảnh cắt hay không
            if (cropper) {
                const croppedCanvas = cropper.getCroppedCanvas();
                const croppedImage = croppedCanvas.toDataURL('image/jpeg');

                // Gán dữ liệu base64 vào input ẩn để gửi đi
                document.getElementById('croppedImage').value = croppedImage;

                // Cho phép submit form sau khi ảnh cắt được xử lý
                return true;
            } else {
                // Hiển thị thông báo lỗi nếu chưa có ảnh cắt
                alert('Vui lòng chọn và cắt ảnh trước khi gửi.');
                return false; // Ngừng submit form nếu chưa có ảnh cắt
            }
        }
    </script>


    <style>
        /* Ẩn input file mặc định */
        .custom-file-input {
            display: none;
        }

        /* Tùy chỉnh nhãn file */
        .custom-file-label {
            display: inline-block;
            background-color: #040B29;
            /* Màu nền */
            color: white;
            /* Màu chữ */
            padding: 15px;
            width: 100%;
            /* Khoảng cách trong */
            border-radius: 6px;
            /* Bo góc */
            cursor: pointer;
            /* Con trỏ chuột */
            text-align: center;
            border: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
    </style>
@endsection
