<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'title',
        'short_description',
        'description',
        'image',
        'status',
        'id_category',
        'discount',
    ];

    // public function category()
    // {
    //     return $this->belongsTo(Categories::class, 'id_category');
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user');
    // }
    // public function product()
    // {
    //     return $this->hasMany(Product::class, 'id_shop');
    // }

    // public function comment()
    // {
    //     return $this->hasMany(Comment::class, 'id_shop');
    // }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class, 'id_shop');  // Quan hệ với comment
    // }
    // Model Shop
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_shop');
    }


    public function product()
    {
        return $this->hasMany(Product::class, 'id_shop'); // Quan hệ với sản phẩm
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // Quan hệ với người dùng
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'id_category'); // Quan hệ với danh mục
    }
}
