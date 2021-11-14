@extends('layouts.auth')
@section('link')
    <link rel="stylesheet" href="/plugins/css/intlTelInput.css">
@endsection
@section('route', route('register'))
@section('header', 'Create an account')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="form-input">
                <input name="email" type="text" placeholder="Your Email address *">
                @include('partials.error', ['fieldName' => 'email'])
            </div>
        </div>
        <div class="col-12">
            <div class="form-input">
                <input name="first_name" type="text" placeholder="Your First name *">
                @include('partials.error', ['fieldName' => 'first_name'])
            </div>
        </div>
        <div class="col-12">
            <div class="form-input">
                <input name="last_name" type="text" placeholder="Your Last name *">
                @include('partials.error', ['fieldName' => 'last_name'])
            </div>
        </div>
        <div class="col-12">
            <div class="form-input">
                <input name="phone_number" class="phone-number" type="text" placeholder="Your Phone number *">
                @include('partials.error', ['fieldName' => 'phone_number'])
            </div>
        </div>
        <div class="col-12">
            <div class="form-input">
                <input name="password" type="password" placeholder="Your Password *">
                @include('partials.error', ['fieldName' => 'password'])
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

@section('script')
    <script src="{{ asset('plugins/js/intlTelInput-jquery.min.js') }}"></script>
    <script src="{{ asset('js/intltel.js') }}"></script>
@endsection
