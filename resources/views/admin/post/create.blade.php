@extends('admin.index')
@section('subheader', __('page.title.posts'))
@section('content')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                {{ __('base.create') . ' ' . __('base.posts') }}
                </h3>
            </div>
        </div>
        @include('admin.head_tools')
    </div>
    <!--begin::Form-->
    {!! Form::open(['route' => 'posts.store', 'method' => 'POST', 'class' => 'm-form m-form--fit m-form--label-align-right', 'files' => true, 'id' => 'form']) !!}
    <div class="m-portlet__body">
        <div class="form-group m-form__group row">
            {!! Form::label('title', __('base.title'), ['class' => 'col-form-label col-lg-1 col-sm-12']) !!}
            <div class="col-lg-11 col-md-11 col-sm-12">
                {!! Form::text('title', '', ['class' => 'form-control m-input', 'placeholder' => __('base.enter_your') . ' ' . __('base.title')]) !!}
            </div>
        </div>
        <div class="form-group m-form__group row">
            {!! Form::label('tag', __('base.tag'), ['class' => 'col-form-label col-lg-1 col-sm-12']) !!}
            <div class="col-lg-11 col-md-11 col-sm-12">
                <select name="tag[]" id="tag" class="form-control m-input" aria-describedby="emailHelp" multiple>
                    @foreach ($tag as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label class="col-form-label col-lg-1 col-sm-12">{{ __('base.content') }}</label>
            <div class="col-lg-11 col-md-11 col-sm-12">
                {!! Form::textarea('content', '', ['id' => 'summernote']) !!}
            </div>
        </div>
    </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions m-form__actions">
            <div class="row">
                <div class="col-lg-9 ml-lg-auto">
                    {!! Form::submit(__('base.submit'), ['class' => 'btn btn-brand', 'id' => 'submit']) !!}
                    {!! Form::reset(__('base.reset'), ['class' => 'btn btn-secondary', 'id' => 'reset']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
@section('js')
    <script src="{{ asset('assets/customs/js/posts_create.js') }}" type="text/javascript" charset="utf-8" defer></script>
@endsection
