<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>
        {{ config('app.name') }}
    </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="{{ asset(config('asset.custom') . 'ajax_googleapis_webfont.js') }}"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->
    <!--begin::Base Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset(config('asset.custom') . 'admin_custom.css') }}">
    <!--begin::Page Vendors -->
    <!--end::Page Vendors -->
    <link href="{{ asset(config('asset.vendors_base') . 'vendors.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset(config('asset.default_base') . 'style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Base Styles -->
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default" >
    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <!-- BEGIN: Header -->
        @include('admin.header')
        <!-- END: Header -->
        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            <!-- BEGIN: Left Aside -->
            <button class="m-aside-left-close m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
            <i class="la la-close"></i>
            </button>
            @include('admin.aside_menu')
            <!-- END: Left Aside -->
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <!-- BEGIN: Subheader -->
                <div class="m-subheader ">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="m-subheader__title ">{{ __('Dashboard') }}</h3>
                        </div>
                        <div>
                            <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                                <span class="m-subheader__daterange-label">
                                    <span class="m-subheader__daterange-title"></span>
                                    <span class="m-subheader__daterange-date m--font-brand"></span>
                                </span>
                                <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                    <i class="la la-angle-down"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- END: Subheader -->
                <div class="m-content">
                    <!--Begin::Section-->
                    <div class="row">
                        <div class="col-xl-4">
                        </div>
                    </div>
                    <!--End::Section-->
                </div>
            </div>
        </div>
        <!-- end:: Body -->
        <!-- begin::Footer -->
        @include('admin.footer')
        <!-- end::Footer -->
    </div>
    <!-- end:: Page -->

    <!-- begin::Quick Sidebar -->
    @include('admin.quick_sidebar')
    <!-- end::Quick Sidebar -->

    <!-- begin::Scroll Top -->
    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>
    <!-- end::Scroll Top -->

    <!--begin::Base Scripts -->
    <script src="{{ asset(config('asset.vendors_base') . 'vendors.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset(config('asset.default_base') . 'scripts.bundle.js') }}" type="text/javascript"></script>
    <!--end::Base Scripts -->
    <!--begin::Page Snippets -->
    <script src="{{ asset(config('asset.app_js') . 'dashboard.js') }}" type="text/javascript"></script>
    <!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>
