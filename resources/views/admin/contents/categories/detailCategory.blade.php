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
                                    <h4 class="card-title">Danh Mục Cha</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table  mb-0 table-centered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Tên Danh Mục</th>
                                            <th>Gian Hàng</th>
                                            <th>Chiết Khấu</th>
                                            <th>Trạng Thái</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="{{ asset('assets3/images/logos/lang-logo/chatgpt.png') }}"
                                                    alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                {{ $detailCategory->name }}
                                            </td>
                                            <td>{{ $detailCategory->children_count }}</td>
                                            @if ($detailCategory->discount == 0)
                                                <td><span
                                                        class="badge bg-success-subtle text-success fs-11 fw-medium px-2">Không</span>
                                                </td>
                                            @else
                                                <td><span
                                                        class="badge bg-danger-subtle text-danger fs-11 fw-medium px-2">{{ $detailCategory->discount }}%</span>
                                                </td>
                                            @endif
                                            @if ($detailCategory->status == 1)
                                                <td><span class="badge bg-success">Hoạt Động</span></td>
                                            @else
                                                <td><span class="badge bg-danger">Không HĐ</span></td>
                                            @endif
                                            <td class="text-end">
                                                <div class="dropdown d-inline-block">
                                                    <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                        data-bs-toggle="dropdown" href="#" role="button"
                                                        aria-haspopup="false" aria-expanded="false">
                                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                                        {{-- <a class="dropdown-item" href="#">Creat Project</a> --}}

                                                        <a href="javascript:void(0);" class="edit-btn"
                                                            data-id="{{ $detailCategory->id }}"
                                                            data-name="{{ $detailCategory->name }}"
                                                            data-discount="{{ $detailCategory->discount }}"
                                                            data-slug="{{ $detailCategory->slug }}"
                                                            data-status="{{ $detailCategory->status }}">

                                                            <div class="dropdown-item"> Sửa </div>
                                                        </a>
                                                    </div>


                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editModal" tabindex="-1"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Sửa Danh Mục
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST"
                                                        action="{{ route('admin.categories.updateCategory') }}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <input type="hidden" id="id" name="id">
                                                                <input type="hidden" id="slug" name="slug">
                                                                <label for="name" class="form-label">Tên
                                                                    Danh
                                                                    Mục</label>
                                                                <input type="text" class="form-control" id="name"
                                                                    name="name" required>


                                                                <br>
                                                                <label for="discount" class="form-label">Chiết
                                                                    Khấu
                                                                    Sàn (%)</label>
                                                                <input type="text" class="form-control" id="discount"
                                                                    name="discount" required>

                                                                <br>
                                                                <label for="status" class="form-label">Trạng Thái</label>
                                                                <select name="status" id="status" class="form-control">
                                                                    <option value="1">Hoạt Động</option>
                                                                    <option value="2">Không HĐ</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Hủy</button>
                                                            <button type="submit" class="btn btn-primary">Lưu
                                                                thay
                                                                đổi</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>



                                        <!-- Hiển thị danh mục cha -->
                                        @foreach ($detailCategory->children as $child)
                                            <tr>
                                                <!-- Thêm khoảng trắng để tạo sự thụt lề cho các cấp con -->
                                                <td>
                                                    {!! str_repeat('&nbsp;', $child->level * 2) !!}
                                                    Cấp 2
                                                    <img src="{{ asset('assets3/images/logos/lang-logo/chatgpt.png') }}"
                                                        alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                    <!-- Thụt lề dựa trên cấp -->
                                                    {{ $child->name }}
                                                </td>
                                                <td>{{ $child->children->count() }}</td>
                                                @if ($child->discount == 0)
                                                    <td><span
                                                            class="badge bg-success-subtle text-success fs-11 fw-medium px-2">Không</span>
                                                    </td>
                                                @else
                                                    <td><span
                                                            class="badge bg-danger-subtle text-danger fs-11 fw-medium px-2">{{ $child->discount }}%</span>
                                                    </td>
                                                @endif
                                                @if ($child->status == 1)
                                                    <td><span class="badge bg-success">Hoạt Động</span></td>
                                                @else
                                                    <td><span class="badge bg-danger">Không HĐ</span></td>
                                                @endif
                                                <td class="text-end">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                            data-bs-toggle="dropdown" href="#" role="button"
                                                            aria-haspopup="false" aria-expanded="false">
                                                            <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                        </a>
                                                        {{-- <div class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="dLabel11">

                                                            <a href="javascript:void(0);" class="edit-btnSub"
                                                                data-id="{{ $child->id }}"
                                                                data-name="{{ $child->name }}"
                                                                data-discount="{{ $child->discount }}"
                                                                data-slug="{{ $child->slug }}"
                                                                data-status="{{ $child->status }}">

                                                                <div class="dropdown-item"> Sửa </div>
                                                            </a>
                                                        </div> --}}

                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                                            {{-- Nếu bạn có thêm các mục khác như tạo dự án thì có thể bỏ chú thích --}}
                                                            <!-- <a class="dropdown-item" href="#">Creat Project</a> -->
                                                        
                                                            <a href="javascript:void(0);" class="edit-btnSub"
                                                               data-id="{{ $child->id }}"
                                                               data-name="{{ $child->name }}"
                                                               data-discount="{{ $child->discount }}"
                                                               data-slug="{{ $child->slug }}"
                                                               data-status="{{ $child->status }}">
                                                                <div class="dropdown-item"> Sửa </div>
                                                            </a>
                                                        </div>
                                                        
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Hiển thị các mục con của mục con (nếu có) -->
                                            @foreach ($child->children as $subChild)
                                                <tr>
                                                    <td>

                                                        {!! str_repeat('&nbsp;', $subChild->level * 4) !!}
                                                        Cấp 3
                                                        <img src="{{ asset('assets3/images/logos/lang-logo/chatgpt.png') }}"
                                                            alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                        <!-- Thụt lề tiếp -->
                                                        {{ $subChild->name }}
                                                    </td>
                                                    <td>{{ $subChild->children->count() }}</td>
                                                    @if ($subChild->discount == 0)
                                                        <td><span
                                                                class="badge bg-success-subtle text-success fs-11 fw-medium px-2">Không</span>
                                                        </td>
                                                    @else
                                                        <td><span
                                                                class="badge bg-danger-subtle text-danger fs-11 fw-medium px-2">{{ $subChild->discount }}%</span>
                                                        </td>
                                                    @endif
                                                    @if ($subChild->status == 1)
                                                        <td><span class="badge bg-success">Hoạt Động</span></td>
                                                    @else
                                                        <td><span class="badge bg-danger">Không HĐ</span></td>
                                                    @endif
                                                    <td class="text-end">
                                                        <div class="dropdown d-inline-block">
                                                            <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                                data-bs-toggle="dropdown" href="#" role="button"
                                                                aria-haspopup="false" aria-expanded="false">
                                                                <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                                                <!-- Nút Edit với các thuộc tính data-* -->
                                                                <a href="javascript:void(0);" class="edit-btnSub2"
                                                                   data-id="{{ $subChild->id }}"
                                                                   data-name="{{ $subChild->name }}"
                                                                   data-discount="{{ $subChild->discount }}"
                                                                   data-slug="{{ $subChild->slug }}"
                                                                   data-status="{{ $subChild->status }}">
                                                                    <div class="dropdown-item"> Sửa </div>
                                                                </a>
                                                            </div>
                                                            
                                                        </div>
                                                    </td>
                                                </tr>
                                                {{-- <div class="modal fade" id="editSubModal" tabindex="-1"
                                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <!-- Nội dung modal -->
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">Sửa Danh Mục
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('admin.categories.updateSubCategory') }}">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <input type="hidden" id="idSub"
                                                                            name="id">
                                                                        <input type="hidden" id="slugSub"
                                                                            name="slug">
                                                                        <label for="name" class="form-label">Tên
                                                                            Danh
                                                                            Mục</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nameSub" name="name" required>


                                                                        <br>
                                                                        <label for="discount" class="form-label">Chiết
                                                                            Khấu
                                                                            Sàn (%)</label>
                                                                        <input type="text" class="form-control"
                                                                            id="discountSub" name="discount" required>

                                                                        <br>
                                                                        <label for="status" class="form-label">Trạng
                                                                            Thái</label>
                                                                        <select name="status" id="statusSub"
                                                                            class="form-control">
                                                                            <option value="1">Hoạt Động</option>
                                                                            <option value="2">Không HĐ</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Hủy</button>
                                                                    <button type="submit" class="btn btn-primary">Lưu
                                                                        thay
                                                                        đổi</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div> --}}
                                                

                                                {{-- <div class="modal fade" id="editSubModal2" tabindex="-1"
                                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <!-- Nội dung modal -->
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">Sửa Danh Mục
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('admin.categories.updateSubCategory') }}">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <input type="hidden" id="idSub2"
                                                                            name="id">
                                                                        <input type="hidden" id="slugSub2"
                                                                            name="slug">
                                                                        <label for="name" class="form-label">Tên
                                                                            Danh
                                                                            Mục</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nameSub2" name="name" required>


                                                                        <br>
                                                                        <label for="discount" class="form-label">Chiết
                                                                            Khấu
                                                                            Sàn (%)</label>
                                                                        <input type="text" class="form-control"
                                                                            id="discountSub2" name="discount" required>

                                                                        <br>
                                                                        <label for="status" class="form-label">Trạng
                                                                            Thái</label>
                                                                        <select name="status" id="statusSub2"
                                                                            class="form-control">
                                                                            <option value="1">Hoạt Động</option>
                                                                            <option value="2">Không HĐ</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Hủy</button>
                                                                    <button type="submit" class="btn btn-primary">Lưu
                                                                        thay
                                                                        đổi</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div> --}}

                                               
                                                <!-- Hiển thị các mục con của mục con (nếu có) -->
                                                {{-- @foreach ($subChild->children as $subChild2)
                                                    <tr>
                                                        <td>

                                                            {!! str_repeat('&nbsp;', $subChild2->level * 4) !!}
                                                            Cấp 4
                                                            <img src="{{ asset('assets/images/logos/lang-logo/chatgpt.png') }}"
                                                                alt=""
                                                                class="rounded-circle thumb-md me-1 d-inline">
                                                            <!-- Thụt lề tiếp -->
                                                            {{ $subChild2->name }}
                                                        </td>
                                                        <td>{{ $subChild2->children->count() }}</td>
                                                        @if ($subChild2->discount == 0)
                                                            <td><span
                                                                    class="badge bg-success-subtle text-success fs-11 fw-medium px-2">Không</span>
                                                            </td>
                                                        @else
                                                            <td><span
                                                                    class="badge bg-danger-subtle text-danger fs-11 fw-medium px-2">{{ $subChild2->discount }}%</span>
                                                            </td>
                                                        @endif
                                                        @if ($subChild2->status == 1)
                                                            <td><span class="badge bg-success">Hoạt Động</span></td>
                                                        @else
                                                            <td><span class="badge bg-danger">Không HĐ</span></td>
                                                        @endif
                                                        <td class="text-end">
                                                            <div class="dropdown d-inline-block">
                                                                <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                                    data-bs-toggle="dropdown" href="#"
                                                                    role="button" aria-haspopup="false"
                                                                    aria-expanded="false">
                                                                    <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-end"
                                                                    aria-labelledby="dLabel11">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.categories.detailCategory', ['slug' => $subChild2->slug]) }}">Chi
                                                                        Tiết</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach --}}
                                            @endforeach
                                        @endforeach
                                        <div class="modal fade" id="editSubModal2" tabindex="-1"
                                        aria-labelledby="editSubModal2Label" aria-hidden="true">
                                        <!-- Nội dung modal -->
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editSubModal2Label">Sửa Danh
                                                        Mục</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('admin.categories.updateSubCategory') }}">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <!-- Hidden fields to store the ID and slug -->
                                                            <input type="hidden" id="idSub2"
                                                                name="id">
                                                            <input type="hidden" id="slugSub2"
                                                                name="slug">

                                                            <!-- Name input -->
                                                            <label for="nameSub2" class="form-label">Tên Danh
                                                                Mục</label>
                                                            <input type="text" class="form-control"
                                                                id="nameSub2" name="name" required>

                                                            <br>

                                                            <!-- Discount input -->
                                                            <label for="discountSub2" class="form-label">Chiết
                                                                Khấu Sàn (%)</label>
                                                            <input type="number" class="form-control"
                                                                id="discountSub2" name="discount" required
                                                                min="0" max="100">

                                                            <br>

                                                            <!-- Status input -->
                                                            <label for="statusSub2" class="form-label">Trạng
                                                                Thái</label>
                                                            <select name="status" id="statusSub2"
                                                                class="form-control">
                                                                <option value="1">Hoạt Động</option>
                                                                <option value="2">Không HĐ</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Hủy</button>
                                                        <button type="submit" class="btn btn-primary">Lưu
                                                            thay đổi</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="modal fade" id="editSubModal" tabindex="-1"
                                                    aria-labelledby="editSubModalLabel" aria-hidden="true">
                                                    <!-- Nội dung modal -->
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editSubModalLabel">Sửa Danh
                                                                    Mục</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('admin.categories.updateSubCategory') }}">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <!-- Hidden fields to store the ID and slug -->
                                                                        <input type="hidden" id="idSub"
                                                                            name="id">
                                                                        <input type="hidden" id="slugSub"
                                                                            name="slug">

                                                                        <!-- Name input -->
                                                                        <label for="nameSub" class="form-label">Tên Danh
                                                                            Mục</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nameSub" name="name" required>

                                                                        <br>

                                                                        <!-- Discount input -->
                                                                        <label for="discountSub" class="form-label">Chiết
                                                                            Khấu Sàn (%)</label>
                                                                        <input type="number" class="form-control"
                                                                            id="discountSub" name="discount" required
                                                                            min="0" max="100">

                                                                        <br>

                                                                        <!-- Status input -->
                                                                        <label for="statusSub" class="form-label">Trạng
                                                                            Thái</label>
                                                                        <select name="status" id="statusSub"
                                                                            class="form-control">
                                                                            <option value="1">Hoạt Động</option>
                                                                            <option value="2">Không HĐ</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Hủy</button>
                                                                    <button type="submit" class="btn btn-primary">Lưu
                                                                        thay đổi</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                    </tbody>
                                </table><!--end /table-->
                            </div><!--end /tableresponsive-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->

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
                                    <h4 class="card-title">Thêm Danh Mục Con</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <form action="{{ route('admin.categories.addSubCategory') }}" method="POST">
                                @csrf
                                <input type="hidden" name="slug" value="{{ $detailCategory->slug }}">
                                <div class="mb-3 row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Chọn Danh Mục
                                        Cha</label>
                                    <div class="col-sm-10">
                                        {{-- <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Name Category" value="{{ $detailCategory->name }}"> --}}
                                        <select name="parent_id" id="parent_id" class="form-control">
                                            <option value="" selected>Chọn Danh Mục Cha</option>
                                            <option value="{{ $detailCategory->id }}">{{ $detailCategory->name }}
                                            </option>
                                            @foreach ($detailCategory->children as $child)
                                                <option value="{{ $child->id }}">{{ $child->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Tên Danh Mục Con</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Name Category">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Chiết Khấu</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="discount" name="discount"
                                            placeholder="Enter Discount Category">
                                        <div class="text-danger" id="discountError">
                                            Vui lòng nhập giá trị chiết khấu hợp lệ từ 0 - 5% .
                                        </div>
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
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->
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
            document.addEventListener('DOMContentLoaded', function() {
                const editBtns = document.querySelectorAll('.edit-btn');

                editBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        // Lấy dữ liệu từ thuộc tính data-*
                        const id = btn.getAttribute('data-id');
                        const name = btn.getAttribute('data-name');
                        const discount = btn.getAttribute('data-discount');
                        const status = btn.getAttribute('data-status');
                        const slug = btn.getAttribute('data-slug');

                        // Cập nhật giá trị vào modal
                        document.getElementById('id').value = id; // ID
                        document.getElementById('name').value = name; // Name
                        document.getElementById('discount').value = discount; // Discount
                        document.getElementById('status').value = status; // Discount
                        document.getElementById('slug').value = slug; // Discount

                        // Mở modal
                        var myModal = new bootstrap.Modal(document.getElementById('editModal'));
                        myModal.show();
                    });
                });
            });

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
            document.addEventListener('DOMContentLoaded', function() {
                const editBtnsSub = document.querySelectorAll('.edit-btnSub');

                editBtnsSub.forEach(btn => {
                    btn.addEventListener('click', function() {
                        // Lấy dữ liệu từ thuộc tính data-*
                        const idSub = btn.getAttribute('data-id');
                        const nameSub = btn.getAttribute('data-name');
                        const discountSub = btn.getAttribute('data-discount');
                        const statusSub = btn.getAttribute('data-status');
                        const slugSub = btn.getAttribute('data-slug');

                        // Cập nhật giá trị vào các trường trong modal
                        document.getElementById('idSub').value = idSub;
                        document.getElementById('nameSub').value = nameSub;
                        document.getElementById('discountSub').value = discountSub;
                        document.getElementById('statusSub').value = statusSub;
                        document.getElementById('slugSub').value = slugSub;

                        // Mở modal
                        var myModal = new bootstrap.Modal(document.getElementById('editSubModal'));
                        myModal.show();
                    });
                });
            });

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
