<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'verification_code', 'expires_at', 'created_at',
    ];
}
