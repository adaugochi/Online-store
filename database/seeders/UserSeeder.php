<?php

namespace Database\Seeders;

use App\helpers\Utils;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Admin',
                'last_name' => 'MacAina',
                'name' => 'Admin MacAina',
                'email' => env('DEFAULT_ADMIN_EMAIL'),
                'phone_number' => env('DEFAULT_ADMIN_PHONE_NUMBER'),
                'international_number' => env('DEFAULT_ADMIN_INTL_NUMBER'),
                'is_admin' => User::IS_ADMIN,
                'user_type' => User::ADMIN,
                'created_at' => Utils::getCurrentDatetime(),
                'verified_at' => Utils::getCurrentDatetime(),
                'password' => Hash::make(env('DEFAULT_ADMIN_PASSWORD'))
            ]
        ]);
    }
}
