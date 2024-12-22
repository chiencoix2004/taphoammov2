<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{

  public function listCategory()
  {
    // Lấy các danh mục cha và phân trang
    $categories = Categories::whereNull('parent_id')
      ->withCount('children') // Đếm số lượng danh mục con (children)
      ->paginate(5);

    // Tính toán level cho mỗi danh mục (cha và con)
    foreach ($categories as $category) {
      $this->setCategoryLevel($category, 1); // Gán cấp độ cho danh mục cha bắt đầu từ level 1
    }

    return view('admin.contents.Categories.listCategory')->with([
      'categories' => $categories
    ]);
  }

  // Phương thức đệ quy để tính cấp độ cho các danh mục con
  private function setCategoryLevel($category, $level)
  {
    $category->level = $level;

    // Tính cấp độ cho các danh mục con
    foreach ($category->children as $child) {
      $this->setCategoryLevel($child, $level + 1); // Tăng cấp độ cho danh mục con
    }
  }

  public function detailCategory($slug)
  {
    // Lấy chi tiết danh mục cha theo slug và bao gồm các danh mục con
    $detailCategory = Categories::with('children')
      ->withCount('children') // Đếm số lượng danh mục con (children)
      ->where('slug', $slug)->first();

    return view('admin.contents.Categories.detailCategory')
      ->with('detailCategory', $detailCategory);
  }


  public function updateCategory(Request $req)
  {
    // Xác thực dữ liệu
    $validatedData = $req->validate([
      'name' => 'required|string|max:20',
      'discount' => 'required|numeric|min:0|max:5', // Validate discount không quá 5%
      'status' => 'required|integer', // Thêm validate cho status nếu cần
    ], [
      'name.required' => 'Bạn cần nhập tên danh mục.',
      'name.string' => 'Tên danh mục phải là chuỗi ký tự.',
      'name.max' => 'Tên danh mục không được vượt quá 20 ký tự.',
      'discount.required' => 'Bạn cần nhập giá trị giảm giá.',
      'discount.numeric' => 'Chiết khấu phải là số.',
      'discount.min' => 'Chiết khấu không được nhỏ hơn 0%.',
      'discount.max' => 'Chiết khấu không được vượt quá 5%.', // Thêm thông báo lỗi cho điều kiện discount
      'status.required' => 'Trạng thái là bắt buộc.',
    ]);

    // Tìm danh mục theo slug
    $category = Categories::where('slug', $req->slug)->first();

    if ($category) {

      // Kiểm tra nếu 'name' thay đổi
      if ($category->name !== $validatedData['name']) {
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['name']); // Tạo slug mới khi tên thay đổi
      }

      // Cập nhật các trường khác
      $category->discount = $validatedData['discount'];
      $category->status = $validatedData['status'];

      // Lưu thay đổi
      $category->save();

      // Chuyển hướng
      return redirect()->route('admin.categories.detailCategory', ['slug' => $category->slug])
        ->with('message', 'Cập nhật danh mục thành công');
    }
  }
  public function updateSubCategory(Request $req)
  {
    // Xác thực dữ liệu
    $validatedData = $req->validate([
      'name' => 'required|string|max:20',
      'discount' => 'required|numeric|min:0|max:5',
      'status' => 'required|integer',
    ], [
      'name.required' => 'Bạn cần nhập tên danh mục.',
      'name.string' => 'Tên danh mục phải là chuỗi ký tự.',
      'name.max' => 'Tên danh mục không được vượt quá 20 ký tự.',
      'discount.required' => 'Bạn cần nhập giá trị giảm giá.',
      'discount.numeric' => 'Chiết khấu phải là số.',
      'discount.min' => 'Chiết khấu không được nhỏ hơn 0%.',
      'discount.max' => 'Chiết khấu không được vượt quá 5%.',
      'status.required' => 'Trạng thái là bắt buộc.',
    ]);

    // Tìm danh mục theo slug
    $category = Categories::where('slug', $req->slug)->first();

    if ($category) {
      // $oldSlug = $category->slug; // Lưu slug cũ trước khi cập nhật

      // Kiểm tra nếu 'name' thay đổi
      if ($category->name !== $validatedData['name']) {
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['name']); // Tạo slug mới khi tên thay đổi
      }

      // Cập nhật các trường khác
      $category->discount = $validatedData['discount'];
      $category->status = $validatedData['status'];

      // Lưu thay đổi
      $category->save();

      // Điều hướng quay lại trang chi tiết của danh mục theo slug cũ
      // return redirect()->route('admin.categories.detailCategory', ['slug' => $oldSlug])
      //     ->with('message', 'Cập nhật danh mục thành công');

    }
    return back()->with('message', 'Cập nhật danh mục thành công');
  }

  // public function addSubCategory(Request $req)
  // {
  //   // Xác thực dữ liệu
  //   $validatedData = $req->validate([
  //     'parent_id' => 'required|exists:categories,id', // Kiểm tra xem danh mục cha có tồn tại không
  //     'name' => 'required|string|max:20',  // Kiểm tra tên danh mục con
  //     'discount' => 'required|numeric|min:0|max:5',  // Kiểm tra chiết khấu
  //   ], [
  //     'parent_id.required' => 'Bạn cần chọn danh mục cha.',
  //     'parent_id.exists' => 'Danh mục cha không tồn tại.',
  //     'name.required' => 'Tên danh mục con là bắt buộc.',
  //     'name.max' => 'Tên danh mục con không được vượt quá 20 ký tự.',
  //     'discount.required' => 'Chiết khấu là bắt buộc.',
  //     'discount.numeric' => 'Chiết khấu phải là một số.',
  //     'discount.min' => 'Chiết khấu phải lớn hơn hoặc bằng 0.',
  //     'discount.max' => 'Chiết khấu không được vượt quá 5%.',
  //   ]);



  //   // Kiểm tra nếu có parent_id và tên danh mục trùng với danh mục con trong parent_id
  //   if ($req->parent_id) {
  //     $existingCategory = Categories::where('parent_id', $req->parent_id)
  //       ->where('name', $req->name)
  //       ->first();

  //     if ($existingCategory) {
  //       return back()->withErrors(['name' => 'Danh mục con này đã tồn tại trong danh mục cha.'])->withInput();
  //     }
  //   }
  //   $randomNumber = rand(1000, 9999);
  //   // Tạo mới danh mục con
  //   $category = new Categories();
  //   $category->parent_id = $req->parent_id;  // Lưu ID danh mục cha
  //   $category->name = $req->name;            // Lưu tên danh mục con
  //   // $category->slug = Str::slug($req->name); // Tạo slug từ tên danh mục
  //   $category->slug = Str::slug($req->name . '-' . $randomNumber);
  //   $category->discount = $req->discount;    // Lưu giá trị chiết khấu
  //   $category->status = 1;  // Giả sử trạng thái mặc định là hoạt động (1)

  //   // Lưu danh mục
  //   $category->save();

  //   // Trả về thông báo thành công
  //   return back()->with('message', 'Thêm Danh Mục Con Thành Công');
  // }
  public function addSubCategory(Request $req)
  {
    // Xác thực dữ liệu
    $validatedData = $req->validate([
      'parent_id' => 'required|exists:categories,id',
      'name' => 'required|string|max:20',
      'discount' => 'required|numeric|min:0|max:5',
    ], [
      'parent_id.required' => 'Bạn cần chọn danh mục cha.',
      'parent_id.exists' => 'Danh mục cha không tồn tại.',
      'name.required' => 'Tên danh mục con là bắt buộc.',
      'name.max' => 'Tên danh mục con không được vượt quá 20 ký tự.',
      'discount.required' => 'Chiết khấu là bắt buộc.',
      'discount.numeric' => 'Chiết khấu phải là một số.',
      'discount.min' => 'Chiết khấu phải lớn hơn hoặc bằng 0.',
      'discount.max' => 'Chiết khấu không được vượt quá 5%.',
    ]);

    // Kiểm tra tên danh mục con trùng với parent_id
    $existingCategoryByName = Categories::where('parent_id', $req->parent_id)
      ->where('name', $req->name)
      ->first();

    if ($existingCategoryByName) {
      return back()->withErrors(['name' => 'Tên danh mục con đã tồn tại trong danh mục cha.'])->withInput();
    }

    // Tạo slug ban đầu
    $randomNumber = rand(1000, 9999);
    $slug = Str::slug($req->name . '-' . $randomNumber);

    // Kiểm tra và tạo lại slug nếu trùng lặp
    while (Categories::where('slug', $slug)->exists()) {
      $randomNumber = rand(1000, 9999);
      $slug = Str::slug($req->name . '-' . $randomNumber);
    }

    // Tạo mới danh mục con
    $category = new Categories();
    $category->parent_id = $req->parent_id;
    $category->name = $req->name;
    $category->slug = $slug;
    $category->discount = $req->discount;
    $category->status = 1;

    // Lưu danh mục
    $category->save();

    // Trả về thông báo thành công
    return back()->with('message', 'Thêm Danh Mục Con Thành Công');
  }



  public function addCategory(Request $req)
  {
    // Xác thực dữ liệu
    $validatedData = $req->validate([
      'name' => 'required|string|max:20',  // Kiểm tra tên danh mục con
    ], [
      'name.required' => 'Tên danh mục là bắt buộc.',
      'name.max' => 'Tên danh mục không được vượt quá 20 ký tự.',
    ]);

    // Kiểm tra xem danh mục đã tồn tại chưa
    $existingCategory = Categories::where('name', $req->name)->first();

    if ($existingCategory) {
      // Nếu danh mục đã tồn tại, trả về lỗi
      return back()->withErrors(['name' => 'Danh mục này đã tồn tại.'])->withInput();
    }

    // Tạo mới danh mục
    $category = new Categories();
    $category->name = $req->name;            // Lưu tên danh mục
    $category->slug = Str::slug($req->name); // Tạo slug từ tên danh mục

    // Lưu danh mục
    $category->save();

    // Trả về thông báo thành công
    return back()->with('message', 'Thêm Danh Mục Thành Công');
  }
}
