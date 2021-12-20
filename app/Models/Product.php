<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property mixed|string $size
 * @property mixed $created_by
 * @property mixed|string $image
 */
class Product extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit_price',
        'size',
        'discount',
        'description',
        'quantity',
        'category_id',
        'image',
        'created_by'
    ];

    const EXTRA_SMALL = 'extra-small';
    const SMALL = 'small';
    const MEDIUM = 'medium';
    const LARGE = 'large';
    const EXTRA_LARGE = 'extra-large';
    const EXTRA_EXTRA_LARGE = 'extra-extra-large';

    public static $sizes = [
        self::EXTRA_SMALL => 'XS',
        self::SMALL => 'S',
        self::MEDIUM => 'M',
        self::LARGE => 'L',
        self::EXTRA_LARGE => 'XL',
        self::EXTRA_EXTRA_LARGE => 'XXL'
    ];

    /**
     * Get the category that the product belongs to.
     */
    public function category(): HasOne
    {
        return $this->hasOne(ProductCategory::class, 'id', 'category_id');
    }

    public function getSizeAttribute($value)
    {
        return unserialize($value);
    }
}
