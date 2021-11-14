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
        <form method="POST" action="@yield('route')" id="authForm">
            @csrf
            <div>
                <div class="text-center mb-3">
                    <a class="text-decoration-none" href="/">
                        <img src="/img/logo/logo.png" height="30">
                    </a>
                </div>

                <div class="row">
                    <div class="col-md-8 col-lg-6 col-xl-5 mx-auto">
                        <div class="card">
                            <div class="fs-26px mb-4">
                                @yield('header')
                            </div>
                            @yield('content')
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
@include('partials.flash-messages')

@yield('script')

</body>
</html>
