<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\Categories;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
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
        return view('client.contents.authentic.login')->with(['categories' => $categories]);
    }

    // Xử lý đăng nhập
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ], [
    //         'email.required' => 'Email không được để trống',
    //         'email.email' => 'Email không đúng định dạng', 
    //         'password.required' => 'Password không được để trống',
    //     ]);

    //     $dataUserLogin = [
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ];

    //     $remember = $request->has('remember');

    //     if (Auth::attempt($dataUserLogin, $remember)) {
    //         $user = Auth::user();

    //         if ($user->role == 3) {
    //             // Admin login
    //             return redirect()->route('admin.contents.index')->with([
    //                 'message' => 'Đăng nhập thành công với quyền Admin!',
    //             ]);
    //         } else {
    //             // User login
    //             return redirect()->route('/')->with([
    //                 'message' => 'Đăng nhập thành công!',
    //                 'user' => $user, // Truyền thông tin người dùng
    //             ]);
    //         }
    //     } else {
    //         return redirect()->back()->with([
    //             'message' => 'Email hoặc mật khẩu không đúng!',
    //         ]);
    //     }
    // }
    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Password không được để trống',
        ]);

        $credentials = $req->only('email', 'password');
        $remember = $req->has('remember');

        // Kiểm tra đăng nhập
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user(); // Lấy thông tin người dùng hiện tại

            // Kiểm tra cả status và role của người dùng
            if ($user->status == 'active' && $user->role == 1) {
                return redirect()->route('home'); // Đăng nhập thành công, chuyển hướng đến trang home
            } elseif ($user->status == 'inactive') {
                // Nếu status là 2, tài khoản bị tạm khóa
                Auth::logout(); // Đảm bảo người dùng bị đăng xuất
                return redirect()->back()->with('message', 'Tài khoản của bạn đã bị tạm khóa!');
            } else {
                // Nếu không thuộc điều kiện trên
                Auth::logout();
                return redirect()->back()->with('message', 'Bạn không có quyền truy cập!');
            }
        } else {
            // Đăng nhập thất bại
            return redirect()->back()->with('message', 'Email hoặc mật khẩu không chính xác!');
        }
    }



    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return redirect('showLoginForm')->with('message', 'Đăng xuất thành công.');
    // }
    public function logout(Request $request)
    {
        // Đăng xuất người dùng
        Auth::logout();

        // Hủy toàn bộ session và tái tạo token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Điều hướng đến form đăng nhập với thông báo
        return redirect()->route('showLoginForm')->with('message', 'Đăng xuất thành công.');
    }


    public function showRegisterForm()
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
        return view('client.contents.authentic.register')->with(['categories' => $categories]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => ['required', 'unique:users,username', 'max:20', 'regex:/^[a-zA-Z0-9]*$/'], // Kiểm tra username không có ký tự đặc biệt
            'email' => 'required|email|unique:users,email|max:255', // Kiểm tra email không trùng
            'password' => 'required|min:6', // Kiểm tra mật khẩu có tối thiểu 6 ký tự
        ], [
            'username.required' => 'Tên người dùng không được để trống.',
            'username.unique' => 'Tên người dùng đã tồn tại.',
            'username.regex' => 'Username chỉ được chứa chữ và số, không có ký tự đặc biệt.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã được sử dụng.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'username.max' => 'Username tối đa 20 ký tự.',
        ]);


        // Tạo người dùng mới
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Mã hóa mật khẩu
        ]);

        Wallet::create([
            'id_user' => $user->id, // ID người dùng
            'cash' => 0, // Số tiền mặc định trong ví là 0
        ]);

        // Đăng nhập ngay sau khi đăng ký thành công (tuỳ chọn)
        Auth::login($user);

        // Chuyển hướng sau khi đăng ký thành công
        return redirect()->route('home');
    }

    public function showForgotPasswordForm()
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
        return view('client.contents.authentic.forgotpassword')->with(['categories' => $categories]);
    }

    public function sendResetCode(Request $request)
    {

        // Xác thực email
        $request->validate([
            'email' => 'required|email|exists:users,email', // Kiểm tra email tồn tại
        ]);

        // Lấy người dùng từ email
        $user = User::where('email', $request->email)->first();

        // Tạo mã xác nhận ngẫu nhiên 6 chữ số
        $resetCode = sprintf('%06d', rand(0, 999999)); // Mã xác nhận 6 chữ số

        // Lưu mã xác nhận vào cơ sở dữ liệu
        $user->reset_code = $resetCode;
        $user->reset_code_expiry = now()->addMinutes(15); // Mã hết hạn sau 15 phút
        $user->save();

        // Gửi mã xác nhận qua email
        Mail::to($user->email)->send(new ResetPasswordMail($resetCode));

        return redirect()->route('showResetPasswordForm')
            ->with('message', 'Mã xác nhận đã được gửi đến email của bạn.');
    }
    public function showResetPasswordForm()
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
        return view('client.contents.authentic.code-forgot-password', compact('categories'));
    }

    public function verifyResetCode(Request $request)
    {
        // Xác thực mã xác nhận
        $request->validate([
            'reset_code' => 'required|numeric|digits:6',  // Mã xác nhận phải là số 6 chữ số
        ]);

        // Kiểm tra mã xác nhận trong cơ sở dữ liệu
        $user = User::where('reset_code', $request->reset_code)->first();

        if (!$user) {
            return back()->withErrors(['reset_code' => 'Mã xác nhận không hợp lệ.']);
        }

        // Lưu mã xác nhận vào session hoặc cookie để dùng cho bước thay đổi mật khẩu
        // session(['reset_code' => $request->reset_code]);  // Lưu mã vào session
        session(['reset_user_id' => $user->id]);

        return redirect()->route('resetPasswordForm');
    }

    public function resetPasswordForm()
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
        return view('client.contents.authentic.reset-password', compact('categories'));
    }
    public function resetPassword(Request $request)
    {
        // Xác thực mật khẩu
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        // Lấy user ID từ session
        $userId = session('reset_user_id');

        // Lấy người dùng từ ID
        $user = User::find($userId);

        if (!$userId) {
            return redirect()->route('forgotPasswordForm')
                ->withErrors(['error' => 'Không tìm thấy thông tin xác nhận. Vui lòng thử lại.']);
        }

        if (!$user) {
            return redirect()->route('forgotPasswordForm')
                ->withErrors(['error' => 'Tài khoản không tồn tại hoặc đã bị xóa.']);
        }


        // Cập nhật mật khẩu mới
        $user->password = bcrypt($request->password);
        $user->reset_code = null;         // Xóa mã xác nhận
        $user->reset_code_expiry = null;  // Xóa thời gian hết hạn
        $user->save();

        // Xóa session
        session()->forget('reset_user_id');

        return redirect()->route('showLoginForm')->with('message', 'Mật khẩu đã được thay đổi thành công.');
    }
}
