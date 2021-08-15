@extends('layouts.auth')

@section('header', 'Verify Your Email Address')
@section('content')
    <div class="row">
        <div class="col-12">
            <p>Before proceeding, please check your email for a verification link.</p>
            <p>If you did not receive the email, click on the button below to request for another</p>
        </div>
        <div class="col-12">
            <button class="btn btn--primary btn-block" type="submit">
                click here
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
