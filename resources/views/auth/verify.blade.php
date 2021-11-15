@extends('layouts.auth')
@section('route', route('verify'))
@section('header', 'Enter your verification code')
@section('content')
    <div class="row">
        <div class="col-12">
            <p>
                Input the code we sent to your registered phone number,
                {{ App\helpers\Utils::maskPhoneNumber($phoneNumber) }} to access your account.
            </p>
        </div>
        <div class="col-12">
            <div class="form-input">
                <input name="verification_code" type="text" placeholder="E.g 1111111">
            </div>
            <button class="btn btn--primary btn-block" type="submit">
                Verify
            </button>
        </div>

        <div class="col-12">
            <div class="mt-5 text-center fs-14">
                <a href="{{ route('resend') }}" class="text-primary font-weight-bold"
                   onclick="event.preventDefault(); document.getElementById('resend-code').submit();">
                    Resend code
                </a>
            </div>
        </div>
    </div>
@endsection
