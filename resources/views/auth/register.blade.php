@extends('layouts.auth')

@section('header', 'Create an account')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="form-input">
                <input name="email" type="text" placeholder="Your Email address *">
            </div>
        </div>
        <div class="col-12">
            <div class="form-input">
                <input name="full_name" type="text" placeholder="Your Full name *">
            </div>
        </div>
        <div class="col-12">
            <div class="form-input">
                <input name="phone_number" type="text" placeholder="Your Phone number *">
            </div>
        </div>
        <div class="col-12">
            <div class="form-input">
                <input name="password" type="text" placeholder="Your Password *">
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn--primary btn-block" type="submit">
                Sign Up
            </button>
            <div class="mt-5 text-center fs-14">
                Already have an account?
                <a href="{{ url('login') }}" class="text-primary font-weight-bold"> Sign In</a>
            </div>
        </div>
    </div>
@endsection
