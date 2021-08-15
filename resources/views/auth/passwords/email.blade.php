@extends('layouts.auth')

@section('header', 'Forgot Password')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="form-input">
                <input name="email" type="text" placeholder="Your Email address*">
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn--primary btn-block" type="submit">
                Send reset link
            </button>
        </div>
        <div class="col-12">
            <div class="mt-5 text-center fs-14">
                Not interested?
                <a href="{{ url('register') }}" class="text-primary font-weight-bold">Sign In</a>
            </div>
        </div>
    </div>
@endsection
