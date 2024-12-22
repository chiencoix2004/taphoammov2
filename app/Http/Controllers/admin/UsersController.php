<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function listUser()
    {
        $listUser = User::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.contents.users.listUser')
            ->with(['listUser' => $listUser]);
    }
    // public function detailUser($username)
    // {

    //   $detailUser = User::where('username', $username)->first();

    //   return view('admin.contents.users.detailUser')
    //     ->with('detailUser', $detailUser);
    // }

    public function detailUser($username)
    {
        // Lấy thông tin người dùng theo username
        $detailUser = User::where('username', $username)->first();

        // Lấy thông tin ví của người dùng đó (nếu có)
        $wallet = $detailUser->wallet; // Sử dụng quan hệ đã thiết lập

        // Truyền thông tin ví vào view
        return view('admin.contents.users.detailUser', compact('detailUser', 'wallet'));
    }

    public function updateUser(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validatedData = $request->validate([
            'cash' => 'nullable|numeric|min:0', // Số dư phải là số và không âm
        ]);

        // Lấy thông tin người dùng từ request
        $userId = $request->input('id'); // Ví dụ lấy ID của người dùng đã đăng nhập
        $cash = $request->input('cash');
        $status = $request->input('status');
        $role = $request->input('role');

        // Cập nhật ví của người dùng (nếu có)
        $wallet = Wallet::where('id_user', $userId)->first();
        if ($wallet) {
            // Nếu ví đã tồn tại, cập nhật số dư
            $wallet->cash = $cash ?? $wallet->cash; // Nếu cash không có giá trị thì giữ nguyên giá trị cũ
            $wallet->save();
        } else {
            // Nếu ví chưa tồn tại, tạo mới ví
            Wallet::create([
                'id_user' => $userId,
                'id_wallet' => uniqid(), // Giả sử tạo id_wallet tự động
                'cash' => $cash ?? 0,  // Số dư mặc định là 0 nếu không có giá trị
            ]);
        }

        // Cập nhật thông tin người dùng (tùy thuộc vào yêu cầu)
        $user = User::find($userId);
        $user->status = $status;
        $user->role = $role;
        $user->save();

        // Trả về thông báo thành công
        return redirect()->route('admin.users.detailUser', ['username' => $user->username])
            ->with('message', 'Cập nhật thông tin thành công!');
    }

    //     public function addUser(Request $request)
    // {
    //     // 1. Validate dữ liệu form
    //     $validator = Validator::make($request->all(), [
    //         'fullname' => 'required|string|max:30',
    //         'username' => 'required|string|unique:users,username|max:20',
    //         'email'    => 'required|email|unique:users,email',
    //         'password' => 'required|string|min:6',
    //         'role'     => 'required|in:1,2,3',
    //         'status'   => 'required|in:active,inactive,banned',
    //         'image'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Giới hạn 2MB cho ảnh
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     // 2. Upload ảnh đại diện (nếu có)
    //     $avatarPath = null;
    //     if ($request->hasFile('image')) {
    //         // $avatarPath = $request->file('image')->store('avatars', 'public');
    //         $avatarPath = $request->file('image')->store('avatars', 'public');

    //     }

    //     // 3. Tạo người dùng mới
    //     User::create([
    //         'fullname' => $request->fullname,
    //         'username' => $request->username,
    //         'email'    => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role'     => $request->role,
    //         'status'   => $request->status,
    //         'image'   => $avatarPath,
    //     ]);

    //     // 4. Chuyển hướng sau khi thêm thành công
    //     return redirect()->route('admin.contents.users.listUser')->with('success', 'Thêm tài khoản thành công!');
    // }



    public function addUser(Request $request)
    {
        // 1. Validate dữ liệu form
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:30',
            'username' => 'required|string|unique:users,username|max:20',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:1,2,3',
            'status'   => 'required|in:active,inactive,banned',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Giới hạn 2MB cho ảnh
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // // 2. Upload ảnh đại diện (nếu có)
        // $avatarPath = null;
        // if ($request->hasFile('image')) {
        //     try {
        //         $avatarPath = $request->file('image')->store('avatars', 'public');
        //     } catch (\Exception $e) {
        //         return redirect()->back()->with('error', 'Không thể tải lên ảnh đại diện. Vui lòng thử lại.')->withInput();
        //     }
        // }
        $avatarPath = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nameImage = time() . "." . $image->getClientOriginalExtension();
            $link = "avatars/";
            $image->move(public_path($link), $nameImage);

            $avatarPath = $link . $nameImage;
        }

        // 3. Tạo người dùng mới
        $user = User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'status'   => $request->status,
            'image'   => $avatarPath, // Cột avatar nên đồng bộ với database
        ]);

        // 4. Tạo ví cho người dùng mới
        Wallet::create([
            'id_user'   => $user->id,          // Liên kết với người dùng vừa tạo
            'id_wallet' => uniqid(),           // Tạo ID ví duy nhất
            'cash'      => 0,                  // Số dư ban đầu là 0
        ]);

        // 4. Chuyển hướng sau khi thêm thành công
        return redirect()->route('admin.users.listUser')
            ->with('success', 'Thêm tài khoản thành công!');
    }


    // public function searchUser(Request $request)
    // {
    //     // // Lấy từ khóa tìm kiếm từ form
    //     // $searchTerm = $request->input('search');

    //     // // Tìm kiếm với phân trang
    //     // $users = User::where('fullname', 'LIKE', "%{$searchTerm}%")
    //     //     ->orWhere('username', 'LIKE', "%{$searchTerm}%")
    //     //     ->orWhere('email', 'LIKE', "%{$searchTerm}%")
    //     //     ->orWhere('phone', 'LIKE', "%{$searchTerm}%")
    //     //     ->paginate(10); // 10 kết quả mỗi trang
    //     $searchUser = $request->input('search');
    //     $roleMap = [
    //         '1' => 'Khách Hàng',
    //         '2' => 'Nhân Viên',
    //         '3' => 'Admin',
    //     ];

    //     // Chuyển từ khóa tìm kiếm thành số role
    //     $roleId = array_search($searchUser, $roleMap);

    //     $users = User::where('fullname', 'LIKE', "%{$searchUser}%")
    //         ->orWhere('username', 'LIKE', "%{$searchUser}%")
    //         ->orWhere('email', 'LIKE', "%{$searchUser}%")
    //         ->orWhere('phone', 'LIKE', "%{$searchUser}%")
    //         ->orWhere('role', $roleId) // So sánh với role ID
    //         ->paginate(10);


    //     // Trả về view với kết quả tìm kiếm
    //     return view('admin.contents.users.listUser')->with('listUser', $users);
    // }
    public function searchUser(Request $request)
{
    $searchUser = strtolower(trim($request->input('search'))); // Chuẩn hóa từ khóa tìm kiếm

    $roleMap = [
        'khách hàng' => 1,
        'nhân viên' => 2,
        'admin' => 3,
    ];

    // Lấy role ID từ từ khóa (nếu có)
    $roleId = $roleMap[$searchUser] ?? null;

    $users = User::where('fullname', 'LIKE', "%{$searchUser}%")
        ->orWhere('username', 'LIKE', "%{$searchUser}%")
        ->orWhere('email', 'LIKE', "%{$searchUser}%")
        ->orWhere('phone', 'LIKE', "%{$searchUser}%");

    // Nếu từ khóa khớp với một role, thêm điều kiện tìm kiếm role
    if ($roleId !== null) {
        $users->orWhere('role', $roleId);
    }

    $users = $users->paginate(10);

    // Trả về view với kết quả tìm kiếm
    return view('admin.contents.users.listUser')->with('listUser', $users);
}
}
