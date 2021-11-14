<?php

namespace App\Http\Controllers\Auth;

use App\helpers\Messages;
use App\helpers\Utils;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserVerification;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Phone Number Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function show()
    {
        return view('auth.verify');
    }

    public function verify(Request $request)
    {
        $userId = session()->get('user_id');
        $userExist = UserVerification::where([
            'user_id' => $userId, 'verification_code' => $request->verification_code
        ])->first();

        if (!$userExist) {
            return redirect(route('user.verify'))->with(['error' => Messages::INVALID_VERIFICATION_CODE]);
        }
        $hasExpired = Carbon::now()->gt($userExist->expires_at);
        if ($hasExpired) {
            return redirect(route('user.verify'))->with(['info' => Messages::CODE_EXPIRED]);
        }
        $user = User::find($userId);
        $user->verified_at = Utils::getCurrentDatetime();
        $user->save();
        auth()->login($user);

        session()->forget('user_id');
        return redirect(route('customer.home'))->with([
            'success' => Messages::getSuccessMessage('Verification')
        ]);
    }

    /**
     * @throws \Exception
     */
    public function resend()
    {
        $userId = session()->get('user_id');
        $user = User::where('id', $userId)->first();
        try {
            $this->sendAuthVerificationCode($user);
            return redirect(route('user.verify'))->with([
                'success' => Messages::VERIFICATION_CODE_SENT
            ]);
        } catch (ConfigurationException | TwilioException $e) {
            return redirect()->route('user.verify')->with(['error' => $e->getMessage()]);
        }
    }
}
