@extends('admin.index')

@section('subheader', __('page.title.user_list'))

@section('content')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                {{ __('page.title.user_list') }}
                </h3>
            </div>
        </div>
        @include('admin.head_tools')
    </div>
    <div class="m-portlet__body">
        <!--begin: Search Form -->
        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="form-group m-form__group row align-items-center">
                        <div class="col-md-4">
                            <div class="m-input-icon m-input-icon--left">
                                <input type="text" class="form-control m-input m-input--solid" placeholder="{{ __('base.placeholder.search') }}" id="generalSearch">
                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                    <span>
                                        <i class="la la-search"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @permission('user-create')
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <a href="#" data-toggle="modal" data-target="#m_modal" class="showCreate btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                        <span>
                            <i class="la la-plus"></i>
                            <span>
                                {{ __('base.create') . ' ' . __('base.user') }}
                            </span>
                        </span>
                    </a>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
                @endpermission
            </div>
        </div>
        <!--end: Search Form -->

        <!--begin: Datatable -->
        <div class="m_datatable" id="local_data"></div>
        <!--end: Datatable -->

    </div>
</div>

<div class="modal fade" id="m_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ __('base.create') . ' ' . __('base.user') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'POST', 'route' => 'admin.user.store', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed', 'id' => 'formUser']) !!}
                    {!! Form::hidden('user_id', '', ['id' => 'user_id']) !!}
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                {!! Form::label('name', __('base.name')) !!}
                                {!! Form::text('name', '', ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('base.name') . ' ...']) !!}
                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('email', __('base.email')) !!}
                                {!! Form::email('email', '', ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('base.email') . ' ...']) !!}
                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('phone', __('base.phone')) !!}
                                {!! Form::number('phone', '', ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('base.phone') . ' ...']) !!}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                {!! Form::label('city', __('base.city')) !!}
                                <div class="m-input-icon m-input-icon--right">
                                    {!! Form::select(
                                        'city',
                                        $city,
                                        null,
                                        [
                                            'placeholder' => __('validation.custom.select.city'),
                                            'class' => 'form-control m-input m-input--solid',
                                            'required'
                                        ])
                                    !!}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('district', __('base.district')) !!}
                                <div class="m-input-icon m-input-icon--right">
                                    {!! Form::select('district', [], null,['id' => 'district', 'required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('validation.custom.select.district')]) !!}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('address', __('base.address')) !!}
                                <div class="m-input-icon m-input-icon--right">
                                    {!! Form::text('address', '', ['class' => 'form-control m-input m-input--solid', 'placeholder' => __('base.address') . ' ...']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                <label>{{ __('base.gender') }}:</label>
                                <div class="m-radio-inline">
                                    <label class="m-radio m-radio--solid">
                                        {!! Form::radio('gender', 'male', 'checked') !!}
                                        {{ __('base.male') }}
                                        <span></span>
                                    </label>
                                    <label class="m-radio m-radio--solid">
                                        {!! Form::radio('gender', 'female', 'checked') !!}
                                        {{ __('base.female') }}
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>{{ __('base.birthday') }}:</label>
                                    {!! Form::date('birthday', '', ['required', 'class' => 'form-control m-input m-input--solid']) !!}
                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('role', __('base.role')) !!}
                                <div class="m-input-icon m-input-icon--right">
                                    {!! Form::select(
                                        'role[]',
                                        $roles,
                                        null,
                                        [
                                            'placeholder' => __('validation.custom.select.role'),
                                            'class' => 'form-control m-input m-input--solid',
                                            'required',
                                            'multiple',
                                            'id' => 'role'
                                        ])
                                    !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                {!! Form::label('user_name', __('base.user_name')) !!}
                                {!! Form::text('user_name', '', ['class' => 'form-control m-input m-input--solid', 'required', 'placeholder' => __('base.user_name') . ' ...']) !!}
                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('password', __('base.password')) !!}
                                {!! Form::password('password', ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('base.password') . ' ...']) !!}
                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('password_confirmation', __('base.password_confirmation')) !!}
                                {!! Form::password('password_confirmation', ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('base.password_confirmation') . ' ...']) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                {!! Form::button(__('base.cancel'), ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) !!}
                {!! Form::button(__('base.submit'), ['class' => 'createUser btn btn-primary', 'id' => 'btnSubmit']) !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('assets/customs/js/admin/user/user.js') }}" type="text/javascript" charset="utf-8" async></script>
@endsection
