<?php

namespace App\Http\Controllers\Auth;

use App\helpers\MigrationConstants;
use App\helpers\Utils;
use App\Http\Controllers\Controller;
use App\Http\Traits\sendSMSTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;

class BaseAuthController extends Controller
{
    use sendSMSTrait;

    /**
     * @throws TwilioException
     * @throws ConfigurationException
     * @throws \Exception
     */
    public function sendAuthVerificationCode($user)
    {
        $verificationCode = Utils::generateConfirmationCode();
        DB::table(MigrationConstants::TABLE_USER_VERIFICATIONS)->insert([
            'user_id' => $user->id,
            'verification_code' => $verificationCode,
            'created_at' => Utils::getCurrentDatetime(),
            'expires_at' => Carbon::now()->addMinutes(env('EXPIRY_TIME'))
        ]);

        $this->sendMessage($verificationCode, $user->international_number);
        session()->put('user_id', $user->id);
    }
}
