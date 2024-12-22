 @extends('client.layouts.main')
 @section('content')
     <!-- ==========Page Header Section Start Here========== -->
     <section class="page-header-section style-1">
         <div class="container">
             <div class="page-header-content">
                 <div class="page-header-inner">
                     <div class="page-title">
                         <h2>Chi tiết bài viết</h2>
                     </div>
                     <ol class="breadcrumb">
                         <li><a href="{{ route('home') }}">Home</a></li>
                         <li class="active">Chi tiết bài viết</li>
                     </ol>
                 </div>
             </div>
         </div>
     </section>
     <!-- ==========Page Header Section Ends Here========== -->


     <!-- ==========Blog Section start Here========== -->
     <section class="blog-section padding-top padding-bottom">
         <div class="container">
             <div class="main-blog">
                 <div class="row g-5">
                     <div class="col-xl-9 col-12">
                         <div class="blog-wrapper">
                             <div class="post-item">
                                 <div class="post-item-inner">
                                     <div class="post-thumb">
                                         @if ($post->image == null)
                                             <img src="{{ asset('assetsClient/images/blog/01.gif') }}" alt="blog">
                                         @else
                                             <img src="{{ asset($post->image) }}" alt="blog">
                                         @endif
                                     </div>
                                     <div class="post-content">
                                         <span class="meta">By {{ $post->user->username }}&nbsp&nbsp&nbsp<i
                                                 class="icofont-ui-calendar"></i>{{ $post->created_at }}&nbsp&nbsp&nbsp
                                             <i class="icofont-eye"></i>Lượt xem {{ $post->view }}</span>
                                         <h3>{{ $post->title }}</h3>
                                         <p>{!! $post->content !!}</p>
                                         {{-- <blockquote>
                                             <p>Steal into The inner Sanc Thro Myse Down Amon The Hall Gras Buzz The
                                                 Little World Amon The Staks And Grow Famar With Count And Fies Then
                                                 The Presence of The Almighty Among The Staks </p>
                                         </blockquote> --}}
                                         <p></p>
                                     </div>
                                     <div class="tags-section">
                                         <ul class="tags">
                                             <li><span><i class="icofont-tags"></i></span></li>
                                             <li><a href="#!">NFT</a></li>
                                             <li><a href="#!">Token</a></li>
                                             <li><a href="#!">Crypto</a></li>
                                             <li><a href="#!">Ethereum</a></li>
                                         </ul>
                                         <ul class="social-link-list d-flex flex-wrap">
                                             <li><a href="#!" class="facebook"><i class="icofont-facebook"></i></a>
                                             </li>
                                             <li><a href="#!" class="dribble"><i class="icofont-dribble"></i></a></li>
                                             <li><a href="#!" class="twitter"><i class="icofont-twitter"></i></a></li>
                                             <li><a href="#!" class="linkedin"><i class="icofont-linkedin"></i></a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                             <div id="comments" class="comments">
                                 <div class="widget-title">
                                     <h3>({{ $Count_comment }}) Bình Luận</h3>
                                 </div>
                                 <ul class="comment-list">
                                     @foreach ($comment_post as $item)
                                         <li class="comment" id="li-comment-2">
                                             <div class="com-image">
                                                 @if ($item->user->image == null)
                                                     <img alt="author"
                                                         src="{{ asset('assetsClient/images/seller/04.png') }}"
                                                         class="avatar" height="70" width="70">
                                                 @else
                                                     <img alt="author" src="{{ asset($item->user->image) }}"
                                                         class="avatar" height="70" width="70">
                                                 @endif
                                             </div>
                                             <div class="com-content">
                                                 <div class="com-title">
                                                     <div class="com-title-meta">
                                                         <h4><a href="#" rel="external nofollow"
                                                                 class="url">{{ $item->user->username }}</a> - <img
                                                                 width="24" height="24"
                                                                 src="https://img.icons8.com/flat-round/50/cheap-2--v1.png"
                                                                 alt="cheap-2--v1" /> Donate:
                                                             {{ number_format($item->donate, 0, ',', '.') }} đ</h4>
                                                         <span>{{ $item->created_at }}</span>
                                                     </div>
                                                     <span class="reply">
                                                         <a rel="nofollow" class="comment-reply-link" href="#!"><i
                                                                 class="icofont-reply-all"></i>
                                                             Trả Lời</a>
                                                     </span>
                                                 </div>
                                                 <p>{{ $item->content }}</p>
                                             </div>
                                         </li>
                                     @endforeach
                                 </ul>

                             </div>

                             <div class="paginations">
                                 <ul class="lab-ul d-flex flex-wrap justify-content-center mb-1">
                                     <li>
                                         {{ $comment_post->links('pagination::bootstrap-4') }}
                                     </li>
                                 </ul>
                             </div>
                             <div id="respond" class="comment-respond">
                                 <div class="add-comment">
                                     <div class="widget-title">
                                         <h3>Gửi Bình Luận</h3>
                                     </div>



                                     {{-- <form action="{{ route('Comment_donate_post') }}" method="post" id="commentform"
                                         class="comment-form" novalidate="">
                                         @csrf
                                         <input type="hidden" name="id_post" value="{{ $post->id }}">
                                         <!-- ID bài viết -->

                                         <div class="row w-100 g-3">
                                             <div class="col-12">
                                                 <div class="form-floating w-100">
                                                     <input type="number" class="w-100 comment-input form-control"
                                                         name="donate" id="cmntSub" placeholder="Tối thiểu 1k"
                                                         min="1000">
                                                     <label for="cmntSub">Ủng Hộ Tác Giả (Min 1.000đ)</label>
                                                 </div>
                                                 @error('donate')
                                                     <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                             </div>
                                             <div class="col-12">
                                                 <div class="form-floating w-100 mb-4">
                                                     <textarea class="form-control" name="content" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                     <label for="floatingTextarea">Nội Dung</label>
                                                 </div>
                                                 @error('content')
                                                     <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                             </div>
                                             <button class="default-btn move-right" type="submit"><span>Gửi Bình
                                                     Luận</span></button>
                                         </div>
                                     </form> --}}
                                     @if (Auth::check())
                                         <!-- Hiển thị form nếu đã đăng nhập -->
                                         <form action="{{ route('Comment_donate_post') }}" method="post"
                                             class="comment-form" novalidate="" id="statusForm">
                                             @csrf
                                             <input type="hidden" name="id_post" value="{{ $post->id }}">
                                             <!-- ID bài viết -->

                                             <div class="row w-100 g-3">
                                                 @if (session('success'))
                                                     <div class="alert alert-success">
                                                         {{ session('success') }}
                                                     </div>
                                                 @endif

                                                 @if (session('error'))
                                                     <div class="alert alert-danger">
                                                         {{ session('error') }}
                                                     </div>
                                                 @endif
                                                 <div class="col-12">
                                                     <div class="form-floating w-100">
                                                         <input type="number" class="w-100 comment-input form-control"
                                                             name="donate" id="cmntSub" placeholder="Tối thiểu 1k"
                                                             min="1000">
                                                         <label for="cmntSub">Ủng Hộ Tác Giả (Min 1.000đ)</label>
                                                     </div>
                                                     @error('donate')
                                                         <span class="text-danger">{{ $message }}</span>
                                                     @enderror
                                                 </div>
                                                 <div class="col-12">
                                                     <div class="form-floating w-100 mb-4">
                                                         <textarea class="form-control" name="content" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                         <label for="floatingTextarea">Nội Dung</label>
                                                     </div>
                                                     @error('content')
                                                         <span class="text-danger">{{ $message }}</span>
                                                     @enderror
                                                 </div>
                                                 <button class="default-btn move-right" onclick="confirmSubmit()"
                                                     type="button"><span>Gửi
                                                         Bình
                                                         Luận</span></button>
                                             </div>
                                         </form>
                                     @else
                                         <!-- Hiển thị thông báo nếu chưa đăng nhập -->
                                         <div class="alert alert-warning text-center">
                                             Vui lòng <a style="color: red" href="{{ route('showLoginForm') }}">đăng
                                                 nhập</a> để gửi bình
                                             luận.
                                         </div>
                                     @endif

                                 </div>
                             </div>
                         </div>
                     </div>
                     @include('client.contents.posts.sibarPost')
                 </div>
             </div>
         </div>
     </section>

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

     <!-- ==========Blog Section ends Here========== -->
 @endsection
