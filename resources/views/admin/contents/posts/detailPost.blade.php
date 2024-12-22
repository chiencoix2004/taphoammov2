@extends('admin.layouts.main')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">Thông Tin Bài Viết</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item"><a href="#">Bài Viết</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item active">Thông Tin Bài Viết</li>
                            </ol>
                        </div>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div><!--end row-->

            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body p-4  rounded text-center img-bg">

                        </div><!--end card-body-->
                        <div class="position-relative">
                            <div class="shape overflow-hidden text-card-bg">
                                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="card-body mt-n6">
                            <div class="row align-items-center">
                                <div class="col ">
                                    <div class="d-flex align-items-center">
                                        <div class="position-relative">

                                            @if ($detailPost->image == null)
                                                <img src="{{ asset('assets3/images/flags/vietnam.jpg') }}" alt=""
                                                    class="img-fluid" width="300px" height="300px"
                                                    style="object-fit: cover;boder-radius:1px;">
                                            @else
                                                <img src="{{ asset($detailPost->image) }}" alt="" class="img-fluid"
                                                    width="200px" height="200px"
                                                    style="object-fit: cover;boder-radius:1px;">
                                            @endif
                                            <div class="position-absolute top-50 start-100 translate-middle">
                                                <img src="{{ asset('assets3/images/flags/vietnam.jpg') }}" alt=""
                                                    class="rounded-circle thumb-sm border border-3 border-white">
                                            </div>
                                        </div>
                                        {{-- <div class="flex-grow-1 text-truncate ms-3 align-self-end">
                                            <h5 class="m-0 fs-3 fw-bold">{{ $detailShop->user->username }}</h5>
                                            <p class="text-muted mb-0">{{ $detailShop->user->username }}</p>
                                        </div><!--end media body--> --}}
                                    </div><!--end media-->
                                </div><!--end col-->
                            </div><!--end row-->
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <div class="mt-3">
                                        <div class="text-body mb-2  d-flex align-items-center"><i
                                                class="iconoir-shop fs-20 me-1 text-muted"></i><span
                                                class="text-body fw-semibold">Tiêu Đề Bài Viết : &nbsp</span> <span
                                                style="color:rgb(38, 158, 206)">{{ $detailPost->title }}</span>
                                        </div>
                                        <div class="text-muted mb-2 d-flex align-items-center"><i
                                                class="iconoir-user fs-20 me-1"></i><span class="text-body fw-semibold">Tác
                                                Giả : &nbsp</span>
                                            {{ $detailPost->user->username }}</div>
                                        <div class="text-muted mb-2 d-flex align-items-center"><i
                                                class="iconoir-flower fs-20 me-1"></i>
                                            <span class="text-body fw-semibold">Phân Loại : &nbsp</span>
                                            <span style="color:rgb(8, 221, 8)">
                                                {{ $detailPost->category }}</span>
                                        </div>

                                        <div class="text-muted mb-2 d-flex align-items-center"><i
                                                class="iconoir-calendar fs-20 me-1"></i><span
                                                class="text-body fw-semibold">Ngày Tạo : &nbsp</span>
                                            {{ $detailPost->created_at->format('Y-m-d') }}</div>
                                        <div class="text-muted mb-2 d-flex align-items-center"><i
                                                class="iconoir-compact-disc fs-20 me-1 text-muted"></i><span
                                                class="text-body fw-semibold">Trạng Thái : &nbsp</span>
                                            @if ($detailPost->status == 1)
                                                <span class="badge rounded text-warning bg-warning-subtle">Chưa
                                                    Duyệt</span>
                                            @elseif($detailPost->status == 2)
                                                <span class="badge rounded text-success bg-success-subtle">Đã
                                                    Duyệt</span>
                                            @elseif($detailPost->status == 3)
                                                <span class="badge rounded text-primary bg-primary-subtle">Đã
                                                    Cấm</span>
                                            @endif
                                        </div>


                                        {{-- <button type="button" class="btn btn-primary  d-inline-block">Follow</button>
                                        <button type="button" class="btn btn-light  d-inline-block">Hire Me</button> --}}
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->

                        </div><!--end card-body-->
                    </div><!--end card-->



                </div> <!--end col-->
                <div class="col-md-8">
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fw-medium active" data-bs-toggle="tab" href="#post" role="tab"
                                aria-selected="true">Thông Tin Chung</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link fw-medium" data-bs-toggle="tab" href="#gallery" role="tab"
                                aria-selected="false">Gallery</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link fw-medium" data-bs-toggle="tab" href="#settings" role="tab"
                                aria-selected="false">Trạng Thái Gian Hàng</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="post" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            {{-- <img src="{{asset('assets/images/extra/card/post-1.jpg')}}" alt=""
                                                class="img-fluid"> --}}
                                            <h3 class="fs-20 fw-bold d-block my-3"><i>Nội Dung Bài Viết</i></h3>
                                            <div class="post-title mt-3">
                                                {{-- <h5 href="#" class="fs-20 fw-bold d-block my-3">
                                                    {{ $detailPost->short_description }}.</h5> --}}
                                                {{-- <span class="fs-15 bg-light py-2 px-3 rounded">Taking pictures is savouring
                                                    life intensely.</span> --}}
                                                <p class="fs-15 mt-3">{!! $detailPost->content !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                    <div class="tab-pane p-3" id="settings" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Trạng Thái Gian Hàng</h4>
                            </div><!--end card-header-->
                            <form id="statusForm" action="{{ route('admin.posts.updateStatusPost') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $detailPost->id }}">
                                <div class="card-body pt-0">
                                    <div class="form-group mb-3 row">
                                        <label
                                            class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Trạng
                                            Thái</label>
                                        <div class="col-lg-9 col-xl-8">
                                            <select class="form-select" name="status" id="status">
                                                <option value="1" {{ $detailPost->status == '1' ? 'selected' : '' }}>
                                                    Chưa Duyệt</option>
                                                <option value="2" {{ $detailPost->status == '2' ? 'selected' : '' }}>
                                                    Đã Duyệt</option>
                                                {{-- <option value="3" {{ $detailPost->status == '3' ? 'selected' : '' }}>
                                                    Đã Cấm</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-9 col-xl-8 offset-lg-3">
                                            <button type="button" class="btn btn-primary"
                                                onclick="confirmSubmit()">Submit</button>
                                            <button type="button" class="btn btn-danger">Cancel</button>
                                        </div>
                                    </div>
                                </div><!--end card-body-->
                        </div><!--end card-->
                        </form>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                    </div>
                </div>
            </div> <!--end col-->



        </div>

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
