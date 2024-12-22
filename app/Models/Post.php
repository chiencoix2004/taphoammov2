<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'id_user',
        'slug',
        'status',
        'view',
        'image',
        'category',
    ]; 

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title); // Tạo slug từ title
            }
        });
    }



    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // Quan hệ với người dùng
    }
}
