@extends('admin.layouts.main')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">Danh Sách Lịch Sử Nạp Tiền</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Approx</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item active">Lịch Sử Nạp Tiền</li>
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
                                    <h4 class="card-title">Danh Sách Lịch Sử Nạp Tiền</h4>
                                </div><!--end col-->

                                {{-- <div class="col-auto">
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
                                <button class="btn bg-primary text-white" data-bs-toggle="modal"
                                    data-bs-target="#addUser"><i class="fas fa-plus me-1"></i>Thêm Tài Khoản</button>
                            </div><!--end col--> --}}
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
                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif


                                <table class="table mb-0" id="datatable_1">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Tên Ngân Hàng</th>
                                            <th>Số Tài Khoản</th>
                                            <th>Số Tiền</th>
                                            <th>Loại</th>
                                            <th>Mã giao dịch</th>
                                            <th>Nội Dung</th>
                                            <th>Trạng Thái</th>
                                            <th class="text-end">Thời Gian</th>
                                            {{-- <th>Vai Trò</th> --}}
                                            {{-- <th class="text-end">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listTransaction as $item)
                                            <tr>
                                                <td class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        @if ($item->bank_name == 970422)
                                                            <img src="{{ asset('assets3/images/logos/mb.jpg') }}"
                                                                class="me-2 thumb-md align-self-center rounded"
                                                                alt="...">
                                                        @elseif($item->bank_name == 970416)
                                                            <img src="{{ asset('assets3/images/logos/logo-acb.jpg') }}"
                                                                alt="" width="40px" height="40px"
                                                                class="me-2 thumb-md align-self-center rounded">
                                                        @endif
                                                        <div class="flex-grow-1 text-truncate">
                                                            @if ($item->bank_name == 970422)
                                                                <h6 class="m-0">MBBank</h6>
                                                            @elseif($item->bank_name == 970416)
                                                                <h6 class="m-0">ACB</h6>
                                                            @endif

                                                            <!-- Kiểm tra nếu người dùng được tạo trong vòng 24 giờ qua -->
                                                            <p class="fs-12 text-muted mb-0">
                                                                @if ($item->created_at->diffInHours(now()) <= 24)
                                                                <span class="badge bg-success">Mới</span>
                                                            @endif
                                                            </p>
                                                        </div><!--end media body-->
                                                    </div>
                                                </td>
                                                <td>{{ $item->account_number }}</td>
                                                <td>{{ number_format($item->amount, 0, ',', '.' )}} đ</td>
                                                <td>{{ $item->currency }}</td>
                                                <td>{{ $item->transaction_id }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td><span class="badge rounded text-success bg-success-subtle">Thành
                                                        Công</span></td>
                                                <td class="text-end">{{ $item->created_at }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                    {{ $listTransaction->links('pagination::bootstrap-4') }}
                    {{-- {{ $listUser->links('pagination::bootstrap-4') }} --}}
                </div> <!-- end col -->
                {{-- {{ $listUser->links('pagination::bootstrap-4') }} --}}
            </div> <!-- end row -->

        </div><!-- container -->


        {{-- <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
            <form id="statusForm" action="{{ route('admin.banks.addBank') }}" method="post">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUserLabel">Thêm Tài Khoản Ngân Hàng</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class=" mb-2">
                                <label for="fullName">Chủ Tài Khoản</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="fullName">TA V**</span>
                                    <input type="text" class="form-control" placeholder="Họ Tên Chủ Tài Khoản"
                                        aria-label="FullName" id="bankers" name="bankers">
                                </div>
                            </div>
                            <div class=" mb-2">
                                <label for="username">Số Tài Khoản</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="username">215xxx</span>
                                    <input type="number" class="form-control" placeholder="Số Tài Khoản"
                                        aria-label="username" id="account_number" name="account_number">
                                </div>
                            </div>
                            <div class=" mb-2">
                                <label for="username">Tên Tài Khoản</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="username">NGUYEN **</span>
                                    <input type="text" class="form-control" placeholder="Tên Đăng Nhập Của Tài Khoản"
                                        aria-label="username" id="account_name" name="account_name">
                                </div>
                            </div>
                            <div class=" mb-2">
                                <label for="username">Mật Khẩu Tài Khoản</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="username">*****</span>
                                    <input type="password" class="form-control" placeholder="Mật Khẩu Tài Khoản"
                                        aria-label="username" id="account_password" name="account_password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="ragisterDate">Ngân Hàng</label>
                                        <div class="input-group">
                                            <select class="form-control" name="bank_name" id="bank_name">
                                                <option value="" selected>Chọn Ngân Hàng</option>
                                                <option value="970422">MBBank</option>
                                                <option value="970416">ACB</option>
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
                                                <option value="1">Hoạt Động</option>
                                                <option value="2">Tạm Khóa</option>
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
        </div> --}}

    @endsection
