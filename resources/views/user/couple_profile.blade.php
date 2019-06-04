@extends('layouts.main')

@section('title')
    {{ __('page.title.profile') }}
@endsection

@section('page-name')
    {{ __('page.page.profile') }}
@endsection

@section('main-content')
    <!-- couple profile -->
    <section id="couple-profile" class="couple-profile-main-page">
        <div class="container">
            <div class="couple-profile-tabs general-nav-tabs tabs">
                <a href="#" class="active btn btn-default">
                    <span class="badge">{{ __('page.profile.profile') }}</span>
                </a>
            </div>
            <div class="row">
                {!! Form::open(['id' => 'update_profile', 'class' => 'm-form m-form--fit m-form--label-align-right', 'route' => 'user.update', 'files' => true]) !!}
                    @method('PUT')
                    <div class="col-md-8 col-md-offset-2">
                        <div class="couple-profile-main-block">
                            <div class="upload-profile-block mrgn-bottom-30">
                                <h3 class="couple-profile-heading">{{ __('page.profile.upload_photo') }}</h3>
                                <div class="row">
                                    <div class="col-md-5 col-sm-4">
                                        <div class="upload-img">
                                            <img src="{{ asset(config('asset.users.avatar') . (isset($user->media->name) ? $user->media->name : 'user_default.png'))  }}" class="img-responsive" alt="upload img" id="img-avatar">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-8">
                                        <div class="upload-img-btn">
                                            <div class="upload-btn-wrapper">
                                                <a href="#" class="btn btn-pink btn-upload">
                                                    {{ __('page.profile.btn_upload') }}
                                                    {!! Form::file('avatar_file', ['class' => 'd-none', 'id' => 'avatar_file']) !!}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="couple-profile-block mrgn-bottom-30">
                                <h3 class="couple-profile-heading">{{ __('page.profile.couple_profile') }}</h3>
                                <form>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {!! Form::label('user_name', __('page.profile.user_name')) !!}
                                        </div>
                                        <div class="col-sm-8">
                                            {!! Form::text('user_name', $user->user_name, ['class' => 'form-control', 'disabled', 'placeholder' => __('page.profile.user_name')]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {!! Form::label('name', __('page.profile.name')) !!}
                                        </div>
                                        <div class="col-sm-8">
                                            {!! Form::text('name', $user->name, ['required', 'class' => 'form-control', 'placeholder' => __('page.profile.name')]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {!! Form::label('birthday', __('page.profile.birthday')) !!}
                                        </div>
                                        <div class="col-sm-8">
                                            {!! Form::date('birthday', $user->birthday, ['required', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {!! Form::label('email', __('page.profile.email')) !!}
                                        </div>
                                        <div class="col-sm-8">
                                            {!! Form::email('email', $user->email, ['required', 'class' => 'form-control', 'placeholder' => __('page.profile.email')]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {!! Form::label('phone', __('page.profile.phone')) !!}
                                        </div>
                                        <div class="col-sm-8">
                                            {!! Form::text('phone', $user->phone, ['required', 'class' => 'form-control', 'placeholder' => __('page.profile.phone')]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {!! Form::label('gender', __('page.profile.gender')) !!}
                                        </div>
                                        <div class="col-sm-8">
                                            <label class="m-radio m-radio--state-success">
                                                {!! Form::radio('gender', __('page.profile.male'), ($user->gender == 'male' ? true : false)) !!}
                                                {{ __('base.male') }}
                                            </label>
                                            <label class="m-radio m-radio--state-brand">
                                                {!! Form::radio('gender', __('page.profile.female'), ($user->gender == 'female' ? true : false)) !!}
                                                {{ __('base.female') }}
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="wedd-detail-block mrgn-bottom-30">
                                <h3 class="couple-profile-heading">{{ __('page.profile.address') }}</h3>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        {!! Form::label('city', __('page.profile.city')) !!}
                                    </div>
                                    <div class="col-sm-8">
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
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        {!! Form::label('district', __('page.profile.district')) !!}
                                    </div>
                                    <div class="col-sm-8">
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
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        {!! Form::label('address', __('page.profile.address')) !!}
                                    </div>
                                    <div class="col-sm-8">
                                        {!! Form::text('address', count($user->locations) > 0 ? $user->locations[0]->address : null, ['class' => 'form-control m-input m-input--solid', 'placeholder' => __('validation.custom.enter.address')]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="couple-profile-block mrgn-bottom-30">
                                <div class="change-password-block">
                                    <h3 class="couple-profile-heading">{{ __('page.profile.change_password') }}</h3>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {!! Form::label('password', __('page.profile.new_password')) !!}
                                        </div>
                                        <div class="col-sm-8">
                                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('base.password')]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {!! Form::label('password', __('page.profile.confirm_password')) !!}
                                        </div>
                                        <div class="col-sm-8">
                                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => __('page.profile.confirm_password')]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-offset-4 col-sm-8">
                                            {!! Form::submit(__('page.profile.btn_update'), ['id' => 'save', 'class' => 'btn btn-pink']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
    <!-- end vendor profile -->
@endsection

@section('script')
    <script src="{{ asset(config('asset.users.js') . 'profile.js') }}"></script>
@endsection
