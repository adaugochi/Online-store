@extends('layouts.auth')
@section('route', route('password.update'))
@section('header', 'Reset Password')
@section('content')
    <input type="hidden" value="{{ $token }}" name="token">
    <div class="row">
        <div class="col-12">
            <div class="form-input">
                <input name="email" type="text" placeholder="Your Email *" value="{{ $email }}" readonly>
                @include('partials.error', ['fieldName' => 'email'])
            </div>
        </div>
        <div class="col-12">
            <div class="form-input">
                <input name="password" type="password" placeholder="Your Password *">
                @include('partials.error', ['fieldName' => 'password'])
            </div>
        </div>
        <div class="col-12">
            <div class="form-input">
                <input name="password_confirmation" type="password" placeholder="Your Confirm password *">
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn--primary btn-block" type="submit">
                Reset
            </button>
            <div class="mt-5 text-center fs-14">
                Not interested?
                <a href="{{ url('login') }}" class="text-primary font-weight-bold"> Sign In</a>
            </div>
        </div>
    </div>
@endsection
