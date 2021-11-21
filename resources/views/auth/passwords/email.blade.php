@extends('layouts.auth')
@section('link')
    <link rel="stylesheet" href="/plugins/css/intlTelInput.css">
@endsection
@section('header', 'Forgot Password')
@section('route', route('password.forget'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="form-input">
                <input name="phone_number" class="phone-number" type="text" placeholder="Your Phone number *"
                       value="{{ old('phone_number') }}">
                @include('partials.error', ['fieldName' => 'phone_number'])
                @include('partials.error', ['fieldName' => 'international_number'])
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
                <a href="{{ url('login') }}" class="text-primary font-weight-bold">Sign In</a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('plugins/js/intlTelInput-jquery.min.js') }}"></script>
    <script src="{{ asset('js/intltel.js') }}"></script>
@endsection
