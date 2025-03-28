<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'username',
        'phone',
        'email',
        'password',
        'id_wallet',
        'status',
        'zalo',
        'facebook',
        'image',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'id_user'); // Nếu chỉ có 1 ví
        // return $this->hasMany(Wallet::class, 'id_user'); // Nếu có nhiều ví
    }
    // app/Models/User.php
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    // public function transactions()
    // {
    //     return $this->hasMany(Transaction::class); // Giả sử có bảng transactions
    // }



}
