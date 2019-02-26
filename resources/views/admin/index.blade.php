<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head>
    @routes
    <meta charset="utf-8"/>
    <title>
        {{ config('app.name') }}
    </title>
    {{ Html::script('messages.js') }}
    @routes()
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset(config('asset.custom') . 'ajax_googleapis_webfont.js') }}"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset(config('asset.custom') . 'admin_custom.css') }}">
    <link href="{{ asset(config('asset.vendors_base') . 'vendors.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset(config('asset.default_base') . 'style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/demo/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css">
    @yield('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/admin.css') }}">
</head>
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<div class="m-grid m-grid--hor m-grid--root m-page">
@include('admin.header')
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <button class="m-aside-left-close m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
            <i class="la la-close"></i>
        </button>
    @include('admin.aside_menu')
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">
                            @yield('subheader')
                        </h3>
                    </div>
                    <div>
                        <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push"
                             m-dropdown-toggle="hover" aria-expanded="true">
                            <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill m-dropdown__toggle">
                                <i class="la la-plus m--hide"></i>
                                <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="m-dropdown__wrapper">
                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                <div class="m-dropdown__inner">
                                    <div class="m-dropdown__body">
                                        <div class="m-dropdown__content">
                                            <ul class="m-nav">
                                                <li class="m-nav__section m-nav__section--first m--hide">
                                                    <span class="m-nav__section-text">
                                                        {{ __('base.quick_actions') }}
                                                    </span>
                                                </li>
                                                <li class="m-nav__item">
                                                    <a href="" class="m-nav__link">
                                                        <i class="m-nav__link-icon flaticon-share"></i>
                                                        <span class="m-nav__link-text">
                                                            {{ __('base.activity') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-nav__item">
                                                    <a href="" class="m-nav__link">
                                                        <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                        <span class="m-nav__link-text">
                                                            {{ __('base.messages') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-nav__item">
                                                    <a href="" class="m-nav__link">
                                                        <i class="m-nav__link-icon flaticon-info"></i>
                                                        <span class="m-nav__link-text">
                                                            {{ __('base.faq') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-nav__item">
                                                    <a href="" class="m-nav__link">
                                                        <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                        <span class="m-nav__link-text">
                                                            {{ __('base.support') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-nav__separator m-nav__separator--fit"></li>
                                                <li class="m-nav__item">
                                                    <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                                                        {{ __('base.submit') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-content">
                @yield('content')
            </div>
        </div>
    </div>
    {{-- @include('admin.footer') --}}
</div>
@include('admin.quick_sidebar')
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>
<script src="{{ asset(config('asset.vendors_base') . 'vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset(config('asset.default_base') . 'scripts.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset(config('asset.app_js') . 'dashboard.js') }}" type="text/javascript"></script>
<script src="{{ asset(config('asset.components_base') . 'sweetalert2.js') }}" type="text/javascript"></script>
<script src="{{ asset(config('asset.components_base') . 'toastr.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app_admin.js') }}" async defer></script>
@yield('js')
</body>
</html>
