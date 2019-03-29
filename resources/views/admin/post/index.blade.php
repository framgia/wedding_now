@extends('admin.index')

@section('subheader', __('page.title.posts'))

@section('content')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                {{ __('base.list') . ' ' . __('base.posts') }}
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
                        <div class="col-md-4">
                            <div class="m-form__group m-form__group--inline">
                                <div class="m-form__label">
                                    <label class="m-label m-label--single">{{ __('base.tag') }}:</label>
                                </div>
                                <div class="m-form__control">
                                    {!! Form::select('m_form_tag', $tag, null, ['class' => 'form-control m-input m-input--solid', 'id' => 'm_form_tag', 'placeholder' => __('base.all')]) !!}
                                </div>
                            </div>
                            <div class="d-md-none m--margin-bottom-10"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <a href="{{ route('posts.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                        <span>
                            <i class="la la-plus"></i>
                            <span>
                                {{ __('base.create') . ' ' . __('base.posts') }}
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

<div class="modal fade" id="m_select2_modal" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">{{ __('base.view') . ' ' . __('base.posts') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-remove"></span>
                </button>
            </div>
            {!! Form::open(['method' => 'PUT', 'class' => 'm-form m-form--fit m-form--label-align-right', 'files' => true, 'id' => 'formUpdate']) !!}
                {!! Form::hidden('id', '', ['id' => 'post_id']) !!}
                <div class="modal-body">
                    <div class="form-group m-form__group row">
                        {!! Form::label('title', __('base.title'), ['class' => 'col-form-label col-lg-2 col-sm-12']) !!}
                        <div class="col-lg-10 col-md-10 col-sm-12">
                            {!! Form::text('title', '', ['class' => 'form-control m-input', 'placeholder' => __('base.enter_your') . ' ' . __('base.title')]) !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        {!! Form::label('tag', __('base.tag'), ['class' => 'col-form-label col-lg-2 col-sm-12']) !!}
                        <div class="col-lg-10 col-md-10 col-sm-12">
                            <select name="tag[]" id="tag" class="form-control m-select2" multiple>
                                @foreach ($tag as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        {!! Form::label('content', __('base.content'), ['class' => 'col-form-label col-lg-2 col-sm-12']) !!}
                        <div class="col-lg-10 col-md-10 col-sm-12">
                            {!! Form::textarea('content', '', ['class' => 'summernote']) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-brand m-btn" data-dismiss="modal">Close</button>
                    <button type="submit" id="update_post" class="btn btn-secondary m-btn">{{ __('base.update') }}</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/customs/js/admin/posts_index.js') }}" type="text/javascript" charset="utf-8" async></script>
@endsection
