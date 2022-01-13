@extends('layouts.auth')
@section('route', route('login'))
@section('header', 'Welcome back')
@section('content')
    <div class="row">
        <x-input name="email" placeholder="Your Email *"></x-input>
        <x-input name="password" type="password" placeholder="Your Password *"></x-input>
        <div class="col-12">
            <a class="btn-text d-block mb-3" href="{{ route('password.request') }}">
                Forgot your password?
            </a>
        </div>
        <div class="col-12">
            <button class="btn btn--gradient btn-block" type="submit">Sign In</button>
            <div class="mt-5 text-center fs-14">
                Not yet a member?
                <a href="{{ url('register') }}" class="text-primary font-weight-bold"> Sign Up</a>
            </div>
        </div>
    </div>
@endsection
