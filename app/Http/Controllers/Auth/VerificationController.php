<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\VerificationCodeExpiredException;
use App\helpers\Messages;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\UserVerificationRequest;
use App\Http\Services\VerificationService;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
    protected $verificationService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->verificationService = new VerificationService();
        $this->userRepository = new UserRepository();
    }

    public function show()
    {
        $user = $this->userRepository->findFirst(['id' => session()->get('user_id')]);
        $phoneNumber = $user->international_number;
        return view('auth.verify', compact('phoneNumber'));
    }

    public function verify(UserVerificationRequest $request)
    {
        $userId = session()->get('user_id');

        try {
            $user = $this->verificationService->verify($userId, $request);
            auth()->login($user);
            session()->forget('user_id');

            return redirect(route('customer.home'))->with([
                'success' => Messages::getSuccessMessage('Verification')
            ]);
        } catch (ModelNotFoundException | VerificationCodeExpiredException $e) {
            return redirect(route('user.verify'))->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * @throws Exception
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
