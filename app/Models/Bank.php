<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    // Chỉ định bảng tương ứng với model (Laravel mặc định sẽ tự động tìm bảng "banks")
    protected $table = 'banks';

    // Các trường có thể gán đại trà
    protected $fillable = [
        'bank_name', // Tên ngân hàng
        'bankers',   // Người giao dịch
        'account_number', // Số tài khoản
        'status',    // Trạng thái (active, inactive) 
        'account_name' ,
        'account_password' ,
    ];

    // Các trường không được phép gán đại trà
    // protected $guarded = ['id'];

    // Đảm bảo không có trường nào bị lỗi nếu sử dụng "timestamps"
    public $timestamps = true;
}
