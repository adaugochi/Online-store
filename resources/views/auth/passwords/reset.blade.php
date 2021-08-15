@extends('layouts.auth')

@section('header', 'Reset Password')
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
            <div class="form-input">
                <input name="password" type="text" placeholder="Your Confirm password *">
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn--primary btn-block" type="submit">
                Reset
            </button>
            <div class="mt-5 text-center fs-14">
                Not interested?
                <a href="{{ url('register') }}" class="text-primary font-weight-bold"> Sign In</a>
            </div>
        </div>
    </div>
@endsection
