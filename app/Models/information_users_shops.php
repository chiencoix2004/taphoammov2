<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class information_users_shops extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'phone', 'name_bank', 'agreed_terms'];
}
