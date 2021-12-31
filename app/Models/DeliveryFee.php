<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryFee extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'country',
        'amount',
    ];
}
