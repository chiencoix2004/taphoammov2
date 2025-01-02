<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Post;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function detailUser($username)
    {
        $categories = Categories::whereNull('parent_id')
            ->where('status', 1) // Chỉ lấy danh mục cha đang hoạt động
            ->with([
                'children' => function ($query) {
                    $query->where('status', 1) // Chỉ lấy danh mục con đang hoạt động
                        ->with([
                            'children' => function ($subQuery) {
                                $subQuery->where('status', 1); // Chỉ lấy danh mục cháu đang hoạt động
                            }
                        ]);
                }
            ])->get();
        // $listBank = Bank::where('status', 1)->get();   
        $user = User::where('username', $username)->first(); 
        $userId = $user->id;

        $postUserHidden = Post::where('id_user', $userId)->where('status', 1)->orderBy('created_at', 'desc')->get();
        $postUser = Post::where('id_user', $userId)->where('status', 2)->orderBy('created_at', 'desc')->get();
        $totalPostUser = Post::where('id_user', $userId)->where('status', 2)->orderBy('created_at', 'desc')->count();
        $listShopUser = Shop::where('id_user', $userId)->where('status', 2)->get();
        $totalShops = Shop::where('id_user', $userId)->where('status', 2)->count();
        
        return view('client.contents.users.profile')->with([
            'categories' => $categories,
            'user' => $user,
            'listShopUser' => $listShopUser,
            'totalShops' => $totalShops,
            'postUser' => $postUser,
            'postUserHidden' => $postUserHidden,
            'totalPostUser' => $totalPostUser,
        ]);
    }

    public function updateProfile(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'fullname' => 'required|string|max:25',
        ]);

        // Lấy user hiện tại
        $user = Auth::user();

        // Kiểm tra nếu user tồn tại
        if ($user) {
            // Cập nhật thông tin fullname
            $user->fullname = $request->input('fullname');
            $user->save();

            // Trả về thông báo thành công
            return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
        }

        // Nếu user không tồn tại
        return redirect()->back()->with('error', 'Không tìm thấy người dùng.');
    }
    
}
