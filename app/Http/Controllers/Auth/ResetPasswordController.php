<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\ModelNotUpdatedException;
use App\Exceptions\TokenExpiredException;
use App\helpers\Messages;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Services\AuthService;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends BaseAuthController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $authService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function showResetForm(Request $request, $token = null)
    {
        try {
            $email = $this->authService->validateToken($token);
            return view('auth.passwords.reset', compact('token',  'email'));
        } catch (ModelNotFoundException | TokenExpiredException $e) {
            return redirect()->route('password.request')->with(['error' => $e->getMessage()]);
        }
    }

    public function reset(ResetPasswordRequest $request)
    {
        try {
            $this->authService->resetPassword();
            return redirect()->route('login')->with(['success' => Messages::PWD_RESET_MSG]);
        } catch (ModelNotUpdatedException $e) {
            return redirect()->route('password.update')->with(['error' => $e->getMessage()]);
        }
    }
}
