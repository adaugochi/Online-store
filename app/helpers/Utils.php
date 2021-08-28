<?php

namespace App\helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

class Utils
{
    public static function slug($str)
    {
        return str_replace(' ', '-', strtolower($str));
    }

    public static function convertPhoneNumberToE164Format($phoneNumber)
    {
        return preg_replace('/^0/','+234', $phoneNumber);
    }

    public static function generateToken(): string
    {
        return Str::random(60); //md5(rand(1, 10) . microtime()); //OR str_random(32);
    }

    public static function formatDate($timestamp)
    {
        return date("F jS, Y", strtotime($timestamp));
    }

    public static function formatTime($timestamp)
    {
        return date("h:iA", strtotime($timestamp));
    }

    public static function generateConfirmationCode(): int
    {
       //return Str::uuid();
        $uniqueCode = mt_rand(1000000000, 9999999999);
//        while(Schedule::where('confirmation_code', $uniqueCode)->exists()) {
//            $uniqueCode = Str::random(10);
//        }
        return $uniqueCode;
    }

    public static function getCurrentDatetime(): string
    {
        $now = Carbon::now();
        return $now->toDateTimeString();
    }
}
