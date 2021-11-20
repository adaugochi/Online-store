<?php

namespace App\Http\Services;

use App\Exceptions\VerificationCodeExpiredException;
use App\helpers\Messages;
use App\helpers\Utils;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\UserVerificationRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VerificationService extends BaseService
{
    protected $userRepository;
    protected $userVerificationRepository;

    public function __construct()
    {
        $this->userVerificationRepository = new UserVerificationRepository();
        $this->userRepository = new UserRepository();
    }

    /**
     * @throws VerificationCodeExpiredException
     */
    public function verify($userId, $request)
    {
        $userExist = $this->userVerificationRepository->findFirst([
            'user_id' => $userId,
            'verification_code' => $request->verification_code
        ]);
        if (!$userExist) {
            throw new ModelNotFoundException(Messages::INVALID_VERIFICATION_CODE);
        }

        $hasExpired = Carbon::now()->gt($userExist->expires_at);
        if ($hasExpired) {
            throw new VerificationCodeExpiredException(Messages::CODE_EXPIRED);
        }

        $user = $this->userRepository->findById($userId);
        $user->verified_at = Utils::getCurrentDatetime();
        $user->save();

        return $user;
    }
}
