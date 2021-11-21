<?php

namespace App\Http\Services;

use App\Exceptions\ModelNotUpdatedException;
use App\Exceptions\TokenExpiredException;
use App\helpers\Messages;
use App\helpers\Utils;
use App\Http\Repositories\PasswordResetRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Traits\sendSMSTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;

class AuthService extends BaseService
{
    use sendSMSTrait;

    const EXPIRES = 960; // 15 minutes

    protected $userRepository;
    protected $pwdResetRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->pwdResetRepository = new PasswordResetRepository();
    }

    /**
     * @throws TwilioException
     * @throws ConfigurationException
     */
    public function sendResetLink($request): bool
    {
        $intlNumber = $request->international_number;

        $user = $this->userRepository->findFirst(['international_number' => $intlNumber]);
        if (!$user) {
            throw new ModelNotFoundException(Messages::USER_NOT_FOUND);
        }

        $token = Utils::generateToken();
        $this->pwdResetRepository->insert([
            'identifier' => $intlNumber,
            'token' => $token,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $url = env('BASE_URL') . "password/reset/" . $token;

        $this->sendMessage(Messages::getResetPasswordMessage($url), $intlNumber);

        return true;
    }

    /**
     * @throws TokenExpiredException
     */
    public function validateToken($token)
    {
        $tokenExist = $this->pwdResetRepository->findFirst(['token' => $token]);

        if (!$tokenExist) {
            throw new ModelNotFoundException(Messages::INVALID_TOKEN);
        }

        if (time() > (strtotime($tokenExist->created_at) + self::EXPIRES)) {
            throw new TokenExpiredException(Messages::TOKEN_EXPIRED);
        }

        $user = $this->userRepository->findFirst(['international_number' => $tokenExist->identifier]);
        return $user->email;
    }

    /**
     * @throws ModelNotUpdatedException
     */
    public function resetPassword(): bool
    {
        $user = $this->userRepository->update(
            ['password' => Hash::make(request('password'))],
            ['email' => request('email')]
        );
        if (!$user) {
            throw new ModelNotUpdatedException(Messages::NOT_UPDATED);
        }
        return true;
    }
}
