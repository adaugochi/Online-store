<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductOrder extends BaseModel
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'product_orders';

    protected $fillable = [
        'order_id',
        'product_id',
        'unit_price',
        'quantity',
        'created_at'
    ];

    /**
     * Get the category that the product belongs to.
     */
    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
