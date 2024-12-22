<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function listPost1()
    {
        $post = Post::with('user')->where('status', 1)->orderBy('created_at', 'desc')->paginate(15); // Lấy shop và user tương ứng
        return view('admin.contents.posts.listPost1', compact('post'));
    }
    public function listPost2()
    {
        $post = Post::with('user')->where('status', 2)->orderBy('created_at', 'desc')->paginate(15); // Lấy shop và user tương ứng
        return view('admin.contents.posts.listPost2', compact('post'));
    }

    public function detailPost($slug, $status)
    {
        // Lấy chi tiết shop bao gồm sản phẩm, người dùng, danh mục và comment
        $detailPost = Post::with('user')->where('slug', $slug)->first();

        // Tăng lượt xem của shop
        $detailPost->increment('view');

        // Trả lại view với thông tin shop và các bình luận phân trang
        return view('admin.contents.posts.detailPost')
            ->with('detailPost', $detailPost);
    }

    public function updateStatusPost(Request $request)
    {
        // Xác thực dữ liệu (nếu cần)
        $request->validate([
            'id' => 'required|exists:posts,id',
            'status' => 'required|in:1,2,3',  // Giới hạn trạng thái hợp lệ
        ]);

        // Tìm shop và cập nhật trạng thái
        $post = Post::findOrFail($request->id);
        $post->status = $request->status;
        $post->save();

        // Chuyển hướng với thông báo thành công
        return redirect()->back()->with('success', 'Trạng thái của post đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Xóa bài viết
        $post->delete();

        // Chuyển hướng với thông báo
        return redirect()->route('admin.posts.listPost1')->with('success', 'Bài viết đã được xóa thành công.');
    }

    public function destroy2($id)
    {
        $post = Post::findOrFail($id);

        // Xóa bài viết
        $post->delete();

        // Chuyển hướng với thông báo
        return redirect()->route('admin.posts.listPost2')->with('success', 'Bài viết đã được xóa thành công.');
    }
}
