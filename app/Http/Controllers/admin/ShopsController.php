<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
    // public function listShop()
    // {

    //     $shops = Shop::where('status', 1)->get();

    //     // Truyền dữ liệu sang view
    //     return view('admin.contents.shops.listShop', compact('shops'));
    // }
    public function listShop1()
    {
        $shops = Shop::with('user', 'category')->where('status', 1)->orderBy('created_at', 'desc')->paginate(15); // Lấy shop và user tương ứng
        return view('admin.contents.shops.listShop', compact('shops'));
    }
    public function listShopStatus2()
    {
        $shops = Shop::with('user', 'category')->where('status', 2)->orderBy('created_at', 'desc')->paginate(15); // Lấy shop và user tương ứng
        return view('admin.contents.shops.listShopStatus2', compact('shops'));
    }
    public function listShopStatus3()
    {
        $shops = Shop::with('user', 'category')->where('status', 3)->orderBy('created_at', 'desc')->paginate(15); // Lấy shop và user tương ứng
        return view('admin.contents.shops.listShopStatus3', compact('shops'));
    }
    public function detailShop($slug,$status)
    {
        // Lấy chi tiết shop bao gồm sản phẩm, người dùng, danh mục và comment
        $detailShop = Shop::with('user', 'category', 'product')->where('slug', $slug)->first();
        // Đếm số lượng bình luận của shop
        $commentCount = $detailShop->comments->count();  // 'comments' là mối quan hệ trong model Shop
        // Đếm số lượng bình luận trong tuần
        $commentCountThisWeek = $detailShop->comments()->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),  // Ngày đầu tuần
            Carbon::now()->endOfWeek()      // Ngày cuối tuần
        ])->count();
        $comments = $detailShop->comments()->paginate(5);

        // Tăng lượt xem của shop
        $detailShop->increment('view');

        // Trả lại view với thông tin shop và các bình luận phân trang
        return view('admin.contents.shops.detailShop')
            ->with('detailShop', $detailShop)
            ->with('commentCount', $commentCount)
            ->with('commentCountThisWeek', $commentCountThisWeek)
            ->with('comments', $comments)
            ->with('status', $status);  // Truyền các bình luận đã phân trang
    }

    // public function updateStatusShop() {
        
    // }
    public function updateStatusShop(Request $request)
{
    // Xác thực dữ liệu (nếu cần)
    $request->validate([
        'shop_id' => 'required|exists:shops,id',
        'status' => 'required|in:1,2,3',  // Giới hạn trạng thái hợp lệ
    ]);

    // Tìm shop và cập nhật trạng thái
    $shop = Shop::findOrFail($request->shop_id);
    $shop->status = $request->status;
    $shop->save();

    // Chuyển hướng với thông báo thành công
    return redirect()->back()->with('success', 'Trạng thái của gian hàng đã được cập nhật thành công.');
}

}
