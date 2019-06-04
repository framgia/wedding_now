<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            {{ config('app.name') }}
        </title>
        @routes
        {{ Html::script('messages.js') }}
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
        <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Base Styles -->
    </head>
    <!-- end::Head -->
    <!-- end::Body -->
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-login m-login--signin m-login--5 background-url-3" id="m_login">
                <div class="m-login__wrapper-1 m-portlet-full-height">
                    <div class="m-login__wrapper-1-1">
                        <div class="m-login__contanier">
                            <div class="m-login__content">
                                <div class="m-login__logo">
                                    <a href="#">
                                        <img src="{{ asset(config('asset.app_logo') . 'logo-2.png') }}">
                                    </a>
                                </div>
                                <div class="m-login__title">
                                    <h3>
                                        {{ __('base.get_free_account') }}
                                    </h3>
                                </div>
                                <div class="m-login__desc">
                                    {{ __('base.login_desc') }}
                                </div>
                                <div class="m-login__form-action">
                                    {!! Form::button(__('base.get_an_account'), ['id' => 'm_login_signup', 'class' => 'btn btn-outline-focus m-btn--pill']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="m-login__border">
                            <div></div>
                        </div>
                    </div>
                </div>
                <div class="m-login__wrapper-2 m-portlet-full-height">
                    <div class="m-login__contanier">
                        <div class="m-login__signin">
                            <div class="m-login__head">
                                <h3 class="m-login__title">
                                    {{ __('base.login') }}
                                </h3>
                            </div>
                            {!! Form::open(['route' => 'login', 'method' => 'POST', 'class' => 'm-login__form m-form']) !!}
                                @if (count($errors) > 0)
                                    @foreach ($errors->all() as $error)
                                        <div class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn" role="alert">
                                            {!! Form::button('', ['class' => 'close', 'data-dismiss' => 'alert', 'aria-label' => 'Close']) !!}
                                            <span>{{ $error }}</span>
                                        </div>
                                    @endforeach
                                @endif
                                @if (session('status'))
                                    <div class="m-alert m-alert--outline alert alert-success alert-dismissible animated fadeIn" role="alert">
                                        {!! Form::button('', ['class' => 'close', 'data-dismiss' => 'alert', 'aria-label' => 'Close', 'type' => 'button']) !!}
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if (session('resent'))
                                    <div class="m-alert m-alert--outline alert alert-success alert-dismissible animated fadeIn" role="alert">
                                        {!! Form::button('', ['class' => 'close', 'data-dismiss' => 'alert', 'aria-label' => 'Close']) !!}
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @endif
                                <div class="form-group m-form__group">
                                    {!! Form::text('email', old('email'), ['required', 'class' => 'form-control m-input', 'placeholder' => __('base.email_or_username'), 'autocomplete' => 'on']) !!}
                                </div>
                                <div class="form-group m-form__group">
                                    {!! Form::password('password', ['class' => 'form-control m-input m-login__form-input--last', 'placeholder' => __('base.password'), 'required']) !!}
                                </div>
                                <div class="row m-login__form-sub">
                                    <div class="col m--align-left">
                                        <label class="m-checkbox m-checkbox--focus">
                                            {!! Form::checkbox('remember') !!}
                                            {{ __('base.remember_me') }}
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col m--align-right">
                                        <a href="javascript:;" id="m_login_forget_password" class="m-link">
                                            {{ __('base.forget_password') }}
                                        </a>
                                    </div>
                                </div>
                                <div class="m-login__form-action">
                                    {!! Form::submit(__('base.login'), ['class' => 'btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="m-login__signup">
                            <div class="m-login__head">
                                <h3 class="m-login__title">
                                    {{ __('base.sign_up') }}
                                </h3>
                                <div class="m-login__desc">
                                    {{ __('base.create_your_account') }}
                                </div>
                            </div>
                            {!! Form::open(['class' => 'm-login__form m-form', 'method' => 'POST', 'route' => 'register']) !!}
                                @if (count($errors) > 0)
                                    @foreach ($errors->all() as $error)
                                        <div class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn" role="alert">
                                            {!! Form::button('', ['class' => 'close', 'data-dismiss' => 'alert', 'aria-label' => 'Close']) !!}
                                            <span>{{ $error }}</span>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="form-group m-form__group">
                                    {!! Form::text('name', '', ['required', 'class' => 'form-control m-input', 'placeholder' => __('base.name')]) !!}
                                </div>
                                <div class="form-group m-form__group">
                                    {!! Form::date('birthday', '', ['required', 'class' => 'form-control m-input']) !!}
                                </div>
                                <div class="form-group m-form__group">
                                    {!! Form::number('phone', '', ['required', 'class' => 'form-control m-input', 'placeholder' => __('base.phone')]) !!}
                                </div>
                                <br>
                                <div class="m-form__group form-group">
                                    <div class="m-radio-inline">
                                        <label class="m-radio m-radio--state-success">
                                            {!! Form::radio('gender', 'male', 'checked', []) !!}
                                            {{ __('base.male') }}
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--state-brand">
                                            {!! Form::radio('gender', 'female', '', []) !!}
                                            {{ __('base.female') }}
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group m-form__group">
                                    {!! Form::email('email', '', ['required', 'class' => 'form-control m-input', 'placeholder' => __('base.email'), 'autocomplete' => 'off']) !!}
                                </div>
                                <div class="form-group m-form__group">
                                    {!! Form::text('user_name', '', ['required', 'class' => 'form-control m-input', 'placeholder' => __('base.user_name'), 'autocomplete' => 'off']) !!}
                                </div>
                                <div class="form-group m-form__group">
                                    {!! Form::password('password', ['required', 'class' => 'form-control m-input', 'placeholder' => __('base.password')]) !!}
                                </div>
                                <div class="form-group m-form__group">
                                    {!! Form::password('password_confirmation', ['required', 'class' => 'form-control m-input', 'placeholder' => __('base.password_confirmation')]) !!}
                                </div>
                                <div class="form-group m-form__group">
                                    {!! Form::select('role', $roles, null, ['required', 'class' => 'form-control m-input', 'placeholder' => __('validation.custom.select.role')]) !!}
                                </div>
                                <div class="form-group m-form__group">
                                    {!! Form::select('city', $city, $city[1], ['id' => 'city', 'required', 'class' => 'form-control', 'placeholder' => __('validation.custom.select.city')]) !!}
                                </div>
                                <div class="form-group m-form__group">
                                    {!! Form::select('district', ['' => __('validation.custom.select.district')], null, ['id' => 'district', 'required', 'class' => 'form-control m-input']) !!}
                                </div>
                                <div class="form-group m-form__group">
                                    {!! Form::text('address', '', ['required', 'class' => 'form-control m-input', 'placeholder' => __('base.address')]) !!}
                                </div>
                                <div class="m-login__form-sub">
                                    <label class="m-checkbox m-checkbox--focus">
                                        {!! Form::checkbox('iAgree', 'agree', false, ['id' => 'btnAgree']) !!}
                                        {{ __('base.i_agree') }}
                                        <a href="#" class="m-link m-link--focus">
                                            {{ __('base.terms_and_conditions') }}
                                        </a>
                                        .
                                        <span></span>
                                    </label>
                                    <span class="m-form__help"></span>
                                </div>
                                <div class="m-login__form-action">
                                    {!! Form::submit(__('base.submit'), ['disabled' => '', 'class' => 'btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air', 'id' => 'btnRegister']) !!}
                                    {!! Form::button(__('base.cancel'), ['id' => 'm_login_signup_cancel', 'class' => 'btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="m-login__forget-password">
                            <div class="m-login__head">
                                <h3 class="m-login__title">
                                    {{ __('base.forgotten_password') }}
                                </h3>
                                <div class="m-login__desc">
                                    {{ __('base.enter_your_email_to_reset_your_password') }}
                                </div>
                            </div>
                            {!! Form::open(['required', 'class' => 'm-login__form m-form', 'route' => 'password.email', 'method' => 'POST']) !!}
                                <div class="form-group m-form__group">
                                    {!! Form::email('email', '', ['required', 'class' => 'form-control m-input', 'autocomplete' => 'off', 'placeholder' => __('base.email')]) !!}
                                    @if ($errors->has('email'))
                                        <div id="fullname-error" class="form-control-feedback">{{ __('admin.required') }}</div>
                                    @endif
                                </div>
                                <div class="m-login__form-action">
                                    {!! Form::submit(__('base.submit'), ['class' => 'btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air']) !!}
                                    {!! Form::button(__('base.cancel'), ['id' => 'm_login_forget_password_cancel', 'class' => 'btn btn-outline-focus m-btn m-btn--pill m-btn--custom']) !!}
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

        <script src="{{ asset('js/login.js') }}" type="text/javascript" charset="utf-8" async defer></script>
    </body>
    <!-- end::Body -->
</html>
