<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Comment_post;
use App\Models\Post;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostClientController extends Controller
{

    public function listPost()
    {

        // Truy vấn danh mục cha, con, và cháu đang hoạt động
        $categories = Categories::whereNull('parent_id')
            ->where('status', 1)
            ->with([
                'children' => function ($query) {
                    $query->where('status', 1)
                        ->with('children', function ($subQuery) {
                            $subQuery->where('status', 1);
                        });
                }
            ])->get();

        $listPost = Post::with('user')->where('status', 2)->orderBy('created_at', 'desc')->paginate(9); // Lấy shop và user tương ứng
        return view('client.contents.posts.listPost', compact('listPost', 'categories'));
    }

    public function detailPost($slug)
    {

        // Truy vấn danh mục cha, con, và cháu đang hoạt động
        $categories = Categories::whereNull('parent_id')
            ->where('status', 1)
            ->with([
                'children' => function ($query) {
                    $query->where('status', 1)
                        ->with('children', function ($subQuery) {
                            $subQuery->where('status', 1);
                        });
                }
            ])->get();


        // Tìm bài viết theo slug
        $post = Post::where('slug', $slug)->first();

        $postId = $post->id;
        $comment_post = Comment_post::where('id_post', $postId)->paginate(4);
        $Count_comment = Comment_post::where('id_post', $postId)->count();
        // Kiểm tra nếu bài viết không tồn tại
        if (!$post) {
            return redirect()->route('home')->with('error', 'Bài viết không tồn tại.');
        }

        // Tăng lượt xem bài viết
        $post->increment('view');

        // Trả về view chi tiết bài viết
        return view('client.contents.posts.detailPost', compact('post', 'categories', 'comment_post', 'Count_comment'));
    }



    public function Comment_donate_post(Request $request)
    {
        // Validate dữ liệu form
        $request->validate([
            'donate' => 'required|numeric|min:1000', // Tối thiểu 1.000đ
            'content' => 'required|string|max:300',
            'id_post' => 'required|integer', // ID bài viết
        ], [
            'donate.numeric' => 'Số tiền ủng hộ phải là số.',
            'donate.min' => 'Số tiền ủng hộ tối thiểu là 1.000đ.',
            'donate.required' => 'Số tiền ủng hộ không được để trống.',
            'content.required' => 'Nội dung bình luận không được để trống.',
            'content.max' => 'Nội dung bình luận tối đa 300 kí tự.',
        ]);

        $user = Auth::user(); // Lấy người dùng đang đăng nhập

        // Tìm ví của người dùng donate
        $wallet = Wallet::where('id_user', $user->id)->first();
        if (!$wallet || $wallet->cash < $request->donate) {
            return back()->with('error', 'Số dư trong ví của bạn không đủ để ủng hộ.');
        }

        // Tìm bài viết và người viết bài
        $post = Post::findOrFail($request->id_post);

        // Kiểm tra xem người dùng có tự donate cho chính họ hay không
        if ($post->id_user === $user->id) {
            // Trừ 10% từ ví của chính họ
            $wallet->cash -= $request->donate * 0.1;
            $wallet->save();
        } else {
            // Tìm ví của người viết bài
            $authorWallet = Wallet::where('id_user', $post->id_user)->first();
            if (!$authorWallet) {
                return back()->with('error', 'Người viết bài không có ví.');
            }

            // Tính số tiền người viết bài nhận được (90%)
            $amountForAuthor = $request->donate * 0.9;

            // Trừ tiền từ ví người donate
            $wallet->cash -= $request->donate;
            $wallet->save();

            // Cộng tiền vào ví người viết bài
            $authorWallet->cash += $amountForAuthor;
            $authorWallet->save();
        }

        // Tạo bình luận mới
        Comment_post::create([
            'id_post' => $request->id_post,
            'id_user' => $user->id,
            'content' => $request->content,
            'donate' => $request->donate,
        ]);

        return back()->with('success', 'Bình luận đã được gửi, cảm ơn bạn đã ủng hộ tác giả.');
    }

    public function showAddPost()
    {
        // Truy vấn danh mục cha, con, và cháu đang hoạt động
        $categories = Categories::whereNull('parent_id')
            ->where('status', 1)
            ->with([
                'children' => function ($query) {
                    $query->where('status', 1)
                        ->with('children', function ($subQuery) {
                            $subQuery->where('status', 1);
                        });
                }
            ])->get();
        return view('client.contents.posts.addPost', compact('categories'));
    }

    // public function addPost(Request $request)
    // {

    //     $user = Auth::user(); // Lấy người dùng đang đăng nhập
    //     $username = $user->username;
    //     // Validate dữ liệu form
    //     $request->validate([
    //         'title' => 'required|string|max:100',
    //         'content' => 'required|string',
    //         'category' => 'required|string|max:255',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Upload ảnh
    //     ], [
    //         'title.required' => 'Tiêu đề không được để trống.',
    //         'content.required' => 'Nội dung không được để trống.',
    //         'category.required' => 'Danh mục không được để trống.',
    //         'image.required' => 'Ảnh không được để trống.',
    //         'image.image' => 'File tải lên phải là hình ảnh.',
    //         'image.max' => 'Kích thước hình ảnh không được quá 2MB.',
    //     ]);

    //     // Xử lý ảnh nếu có
    //     // $imagePath = null;
    //     // if ($request->hasFile('image')) {
    //     //     $image = $request->file('image');
    //     //     $imageName = time() . '_' . $image->getClientOriginalName();
    //     //     $imagePath = $image->storeAs('uploads/images', $imageName, 'public');
    //     // } 

    //     $imagePath = '';
    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $nameImage = time() . "." . $image->getClientOriginalExtension();
    //         $link = "images/";
    //         $image->move(public_path($link), $nameImage);
    //         $imagePath = $link . $nameImage;
    //     }


    //     // Tạo bài viết mới
    //     Post::create([
    //         'title' => $request->title,
    //         // 'slug' => Str::slug($request->title, '-'), // Tạo slug tự động
    //         'slug' => Str::slug($request->title, '-') . '-' . mt_rand(1000, 9999),
    //         'content' => $request->content,
    //         'id_user' => auth()->id(), // Lấy ID người dùng đăng nhập
    //         'status' => $request->status ?? 1, // Mặc định là 1 (chưa duyệt)
    //         'view' => 0, // Lượt xem mặc định là 0
    //         'image' => $imagePath, // Đường dẫn ảnh
    //         'category' => $request->category,
    //     ]);

    //     return redirect()->route('detailUser', ['username' => $username])
    //              ->with('success', 'Bài viết đã được thêm thành công.');

    // }


    public function showEditPost($slug)
    {
        // Truy vấn danh mục cha, con, và cháu đang hoạt động
        $categories = Categories::whereNull('parent_id')
            ->where('status', 1)
            ->with([
                'children' => function ($query) {
                    $query->where('status', 1)
                        ->with('children', function ($subQuery) {
                            $subQuery->where('status', 1);
                        });
                }
            ])->get();
        // Tìm bài viết theo slug
        $post = Post::where('slug', $slug)->first();
        return view('client.contents.posts.editPost', compact('categories', 'post'));
    }


    public function addPost(Request $request)
    {
        $user = Auth::user(); // Lấy người dùng đang đăng nhập
        $username = $user->username;

        // Validate dữ liệu form
        $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string',
            'category' => 'required|string',
            'croppedImage' => 'required|string', // Kiểm tra dữ liệu base64 từ ảnh đã cắt
        ], [
            'title.max' => 'Tiêu đề không được quá 100 kí tự.',
            'title.required' => 'Tiêu đề không được để trống.',
            'content.required' => 'Nội dung không được để trống.',
            'category.required' => 'Danh mục không được để trống.',
            'croppedImage.required' => 'Ảnh không được để trống.',
        ]);

        // Xử lý ảnh cắt
        $croppedImage = $request->croppedImage; // Nhận dữ liệu base64 từ input hidden
        $imagePath = '';

        if ($croppedImage) {
            // Tách phần header base64 và nội dung
            list($type, $croppedImage) = explode(';', $croppedImage);
            list(, $croppedImage) = explode(',', $croppedImage);

            // Kiểm tra xem dữ liệu có phải base64 hợp lệ không
            if (base64_encode(base64_decode($croppedImage, true)) === $croppedImage) {
                // Giải mã base64 về dạng nhị phân
                $croppedImage = base64_decode($croppedImage);

                // Đặt tên file và đường dẫn lưu
                $imageName = time() . '.jpg';
                $imagePath = 'images/posts/' . $imageName;

                // Lưu file vào thư mục public
                file_put_contents(public_path($imagePath), $croppedImage);
            } else {
                return back()->withErrors(['croppedImage' => 'Dữ liệu ảnh không hợp lệ.']);
            }
        }

        // Tạo slug tự động và kiểm tra slug đã tồn tại chưa
        $slug = Str::slug($request->title, '-') . '-' . mt_rand(1000, 9999);
        while (Post::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->title, '-') . '-' . mt_rand(1000, 9999); // Tạo slug mới nếu trùng
        }

        // Tạo bài viết mới
        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'id_user' => auth()->id(), // Lấy ID người dùng đăng nhập
            'status' => $request->status ?? 1, // Mặc định là 1 (chưa duyệt)
            'view' => 0, // Lượt xem mặc định là 0
            'image' => $imagePath, // Đường dẫn ảnh đã cắt
            'category' => $request->category,
        ]);

        // Điều hướng sau khi lưu bài viết thành công
        return redirect()->route('detailUser', ['username' => $username])
            ->with('success', 'Bài viết đã được thêm thành công.');
    }
 
    public function updatePost(Request $request, $slug)
    {
        $user = Auth::user(); // Lấy người dùng đang đăng nhập
        $username = $user->username;

        // Validate dữ liệu form
        $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string',
            'category' => 'required|string',
            'croppedImage' => 'nullable|string', // Không bắt buộc nếu không thay đổi ảnh
        ], [
            'title.max' => 'Tiêu đề không được quá 100 kí tự.',
            'title.required' => 'Tiêu đề không được để trống.',
            'content.required' => 'Nội dung không được để trống.',
            'category.required' => 'Danh mục không được để trống.',
        ]);

        // Lấy bài viết cần cập nhật
        $post = Post::where('slug', $slug)->firstOrFail();


        // Xử lý ảnh cắt (nếu có)
        $imagePath = $post->image; // Giữ nguyên đường dẫn ảnh cũ nếu không có ảnh mới
        $croppedImage = $request->croppedImage;

        if ($croppedImage) {
            // Tách phần header base64 và nội dung
            list($type, $croppedImage) = explode(';', $croppedImage);
            list(, $croppedImage) = explode(',', $croppedImage);

            // Kiểm tra xem dữ liệu có phải base64 hợp lệ không
            if (base64_encode(base64_decode($croppedImage, true)) === $croppedImage) {
                // Giải mã base64 về dạng nhị phân
                $croppedImage = base64_decode($croppedImage);

                // Đặt tên file và đường dẫn lưu
                $imageName = time() . '.jpg';
                $imagePath = 'images/posts/' . $imageName;

                // Lưu file vào thư mục public
                file_put_contents(public_path($imagePath), $croppedImage);

                // Xóa ảnh cũ nếu có
                if ($post->image && file_exists(public_path($post->image))) {
                    unlink(public_path($post->image));
                }
            } else {
                return back()->withErrors(['croppedImage' => 'Dữ liệu ảnh không hợp lệ.']);
            }
        }

        // Tạo slug mới (nếu tiêu đề thay đổi)
        if ($post->title !== $request->title) {
            $slug = Str::slug($request->title, '-') . '-' . mt_rand(1000, 9999);
            while (Post::where('slug', $slug)->exists()) {
                $slug = Str::slug($request->title, '-') . '-' . mt_rand(1000, 9999); // Tạo slug mới nếu trùng
            }
        } else {
            $slug = $post->slug; // Giữ nguyên slug cũ nếu tiêu đề không thay đổi
        }

        // Cập nhật bài viết
        $post->update([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'image' => $imagePath,
            'category' => $request->category,
        ]);

        // Điều hướng sau khi cập nhật bài viết thành công
        return redirect()->route('detailUser', ['username' => $username])
            ->with('success', 'Bài viết đã được cập nhật thành công.');
    }
}
