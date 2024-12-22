@extends('admin.layouts.main')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">Gian Hàng</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Approx</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item active">Gian Hàng</li>
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
                                    <h4 class="card-title">Danh Sách Gian Hàng</h4>
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
                                            <th>Tên Gian Hàng</th>
                                            <th>Tên Người Dùng</th>
                                            <th>Phân Loại</th>
                                            {{-- <th>Mặt Hàng</th> --}}
                                            <th>Chiết Khấu Sàn</th>
                                            <th>Trạng Thái</th>
                                            {{-- <th>Điện Thoại</th>
                                            <th>Trạng Thái</th>
                                            <th>Vai Trò</th> --}}
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($shops as $item)
                                            <tr>
                                                <td class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        @if ($item->image == null)
                                                            <img src="{{ asset('assets3/images/users/avatar-1.jpg') }}"
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
                                                <td>{{ $item->category->name }}</td>
                                                {{-- <td>{{ $item->category->name }}</td> --}}
                                                <td>{{ $item->discount }}%</td>
                                                
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
                                                {{-- <td>
                                                @if ($item->role == 2)
                                                    Nhân Viên
                                                @elseif($item->role == 3)
                                                    <span class="badge bg-success">Admin</span>
                                                @elseif($item->role == 1)
                                                    Khách Hàng
                                                @endif
                                            </td> --}}

                                           
                                                <td class="text-end">
                                                    <a
                                                        href=" {{ route('admin.shops.detailShop', ['slug' => $item->slug,'status' => $item->status]) }}"><i
                                                            class="las la-info-circle text-secondary fs-18 "></i></a>
                                                    &nbsp
                                                    &nbsp

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                    {{ $shops->links('pagination::bootstrap-4') }}
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container -->


        {{-- <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
            <form action="{{ route('admin.users.addUser') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUserLabel">Thêm Tài Khoản</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-2">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user text-muted thumb-xl rounded me-2 border-dashed"
                                        id="avatar-preview"></i>
                                    <div class="flex-grow-1 text-truncate">
                                        <label class="btn btn-primary text-light">
                                            Thêm Ảnh <input type="file" id="image" name="image" hidden
                                                accept="image/*">
                                        </label>
                                    </div><!--end media body-->
                                </div>
                            </div>
                            <div class=" mb-2">
                                <label for="fullName">Họ Tên</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="fullName"><i class="far fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Họ Tên" aria-label="FullName"
                                        id="fullname" name="fullname">
                                </div>
                            </div>
                            <div class=" mb-2">
                                <label for="username">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="username">@</span>
                                    <input type="text" class="form-control" placeholder="Username"
                                        aria-label="username" id="username" name="username">
                                </div>
                            </div>
                            <div class=" mb-2">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="email"><i class="far fa-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="Email" aria-label="email"
                                        id="email" name="email">
                                </div>
                            </div>
                            <div class=" mb-2">
                                <label for="password">Mật Khẩu</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="password"><i class="fa-solid fa-key"></i></span>
                                    <input type="password" class="form-control" placeholder="Mật Khẩu"
                                        aria-label="password" id="password" name="password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="ragisterDate">Vai Trò</label>
                                        <div class="input-group">
                                            <select class="form-control" name="role" id="role">
                                                <option value="" selected>Chọn Vai Trò</option>
                                                <option value="1">Khách Hàng</option>
                                                <option value="2">Nhân Viên</option>
                                                <option value="3">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="mobilleNo">Trạng Thái</label>
                                        <div class="input-group">
                                            <select class="form-control" name="status" id="status">
                                                <option value="" selected>Chọn Trạng Thái</option>
                                                <option value="active">Hoạt Động</option>
                                                <option value="inactive">Tạm Khóa</option>
                                                <option value="banned">Bị Cấm</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary w-100">Lưu</button>
                        </div>
                    </div>
                </div>
            </form>
        </div> --}}

        {{-- <script>
            document.getElementById('image').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('avatar-preview').style.backgroundImage = `url(${e.target.result})`;
                        document.getElementById('avatar-preview').style.backgroundSize = 'cover';
                        document.getElementById('avatar-preview').style.backgroundPosition = 'center';
                        document.getElementById('avatar-preview').classList.remove('fa-user', 'text-muted');
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script> --}}
    @endsection
