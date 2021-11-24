@extends('layouts.auth')
@section('link')
    <link rel="stylesheet" href="/plugins/css/intlTelInput.css">
@endsection
@section('route', route('register'))
@section('header', 'Create an account')
@section('content')
    <div class="row">
        <x-input name="email" placeholder="Your Email address *" value="{{ old('email') }}"></x-input>
        <x-input name="first_name" placeholder="Your First name *" value="{{ old('first_name') }}"></x-input>
        <x-input name="last_name" placeholder="Your Last name *" value="{{ old('last_name') }}"></x-input>
        <x-input name="phone_number"
            placeholder="Your Phone number *"
            value="{{ old('phone_number') }}"
            class="phone-number"
            fieldName="international_number">
        </x-input>
        <x-input name="password" type="password" placeholder="Your Password *"></x-input>
        <div class="col-12">
            <button class="btn btn--primary btn-block" type="submit">Sign Up</button>
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
