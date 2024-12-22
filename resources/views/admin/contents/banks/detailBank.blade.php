@extends('admin.layouts.main')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">Chi Tiết Ngân Hàng</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Approx</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item"><a href="#">Ngân Hàng</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item active">Chi Tiết Ngân Hàng</li>
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
                                    <h4 class="card-title">Thông Tin Ngân Hàng</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table  mb-0 table-centered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Tên Ngân Hàng</th>
                                            <th>Chủ Tài Khoản</th>
                                            <th>Số Tài Khoản</th>
                                            <th>Trạng Thái</th>
                                            {{-- <th class="text-end">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                @if ($detailBank->bank_name == 970422)
                                                    <img src="{{ asset('assets3/images/logos/mb.jpg') }}"
                                                        class="rounded-circle thumb-md me-1 d-inline" alt="...">
                                                    MBBank
                                                @elseif($detailBank->bank_name == 970416)
                                                    <img src="{{ asset('assets3/images/logos/logo-acb.jpg') }}"
                                                        alt="" width="40px" height="40px"
                                                        class="rounded-circle thumb-md me-1 d-inline">
                                                    ACB
                                                @endif
                                            </td>
                                            <td>{{ $detailBank->bankers }}</td>
                                            <td>{{ $detailBank->account_number }}</td>
                                            @if ($detailBank->status == 1)
                                                <td><span class="badge bg-success">Hoạt Động</span></td>
                                            @elseif($detailBank->status == 1)
                                                <td><span class="badge bg-danger">Tạm Tắt</span></td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table><!--end /table-->
                            </div><!--end /tableresponsive-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Hình Ảnh QrCode</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive"> 
                                {{-- <img src="https://img.vietqr.io/image/{{$detailBank->bank_name}}-{{$detailBank->account_number}}-compact.png" alt=""> --}}
                                <img src="https://img.vietqr.io/image/{{$detailBank->bank_name}}-{{$detailBank->account_number}}-compact.png" width="250px" height="250px">
                                <div class="text-danger" id="discountError">
                                    Nếu Quét Qrcode Lỗi Hoặc Không Có Ảnh Là Do STK Ngân Hàng Không Đúng.
                                </div>
                            </div><!--end /tableresponsive-->
                        </div><!--end card-body-->
                    </div><!--end card-->

                </div> <!--end col-->

                {{-- <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Hình Ảnh QrCode</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                               <div class="table  mb-0 table-centered">
                               
                               </div>
                            </div><!--end /tableresponsive-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col--> --}} 
                {{-- <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Bordered Table</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0 table-centered">
                                    <thead>
                                        <tr>
                                            <th>Transaction ID</th>
                                            <th>Date</th>
                                            <th>Price</th>
                                            <th>Order Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#124781</td>
                                            <td>25/11/2018</td>
                                            <td>$321</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                            <td class="text-end">
                                                <div class="dropdown d-inline-block">
                                                    <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                        data-bs-toggle="dropdown" href="#" role="button"
                                                        aria-haspopup="false" aria-expanded="false">
                                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="dLabel11">
                                                        <a class="dropdown-item" href="#">Creat Project</a>
                                                        <a class="dropdown-item" href="#">Open Project</a>
                                                        <a class="dropdown-item" href="#">Tasks Details</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#542136</td>
                                            <td>19/11/2018</td>
                                            <td>$227</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                            <td class="text-end">
                                                <div class="dropdown d-inline-block">
                                                    <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                        data-bs-toggle="dropdown" href="#" role="button"
                                                        aria-haspopup="false" aria-expanded="false">
                                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="dLabel11">
                                                        <a class="dropdown-item" href="#">Creat Project</a>
                                                        <a class="dropdown-item" href="#">Open Project</a>
                                                        <a class="dropdown-item" href="#">Tasks Details</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#542136</td>
                                            <td>19/11/2018</td>
                                            <td>$227</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                            <td class="text-end">
                                                <div class="dropdown d-inline-block">
                                                    <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                        data-bs-toggle="dropdown" href="#" role="button"
                                                        aria-haspopup="false" aria-expanded="false">
                                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="dLabel11">
                                                        <a class="dropdown-item" href="#">Creat Project</a>
                                                        <a class="dropdown-item" href="#">Open Project</a>
                                                        <a class="dropdown-item" href="#">Tasks Details</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#234578</td>
                                            <td>11/10/2018</td>
                                            <td>$442</td>
                                            <td><span class="badge bg-danger">Rejected</span></td>
                                            <td class="text-end">
                                                <div class="dropdown d-inline-block">
                                                    <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                        data-bs-toggle="dropdown" href="#" role="button"
                                                        aria-haspopup="false" aria-expanded="false">
                                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="dLabel11">
                                                        <a class="dropdown-item" href="#">Creat Project</a>
                                                        <a class="dropdown-item" href="#">Open Project</a>
                                                        <a class="dropdown-item" href="#">Tasks Details</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#951357</td>
                                            <td>03/12/2018</td>
                                            <td>$625</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                            <td class="text-end">
                                                <div class="dropdown d-inline-block">
                                                    <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                        data-bs-toggle="dropdown" href="#" role="button"
                                                        aria-haspopup="false" aria-expanded="false">
                                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="dLabel11">
                                                        <a class="dropdown-item" href="#">Creat Project</a>
                                                        <a class="dropdown-item" href="#">Open Project</a>
                                                        <a class="dropdown-item" href="#">Tasks Details</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table><!--end /table-->
                            </div><!--end /tableresponsive-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>  --}}
                <!--end col-->
                <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Sửa Ngân Hàng</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <form id="bankForm" action="{{ route('admin.banks.updateBank') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $detailBank->id }}">
                                <div class="mb-3 row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Ngân Hàng</label>
                                    <div class="col-sm-10">
                                        {{-- <select name="bank_name" id="bank_name" class="form-control">
                                            <option value="970422"
                                                {{ $detailBank->bank_name == '970422' ? 'selected' : '' }}>MB
                                                Bank</option>
                                            <option value="970416"
                                                {{ $detailBank->bank_name == '970416' ? 'selected' : '' }}>
                                                ACB
                                            </option>
                                        </select> --}}
                                        @if ($detailBank->bank_name == '970422')
                                            <input type="text" class="form-control" id="bank_name" name="bank_name"
                                                placeholder="Nhập Tên Chủ Tài Khoản" value="MBBank" disabled>
                                        @elseif($detailBank->bank_name == '970416')
                                            <input type="text" class="form-control" id="bank_name" name="bank_name" disabled
                                                placeholder="Nhập Tên Chủ Tài Khoản" value="ACB">
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Chủ Tài Khoản</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="bankers" name="bankers"
                                            placeholder="Nhập Tên Chủ Tài Khoản" value="{{ $detailBank->bankers }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Số Tài Khoản</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="account_number" name="account_number"
                                            placeholder="Nhập Số Tài Khoản" value="{{ $detailBank->account_number }}">
                                        {{-- <div class="text-danger" id="discountError">
                                            Vui lòng nhập giá trị chiết khấu hợp lệ từ 0 - 5% .
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Tên Tài Khoản</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="account_name" name="account_name"
                                            placeholder="Nhập Tên Tài Khoản" value="{{ $detailBank->account_name }}">
                                        {{-- <div class="text-danger" id="discountError">
                                            Vui lòng nhập giá trị chiết khấu hợp lệ từ 0 - 5% .
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Mật Khẩu Tài
                                        Khoản</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="account_password"
                                            name="account_password" placeholder="Nhập Mật Khẩu Tài Khoản"
                                            value="{{ $detailBank->account_password }}">
                                        {{-- <div class="text-danger" id="discountError">
                                            Vui lòng nhập giá trị chiết khấu hợp lệ từ 0 - 5% .
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Trạng Thái</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ $detailBank->status == '1' ? 'selected' : '' }}>Hoạt
                                                Động
                                            </option>
                                            <option value="2" {{ $detailBank->status == '2' ? 'selected' : '' }}>Tạm
                                                Tắt
                                            </option>
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
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="document.getElementById('bankForm').reset();">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->

                {{-- <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">                      
                                        <h4 class="card-title">Striped Rows</h4>                      
                                    </div><!--end col-->
                                </div>  <!--end row-->                                  
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead class="table-light">
                                        <tr>
                                            <th>Customer</th>
                                            <th>Email</th>
                                            <th>Contact No</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline"> Aaron Poulin</td>
                                            <td>Aaron@example.com</td>
                                            <td>+21 21547896</td>
                                            <td class="text-end">                                                       
                                                <a href="#"><i class="las la-pen text-secondary font-16"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline"> Richard Ali</td>
                                            <td>Richard@example.com</td>
                                            <td>+41 21547896</td>
                                            <td class="text-end">                                                       
                                                <a href="#"><i class="las la-pen text-secondary font-16"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline"> Juan Clark</td>
                                            <td>Juan@example.com</td>
                                            <td>+65 21547896</td>
                                            <td class="text-end">                                                       
                                                <a href="#"><i class="las la-pen text-secondary font-16"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle thumb-md me-1 d-inline"> Albert Hull</td>
                                            <td>Albert@example.com</td>
                                            <td>+88 21547896</td>
                                            <td class="text-end">                                                       
                                                <a href="#"><i class="las la-pen text-secondary font-16"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table><!--end /table-->
                                </div><!--end /tableresponsive-->          
                            </div><!--end card-body--> 
                        </div><!--end card--> 
                    </div> <!--end col--> 
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">                      
                                        <h4 class="card-title">Table Head Options</h4>                      
                                    </div><!--end col-->
                                </div>  <!--end row-->                                  
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Access</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>XYZ@Example.com</td>
                                            <td><span class="badge bg-transparent border border-success text-success">Business</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>XYZ@Example.com</td>
                                            <td><span class="badge bg-transparent border border-warning text-warning">Personal</span></td>                                                    
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>XYZ@Example.com</td>
                                            <td><span class="badge bg-transparent border border-danger text-danger">Disabled</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Mark</td>
                                            <td>XYZ@Example.com</td>
                                            <td><span class="badge bg-transparent border border-success text-success">Business</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Jacob</td>
                                            <td>XYZ@Example.com</td>
                                            <td><span class="badge bg-transparent border border-warning text-warning">Personal</span></td>                                                    
                                        </tr>
                                        </tbody>
                                    </table><!--end /table--> 
                                </div><!--end /tableresponsive-->       
                            </div><!--end card-body--> 
                        </div><!--end card--> 
                    </div> <!--end col-->                                                       
                </div><!--end row--> --}}

            </div><!--end row-->
            <hr>
            {{-- <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Danh Mục Con Của {{ $detailCategory->name }}</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Tên Danh Mục</th>
                                            <th>Tổng Gian Hàng</th>
                                            <th>Chiết Khấu Sàn</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table><!--end /table-->
                            </div><!--end /tableresponsive-->
                        </div><!--end card-body-->


                    </div><!--end card-->
                </div> <!--end col-->

                <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Thêm Danh Mục Con</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <form action="" method="POST">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Tên Danh Mục</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Name Category" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10 ms-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>
                            </form>

                        </div><!--end card-body-->
                    </div><!--end card-->
                    @if (session('alert'))
                        <div id="alert-message" class="alert alert-primary" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                </div> <!--end col-->

            </div> --}}
            <!--end row-->
        </div><!-- container -->

        <script>
            // document.addEventListener('DOMContentLoaded', function() {
            //     const editBtns = document.querySelectorAll('.edit-btn');

            //     editBtns.forEach(btn => {
            //         btn.addEventListener('click', function() {
            //             // Lấy dữ liệu từ thuộc tính data-*
            //             const id = btn.getAttribute('data-id');
            //             const name = btn.getAttribute('data-name');
            //             const discount = btn.getAttribute('data-discount');
            //             const status = btn.getAttribute('data-status');
            //             const slug = btn.getAttribute('data-slug');

            //             // Cập nhật giá trị vào modal
            //             document.getElementById('id').value = id; // ID
            //             document.getElementById('name').value = name; // Name
            //             document.getElementById('discount').value = discount; // Discount
            //             document.getElementById('status').value = status; // Discount
            //             document.getElementById('slug').value = slug; // Discount

            //             // Mở modal
            //             var myModal = new bootstrap.Modal(document.getElementById('editModal'));
            //             myModal.show();
            //         });
            //     });
            // });

            // document.addEventListener('DOMContentLoaded', function() {
            //     const editBtnsSub = document.querySelectorAll('.edit-btnSub');

            //     editBtnsSub.forEach(btn => {
            //         btn.addEventListener('click', function() {
            //             // Lấy dữ liệu từ thuộc tính data-*
            //             const idSub = btn.getAttribute('data-id');
            //             const nameSub = btn.getAttribute('data-name');
            //             const discountSub = btn.getAttribute('data-discount');
            //             const statusSub = btn.getAttribute('data-status');
            //             const slugSub = btn.getAttribute('data-slug');

            //             // Cập nhật giá trị vào modal
            //             document.getElementById('idSub').value = idSub;
            //             document.getElementById('nameSub').value = nameSub;
            //             document.getElementById('discountSub').value = discountSub;
            //             document.getElementById('statusSub').value = statusSub;
            //             document.getElementById('slugSub').value = slugSub;

            //             // Mở modal
            //             var myModal = new bootstrap.Modal(document.getElementById('editSubModal'));
            //             myModal.show();
            //         });
            //     });
            // });
            // document.addEventListener('DOMContentLoaded', function() {
            //     const editBtnsSub = document.querySelectorAll('.edit-btnSub');

            //     editBtnsSub.forEach(btn => {
            //         btn.addEventListener('click', function() {
            //             // Lấy dữ liệu từ thuộc tính data-*
            //             const idSub = btn.getAttribute('data-id');
            //             const nameSub = btn.getAttribute('data-name');
            //             const discountSub = btn.getAttribute('data-discount');
            //             const statusSub = btn.getAttribute('data-status');
            //             const slugSub = btn.getAttribute('data-slug');

            //             // Cập nhật giá trị vào các trường trong modal
            //             document.getElementById('idSub').value = idSub;
            //             document.getElementById('nameSub').value = nameSub;
            //             document.getElementById('discountSub').value = discountSub;
            //             document.getElementById('statusSub').value = statusSub;
            //             document.getElementById('slugSub').value = slugSub;

            //             // Mở modal
            //             var myModal = new bootstrap.Modal(document.getElementById('editSubModal'));
            //             myModal.show();
            //         });
            //     });
            // });

            // document.addEventListener('DOMContentLoaded', function() {
            //     const editBtnsSub2 = document.querySelectorAll('.edit-btnSub2');

            //     editBtnsSub2.forEach(btn => {
            //         btn.addEventListener('click', function() {
            //             // Lấy dữ liệu từ thuộc tính data-*
            //             const idSub2 = btn.getAttribute('data-id');
            //             const nameSub2 = btn.getAttribute('data-name');
            //             const discountSub2 = btn.getAttribute('data-discount');
            //             const statusSub2 = btn.getAttribute('data-status');
            //             const slugSub2 = btn.getAttribute('data-slug');

            //             // Cập nhật giá trị vào modal
            //             document.getElementById('idSub2').value = idSub2;
            //             document.getElementById('nameSub2').value = nameSub2;
            //             document.getElementById('discountSub2').value = discountSub2;
            //             document.getElementById('statusSub2').value = statusSub2;
            //             document.getElementById('slugSub2').value = slugSub2;

            //             // Mở modal
            //             var myModal = new bootstrap.Modal(document.getElementById('editSubModal2'));
            //             myModal.show();
            //         });
            //     });
            // });

            document.addEventListener('DOMContentLoaded', function() {
                const editBtnsSub2 = document.querySelectorAll('.edit-btnSub2');

                editBtnsSub2.forEach(btn => {
                    btn.addEventListener('click', function() {
                        // Lấy dữ liệu từ thuộc tính data-*
                        const idSub2 = btn.getAttribute('data-id');
                        const nameSub2 = btn.getAttribute('data-name');
                        const discountSub2 = btn.getAttribute('data-discount');
                        const statusSub2 = btn.getAttribute('data-status');
                        const slugSub2 = btn.getAttribute('data-slug');

                        // Cập nhật giá trị vào các trường trong modal
                        document.getElementById('idSub2').value = idSub2;
                        document.getElementById('nameSub2').value = nameSub2;
                        document.getElementById('discountSub2').value = discountSub2;
                        document.getElementById('statusSub2').value = statusSub2;
                        document.getElementById('slugSub2').value = slugSub2;

                        // Mở modal
                        var myModal = new bootstrap.Modal(document.getElementById('editSubModal2'));
                        myModal.show();
                    });
                });
            });
        </script>

        <style>
            .text-danger {
                color: red;
                font-size: 12px;
                margin-top: 5px;
            }
        </style>
    @endsection
