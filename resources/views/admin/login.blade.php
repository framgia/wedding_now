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
        <script src="{{ asset(config('custom') . 'ajax_googleapis_webfont.js') }}"></script>
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
        <link href="{{ asset(config('vendors_base') . 'vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset(config('default_base') . 'style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Base Styles -->
    </head>
    <!-- end::Head -->
    <!-- end::Body -->
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-login m-login--signin m-login--5" id="m_login">
                <div class="m-login__wrapper-1 m-portlet-full-height">
                    <div class="m-login__wrapper-1-1">
                        <div class="m-login__contanier">
                            <div class="m-login__content">
                                <div class="m-login__logo">
                                    <a href="#">
                                        <img src="{{ asset('assets/app/media/img//logos/logo-2.png') }}">
                                    </a>
                                </div>
                                <div class="m-login__title">
                                    <h3>
                                        {{ __('get_free_account') }}
                                    </h3>
                                </div>
                                <div class="m-login__desc">
                                    Amazing Stuff is Lorem Here.Grownng Team
                                </div>
                                <div class="m-login__form-action">
                                    <button type="button" id="m_login_signup" class="btn btn-outline-focus m-btn--pill">
                                        {{ __('get_an_account') }}
                                    </button>
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
                                    {{ __('login_to_your_account') }}
                                </h3>
                            </div>
                            {!! Form::open(['class' => 'm-login__form m-form']) !!}
                                <div class="form-group m-form__group">
                                    {!! Form::text('username', '', ['class' => 'form-control m-input', 'placeholder' => __('username'), 'autocomplete' => 'off']) !!}
                                </div>
                                <div class="form-group m-form__group">
                                    {!! Form::password('password', ['class' => 'form-control m-input m-login__form-input--last', 'placeholder' => __('password')]) !!}
                                </div>
                                <div class="row m-login__form-sub">
                                    <div class="col m--align-left">
                                        <label class="m-checkbox m-checkbox--focus">
                                            {!! Form::checkbox('remember') !!}
                                            {{ __('remember_me') }}
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col m--align-right">
                                        <a href="javascript:;" id="m_login_forget_password" class="m-link">
                                            {{ __('forget_password') }}
                                        </a>
                                    </div>
                                </div>
                                <div class="m-login__form-action">
                                    <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                                        {{ __('sign_in') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="m-login__signup">
                            <div class="m-login__head">
                                <h3 class="m-login__title">
                                    {{ __('sign_up') }}
                                </h3>
                                <div class="m-login__desc">
                                    {{ __('create_your_account') }}
                                </div>
                            </div>
                            {!! Form::open(['class' => 'm-login__form m-form', 'method' => 'POST']) !!}
                                <div class="form-group m-form__group">
                                    {!! Form::text('fullname', '', ['class' => 'form-control m-input', 'placeholder' => __('fullname')]) !!}
                                </div>
                                <div class="form-group m-form__group">
                                    {!! Form::text('email', '', ['class' => 'form-control m-input', 'placeholder' => __('email'), 'autocomplete' => 'off']) !!}
                                </div>
                                <div class="form-group m-form__group">
                                    {!! Form::password('password', ['class' => 'form-control m-input', 'placeholder' => __('password')]) !!}
                                </div>
                                <div class="form-group m-form__group">
                                    {!! Form::password('rpassword', ['class' => 'form-control m-input m-login__form-input--last', 'placeholder' => __('confirm_password')]) !!}
                                </div>
                                <div class="m-login__form-sub">
                                    <label class="m-checkbox m-checkbox--focus">
                                        {!! Form::checkbox('agree') !!}
                                        {{ __('i_agree_the') }}
                                        <a href="#" class="m-link m-link--focus">
                                            {{ __('terms_and_conditions') }}
                                        </a>
                                        .
                                        <span></span>
                                    </label>
                                    <span class="m-form__help"></span>
                                </div>
                                <div class="m-login__form-action">
                                    <button id="m_login_signup_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                                        {{ __('sign_up') }}
                                    </button>
                                    <button id="m_login_signup_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">
                                        {{ __('cancel') }}
                                    </button>
                                </div>
                            {{-- </form> --}}
                            {!! Form::close() !!}
                        </div>
                        <div class="m-login__forget-password">
                            <div class="m-login__head">
                                <h3 class="m-login__title">
                                    {{ __('forgotten_password') }}
                                </h3>
                                <div class="m-login__desc">
                                    {{ __('enter_your_email_to_reset_your_password') }}
                                </div>
                            </div>
                            {!! Form::open(['class' => 'm-login__form m-form']) !!}
                                <div class="form-group m-form__group">
                                    {!! Form::text('email', '', ['class' => 'form-control m-input', 'autocomplete' => 'off', 'placeholder' => __('email')]) !!}
                                </div>
                                <div class="m-login__form-action">
                                    <button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                                        {{ __('request') }}
                                    </button>
                                    <button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom ">
                                        {{ __('cancel') }}
                                    </button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Page -->
        <!--begin::Base Scripts -->
        <script src="{{ asset(config('vendors_base') . 'vendors.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset(config('default_base') . 'scripts.bundle.js') }}" type="text/javascript"></script>
        <!--end::Base Scripts -->
        <!--begin::Page Snippets -->
        <script src="{{ asset(config('login') . 'login.js') }}" type="text/javascript"></script>
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
