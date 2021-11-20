<?php

namespace App\Http\Controllers\Auth;

use App\helpers\Messages;
use App\helpers\Utils;
use App\Http\Repositories\UserRepository;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;

class RegisterController extends BaseAuthController
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
    protected $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->userRepository = new UserRepository();
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
            'international_number' => ['required', 'unique:users'],
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
        return $this->userRepository->insert(
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'international_number' => $data['international_number'],
                'user_type' => User::CUSTOMER,
                'password' => Hash::make($data['password']),
                'created_at' => Utils::getCurrentDatetime()
            ]
        );
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
            $this->sendAuthVerificationCode($user);
            DB::commit();
            return redirect(route('user.verify'))->with([
                'success' => Messages::REGISTRATION_INCOMPLETE
            ]);
        } catch (ConfigurationException | TwilioException $e) {
            DB::rollBack();
            return redirect()->route('register')->with(['error' => $e->getMessage()]);
        }
    }
}
