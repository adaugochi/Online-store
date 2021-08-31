<?php

namespace App\Http\Controllers\Auth;

use App\helpers\Messages;
use App\helpers\MigrationConstants;
use App\helpers\Utils;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default, this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data): User
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'user_type' => User::CUSTOMER,
            'password' => Hash::make($data['password']),
            'created_at' => Utils::getCurrentDatetime()
        ]);
    }

    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function register(Request $request)
    {
        DB::beginTransaction();
        $this->validator($request->all())->validate();
        try {
            $user = $this->create($request->all());
            $verificationCode = Utils::generateConfirmationCode();

            DB::table(MigrationConstants::TABLE_USER_VERIFICATIONS)->insert([
                'user_id' => $user->id,
                'verification_code' => $verificationCode,
                'created_at' => Utils::getCurrentDatetime(),
                'expires_at' => Carbon::now()->addMinutes(30)
            ]);

            $this->sendMessage($verificationCode, Utils::convertPhoneNumberToE164Format($user->phone_number));
            session()->put('user_id', $user->id);
            DB::commit();
            return redirect(route('user.verify'))->with([
                'success' => Messages::getSuccessMessage('Registration')
            ]);
        } catch (ConfigurationException | TwilioException $e) {
            DB::rollBack();
            return redirect()->route('register')->with(['error' => $e->getMessage()]);
        }
    }
}
