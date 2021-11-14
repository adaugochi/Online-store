<?php

namespace App\Http\Controllers;

use App\helpers\MigrationConstants;
use App\helpers\Utils;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Sends sms to user using Twilio's programmable sms client
     * @param $message
     * @param $recipient
     * @return void
     * @throws ConfigurationException
     * @throws TwilioException
     */
    public function sendMessage($message, $recipient)
    {
        $sid    = config('services.twilio.sid');
        $token  = config('services.twilio.token');
        $from   = config('services.twilio.from');
        $twilio = new Client($sid, $token);

        $twilio->messages->create(
            $recipient, // to
            [
                "from" => $from,
                "body" => $message
            ]
        );
    }

    public function getErrorMessage($code, $message): string
    {
        if ($code === 21211) {
            $errorMessage = "This phone number is invalid";
        } elseif ($code === 21408) {
            $errorMessage = "We don't have international permission necessary to SMS this phone number";
        } elseif ($code === 21610) {
            $errorMessage = "This phone number is blocked";
        } elseif ($code === 21614) {
            $errorMessage = "This phone number is incapable of receiving SMS messages";
        } elseif ($message) {
            $errorMessage = $message;
        } else {
            $errorMessage = "Could not send SMS notification to User";
        }
        return $errorMessage;
    }

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
