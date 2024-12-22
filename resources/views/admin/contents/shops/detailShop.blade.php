@extends('admin.layouts.main')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">Thông Tin Gian Hàng</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item"><a href="#">Gian Hàng</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item active">Thông Tin Gian Hàng</li>
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

                                            <img src="{{ asset($detailShop->image) }}" alt="" class="img-fluid"
                                                width="200px" height="200px" style="object-fit: cover;boder-radius:1px;">


                                            <div class="position-absolute top-50 start-100 translate-middle">
                                                <img src="{{ asset('assets/images/flags/vietnam.jpg') }}" alt=""
                                                    class="rounded-circle thumb-sm border border-3 border-white">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 text-truncate ms-3 align-self-end">
                                            <h5 class="m-0 fs-3 fw-bold">{{ $detailShop->user->username }}</h5>
                                            <p class="text-muted mb-0">{{ $detailShop->user->username }}</p>
                                        </div><!--end media body-->
                                    </div><!--end media-->
                                </div><!--end col-->
                            </div><!--end row-->
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <div class="mt-3">
                                        <div class="text-body mb-2  d-flex align-items-center"><i
                                                class="iconoir-shop fs-20 me-1 text-muted"></i><span
                                                class="text-body fw-semibold">Tên Gian Hàng : &nbsp</span> <span
                                                style="color:rgb(38, 158, 206)">{{ $detailShop->title }}</span>
                                        </div>
                                        <div class="text-muted mb-2 d-flex align-items-center"><i
                                                class="iconoir-user fs-20 me-1"></i><span
                                                class="text-body fw-semibold">Người Bán : &nbsp</span>
                                            {{ $detailShop->user->username }}</div>
                                        <div class="text-muted mb-2 d-flex align-items-center"><i
                                                class="iconoir-flower fs-20 me-1"></i>
                                            <span class="text-body fw-semibold">Phân Loại : &nbsp</span>
                                            <span style="color:rgb(8, 221, 8)">
                                                {{ $detailShop->category->name }}</span>
                                        </div>

                                        <div class="text-muted mb-2 d-flex align-items-center"><i
                                                class="iconoir-calendar fs-20 me-1"></i><span
                                                class="text-body fw-semibold">Ngày Tạo : &nbsp</span>
                                            {{ $detailShop->created_at->format('Y-m-d') }}</div>
                                        <div class="text-muted mb-2 d-flex align-items-center"><i
                                                class="iconoir-compact-disc fs-20 me-1 text-muted"></i><span
                                                class="text-body fw-semibold">Trạng Thái : &nbsp</span>
                                            @if ($detailShop->status == 1)
                                                <span class="badge rounded text-warning bg-warning-subtle">Chưa
                                                    Duyệt</span>
                                            @elseif($detailShop->status == 2)
                                                <span class="badge rounded text-success bg-success-subtle">Đã
                                                    Duyệt</span>
                                            @elseif($detailShop->status == 3)
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
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Thông Tin Sản Phẩm</h4>
                                </div><!--end col-->
                                {{-- <div class="col-auto">
                                    <a href="#"
                                        class="float-end text-muted d-inline-flex text-decoration-underline"><i
                                            class="iconoir-edit-pencil fs-18 me-1"></i>Edit</a>
                                </div><!--end col--> --}}
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <ul class="list-unstyled mb-0">
                                @foreach ($detailShop->product as $product)
                                    <li class="">- <img width="25" height="25"
                                            class="me-2 text-secondary fs-22 align-middle"
                                            src="https://img.icons8.com/color/48/product--v1.png" alt="product--v1" />
                                        <b>Sản Phẩm</b> : <b style="color: aqua">{{ $product->product_name }}</b>
                                    </li>

                                    <li class="">- <img class="me-2 text-secondary fs-22 align-middle" width="25"
                                            height="25" src="https://img.icons8.com/color/48/cash.png" alt="cash" />
                                        <b> Giá Sản Phẩm</b> : <i style="color: rgb(13, 201, 13)">{{ $product->price }}đ
                                            VNĐ</i>
                                    </li>
                                    <li class="">- <img width="25" height="25"
                                            class="me-2 text-secondary fs-22 align-middle"
                                            src="https://img.icons8.com/stickers/50/how-many-quest.png"
                                            alt="how-many-quest" />
                                        <b> Tồn Kho</b> :
                                        @if ($product->quantity > 0)
                                            <i style="color: rgb(238, 64, 11)">{{ $product->quantity }}</i>
                                        @elseif($product->quantity == 0)
                                            <i style="color: rgb(238, 64, 11)">Hết Hàng</i>
                                        @endif
                                    </li>
                                    <hr>
                                @endforeach
                            </ul>
                            <div class="row justify-content-center mt-4">
                                <div class="col-auto text-end border-end">
                                    <span
                                        class="thumb-md justify-content-center d-flex align-items-center bg-blue text-white rounded-circle ms-auto mb-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </span>
                                    <p class="mb-0 fw-semibold">Facebook</p>
                                    <h4 class="m-0 fw-bold">25k <span class="text-muted fs-12 fw-normal">Followers</span>
                                    </h4>
                                </div><!--end col-->
                                <div class="col-auto">
                                    <span
                                        class="thumb-md justify-content-center d-flex align-items-center bg-black text-white rounded-circle mb-1">
                                        <i class="fab fa-x-twitter"></i>
                                    </span>
                                    <p class="mb-0 fw-semibold">Twitter</p>
                                    <h4 class="m-0 fw-bold">58k <span class="text-muted fs-12 fw-normal">Followers</span>
                                    </h4>
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
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col">
                                                    <p class="text-dark mb-1 fw-semibold">Lượt Xem Sản Phẩm</p>
                                                    <h3 class="my-2 fs-24 fw-bold">{{ $detailShop->view }}</h3>
                                                    <p class="mb-0 text-truncate text-muted"><i
                                                            class="iconoir-bell text-warning fs-18"></i>
                                                        <span class="text-dark fw-semibold">Lượt xem</span>
                                                    </p>
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    <div
                                                        class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                                        <i class="iconoir-eye fs-30 align-self-center text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </div><!--end col-->
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col">
                                                    <p class="text-dark mb-1 fw-semibold">Tổng Lượt Bình Luận</p>
                                                    <h3 class="my-2 fs-24 fw-bold">{{ $commentCount }}</h3>
                                                    <p class="mb-0 text-truncate text-muted"><i
                                                            class="ti ti-thumb-up text-success fs-18"></i>
                                                        <span
                                                            class="text-dark fw-semibold">{{ $commentCountThisWeek }}</span>
                                                        Bình Luận Trong Tuần
                                                    </p>
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    <div
                                                        class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                                        <i
                                                            class="iconoir-chat-lines fs-30 align-self-center text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </div><!--end col-->
                            </div><!--end row-->
                            <div class="row">
                                {{-- <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/users/avatar-10.jpg"
                                                            class="thumb-md align-self-center rounded-circle"
                                                            alt="...">
                                                        <div class="flex-grow-1 ms-2">
                                                            <h5 class="m-0 fs-14">Anderson Vanhron</h5>
                                                            <p class="text-muted mb-0 fs-12">online</p>
                                                        </div><!--end media-body-->
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-auto">
                                                    <div class="d-none d-sm-inline-block align-self-center">
                                                        <a href="#" class="me-2 text-muted"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Call" data-bs-custom-class="tooltip-primary"><i
                                                                class="iconoir-media-image fs-18"></i></a>
                                                        <a href="#" class="me-2 text-muted"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Attachment"
                                                            data-bs-custom-class="tooltip-primary"><i
                                                                class="iconoir-attachment fs-18"></i></a>
                                                        <a href="#" class="me-2 text-muted"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Delete"
                                                            data-bs-custom-class="tooltip-primary"><i
                                                                class="iconoir-calendar fs-18"></i></a>

                                                        <div class="dropdown d-inline-block">
                                                            <a class="dropdown-toggle arrow-none text-muted"
                                                                data-bs-toggle="dropdown" href="#" role="button"
                                                                aria-haspopup="false" aria-expanded="true">
                                                                <i class="iconoir-more-vert fs-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end pb-0">
                                                                <a class="dropdown-item" href="#">Profile</a>
                                                                <a class="dropdown-item" href="#">Add archive</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                                <a class="dropdown-item text-danger"
                                                                    href="#">Block</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->
                                            </div> <!--end row-->
                                        </div><!--end card-header-->
                                        <div class="card-body pt-0">
                                            <form action="#">
                                                <div class="">
                                                    <textarea class="form-control mb-2" id="post-1" rows="5" placeholder="Write here.."></textarea>
                                                    <button type="button" class="btn btn-primary">Post</button>
                                                </div>
                                            </form>
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </div><!--end col--> --}}
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            {{-- <img src="{{asset('assets/images/extra/card/post-1.jpg')}}" alt=""
                                                class="img-fluid"> --}}
                                            <h3 class="fs-20 fw-bold d-block my-3"><i>Mô Tả Sản Phẩm</i></h3>
                                            <div class="post-title mt-3">
                                                <h5 href="#" class="fs-20 fw-bold d-block my-3">
                                                    {{ $detailShop->short_description }}.</h5>
                                                {{-- <span class="fs-15 bg-light py-2 px-3 rounded">Taking pictures is savouring
                                                    life intensely.</span> --}}
                                                <p class="fs-15 mt-3">{{ $detailShop->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body pb-0">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="text-dark fw-semibold mb-0">Comments ({{ $commentCount }})
                                                    </p>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </div><!--end card-body-->
                                        <div class="card-body border-bottom-dashed">

                                            <ul class="list-unstyled mb-0">
                                                @foreach ($comments as $comment)
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                {{-- <img src="assets/images/users/avatar-2.jpg" alt=""
                                                                class="thumb-md rounded-circle"> --}}
                                                                @if ($comment->user->image == null)
                                                                    <img src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                                                                        class="me-2 thumb-md align-self-center rounded"
                                                                        alt="...">
                                                                @else
                                                                    <img src="{{ asset($comment->user->image) }}"
                                                                        alt="" width="40px" height="40px"
                                                                        class="me-2 thumb-md align-self-center rounded">
                                                                @endif
                                                            </div><!--end col-->
                                                            <div class="col">
                                                                <div class="bg-light rounded ms-n2 bg-light-alt p-3">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <p class="text-dark fw-semibold mb-2">
                                                                                {{ $comment->user->fullname }}
                                                                            </p>
                                                                            <p class="text-dark fw-semibold mb-2"> Đánh Giá
                                                                                :
                                                                                {{ $comment->rating }} <img width="20"
                                                                                    height="20"
                                                                                    src="https://img.icons8.com/keek/100/star.png"
                                                                                    alt="star" />
                                                                            </p>
                                                                        </div><!--end col-->
                                                                        <div class="col-auto">
                                                                            <span class="text-muted"><i
                                                                                    class="far fa-clock me-1"></i>
                                                                                {{ $comment->created_at }}</span>
                                                                        </div><!--end col-->
                                                                    </div><!--end row-->
                                                                    <p>{{ $comment->content }}</p>
                                                                    {{-- <a href="#" class="text-primary"><i
                                                                        class="fas fa-reply me-1"></i>Replay</a> --}}
                                                                </div>
                                                            </div><!--end col-->
                                                        </div><!--end row-->
                                                        @foreach ($comment->replies as $reply)
                                                            <ul class="list-unstyled ms-5">
                                                                <li>
                                                                    <div class="row mt-3">
                                                                        <div class="col-auto">
                                                                            {{-- <img src="assets/images/logo-sm.png"
                                                                                alt=""
                                                                                class="thumb-md rounded-circle"> --}}
                                                                            @if ($reply->user->image == null)
                                                                                <img src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                                                                                    class="thumb-md rounded-circle"
                                                                                    alt="...">
                                                                            @else
                                                                                <img src="{{ asset($reply->user->image) }}"
                                                                                    alt="" width="40px"
                                                                                    height="40px"
                                                                                    class="thumb-md rounded-circle">
                                                                            @endif
                                                                        </div><!--end col-->
                                                                        <div class="col">
                                                                            <div
                                                                                class="bg-light rounded ms-n2 bg-light-alt p-3">
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <p
                                                                                            class="text-dark fw-semibold mb-2">
                                                                                            {{ $reply->user->fullname }}
                                                                                        </p>
                                                                                    </div><!--end col-->
                                                                                    <div class="col-auto">
                                                                                        <span class="text-muted"><i
                                                                                                class="far fa-clock me-1"></i>{{ $reply->created_at }}</span>
                                                                                    </div><!--end col-->
                                                                                </div><!--end row-->
                                                                                <p>{{ $reply->content }}
                                                                                </p>
                                                                                {{-- <p class="mb-0">Thank you</p> --}}
                                                                            </div>
                                                                        </div><!--end col-->
                                                                    </div><!--end row-->
                                                                </li>
                                                            </ul>
                                                        @endforeach
                                                        <br>
                                                        <br>
                                                @endforeach
                                                </li>
                                            </ul>

                                        </div><!--end card-body-->

                                    </div><!--end card-body-->
                                    {{ $comments->links('pagination::bootstrap-4') }}
                                </div> <!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                    {{-- <div class="tab-pane p-3" id="gallery" role="tabpanel">
                        <div id="grid" class="row g-0">
                            <div class="col-md-6 col-lg-4 picture-item">
                                <a href="assets/images/extra/card/img-1.jpg" class="lightbox">
                                    <img src="assets/images/extra/card/img-1.jpg" alt="" class="img-fluid" />
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-4 picture-item picture-item--overlay">
                                <a href="assets/images/extra/card/img-2.jpg" class="lightbox">
                                    <img src="assets/images/extra/card/img-2.jpg" alt="" class="img-fluid" />
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-4 picture-item">
                                <a href="assets/images/extra/card/img-3.jpg" class="lightbox">
                                    <img src="assets/images/extra/card/img-3.jpg" alt="" class="img-fluid" />
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-4 picture-item picture-item--h2">
                                <a href="assets/images/extra/card/img-4.jpg" class="lightbox">
                                    <img src="assets/images/extra/card/img-4.jpg" alt="" class="img-fluid" />
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-4 picture-item">
                                <a href="assets/images/extra/card/img-5.jpg" class="lightbox">
                                    <img src="assets/images/extra/card/img-5.jpg" alt="" class="img-fluid" />
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-4 picture-item picture-item--overlay">
                                <a href="assets/images/extra/card/img-6.jpg" class="lightbox">
                                    <img src="assets/images/extra/card/img-6.jpg" alt="" class="img-fluid" />
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="tab-pane p-3" id="settings" role="tabpanel">
                        {{-- <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Personal Information</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div class="form-group mb-3 row">
                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">First
                                        Name</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <input class="form-control" type="text" value="Rosa">
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Last
                                        Name</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <input class="form-control" type="text" value="Dodson">
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Company
                                        Name</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <input class="form-control" type="text" value="MannatThemes">
                                        <span class="form-text text-muted font-12">We'll never share your email with
                                            anyone else.</span>
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Contact
                                        Phone</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="las la-phone"></i></span>
                                            <input type="text" class="form-control" value="+123456789"
                                                placeholder="Phone" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Email
                                        Address</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="las la-at"></i></span>
                                            <input type="text" class="form-control" value="rosa.dodson@demo.com"
                                                placeholder="Email" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Website
                                        Link</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="la la-globe"></i></span>
                                            <input type="text" class="form-control" value=" https://mannatthemes.com/"
                                                placeholder="Email" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label
                                        class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">USA</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <select class="form-select">
                                            <option>London</option>
                                            <option>India</option>
                                            <option>USA</option>
                                            <option>Canada</option>
                                            <option>Thailand</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9 col-xl-8 offset-lg-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card--> --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Trạng Thái Gian Hàng</h4>
                            </div><!--end card-header-->
                            <form id="statusForm" action="{{ route('admin.shops.updateStatusShop') }}" method="post">
                                @csrf
                                <input type="hidden" name="shop_id" value="{{ $detailShop->id }}">
                                <div class="card-body pt-0">
                                    <div class="form-group mb-3 row">
                                        <label
                                            class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Trạng
                                            Thái</label>
                                        <div class="col-lg-9 col-xl-8">
                                            <select class="form-select" name="status" id="status">
                                                <option value="1" {{ $detailShop->status == '1' ? 'selected' : '' }}>
                                                    Chưa Duyệt</option>
                                                <option value="2" {{ $detailShop->status == '2' ? 'selected' : '' }}>
                                                    Đã Duyệt</option>
                                                <option value="3" {{ $detailShop->status == '3' ? 'selected' : '' }}>
                                                    Đã Cấm</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-9 col-xl-8 offset-lg-3">
                                            <button type="button" class="btn btn-primary" onclick="confirmSubmit()">Submit</button>
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
