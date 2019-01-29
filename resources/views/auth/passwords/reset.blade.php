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
        <link rel="stylesheet" type="text/css" href="{{ asset(config('asset.custom') . 'admin_custom.css') }}">
        <!--begin::Base Styles -->
        <link href="{{ asset(config('asset.vendors_base') . 'vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset(config('asset.default_base') . 'style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Base Styles -->
    </head>
    <!-- end::Head -->
    <!-- end::Body -->
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-login m-login--signin m-login--5 background-url-3" id="m_login">
                <div class="m-login__wrapper-2 m-portlet-full-height">
                    <div class="m-login__contanier">
                        <div class="m-login__signin">
                            <div class="m-login__head">
                                <h3 class="m-login__title">
                                    {{ __('admin.reset_pasword') }}
                                </h3>
                            </div>
                            {!! Form::open(['method' => 'POST', 'route' => 'password.update', 'class' => 'm-login__form m-form']) !!}
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                @if (count($errors) > 0)
                                    @foreach ($errors->all() as $error)
                                        <div class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn" role="alert">
                                            {!! Form::button('', ['class' => 'close', 'data-dismiss' => 'alert', 'aria-label' => 'Close']) !!}
                                            <span>{{ $error }}</span>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="form-group m-form__group">
                                    {!! Form::email('email', '', ['required', 'class' => 'form-control m-input', 'placeholder' => __('email'), 'autocomplete' => 'off']) !!}
                                </div>
                                <div class="form-group m-form__group">
                                    {!! Form::password('password', ['class' => 'form-control m-input m-login__form-input--last', 'placeholder' => __('password'), 'required']) !!}
                                </div>
                                <hr>
                                <div class="form-group m-form__group">
                                    {!! Form::password('password_confirmation', ['class' => 'form-control m-input m-login__form-input--last', 'placeholder' => __('admin.password_confirmation'), 'required']) !!}
                                </div>
                                <div class="m-login__form-action">
                                    {!! Form::submit(__('admin.submit'), ['class' => 'btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Page -->
        <!--begin::Base Scripts -->
        <script src="{{ asset(config('asset.vendors_base') . 'vendors.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset(config('asset.default_base') . 'scripts.bundle.js') }}" type="text/javascript"></script>
        <!--end::Base Scripts -->
        <!--begin::Page Snippets -->
        <script src="{{ asset(config('asset.login') . 'login.js') }}" type="text/javascript"></script>
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
