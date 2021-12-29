<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillingDetail extends BaseModel
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'full_name',
        'email',
        'phone_number',
        'street_address',
        'city',
        'state',
        'country',
        'zip_code',
        'order_note',
        'created_at'
    ];
}
