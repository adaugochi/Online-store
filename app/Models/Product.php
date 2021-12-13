<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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
}
