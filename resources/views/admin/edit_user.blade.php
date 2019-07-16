@extends('layouts.admin.app')

@section('subheader', __('page.title.posts'))

@section('content')

<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text text-capitalize">
                    {{ __('base.create') . ' ' . __('base.user') }}
                </h3>
            </div>
        </div>
        @include('admin.sections.head_tools')
    </div>
    {{ Form::open(['method' => 'PUT', 'route' => ['admin.user.update', $user->id], 'class' => 'm-form m-form--fit
        m-form--label-align-right m-form--group-seperator-dashed', 'id' => 'form-edit-user']) }}
    {{ Form::hidden('id', $user->id, ['id' => 'user-id']) }}
    @method('PUT')
    <div class="m-portlet__body">
        <div class="row col-lg-12">
            <div class="col-lg-8 pd-0">
                <div class="form-group m-form__group row input-create-user">
                    {{ Form::label('name', __('base.name')) }}
                    {{ Form::text('name', $user->name, ['required', 'class' => 'form-control m-input',
                        'placeholder' => __('base.name') . ' ...', 'autocomplete' => 'off']) }}
                </div>
                <div class="form-group m-form__group row input-create-user">
                    {{ Form::label('email', __('base.email')) }}
                    {{ Form::email('email', $user->email, ['required', 'class' => 'form-control m-input ',
                        'placeholder' => __('base.email') . ' ...', 'autocomplete' => 'off']) }}
                </div>
                <div class="form-group m-form__group row input-create-user">
                    {{ Form::label('phone', __('base.phone')) }}
                    {{ Form::text('phone', $user->phone, ['required', 'class' => 'form-control m-input',
                        'placeholder' => __('base.phone') . ' ...', 'autocomplete' => 'off']) }}
                </div>
            </div>
            <div class="col-lg-4 pd-0 p-relative">
                @if ($user->media && file_exists(asset(config('asset.user.avatar') .
                $user->media->name )))
                <img alt="" class="p-absolute avatar-user" height="100%" width="100%"
                    src="{{ asset(config('asset.user.avatar') . $user->media->name) }}" />
                @else
                <img alt="" class="p-absolute avatar-user" height="100%" width="100%"
                    src="{{ asset(config('define.avatar_default')) }}" />
                @endif
                {{ Form::file('avatar', ['class' => 'd-none', 'id' => 'avatar']) }}
            </div>
        </div>
        <div class="form-group m-form__group row input-create-user">
            {{ Form::label('address', __('base.address')) }}
            <div class="m-input-icon m-input-icon--right">
                {{ Form::text('address', $user->home[0]->address, ['class' => 'form-control m-input',
                    'placeholder' => __('base.address') . ' ...', 'autocomplete' => 'off']) }}
            </div>
        </div>
        <div class="form-group m-form__group row input-create-user">
            {{ Form::label('city', __('base.city')) }}
            <div class="m-input-icon m-input-icon--right">
                {{ Form::select('city', $cities, $user->home[0]->district->city->id, ['placeholder' =>
                    __('validation.custom.select.city'),
                    'class' => 'form-control m-input', 'required', 'id' => 'user-select-city']) }}
            </div>
        </div>
        <div class="form-group m-form__group row input-create-user">
            {{ Form::label('district', __('base.district')) }}
            <div class="m-input-icon m-input-icon--right">
                {{ Form::select('district', $districts, $user->home[0]->district->id,['id' => 'user-select-district',
                    'required', 'class' =>
                    'form-control m-input', 'placeholder' => __('validation.custom.select.district')]) }}
            </div>
        </div>
        <div class="form-group m-form__group row input-create-user">

            <label>{{ __('base.gender') }}:</label>
            <div class="m-radio-inline gender-radio">
                <label class="m-radio m-radio--solid">
                    {{ Form::radio('gender', 'male', $user->gender == 'male') }}
                    {{ __('base.male') }}
                    <span></span>
                </label>
                <label class="m-radio m-radio--solid">
                    {{ Form::radio('gender', 'female', $user->gender == 'female') }}
                    {{ __('base.female') }}
                    <span></span>
                </label>
            </div>
        </div>
        <div class="form-group m-form__group row input-create-user">
            <label>{{ __('base.birthday') }}:</label>
            {{ Form::date('birthday', $user->birthday, ['required', 'class' => 'form-control m-input', 'id' =>
                'birthday']) }}
        </div>
        <div class="form-group m-form__group row input-create-user">
            {{ Form::label('roles', __('base.role')) }}
            <div class="m-input-icon m-input-icon--right">
                {{ Form::select('roles[]', $roles, $user->roles, ['class' => 'form-control m-input', 'required',
                    'multiple', 'id' => 'roles',]) }}
            </div>
        </div>
    </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions m-form__actions">
            <div class="row">
                <div class="col-lg-3 ml-lg-auto">
                    {{ Form::submit(__('base.update'), ['class' => 'btn btn-outline-success', 'id' => 'submit-edit-user']) }}
                    <a href="{{ route('admin.user.index') }}" class="btn btn-outline-warning">
                        {{ __('base.cancel') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>
@endsection