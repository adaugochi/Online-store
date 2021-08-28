<?php

namespace Database\Seeders;

use App\helpers\Utils;
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
                'first_name' => 'Adaa',
                'last_name' => 'Mgbede',
                'email' => env('DEFAULT_ADMIN_EMAIL'),
                'phone_number' => env('DEFAULT_ADMIN_PHONE_NUMBER'),
                'user_type' => 'admin',
                'created_at' => Utils::getCurrentDatetime(),
                'verified_at' => Utils::getCurrentDatetime(),
                'password' => Hash::make(env('DEFAULT_ADMIN_PASSWORD'))
            ]
        ]);
    }
}
