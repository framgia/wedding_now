@extends('admin.index')

@section('subheader', __('my_profile'))

@section('content')
    <div class="col-xl-3 col-lg-4">
        <div class="m-portlet m-portlet--full-height  ">
            <div class="m-portlet__body">
                <div class="m-card-profile">
                    <div class="m-card-profile__title m--hide">
                        Your Profile
                    </div>
                    <div class="m-card-profile__pic">
                        {!! Form::file('avatar_file', ['class' => 'd-none', 'id' => 'avatar_file']) !!}
                        <div class="m-card-profile__pic-wrapper">
                            <img src="{{ asset(config('asset.user') . ($user->medias->name ? $user->medias->name : 'user4.jpg') ) }}" id="user_avatar"/>
                        </div>
                    </div>
                    <div class="m-card-profile__details">
                        <span class="m-card-profile__name">
                            {{ $user->name }}
                        </span>
                        <a href="#" class="m-card-profile__email m-link">
                            {{ $user->email }}
                        </a>
                    </div>
                </div>
                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                    <li class="m-nav__separator m-nav__separator--fit"></li>
                    <li class="m-nav__section m--hide">
                        <span class="m-nav__section-text">
                            Section
                        </span>
                    </li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-profile-1"></i>
                            <span class="m-nav__link-title">
                                <span class="m-nav__link-wrap">
                                    <span class="m-nav__link-text">
                                        {{ __('my_rofile') }}
                                    </span>
                                    <span class="m-nav__link-badge">
                                        <span class="m-badge m-badge--success">
                                            2
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-share"></i>
                            <span class="m-nav__link-text">
                                {{ __('activity') }}
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                            <span class="m-nav__link-text">
                                {{ __('messages') }}
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-graphic-2"></i>
                            <span class="m-nav__link-text">
                                {{ __('sales') }}
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-time-3"></i>
                            <span class="m-nav__link-text">
                                {{ __('events') }}
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                            <span class="m-nav__link-text">
                                {{ __('support') }}
                            </span>
                        </a>
                    </li>
                </ul>
                <div class="m-portlet__body-separator"></div>
                <div class="m-widget1 m-widget1--paddingless">
                    <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                            <div class="col">
                                <h3 class="m-widget1__title">
                                    {{ __('member_profit') }}
                                </h3>
                                <span class="m-widget1__desc">
                                    {{ __('awerage_weekly_profit') }}
                                </span>
                            </div>
                            <div class="col m--align-right">
                                <span class="m-widget1__number m--font-brand">
                                    +$17,800
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                            <div class="col">
                                <h3 class="m-widget1__title">
                                    {{ __('orders') }}
                                </h3>
                                <span class="m-widget1__desc">
                                    {{ __('weekly_customer_orders') }}
                                </span>
                            </div>
                            <div class="col m--align-right">
                                <span class="m-widget1__number m--font-danger">
                                    +1,800
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                            <div class="col">
                                <h3 class="m-widget1__title">
                                    {{ __('issue_reports') }}
                                </h3>
                                <span class="m-widget1__desc">
                                    {{ __('system_bugs_and_issues') }}
                                </span>
                            </div>
                            <div class="col m--align-right">
                                <span class="m-widget1__number m--font-success">
                                    -27,49%
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-8">
        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-tools">
                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                <i class="flaticon-share m--hide"></i>
                                {{ __('update_profile') }}
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                {{ __('messages') }}
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                {{ __('settings') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item m-portlet__nav-item--last">
                            <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                    <i class="la la-gear"></i>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__section m-nav__section--first">
                                                        <span class="m-nav__section-text">
                                                            {{ __('quick_actions') }}
                                                        </span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">
                                                                {{ __('create_post') }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">
                                                                {{ __('send_messages') }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-multimedia-2"></i>
                                                            <span class="m-nav__link-text">
                                                                {{ __('upload_file') }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__section">
                                                        <span class="m-nav__section-text">
                                                            {{ __('useful_links') }}
                                                        </span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">
                                                                {{ __('faq') }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">
                                                                {{ __('support') }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__separator m-nav__separator--fit m--hide"></li>
                                                    <li class="m-nav__item m--hide">
                                                        <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                                                            {{ __('submit') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="m_user_profile_tab_1">
                    {!! Form::open(['class' => 'm-form m-form--fit m-form--label-align-right', 'method' => 'POST']) !!}
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                <div class="alert m-alert m-alert--default" role="alert">
                                    The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">
                                        1. {{ __('personal_details') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('name', __('full_name'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::text('name', $user->name, ['required', 'class' => 'form-control m-input', 'placeholder' => __('full_name')]) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('birthday', __('birthday'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::date('birthday', $user->birthday, ['required', 'class' => 'form-control m-input']) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('email', __('email'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::date('email', $user->email, ['required', 'class' => 'form-control m-input', 'placeholder' => __('email')]) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('gender', __('gender'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    <div class="m-radio-inline">
                                        <label class="m-radio m-radio--state-success">
                                            {!! Form::radio('gender', 'male', ($user->gender == 'Male' ? 'checked' : '')) !!}
                                            {{ __('male') }}
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--state-brand">
                                            {!! Form::radio('gender', 'female', ($user->gender == 'Female' ? 'checked' : '')) !!}
                                            {{ __('female') }}
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('phone', __('phone'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::number('phone', $user->phone, ['required', 'class' => 'form-control m-input', 'placeholder' => __('phone')]) !!}
                                </div>
                            </div>
                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">
                                        2. {{ __('address') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('city', __('city'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::text('city', '', ['class' => 'form-control m-input', 'placeholder' => __('city')]) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('district', __('district'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::text('district', '', ['class' => 'form-control m-input', 'placeholder' => __('district')]) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('address', __('address'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::text('address', '', ['class' => 'form-control m-input', 'placeholder' => __('address')]) !!}
                                </div>
                            </div>
                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">
                                        3. {{ __('social_links') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('facebook', __('facebook'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::text('facebook', '', ['class' => 'form-control m-input', 'placeholder' => __('facebook')]) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('twister', __('twister'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::text('twister', '', ['class' => 'form-control m-input', 'placeholder' => __('twister')]) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('instagram', __('instagram'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::text('instagram', '', ['class' => 'form-control m-input', 'placeholder' => __('instagram')]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-7">
                                        {!! Form::submit(__('save_changes'), ['id' => 'save', 'class' => 'btn btn-accent m-btn m-btn--air m-btn--custom']) !!}
                                        &nbsp;&nbsp;
                                        {!! Form::reset(__('reset'), ['class' => 'btn btn-secondary m-btn m-btn--air m-btn--custom']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="tab-pane" id="m_user_profile_tab_2"></div>
                <div class="tab-pane" id="m_user_profile_tab_3"></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
    $('#user_avatar').click(function() {
        $('#avatar_file').click();
    });

    $('#avatar_file').change(function(e) {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#user_avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

            toastr.success("{{ __('success') }}");
        }
    });

    $('#save').click(function(event) {
        event.preventDefault();

        toastr.success("{{ __('success') }}");
    });
</script>
@endsection
