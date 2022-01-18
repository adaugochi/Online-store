<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <title>{{ config('app.name', 'Fashion') }}</title>
    <!-- Font-->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700%7CSource+Code+Pro&amp;display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div>
    <div class="container">
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-md-8 col-lg-6 offset-lg-2 mx-auto">
                <div class="card mx-auto bd-0 py-4">
                    <div class="text-center">
                        <img class="w-75 card-image-width mx-auto d-block" src="@yield('imageURL')" alt=""/>
                        <h3 class="font-weight-bold my-4">@yield('error-title')</h3>
                        <div class="mb-3">
                            @yield('content')
                        </div>
                        <a href="/" class="btn btn--primary">
                            <i class="icon bi bi-arrow-left"></i>
                            <span>Go Home</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
