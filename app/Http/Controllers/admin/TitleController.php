<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    public function title()
    {
        $title = Title::get();
        return view('admin.contents.titles.title')->with(['title' => $title]);
    }

    public function updateTitle(Request $request)
    {
        // Lấy dữ liệu từ form
        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string',
        ]);

        // Giả sử bạn chỉ muốn cập nhật bản ghi đầu tiên
        $title = Title::first();

        if ($title) {
            $title->update($validatedData);
        } else {
            // Nếu không tìm thấy bản ghi, tạo mới
            Title::create($validatedData);
        }

        // Redirect về trang trước với thông báo
        return redirect()->back()->with('success', 'Tiêu đề đã được cập nhật thành công!');
    }
}
