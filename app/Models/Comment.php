<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_shop',
        'id_user',
        'content',
        'rating',
    ];

    // public function shop()
    // {
    //     return $this->belongsTo(Shop::class, 'id_shop');
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user');
    // }
    // // Mối quan hệ với bảng trả lời
    // public function replies()
    // {
    //     return $this->hasMany(Comment::class, 'comment_id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // Quan hệ với người dùng
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'id_shop');
    }


    // Quan hệ với bảng trả lời (comments có thể có nhiều comment trả lời)
    public function replies()
    {
        return $this->hasMany(CommentReply::class, 'comment_id');  // Quan hệ trả lời
    }
}
