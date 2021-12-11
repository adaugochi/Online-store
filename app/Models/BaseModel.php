<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class BaseModel extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function getCreatedAtAttribute(): string
    {
        $createdAt = Carbon::parse($this->attributes['created_at']);
        return $createdAt->format('M d Y');
    }

    public function getUpdatedAtAttribute(): string
    {
        $createdAt = Carbon::parse($this->attributes['updated_at']);
        return $createdAt->format('M d Y');
    }
}
