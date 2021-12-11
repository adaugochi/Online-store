<?php

namespace App\Models;

use App\helpers\MigrationConstants;
use App\helpers\Utils;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * @property string $email
 * @property string first_name
 * @property mixed $phone_number
 * @property int id
 * @property mixed $last_name
 * @property mixed $name
 * @method static create(array $array)
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const IS_ADMIN = 1;
    const NOT_ADMIN = 0;
    const ADMIN = 'admin';
    const CUSTOMER = 'customer';

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::saving(function (User $user) {
            $user->name = $user->getFullName();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'user_type',
        'phone_number',
        'international_number',
        'email',
        'password',
        'street_address',
        'city',
        'state',
        'country',
        'zip_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
