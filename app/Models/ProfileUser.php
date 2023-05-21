<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileUser extends Model
{
    protected $fillable = [
        'user_id',
        'provider',
        'auth_id',
        'nickname',
        'avatar',
        'data',
    ];
}
