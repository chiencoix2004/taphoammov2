@extends('admin.layouts.main')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">Bài Viết</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Approx</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item active">Bài Viết Đã Duyệt</li>
                            </ol>
                        </div>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Danh Sách Bài Viết Đã Duyệt</h4>
                                </div><!--end col--> 

                                <div class="col-auto">


                                    <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                                        <li class="hide-phone app-search">
                                            <form action="{{ route('admin.users.searchUser') }}" method="get">
                                                @csrf
                                                <input type="search" name="search" class="form-control top-search mb-0"
                                                    placeholder="Nhập từ khóa...">
                                        </li>
                                        &nbsp &nbsp <button type="submit" class="btn bg-success text-white"><i
                                                class="iconoir-search"></i></button>
                                        </form>
                                    </ul>
                                    &nbsp
                                    {{-- <button class="btn bg-primary text-white" data-bs-toggle="modal"
                                        data-bs-target="#addUser"><i class="fas fa-plus me-1"></i>Thêm Tài Khoản</button> --}}
                                </div><!--end col-->
                                {{-- <div class="col-auto">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-secondary" type="button" id="button-addon2">Go!</button>
                                </div>
                            </div> --}}

                            </div><!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
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


                                <table class="table mb-0" id="datatable_1">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Tiêu Đề</th>
                                            <th>Tên Tác Giả</th>
                                            <th>Phân Loại</th>
                                            {{-- <th>Mặt Hàng</th> --}}
                                            {{-- <th>Chiết Khấu Sàn</th> --}}
                                            <th>Trạng Thái</th>
                                            {{-- <th>Điện Thoại</th>
                                            <th>Trạng Thái</th>
                                            <th>Vai Trò</th> --}}
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($post as $item)
                                            <tr>
                                                <td class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        @if ($item->image == null)
                                                            <img src="{{ asset('assets3/images/flags/vietnam.jpg') }}"
                                                                class="me-2 thumb-md align-self-center rounded"
                                                                alt="...">
                                                        @else
                                                            <img src="{{ asset($item->image) }}" alt=""
                                                                width="40px" height="40px"
                                                                class="me-2 thumb-md align-self-center rounded">
                                                        @endif

                                                        <div class="flex-grow-1 text-truncate">
                                                            <h6 class="m-0">{{ $item->title ?? 'Trống' }}</h6>
                                                            <!-- Kiểm tra nếu người dùng được tạo trong vòng 24 giờ qua -->
                                                            <p class="fs-12 text-muted mb-0">
                                                                @if ($item->created_at->diffInHours(now()) <= 24)
                                                                    <span class="badge bg-success">Mới</span>
                                                                @endif
                                                            </p>
                                                        </div><!--end media body-->
                                                    </div>
                                                </td>
                                                <td>{{ $item->user->username }}</td>
                                                <td>{{ $item->category }}</td>
                                                {{-- <td>{{ $item->category->name }}</td> --}}
                                                {{-- <td>{{ $item->discount }}%</td> --}}

                                                {{-- <td><a href="#"
                                                    class="text-body text-decoration-underline">{{ $item->email }}</a>
                                            </td> --}}
                                                <td>
                                                    @if ($item->status === '1')
                                                        <span class="badge rounded text-warning bg-warning-subtle">Chưa
                                                            Duyệt</span>
                                                    @elseif($item->status === '2')
                                                        <span class="badge rounded text-success bg-success-subtle">Đã
                                                            Duyệt</span>
                                                    @endif
                                                </td>
                                                <td class="text-end">
                                                    <a
                                                        href=" {{ route('admin.posts.detailPost', ['slug' => $item->slug, 'status' => $item->status]) }}"><i
                                                            class="las la-info-circle text-secondary fs-18 "></i></a>

                                                    <form action="{{ route('admin.posts.delete2', $item->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-link p-0 m-0"
                                                            onclick="confirmDelete(this)">
                                                            <i class="las la-trash text-secondary fs-18"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                    {{ $post->links('pagination::bootstrap-4') }}
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container -->
        <script>
            function confirmDelete(button) {
                if (confirm('Bạn có chắc chắn muốn xóa bài viết này?')) {
                    button.closest('form').submit();
                }
            }
        </script>

    @endsection
