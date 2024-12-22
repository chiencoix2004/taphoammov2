@extends('admin.layouts.main')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">Tài Khoản</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Approx</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item active">Tài Khoản</li>
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
                                    <h4 class="card-title">Danh Sách Tài Khoản</h4>
                                </div><!--end col-->

                                <div class="col-auto">


                                    <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                                        <li class="hide-phone app-search">
                                            <form action="{{route('admin.users.searchUser')}}" method="get">
                                                @csrf
                                                <input type="search" name="search" class="form-control top-search mb-0"
                                                    placeholder="Nhập từ khóa...">
                                        </li>
                                        &nbsp &nbsp <button type="submit" class="btn bg-success text-white"><i
                                                class="iconoir-search"></i></button>
                                        </form>
                                    </ul>
                                    &nbsp
                                    <button class="btn bg-primary text-white" data-bs-toggle="modal"
                                        data-bs-target="#addUser"><i class="fas fa-plus me-1"></i>Thêm Tài Khoản</button>
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
                                            <th>Họ Tên</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Điện Thoại</th>
                                            <th>Trạng Thái</th>
                                            <th>Vai Trò</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listUser as $item)
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
                                                            <h6 class="m-0">{{ $item->fullname ?? 'Trống' }}</h6>
                                                            <!-- Kiểm tra nếu người dùng được tạo trong vòng 24 giờ qua -->
                                                            <p class="fs-12 text-muted mb-0">
                                                                @if ($item->created_at->diffInHours(now()) <= 24)
                                                                    <span class="badge bg-success">Mới</span>
                                                                @endif
                                                            </p>
                                                        </div><!--end media body-->
                                                    </div>
                                                </td>
                                                <td>{{ $item->username }}</td>
                                                <td><a href="#"
                                                        class="text-body text-decoration-underline">{{ $item->email }}</a>
                                                </td>
                                                <td>{{ $item->phone ?? 'Trống' }}</td>
                                                <td>
                                                    @if ($item->status === 'active')
                                                        <span class="badge rounded text-success bg-success-subtle">Hoạt
                                                            Động</span>
                                                    @elseif($item->status === 'inactive')
                                                        <span class="badge rounded text-secondary bg-secondary-subtle">Tạm
                                                            Khóa</span>
                                                    @elseif($item->status === 'banned')
                                                        <span class="badge rounded text-danger bg-danger-subtle">Bị
                                                            Cấm</span>
                                                        {{-- <span class="badge rounded text-secondary bg-secondary-subtle">Inactive</span> --}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->role == 2)
                                                        Nhân Viên
                                                    @elseif($item->role == 3)
                                                        <span class="badge bg-success">Admin</span>
                                                    @elseif($item->role == 1)
                                                        Khách Hàng
                                                    @endif
                                                </td>
                                                <td class="text-end">
                                                    {{-- <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a> --}}
                                                    <a 
                                                        href="{{ route('admin.users.detailUser', ['username' => $item->username]) }}"><i
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
                    {{ $listUser->links('pagination::bootstrap-4') }}
                </div> <!-- end col -->
                {{-- {{ $listUser->links('pagination::bootstrap-4') }} --}}
            </div> <!-- end row -->

        </div><!-- container -->


        <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
            <form id="statusForm" action="{{ route('admin.users.addUser') }}" method="post" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" placeholder="Họ Tên"
                                        aria-label="FullName" id="fullname" name="fullname">
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
                                            {{-- <span class="input-group-text" id="ragisterDate"><i class="far fa-calendar"></i></span>
                                    <input type="text" class="form-control" placeholder="00/2024" aria-label="ragisterDate"> --}}
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
                            <button type="button" class="btn btn-primary w-100" onclick="confirmSubmit()">Lưu</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script>
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
        </script>
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
        {{-- <script>
            const inputElement = document.getElementById('avatar-input');
            const previewElement = document.getElementById('avatar-preview');
        
            inputElement.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewElement.style.backgroundImage = `url(${e.target.result})`;
                        previewElement.style.backgroundSize = 'cover';
                        previewElement.style.backgroundPosition = 'center';
                        previewElement.classList.remove('fa-user', 'text-muted');
                    };
                    reader.readAsDataURL(file);
                }
            });
        
            // Reset input khi người dùng muốn chọn lại ảnh
            inputElement.addEventListener('click', function() {
                inputElement.value = ''; // Xóa giá trị input để có thể chọn lại cùng ảnh
            });
        </script> --}}
    @endsection
