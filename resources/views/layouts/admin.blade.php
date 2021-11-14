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
    <link rel="stylesheet" href="/css/bootstrap-icon.css">
    <link rel="stylesheet" href="/dashboard/css/dash.css">
    <link rel="stylesheet" href="/css/portal.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700%7CSource+Code+Pro&amp;display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
        @include('elements.admin.sidebar')
        <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
            @include('elements.admin.header')
            <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between mb-1">
                                    <div class="nk-block-head-content">
                                        <div class="nk-block-head-sub">
                                            <a class="back-to" href="javascript:history.back()">
                                                <i class="icon bi bi-arrow-left"></i>
                                                <span>Go Back</span>
                                            </a>
                                        </div>
                                        <h3 class="title nk-block-title">
                                            @yield('content-title')
                                        </h3>
                                    </div>
                                    @yield('content-side')
                                </div>
                                <div class="mt-4">
                                    @if (session()->has('msg') == true)

                                    @endif

                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright">
                                &copy; <?php echo date('Y')?>  <a href="#">Fashion</a>. All Rights Reserved.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
        </div>
        <!-- main @e -->
    </div>
</div>

<script src="/dashboard/js/bundle.js"></script>
<script src="/dashboard/js/scripts.js"></script>

@yield('script')
</body>
</html>