<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileUser extends Model
{
    protected $fillable = [
        'user_id',
        'provider',
        'provider_user_id',
        'nickname',
        'avatar',
        'data',
    ];
}
