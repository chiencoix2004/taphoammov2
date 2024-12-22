@extends('admin.layouts.main')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">Danh Mục</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Approx</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item"><a href="#">Tables</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item active">Basic</li>
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
                                    <h4 class="card-title">Danh sách danh mục</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table  mb-0 table-centered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Tên Danh Mục</th>
                                            <th> Mục Con</th>
                                            <th>Vai Trò</th>
                                            <th>Trạng Thái</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $item)
                                            <tr>
                                                <td><img src="{{ asset('assets3/images/logos/lang-logo/chatgpt.png') }}"
                                                        alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                    {{ $item->name }}
                                                </td>
                                                <td>{{ $item->children_count }}</td>
                                                <td>Lớp Cha</td>
                                                @if ($item->status == 1)
                                                    <td><span class="badge bg-success">Hoạt Động</span></td>
                                                @else
                                                    <td><span class="badge bg-danger">Tắt</span></td>
                                                @endif

                                                <td class="text-end">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                            data-bs-toggle="dropdown" href="#" role="button"
                                                            aria-haspopup="false" aria-expanded="false">
                                                            <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="dLabel11">
                                                            {{-- <a class="dropdown-item" href="#">Creat Project</a> --}}
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.categories.detailCategory', ['slug' => $item->slug]) }}">Chi
                                                                Tiết</a>
                                                            {{-- <a class="dropdown-item" href="#">Sửa Danh Mục</a> --}}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table><!--end /table-->
                            </div><!--end /tableresponsive-->
                        </div><!--end card-body-->

                    </div><!--end card-->

                    {{ $categories->links('pagination::bootstrap-4') }}
                </div> <!--end col-->
                <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Thêm Danh Mục</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <form id="statusForm" action="{{ route('admin.categories.addCategory') }}" method="POST">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Tên Danh Mục</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Nhập Tên Danh Mục">
                                    </div>
                                </div>
                                @if ($errors->any())
                                        <div id="alert-message" class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('message'))
                                    <div id="alert-message" class="alert alert-primary" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-sm-10 ms-auto">
                                        <button type="button" class="btn btn-primary" onclick="confirmSubmit()">Lưu</button>
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>

                            </form>

                        </div>

                        <!--end card-body-->
                    </div><!--end card-->
                </div>
            </div><!--end row-->
            <hr>
            <!--end row-->
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
                    cancelButtonText:"Hủy",
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
