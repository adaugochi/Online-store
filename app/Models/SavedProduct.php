<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SavedProduct extends BaseModel
{
    use HasFactory;

    protected $table = 'saved_products';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'product_id',
        'size',
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
