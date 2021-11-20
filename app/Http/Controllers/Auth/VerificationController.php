<?php

namespace App\Http\Controllers\Auth;

use App\helpers\Messages;
use App\helpers\Utils;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\UserVerificationRepository;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;

class VerificationController extends BaseAuthController
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
    protected $userRepository;
    protected $userVerificationRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->userRepository = new UserRepository();
        $this->userVerificationRepository = new UserVerificationRepository();
    }

    public function show()
    {
        $user = $this->userRepository->findFirst(['id' => session()->get('user_id')]);
        $phoneNumber = $user->international_number;
        return view('auth.verify', compact('phoneNumber'));
    }

    public function verify(Request $request)
    {
        $userId = session()->get('user_id');
        $userExist = $this->userVerificationRepository->findFirst([
            'user_id' => $userId,
            'verification_code' => $request->verification_code
        ]);

        if (!$userExist) {
            return redirect(route('user.verify'))->with(['error' => Messages::INVALID_VERIFICATION_CODE]);
        }
        $hasExpired = Carbon::now()->gt($userExist->expires_at);
        if ($hasExpired) {
            return redirect(route('user.verify'))->with(['info' => Messages::CODE_EXPIRED]);
        }
        $user = $this->userRepository->findById($userId); //User::find($userId);
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
        $user = $this->userRepository->findFirst(['id' => session()->get('user_id')]);
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
