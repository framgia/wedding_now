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
                <a href="couple-dashboard.html" class="btn btn-default">
                    <span class="badge">{{ __('page.profile.dashboard') }}</span>
                </a>
                <a href="#" class="active btn btn-default">
                    <span class="badge">{{ __('page.profile.profile') }}</span>
                </a>
                <a href="to-do-list.html" class="btn btn-default">
                    <span class="badge">{{ __('page.profile.to_do') }}</span>
                </a>
                <a href="budget-planner.html" class="btn btn-default">
                    <span class="badge">{{ __('page.profile.budget') }}</span>
                </a>
                <a href="#" class="btn btn-default">
                    <span class="badge">{{ __('page.profile.wishlist') }}</span>
                </a>
                <a href="real-wedding-listing.html" class="btn btn-default">
                    <span class="badge">{{ __('page.profile.real_wedding') }}</span>
                </a>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="couple-profile-main-block">
                        <div class="upload-profile-block mrgn-bottom-30">
                            <h3 class="couple-profile-heading">{{ __('page.profile.upload_photo') }}</h3>
                            <div class="row">
                                <div class="col-md-5 col-sm-4">
                                    <div class="upload-img">
                                        <img src="/" class="img-responsive" alt="upload img">
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-8">
                                    <div class="upload-img-btn">
                                        <a href="#" class="btn btn-pink">{{ __('page.profile.btn_upload') }}</a>
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
                                        {!! Form::text('user_name', null, ['class' => 'form-control', 'disabled', 'placeholder' => __('page.profile.user_name')]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        {!! Form::label('name', __('page.profile.name')) !!}
                                    </div>
                                    <div class="col-sm-8">
                                        {!! Form::text('name', null, ['required', 'class' => 'form-control', 'placeholder' => __('page.profile.name')]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        {!! Form::label('birthday', __('page.profile.birthday')) !!}
                                    </div>
                                    <div class="col-sm-8">
                                        {!! Form::date('birthday', null, ['required', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        {!! Form::label('email', __('page.profile.email')) !!}
                                    </div>
                                    <div class="col-sm-8">
                                        {!! Form::email('email', null, ['required', 'class' => 'form-control', 'placeholder' => __('page.profile.email')]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        {!! Form::label('phone', __('page.profile.phone')) !!}
                                    </div>
                                    <div class="col-sm-8">
                                        {!! Form::number('phone', null, ['required', 'class' => 'form-control', 'placeholder' => __('page.profile.phone')]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        {!! Form::label('gender', __('page.profile.gender')) !!}
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="m-radio m-radio--state-success">
                                            {!! Form::radio('gender', __('page.profile.male', ['id' => 'male'])) !!}
                                            {{ __('admin.male') }}
                                        </label>
                                        <label class="m-radio m-radio--state-brand">
                                            {!! Form::radio('gender', __('page.profile.female')) !!}
                                            {{ __('admin.female') }}
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="wedd-detail-block mrgn-bottom-30">
                            <h3 class="couple-profile-heading">{{ __('page.profile.address') }}</h3>
                            <form>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        {!! Form::label('city', __('page.profile.city')) !!}
                                    </div>
                                    <div class="col-sm-8">
                                        {!! Form::text('city', '', ['class' => 'form-control', 'placeholder' => __('page.profile.city')]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        {!! Form::label('district', __('page.profile.district')) !!}
                                    </div>
                                    <div class="col-sm-8">
                                        {!! Form::text('district', '', ['class' => 'form-control', 'placeholder' => __('page.profile.district')]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        {!! Form::label('address', __('page.profile.address')) !!}
                                    </div>
                                    <div class="col-sm-8">
                                        {!! Form::text('address', '', ['class' => 'form-control', 'placeholder' => __('page.profile.address')]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        {!! Form::submit(__('page.profile.btn_update'), ['id' => 'save', 'class' => 'btn btn-pink']) !!}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="change-password-block">
                        <h3 class="couple-profile-heading">{{ __('page.profile.change_password') }}</h3>
                        <form id="change-password" action="#">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    {!! Form::label('old_password', __('page.profile.old_password')) !!}
                                </div>
                                <div class="col-sm-8">
                                    {!! Form::password('old_password', ['class' => 'form-control', 'placeholder' => __('admin.password')]) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    {!! Form::label('password', __('page.profile.new_password')) !!}
                                </div>
                                <div class="col-sm-8">
                                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('admin.password')]) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    {!! Form::label('password', __('page.profile.confirm_password')) !!}
                                </div>
                                <div class="col-sm-8">
                                    {!! Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => __('page.profile.confirm_password')]) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-4  col-sm-8">
                                    {!! Form::submit(__('page.profile.btn_change'), ['id' => 'save-pass', 'class' => 'btn btn-pink']) !!}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end vendor profile -->
@endsection

