<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_wallet',
        'cash',
    ];

    // Thiết lập mối quan hệ với bảng users
    // app/Models/Wallet.php

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
