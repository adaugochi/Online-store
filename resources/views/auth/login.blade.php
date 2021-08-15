@extends('layouts.auth')

@section('header', 'Login')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="form-input">
                <input name="email" type="text" placeholder="Your Email *">
            </div>
        </div>
        <div class="col-12">
            <div class="form-input">
                <input name="password" type="text" placeholder="Your Password *">
            </div>
        </div>
        <div class="col-12">
            <a class="btn-text d-block mb-3" href="">
                Forgot your password?
            </a>
        </div>
        <div class="col-12">
            <button class="btn btn--primary btn-block" type="submit">
                Sign In
            </button>
            <div class="mt-5 text-center fs-14">
                Not yet a member?
                <a href="{{ url('register') }}" class="text-primary font-weight-bold"> Sign Up</a>
            </div>
        </div>
    </div>
@endsection
