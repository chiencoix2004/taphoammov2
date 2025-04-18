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
</head>
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

<body class="tyn-body">
    <div class="tyn-root">
        {{-- nav --}}
        @include('client.contents.messenger.nav')

        <div class="tyn-content tyn-content-full-height tyn-chat has-aside-base">
            {{-- sibar --}}

            @include('client.contents.messenger.mobileChat.sibar')
            <div class="tyn-main tyn-chat-content aside-collapsed main-shown" id="tynMain">
                <div class="tyn-chat-head">
                    <ul class="tyn-list-inline d-md-none ms-n1">
                        <li><a class="btn btn-icon btn-md btn-pill btn-transparent js-toggle-main"
                                href="{{ route('messenger') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                                </svg><!-- arrow-left -->
                            </a></li>
                    </ul>
                    <div class="tyn-media-group">
                        <div class="tyn-media tyn-size-lg d-none d-sm-inline-flex">
                            @if ($receiver->image == null)
                                <img width="50px" height="50px"
                                    src="{{ asset('assetsClient/images/profile/Profile.jpg') }}" alt="DP">
                            @else
                                <img width="50px" height="50px" src="{{ asset($receiver->image) }}" alt="DP">
                            @endif
                        </div><!-- .tyn-media -->
                        <div class="tyn-media tyn-size-rg d-sm-none">
                            @if ($receiver->image == null)
                                <img width="50px" height="50px"
                                    src="{{ asset('assetsClient/images/profile/Profile.jpg') }}" alt="DP">
                            @else
                                <img width="50px" height="50px" src="{{ asset($receiver->image) }}" alt="DP">
                            @endif
                        </div><!-- .tyn-media -->
                        <div class="tyn-media-col">
                            <div class="tyn-media-row">
                                <h6 class="name">{{ $receiver->username }} <span
                                        class="d-none d-sm-inline-block"></span></h6>
                            </div>
                            <div class="tyn-media-row has-dot-sap">
                                <span class="meta">Active</span>
                            </div>
                        </div><!-- .tyn-media-col -->
                    </div><!-- .tyn-media-group -->
                    <ul class="tyn-list-inline gap gap-3 ms-auto">
                        <li><button class="btn btn-icon btn-light" data-bs-toggle="modal"
                                data-bs-target="#callingScreen">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                </svg><!-- telephone-fill -->
                            </button></li>
                        <li><button class="btn btn-icon btn-light" data-bs-toggle="modal"
                                data-bs-target="#videoCallingScreen">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-camera-video-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2z" />
                                </svg><!-- camera-video-fill -->
                            </button></li>
                        <li class="d-none d-sm-block"><button class="btn btn-icon btn-light js-toggle-chat-search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg><!-- search -->
                            </button></li>
                        <li><button class="btn btn-icon btn-light js-toggle-chat-options">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-layout-sidebar-inset-reverse" viewBox="0 0 16 16">
                                    <path
                                        d="M2 2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zm12-1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2z" />
                                    <path d="M13 4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1z" />
                                </svg><!-- layout-sidebar-inset-reverse -->
                            </button></li>
                    </ul><!-- .tyn-list-inline -->
                    <div class="tyn-chat-search" id="tynChatSearch">
                        <div class="flex-grow-1">
                            <div class="form-group">
                                <div class="form-control-wrap form-control-plaintext-wrap">
                                    <div class="form-control-icon start">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                        </svg><!-- search -->
                                    </div>
                                    <input type="text" class="form-control form-control-plaintext"
                                        id="searchInThisChat" placeholder="Search in this chat">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap gap-3">
                            <ul class="tyn-list-inline ">
                                <li><button class="btn btn-icon btn-sm btn-transparent">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z" />
                                        </svg><!-- chevron-up -->
                                    </button></li>
                                <li><button class="btn btn-icon btn-sm btn-transparent">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                                        </svg><!-- chevron-down -->
                                    </button></li>
                            </ul>
                            <ul class="tyn-list-inline ">
                                <li><button class="btn btn-icon btn-md btn-light js-toggle-chat-search">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path
                                                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                                        </svg><!-- x-lg -->
                                    </button></li>
                            </ul>
                        </div>
                    </div><!-- .tyn-chat-search -->
                </div><!-- .tyn-chat-head -->
                <div class="tyn-chat-body js-scroll-to-end" id="tynChatBody">
                    <div class="tyn-reply" id="tynReply">
                        @foreach ($messages as $message)
                            @if ($message->sender_id === Auth::id())
                                <div class="tyn-reply-item outgoing">
                                    <div class="tyn-reply-group">
                                        <div class="tyn-reply-bubble">
                                            @if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $message->message))
                                                {{-- <img src="{{ asset($message->message) }}" alt="Image" style="max-width: 200px; border-radius: 8px;"> --}}
                                                <img src="{{ asset($message->message) }}" alt="Image"
                                                    style="max-width: 200px; border-radius: 8px; cursor: pointer;"
                                                    onclick="showImageModal('{{ asset($message->message) }}')">
                                            @else
                                                <div class="tyn-reply-text">{{ $message->message }}</div>
                                            @endif
                                        </div>
                                        <div class="tyn-reply-time" style="font-size: 10px">
                                            {{ $message->created_at->format('H:i - d/m') }}</div>
                                        <!-- Hiển thị thời gian -->
                                    </div>
                                </div>
                            @else
                                <div class="tyn-reply-item incoming">
                                    <div class="tyn-reply-avatar">
                                        <div class="tyn-media tyn-size-md tyn-circle">
                                            @if ($message->sender->image == null)
                                                <img width="50px" height="50px"
                                                    src="{{ asset('assetsClient/images/profile/Profile.jpg') }}"
                                                    alt="DP">
                                            @else
                                                <img src="{{ asset($message->sender->image) }}" alt="">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="tyn-reply-group">
                                        <div class="tyn-reply-bubble">
                                            @if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $message->message))
                                                {{-- <img src="{{ asset($message->message) }}" alt="Image" style="max-width: 200px; border-radius: 8px;"> --}}
                                                <img src="{{ asset($message->message) }}" alt="Image"
                                                    style="max-width: 200px; border-radius: 8px; cursor: pointer;"
                                                    onclick="showImageModal('{{ asset($message->message) }}')">
                                            @else
                                                <div class="tyn-reply-text">{{ $message->message }}</div>
                                            @endif
                                        </div>
                                        <div class="tyn-reply-time" style="font-size: 10px">
                                            {{ $message->created_at->format('H:i - d/m') }}</div>
                                        <!-- Hiển thị thời gian -->
                                    </div>

                                </div>
                            @endif
                        @endforeach

                    </div><!-- .tyn-reply -->
                </div><!-- .tyn-chat-body -->
                <div class="tyn-chat-form">
                    <div class="tyn-chat-form-insert">
                        <ul class="tyn-list-inline gap gap-3">
                            <li class="dropup">
                                <button class="btn btn-icon btn-light btn-md btn-pill" data-bs-toggle="dropdown"
                                    data-bs-offset="0,10">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                    </svg><!-- plus-lg -->
                                </button>
                                {{-- <div class="dropdown-menu">
                                    <ul class="tyn-list-links">
                                        <li><a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-person-video2" viewBox="0 0 16 16">
                                                    <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                                    <path
                                                        d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zM1 3a1 1 0 0 1 1-1h2v2H1zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3zm-4-2h3v2H2a1 1 0 0 1-1-1zm3-1H1V8h3zm0-3H1V5h3z" />
                                                </svg><!-- person-video2 -->
                                                <span>New Group</span></a></li>
                                        <li><a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-mic" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5" />
                                                    <path
                                                        d="M10 8a2 2 0 1 1-4 0V3a2 2 0 1 1 4 0zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3" />
                                                </svg><!-- mic -->
                                                <span>Voice Clip</span></a></li>
                                    </ul>
                                </div> --}}
                            </li><!-- li -->
                            <li class="d-none d-sm-block"><button class="btn btn-icon btn-light btn-md btn-pill">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        <path
                                            d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z" />
                                    </svg><!-- card-image -->
                                </button></li><!-- li -->
                            <li class="d-none d-sm-block"><button class="btn btn-icon btn-light btn-md btn-pill">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-emoji-smile-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5M4.285 9.567a.5.5 0 0 1 .683.183A3.5 3.5 0 0 0 8 11.5a3.5 3.5 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8" />
                                    </svg><!-- emoji-smile-fill -->
                                </button></li><!-- li -->
                        </ul>
                        <form id="chatForm" action="{{ route('send-message') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $receiver->id }}">
                            <!-- Thay $user->id bằng giá trị người nhận -->
                            <input type="hidden" id="messageInputHidden" name="message">
                            <!-- Input ẩn để truyền dữ liệu từ div -->

                    </div><!-- .tyn-chat-form-insert -->
                    <div class="tyn-chat-form-enter">
                        <div class="tyn-chat-form-input" id="tynChatInput" contenteditable></div>
                        <ul class="tyn-list-inline me-n2 my-1">
                             
                            <li>
                                <button class="btn btn-icon btn-light btn-md btn-pill" data-toggle="modal"
                                    data-target="#uploadModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-card-image" viewBox="0 0 16 16">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        <path
                                            d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z" />
                                    </svg><!-- card-image -->
                                </button>
                            </li><!-- li -->
                            <li><button type="submit" class="btn btn-icon btn-white btn-md btn-pill"
                                    id="tynChatSend">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z" />
                                    </svg><!-- send-fill -->
                                </button></li>
                            </form>

                        </ul>
                    </div><!-- .tyn-chat-form-enter -->
                </div><!-- .tyn-chat-form -->
            </div><!-- .tyn-main -->
        </div>
        <div id="uploadModal" class="modal fade" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <input type="hidden" id="user_id" value="{{ $receiver->id }}"> <!-- 123 là ID người nhận -->

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Chọn ảnh tải lên</h4>
                    </div>
                    <div class="modal-body">
                        <!-- Form -->
                        <form method="post" action="" enctype="multipart/form-data">
                            Chọn ảnh : <input type="file" name="file" id="file" accept="image/*"
                                class="form-control"><br>
                            <p class="text-danger" id="error_upload"></p>
                            <input type="button" class="btn btn-info" onclick="uploadImg();" value="Upload"
                                id="btn_upload">

                        </form>
                        <br>
                        <!-- Preview-->
                        <div style="display:none;" id="preview">
                            <img src="" id="img" width="100%"><br><br>
                            <button type="button" onclick="sendImg();" data-dismiss="modal"
                                class="btn btn-info">Gửi</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- Modal để phóng to ảnh -->
        <div id="imageModal" class="modal fade" tabindex="-1" aria-labelledby="imageModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <img id="modalImage" src="" alt="Full Image" style="width: 100%; height: auto;">
                    </div>
                </div>
            </div>
        </div>

    </div><!-- .tyn-root -->
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="{{ asset('assetsMessenger/js/bundle0ae1.js?v1310') }} "></script>
{{-- <script src="{{ asset('assetsMessenger/js/app0ae1.js?v1310') }} "></script> --}}


</html>
