@extends('admin.index')

@section('subheader', __('base.my_profile'))

@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="m-portlet m-portlet--full-height">
            <div class="m-portlet__body">
                <div class="m-card-profile">
                    <div class="m-card-profile__pic">
                        <div class="m-card-profile__pic-wrapper">
                            <img src="{{ asset(config('asset.users.avatar') . ($user->media ? $user->media->name : config('asset.user_default')) ) }}" id="user_avatar"/>
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
                    <li class="m-nav__section">
                        <span class="m-nav__section-text">
                            {{ __('base.section') }}
                        </span>
                    </li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-profile-1"></i>
                            <span class="m-nav__link-title">
                                <span class="m-nav__link-wrap">
                                    <span class="m-nav__link-text">
                                        {{ __('base.my_profile') }}
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
                                {{ __('base.activity') }}
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                            <span class="m-nav__link-text">
                                {{ __('base.messages') }}
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-graphic-2"></i>
                            <span class="m-nav__link-text">
                                {{ __('admin.sales') }}
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-time-3"></i>
                            <span class="m-nav__link-text">
                                {{ __('admin.events') }}
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                            <span class="m-nav__link-text">
                                {{ __('base.support') }}
                            </span>
                        </a>
                    </li>
                </ul>
                <div class="m-portlet__body-separator"></div>
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
                                <i class="flaticon-share "></i>
                                {{ __('base.update_profile') }}
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                {{ __('base.messages') }}
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                {{ __('base.settings') }}
                            </a>
                        </li>
                    </ul>
                </div>
                @include('admin.head_tools')
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="m_user_profile_tab_1">
                    {!! Form::open(['id' => 'update_profile', 'class' => 'm-form m-form--fit m-form--label-align-right', 'route' => 'user.update', 'files' => true]) !!}
                        @method('PUT')
                        {!! Form::file('avatar_file', ['class' => 'd-none', 'id' => 'avatar_file']) !!}
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">
                                        1. {{ __('admin.personal_details') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('name', __('base.name'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::text('name', $user->name, ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('validation.custom.enter.name')]) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('birthday', __('base.birthday'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::date('birthday', $user->birthday, ['required', 'class' => 'form-control m-input m-input--solid']) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('email', __('base.email'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::email('email', $user->email, ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('validation.custom.enter.email')]) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('gender', __('base.gender'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    <div class="m-radio-inline">
                                        <label class="m-radio m-radio--state-success">
                                            {!! Form::radio('gender', 'male', ($user->gender == 'male' ? true : false)) !!}
                                            {{ __('base.male') }}
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--state-brand">
                                            {!! Form::radio('gender', 'female', ($user->gender == 'female' ? true : false)) !!}
                                            {{ __('base.female') }}
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('phone', __('base.phone'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::number('phone', $user->phone, ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('validation.custom.enter.phone')]) !!}
                                </div>
                            </div>
                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">
                                        2. {{ __('base.address') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('city', __('base.city'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::select(
                                        'city',
                                        $city,
                                        count($user->locations) > 0 ? $user->locations[0]->district->city->id : null,
                                        [
                                            'placeholder' => __('validation.custom.select.city'),
                                            'class' => 'form-control m-input m-input--solid'
                                        ])
                                    !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('district', __('base.district'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::select(
                                        'district',
                                        $district,
                                        count($user->locations) > 0 ? $user->locations[0]->district->id : null,
                                        [
                                            'placeholder' => __('validation.custom.select.district'),
                                            'class' => 'form-control m-input m-input--solid'
                                        ])
                                    !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('address', __('base.address'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::text('address', count($user->locations) > 0 ? $user->locations[0]->address : null, ['class' => 'form-control m-input m-input--solid', 'placeholder' => __('validation.custom.enter.address')]) !!}
                                </div>
                            </div>
                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">
                                        4. {{ __('admin.account.account') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('user_name', __('base.user_name'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::text('user_name', $user->user_name, ['class' => 'form-control m-input m-input--solid', 'disabled', 'placeholder' => __('base.user_name')]) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('password', __('base.password'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::password('password', ['class' => 'form-control m-input m-input--solid', 'placeholder' => __('validation.custom.enter.password')]) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('password_confirmation', __('base.password_confirmation'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::password('password_confirmation', ['class' => 'form-control m-input m-input--solid', 'placeholder' => __('validation.custom.enter.password_confirmation')]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-7">
                                        {!! Form::submit(__('base.update'), ['id' => 'save', 'class' => 'btn btn-accent m-btn m-btn--air m-btn--custom']) !!}
                                        &nbsp;&nbsp;
                                        {!! Form::reset(__('base.reset'), ['class' => 'btn btn-secondary m-btn m-btn--air m-btn--custom']) !!}
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
</div>
@endsection

@section('js')
    <script src="{{ asset('js/admin/user/profile.js') }}" type="text/javascript" charset="utf-8" defer></script>
@endsection
