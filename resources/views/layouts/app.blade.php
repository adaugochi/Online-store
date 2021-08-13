<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png">

    <!-- all css here -->
{{--    <link rel="stylesheet" href="/css/app.css">--}}
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/bootstrap-icon.css">
    <link rel="stylesheet" href="/css/bundle.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link rel="stylesheet" href="/css/app.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700%7CSource+Code+Pro&amp;display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">

        @include('elements.site.header')
        @include('elements.site.cart-sidebar')

        <main>
            @yield('content')
        </main>

        @include('elements.site.footer')
    </div>
    <script src="/js/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>

</body>
</html>
