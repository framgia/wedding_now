<!DOCTYPE html>
<html lang="en" >
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
        <script src="{{ asset(config('asset.admin_base') . 'js/ajax_googleapis_webfont.js') }}"></script>
        <script>
            WebFont.load({
                google: {
                    "families": [
                    "Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"
                    ]
                },
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <script>
            Lang.setLocale('{{ Session::get('lang') }}');
        </script>
        <link href="{{ asset(config('asset.admin_base') . 'css/vendors.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset(config('asset.admin_base') . 'css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('asset/auth/auth.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-login m-login--signin m-login--5 background-url-3" id="m_login">
                <div class="m-login__wrapper-1 m-portlet-full-height">
                    <div class="m-login__wrapper-1-1">
                        <div class="m-login__contanier">
                            <div class="m-login__content">
                                <div class="m-login__logo">
                                    <a href="{{ route('client.home') }}">
                                        <img src="{{ asset(config('define.logo.website')) }}" class="img img-fluid">
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
                                    {{ Form::button(__('base.get_an_account'), ['id' => 'm_login_signup', 'class' => 'btn btn-outline-focus m-btn--pill']) }}
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
                            {{ Form::open(['route' => 'login', 'method' => 'POST', 'class' => 'm-login__form m-form', 'id' => 'form-login']) }}
                                <div class="form-group row">
                                    <label for="login-email" class="col-sm-3 col-form-label">
                                        {{ __('base.email') }}
                                    </label>
                                    <div class="col-sm-9">
                                        {{ Form::text('email', old('email'), ['required', 'class' => 'form-control m-input',
                                         'placeholder' => __('base.email'), 'autocomplete' => 'off', 'id' => 'login-email']) }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="login-password" class="col-sm-3 col-form-label">
                                        {{ __('base.password') }}
                                    </label>
                                    <div class="col-sm-9">
                                        {{ Form::password('password', ['required', 'class' => 'form-control m-input m-login__form-input--last', 'placeholder' => __('base.password'), 'autocomplete' => 'off', 'id' => 'login-password']) }}
                                    </div>
                                </div>
                                <div class="row m-login__form-sub">
                                    <div class="col m--align-left">
                                        <label class="m-checkbox m-checkbox--focus">
                                            {{ Form::checkbox('remember') }}
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
                                    {{ Form::submit(__('base.login'), ['class' => 'btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air']) }}
                                </div>
                                <div class="text text-center">
                                    <p>{{ __('base.or') }}</p>
                                    <a class="social-link" href="{{ route('client.login-with-account-social-redirect', ['social' => config('define.social.facebook')]) }}">
                                        <img height="28px" width="28px" src="{{ asset(config('define.logo.fb')) }}" alt="">
                                    </a>
                                    <a class="social-link" href="{{ route('client.login-with-account-social-redirect', ['social' => config('define.social.google')]) }}">
                                        <img height="28px" width="28px" src="{{ asset(config('define.logo.gmail')) }}" alt="">
                                    </a>
                                </div>
                            {{ Form::close() }}
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
                            {{ Form::open(['class' => 'm-login__form m-form', 'method' => 'POST', 'route' => 'register', 'id' => 'form-register']) }}
                                <h4 class="text-upcase">{{ __('base.basic_infor') }}</h4>
                                <div class="form-group row">
                                    <label for="register-name" class="col-sm-3 col-form-label">
                                        {{ __('base.your_name') }}
                                    </label>
                                    <div class="col-sm-9">
                                        {{ Form::text('name', '', ['required', 'class' => 'form-control m-input',
                                         'placeholder' => __('base.your_name'), 'id' => 'register-name', 'autocomplete' => 'off']) }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="register-phone" class="col-sm-3 col-form-label">
                                        {{ __('base.phone') }}
                                    </label>
                                    <div class="col-sm-9">
                                        {{ Form::text('phone', '', ['required', 'class' => 'form-control m-input',
                                         'placeholder' => __('base.phone'), 'id' => 'register-phone', 'autocomplete' => 'off']) }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">{{ __('base.gender') }}</label>
                                    <div class="col-sm-9 radio-choose-regiter">
                                        <label class="m-radio m-radio--state-success">
                                            {{ Form::radio('gender', 'male', []) }}
                                            {{ __('base.male') }}
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--state-brand">
                                            {{ Form::radio('gender', 'female', '', []) }}
                                            {{ __('base.female') }}
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="register-address" class="col-sm-3 col-form-label">
                                        {{ __('base.address') }}
                                    </label>
                                    <div class="col-sm-9">
                                        {{ Form::text('address', '', ['required', 'class' => 'form-control m-input',
                                         'placeholder' => __('base.address'), 'autocomplete' => 'off', 'id' => 'register-address']) }}
                                         {!! Form::hidden('district', null, ['id' => 'district']) !!}
                                    </div>
                                    <div class="search-location">
                                        <div class="box-search">
                                            <ul class="list-location">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h4 class="text-upcase">{{ __('base.basic_account') }}</h4>
                                <div class="form-group row">
                                    <label for="register-email" class="col-sm-3 col-form-label">
                                        {{ __('base.email') }}
                                    </label>
                                    <div class="col-sm-9">
                                        {{ Form::email('email', '', ['required', 'class' => 'form-control m-input',
                                         'placeholder' => __('base.email'), 'autocomplete' => 'off', 'id' => 'register-email']) }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="register-password" class="col-sm-3 col-form-label">
                                        {{ __('base.password') }}
                                    </label>
                                    <div class="col-sm-9">
                                        {{ Form::password('password', ['required', 'class' => 'form-control m-input',
                                         'placeholder' => __('base.password'), 'id' => 'register-password']) }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="register-password-confirm" class="col-sm-3 col-form-label">
                                        {{ __('base.password_confirmation') }}
                                    </label>
                                    <div class="col-sm-9">
                                        {{ Form::password('password_confirmation', ['required', 'class' => 'form-control m-input',
                                         'placeholder' => __('base.password_confirmation'), 'id' => 'register-password-confirm']) }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">
                                        {{ __('base.role') }}
                                    </label>
                                    <div class="col-sm-9 radio-choose-regiter">
                                        <label class="m-radio m-radio--state-success">
                                            {{ Form::radio('role', config('define.role.client'), []) }}
                                            {{ __('base.role_name.client') }}
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--state-brand">
                                            {{ Form::radio('role', config('define.role.vendor'), '', []) }}
                                            {{ __('base.role_name.vendor') }}
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="m-login__form-sub">
                                    <label class="m-checkbox m-checkbox--focus">
                                        {{ Form::checkbox('iAgree', 'agree', false, ['id' => 'btnAgree']) }}
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
                                    {{ Form::submit(__('base.submit'), ['disabled' => '', 'class' => 'btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air', 'id' => 'btnRegister']) }}
                                    {{ Form::button(__('base.cancel'), ['id' => 'm_login_signup_cancel',
                                     'class' => 'btn btn-outline-focus m-btn m-btn--pill m-btn--custom']) }}
                                </div>
                            {{ Form::close() }}
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
                            {{ Form::open(['required', 'class' => 'm-login__form m-form', 'route' => 'password.email', 'method' => 'POST']) }}
                                <div class="form-group row">
                                    <label for="forget-enter-email" class="col-sm-3 col-form-label">
                                        {{ __('base.email') }}
                                    </label>
                                    <div class="col-sm-9">
                                        {{ Form::email('email', '', ['required', 'class' => 'form-control m-input', 'autocomplete' => 'off', 'placeholder' => __('base.email'), 'id' => 'forget-enter-email']) }}
                                    </div>
                                </div>
                                <div class="m-login__form-action">
                                    {{ Form::submit(__('base.submit'), ['class' => 'btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air']) }}
                                    {{ Form::button(__('base.cancel'), ['id' => 'm_login_forget_password_cancel', 'class' => 'btn btn-outline-focus m-btn m-btn--pill m-btn--custom']) }}
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset(config('asset.admin_base') . 'js/vendors.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset(config('asset.admin_base') . 'js/scripts.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('asset/auth/auth.js') }}"></script>
        @include('sweet::alert')
    </body>
</html>
