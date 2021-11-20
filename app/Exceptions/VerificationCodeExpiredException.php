<?php

namespace App\Exceptions;

use Exception;

class VerificationCodeExpiredException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Wrong verification code');
    }
}
