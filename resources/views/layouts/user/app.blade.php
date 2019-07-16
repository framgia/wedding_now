<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @routes
    {{ Html::script('messages.js') }}
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="Weddlist" />
    <meta name="keywords" content="wedding, wedding vendor, wedding vendor directory, HTML template, html theme, wedding html template, wedding html theme, weddlist, weddlist html, weddlist html template">
    <meta name="author" content="udayraj" />
    <meta name="MobileOptimized" content="320" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset(config('asset.user.images.index') . 'favicon.ico') }}" rel="icon" type="image/x-icon"/>
    @include('layouts.user.section.style')
    @yield('css')
</head>
<body>
    <div class="preloader">
        <div class="status">
        <div class="status-message">
        </div>
        </div>
    </div>

    @include('layouts.user.topnav')

    @include('layouts.user.header')
    
    @yield('content')

    @include('layouts.user.footer')

    @include('layouts.user.section.script')

    <script>
        Lang.setLocale('{{ Session::get('lang') }}');
    </script>
    @yield('script')
</body>
</html>
