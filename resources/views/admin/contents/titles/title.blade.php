@extends('admin.layouts.main')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">Tiêu Đề Trang Chủ</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Approx</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item"><a href="#">Tiêu Đề Trang Chủ</a>
                                </li><!--end nav-item-->
                            </ol>
                        </div>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div><!--end row-->
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Tiêu Đề Trang Chủ</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            <form action="{{ route('admin.titles.updateTitle') }}" method="post">
                                @csrf
                                @foreach ($title as $item)
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Tiêu Đề Trang Chủ</span>
                                        <input type="text" class="form-control" value="{{ $item->title }}"
                                            aria-label="content" aria-describedby="basic-addon1" name="title"
                                            id="title" placeholder="Nhập Tiêu Đề">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Nội Dung</span>
                                        <textarea name="content" id="content" class="form-control" cols="30" rows="10" placeholder="Nhập Nội Dung">{{ $item->content }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                                @endforeach
                            </form>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->
            </div><!--end row-->
        </div><!-- container -->

        <script>
            function confirmSubmit() {
                Swal.fire({
                    title: "Bạn có chắc chắn?",
                    text: "Bạn sẽ không thể hoàn tác sau khi thực hiện hành động này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Hủy",
                    confirmButtonText: "Có, cập nhật!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Hiển thị thông báo thành công và submit form
                        Swal.fire({
                            title: "Thành công!",
                            text: "Trạng thái đã được cập nhật.",
                            icon: "success",
                            timer: 2500,
                            showConfirmButton: false
                        }).then(() => {
                            document.getElementById('statusForm')
                                .submit(); // Gửi form sau khi người dùng xác nhận
                        });
                    }
                });
            }
        </script>
    @endsection
