<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends BaseModel
{
    use HasFactory;

    const UNIQUE = 'unique';
    const GENERAL = 'general';

    const COUPON_TYPES = [
        self::UNIQUE => 'Unique',
        self::GENERAL => 'General'
    ];
}
