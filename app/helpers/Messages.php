<?php

namespace App\helpers;

class Messages
{
    const FORGET_PASSWORD_MSG = "A password reset link was sent successfully. You will receive an SMS in a minute time";
    const USER_NOT_FOUND = "Could not find this user";
    const ACCT_NOT_EXIST = 'This account does not exist';
    const INCORRECT_CREDENTIALS = 'Incorrect login credentials';
    const TOKEN_EXPIRED = "Your password reset token has expired. kindly request for a new token";
    const INVALID_TOKEN = "Invalid password reset token";
    const PWD_RESET_MSG = 'Your password reset was successful';
    const ACCT_DEACTIVATE = 'This account has been deactivated. You can no longer sign in';
    const ACCT_EXIST = 'This account is registered already, you can login';
    const INVALID_SIGNUP_TOKEN = "Invalid sign up token";
    const INVALID_VERIFICATION_CODE = "You entered an invalid verification code";
    const VERIFICATION_CODE_SENT = "A new verification has been sent to you";
    const ACCOUNT_NOT_VERIFIED = 'This account has not been verified. Kindly enter the verification code
    sent to the phone number provider during sign up';
    const CODE_EXPIRED = "Your verification code has expired. Please resend another verification code";
    const REGISTRATION_INCOMPLETE = "Successful. In order to complete your registration, Kindly enter the verification code
    sent to the phone number provider during sign up";
    const NOT_UPDATED = 'Entity failed to update';
    const NOT_CREATED = 'Entity not saved';


    public static function getSuccessMessage($entity, $task = 'created'): string
    {
        return sprintf('%s was %s successfully', $entity, $task);
    }

    public static function getResetPasswordMessage($url): string
    {
        return sprintf (
            "You are receiving this SMS because we received a password reset request for your account.
             Kindly visit the link below to reset your password. %s This password reset link will expire in 15 minutes.
             If you did not request a password reset, no further action is required", $url
        );
    }
}
