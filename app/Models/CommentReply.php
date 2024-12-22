<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id', 
        'id_user', 
        'content'
    ];

    // Mối quan hệ với bình luận gốc
    // public function comment()
    // {
    //     return $this->belongsTo(Comment::class, 'comment_id');
    // }

    // // Mối quan hệ với người dùng trả lời
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user');
    // }


    
    public function comments()
    {
        return $this->belongsTo(Comment::class, 'comment_id');  // Quan hệ với comment
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');  // Quan hệ với người dùng trả lời
    }
}
