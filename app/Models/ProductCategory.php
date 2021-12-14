<?php

namespace App\Models;

use Illuminate\Support\Str;

/**
 * @property mixed $key
 * @property string $name
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class ProductCategory extends BaseModel
{
    protected $table = 'product_categories';

    protected $fillable = [
        'name',
        'key',
        'is_active'
    ];

    public function product()
    {
        $this->belongsTo(Product::class, 'category_id');
    }
}
