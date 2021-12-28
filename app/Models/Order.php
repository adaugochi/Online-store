<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $user_id
 * @property mixed $total_amount
 * @property mixed|string $status
 * @property int|mixed $order_number
 */
class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'order_number',
        'total_amount',
        'status',
        'created_at'
    ];

    const STRIPE = 'stripe';
    const PAYPAL = 'paypal';
}
