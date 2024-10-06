<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class candidate extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'confirm_password', 'otp',
    ];

    protected $hidden = [
        'password', 'confirm_password',
    ];
}