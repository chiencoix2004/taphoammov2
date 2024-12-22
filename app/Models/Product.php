<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tên bảng tương ứng trong CSDL
    protected $table = 'products';

    // Các cột có thể mass-assign
    protected $fillable = [
        'id_shop',
        'product_name',
        // 'category_id',
        'price',
        'quantity',
        'status',
    ];

    // Định nghĩa mối quan hệ với bảng shops
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'id_shop');
    }
    // public function category()
    // {
    //     return $this->belongsTo(Categories::class, 'category_id');
    // }
}
