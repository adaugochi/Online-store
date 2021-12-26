<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Fashion') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="/css/bootstrap-icon.css">
    <link rel="stylesheet" href="/css/bundle.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/toastr.css" type="text/css">
@yield('link')

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700%7CSource+Code+Pro&amp;display=swap" rel="stylesheet">
</head>
<body>
<div class="ptb-100">
    <main class="container">
        <form method="POST" action="#" id="payment-form">
            @csrf
            <div>
                <div class="row">
                    <div class="col-md-8 col-lg-7 mx-auto">
                        <div class="card">
                            <div class="fs-26px mb-4">
                                Pay with Stripe
                            </div>
                            <div class="form-group">
                                <label for="card-element">Enter Your Credit Card Information:</label>
                                <div class="card py-2">
                                    <div id="card-element"></div>
                                </div>
                            </div>
                            <div id="card-errors" role="alert" class="tx-danger"></div>
                            <button type="submit" class="btn btn-success btn-block mb-5 mt-4" id="buy-now">Pay Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form id="resend-code" action="{{ route('resend') }}" method="POST">
            @csrf
        </form>
    </main>
</div>
<script src="/js/app.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('js/stripe.js') }}"></script>
@include('partials.flash-messages')

</body>
</html>
