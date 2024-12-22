<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function listBank()
    {
        $listBank = Bank::paginate(10);
        return view('admin.contents.banks.listBank')
            ->with(['listBank' => $listBank]);
    }
    public function detailBank($id)
    {
        $detailBank = Bank::where('id', $id)->first();
        return view('admin.contents.banks.detailBank')
            ->with(['detailBank' => $detailBank]);
    }
    public function updateBank(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'bankers' => 'required|string|max:255',
            'account_number' => 'required|numeric', 
            'account_name' => 'required|string|max:255',
            'account_password' => 'required|string|max:255',
        ]);

        // Lấy ngân hàng từ cơ sở dữ liệu theo ID
        $bank = Bank::findOrFail($request->id); // Giả sử bạn truyền ID của ngân hàng vào form

        // Cập nhật dữ liệu
        $bank->update([
            // 'bank_name' => $request->bank_name,
            'bankers' => $request->bankers,
            'account_number' => $request->account_number,
            'status' => $request->status, 
            'account_name' => $request->account_name, 
            'account_password'=> $request->account_password, 
        ]);

        // Trả về thông báo thành công và chuyển hướng
        return back()->with('message', 'Cập nhật ngân hàng thành công');
    }

    public function addBank(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'bankers' => 'required|string|max:255',
            'account_number' => 'required|numeric',
            'bank_name' => 'required|string',
            'status' => 'required|string',
            'account_name' => 'required|string|max:255',
            'account_password' => 'required|string|max:255',
        ]);

        // Tạo mới ngân hàng
        Bank::create([
            'bank_name' => $request->bank_name,
            'bankers' => $request->bankers,
            'account_number' => $request->account_number,
            'status' => $request->status,
            'account_name' => $request->account_name,
            'account_password'=> $request->account_password,
        ]);

        // Trả về thông báo thành công
        return back()->with('message', 'Thêm tài khoản ngân hàng thành công!');
    }
}
