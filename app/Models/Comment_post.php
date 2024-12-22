<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment_post extends Model
{
    use HasFactory;

    protected $table = 'comments_post'; // Tên bảng trong database

    protected $fillable = [
        'id_post',
        'id_user',
        'content',
        'donate',
    ];

    /**
     * Nếu bạn muốn các mối quan hệ tùy chọn.
     * Không bắt buộc nếu bạn không sử dụng khóa ngoại.
     */
    
    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
