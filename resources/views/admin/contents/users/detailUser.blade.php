@extends('admin.layouts.main')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">Chi Tiết</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Approx</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item"><a href="#">Forms</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item active">Elements</li>
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
                                    <h4 class="card-title">Chi Tiết Tài Khoản</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                                <input type="text" class="form-control" value="{{ $detailUser->fullname }}"
                                    aria-label="Username" aria-describedby="basic-addon1" disabled>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" class="form-control" value="{{ $detailUser->username }}"
                                    aria-label="Username" aria-describedby="basic-addon1" disabled>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                                <input type="text" class="form-control" value="{{ $detailUser->email }}"
                                    aria-label="Username" aria-describedby="basic-addon1" disabled>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                                <input type="text" class="form-control" value="{{ $detailUser->phone ?? "Trống" }}"
                                    aria-label="Username" aria-describedby="basic-addon1" disabled>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Trạng Thái</span>
                                @if ($detailUser->status === 'active')
                                    <input type="text" class="form-control" value="Hoạt Động" aria-label="Username"
                                        aria-describedby="basic-addon1" disabled>
                                @elseif($detailUser->status === 'inactive')
                                    <input type="text" class="form-control" value="Tạm Khóa" aria-label="Username"
                                        aria-describedby="basic-addon1" disabled>
                                @elseif($detailUser->status === 'banned')
                                    <input type="text" class="form-control" value="Bị Cấm" aria-label="Username"
                                        aria-describedby="basic-addon1" disabled>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Zalo &nbsp <i
                                        class="fa-solid fa-link"></i></span>
                                @if ($detailUser->zalo == null)
                                    <input type="text" class="form-control" value="Trống" aria-label="Username"
                                        aria-describedby="basic-addon1" disabled>
                                @else
                                    <input type="text" class="form-control" value="{{ $detailUser->zalo }}"
                                        aria-label="Username" aria-describedby="basic-addon1" disabled>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fa-brands fa-facebook"></i></span>
                                <input type="text" class="form-control" value="{{ $facebook ?? 'Trống' }}"
                                    aria-label="Username" aria-describedby="basic-addon1" disabled>
                                {{-- @if ($detailUser->zalo == null)
                                    <input type="text" class="form-control" value="Trống" aria-label="Username"
                                        aria-describedby="basic-addon1" disabled>
                                @else
                                    <input type="text" class="form-control" value="{{ $detailUser->facebook }}"
                                        aria-label="Username" aria-describedby="basic-addon1" disabled>
                                @endif --}}
                            </div>

                            {{-- <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">@mannatthemes.com</span>
                        </div> --}}
                            {{-- 
                            <label for="basic-url" class="form-label">Your vanity URL</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">https://mannatthemes.com</span>
                                <input type="text" class="form-control" id="basic-url"
                                    aria-describedby="basic-addon3">
                            </div> --}}

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-money-check-dollar"></i></span>

                                @if ($wallet->cash == null)
                                    <input type="text" class="form-control"
                                        aria-label="AApprox (to the nearest dollar)" value="0" disabled>
                                @else
                                    <input type="text" class="form-control"
                                        aria-label="AApprox (to the nearest dollar)"
                                        value="{{ number_format($wallet->cash, 0, ',', '.' )}} đ" disabled>
                                @endif

                                <span class="input-group-text">VNĐ</span>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Ngày Tạo</span>
                                <input type="text" class="form-control" value="{{ $detailUser->created_at }}"
                                    aria-label="Username" aria-describedby="basic-addon1" disabled>
                            </div>

                            {{-- <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                                <span class="input-group-text">@</span>
                                <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                            </div> --}}

                            {{-- <div class="input-group">
                                <span class="input-group-text">With textarea</span>
                                <textarea class="form-control" aria-label="With textarea"></textarea>
                            </div> --}}
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->
                <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Bổ Sung</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="row align-items-center">
                                <div class="col ">
                                    <div class="d-flex align-items-center">
                                        <div class="position-relative">
                                            @if ($detailUser->image == null)
                                                <img src="{{ asset('assets3/images/users/avatar-5.jpg') }}" alt=""
                                                    class="rounded-circle img-fluid">
                                            @else
                                                <img src="{{ asset($detailUser->image) }}" alt="" width="150px" height="150px"
                                                    class="rounded-circle img-fluid">
                                            @endif

                                            <div class="position-absolute top-50 start-100 translate-middle">
                                                <img src="{{ asset('assets3/images/flags/vietnam.jpg') }}" alt=""
                                                    class="rounded-circle thumb-sm border border-3 border-white">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 text-truncate ms-3 align-self-end">
                                            <h7 class="m-0 fs-3 fw-bold">{{ $detailUser->fullname }}</h7>
                                            <p class="text-muted mb-0">{{ $detailUser->username }}</p>
                                        </div><!--end media body-->
                                    </div><!--end media-->
                                </div><!--end col-->
                            </div><!--end row-->
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <div class="mt-3">
                                        <div class="text-body mb-2  d-flex align-items-center"><i
                                                class="iconoir-language fs-20 me-1 text-muted"></i><span
                                                class="text-body fw-semibold">Language :</span> VietNam /English / French /
                                            Spanish</div>
                                        <div class="text-muted mb-2 d-flex align-items-center"><i
                                                class="iconoir-mail-out fs-20 me-1"></i><span
                                                class="text-body fw-semibold">Email : &nbsp</span>{{ $detailUser->email }}
                                        </div>
                                        <div class="text-body mb-3 d-flex align-items-center"><i
                                                class="iconoir-phone fs-20 me-1 text-muted"></i><span
                                                class="text-body fw-semibold">Phone :&nbsp</span> {{ $detailUser->phone ?? "Trống" }}
                                        </div>
                                        {{-- <button type="button" class="btn btn-primary  d-inline-block">Follow</button> 
                                            <button type="button" class="btn btn-light  d-inline-block">Hire Me</button>  --}}
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->

                        </div><!--end card-body-->
                        <div class="card-body pt-0">



                            {{-- <div class="input-group mb-3">
                                    <button class="btn btn-secondary" type="button" id="button-addon1"><i
                                            class="fas fa-search"></i></button>
                                    <input type="text" class="form-control" placeholder=""
                                        aria-label="Example text with button addon" aria-describedby="button-addon1">
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-secondary" type="button" id="button-addon2">Go!</button>
                                </div> --}}

                            {{-- <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Email" aria-label="Email"
                                        aria-describedby="button-addon3">
                                    <button class="btn btn-secondary" type="button" id="button-addon2">Submit</button>
                                </div> --}}


                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title">Chức Năng Bổ Sung</h4>
                                        </div><!--end col-->
                                    </div> <!--end row-->
                                </div><!--end card-header-->
                                <div class="card-body pt-0">
                                    <form id="statusForm" action="{{ route('admin.users.updateUser') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $detailUser->id }}">
                                        <div class="mb-3 row">
                                            <label for="horizontalInput1" class="col-sm-2 col-form-label">Số Dư </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="cash" name="cash"
                                                    placeholder="Nhập số dư hoặc có thể bỏ trống"
                                                    value="{{ $wallet->cash}}">
                                                <div class="text-danger" id="discountError">
                                                    Nhập 0 sẽ là 0đ - 200.000 sẽ là 200.000đ.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="horizontalInput1" class="col-sm-2 col-form-label">Trạng Thái</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" id="status" name="status"
                                                    aria-label="Example select with button addon">
                                                    <option value="active"
                                                        {{ $detailUser->status == 'active' ? 'selected' : '' }}>Hoạt
                                                        Động</option>
                                                    <option value="inactive"
                                                        {{ $detailUser->status == 'inactive' ? 'selected' : '' }}>Tạm
                                                        Khóa</option>
                                                    <option value="banned"
                                                        {{ $detailUser->status == 'banned' ? 'selected' : '' }}>Bị Cấm
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="horizontalInput1" class="col-sm-2 col-form-label">Vai
                                                Trò</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" id="role" name="role"
                                                    aria-label="Example select with button addon">
                                                    <option value="1" {{ $detailUser->role == '1' ? 'selected' : '' }}>Khách Hàng</option>
                                                    <option value="2" {{ $detailUser->role == '2' ? 'selected' : '' }}>Nhân Viên</option>
                                                    <option value="3" {{ $detailUser->role == '3' ? 'selected' : '' }}>Admin</option>
                                                </select>
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
                            </div>


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
