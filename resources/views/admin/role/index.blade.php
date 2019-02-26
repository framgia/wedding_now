@extends('admin.index')

@section('subheader', __('page.title.role_list'))

@section('content')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                {{ __('page.title.role_list') }}
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
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <a href="#" data-toggle="modal" data-target="#m_modal" class="showCreateRole btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                        <span>
                            <i class="la la-plus"></i>
                            <span>
                                {{ __('base.create') . ' ' . __('base.role') }}
                            </span>
                        </span>
                    </a>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
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
            {!! Form::open(['method' => 'POST', 'route' => 'role.store', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed', 'id' => 'formRole']) !!}
            @method('POST')
            {!! Form::hidden('roleId', '', ['id' => 'role-id']) !!}
            <div class="modal-body" data-id="">
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-4">
                            {!! Form::label('name', __('base.name')) !!}
                            {!! Form::text('name', '', ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('base.name') . ' ...']) !!}
                        </div>
                        <div class="col-lg-4">
                            {!! Form::label('display_name', __('base.display_name')) !!}
                            {!! Form::text('display_name', '', ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('base.display_name') . ' ...']) !!}
                        </div>
                        <div class="col-lg-4">
                            {!! Form::label('description', __('base.description')) !!}
                            {!! Form::text('description', '', ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('base.description') . ' ...']) !!}
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row permission-value">
                        @foreach ($permission as $value)
                            <div class="col-lg-3">
                                <div class="m-checkbox-list">
                                    <label class="m-checkbox m-checkbox--state-success">
                                        {!! Form::checkbox($value->name, $value->id, false) !!}
                                        {{ $value->display_name }}
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::button(__('base.cancel'), ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) !!}
                {!! Form::button(__('base.submit'), ['class' => 'btn btn-primary', 'id' => 'btnSubmit']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/admin/role/index.js') }}" type="text/javascript" charset="utf-8" async defer></script>
@endsection
