@extends('layouts.admin.app')

@section('subheader', __('page.title.user_list'))

@section('content')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    {{ __('admin.default_schedule') }}
                    <small>{{ __('admin.create_by_admin') }}</small>
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="form-group m-form__group row align-items-center">
                    </div>
                </div>
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <a href="{{ route('admin.schedule-default.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                        <span>
                            <i class="la la-plus"></i>
                            <span>{{ __('admin.create_schedule') }}</span>
                        </span>
                    </a>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>
        </div>
        <div class="m_datatable" id="schedule-default-table">
        </div>
    </div>
</div>
@endsection
