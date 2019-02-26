<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="Weddlist" />
    <meta name="keywords" content="wedding, wedding vendor, wedding vendor directory, HTML template, html theme, wedding html template, wedding html theme, weddlist, weddlist html, weddlist html template">
    <meta name="author" content="udayraj" />
    <meta name="MobileOptimized" content="320" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset(config('asset.users.images.index') . 'favicon.ico') }}" rel="icon" type="image/x-icon"/> <!-- favicon -->

    @include('layouts.section.style')
    @routes
    {{ Html::script('messages.js') }}
    @yield('css')
</head>
<!--body start-->
<body>
<!-- preloader -->
    <div class="preloader">
        <div class="status">
        <div class="status-message">
        </div>
        </div>
    </div>
<!-- end preloader -->

<!--  top bar -->
    @include('layouts.topnav')
<!--  end top bar -->

<!--  navigation -->
    @include('layouts.header')
<!--  end navigation -->

    @yield('content')

<!-- footer -->
    @include('layouts.footer')
<!-- end footer -->

<!-- jquery -->
    @include('layouts.section.script')
    @yield('script')
<!-- end jquery -->
</body>
<!--body end -->
</html>
