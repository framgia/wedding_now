@extends('layouts.admin.app')

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
            @include('admin.sections.head_tools')
        </div>
        {{ Form::open(['route' => 'admin.post.store', 'method' => 'POST', 'class' => 'm-form m-form--fit m-form--label-align-right form-post', 'files' => true, 'id' => 'form-create-post']) }}
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                {{ Form::label('title', __('base.title'), ['class' => 'col-form-label col-lg-1 col-sm-12']) }}
                <div class="col-lg-11 col-md-11 col-sm-12">
                    {{ Form::text('title', '', ['class' => 'form-control m-input text-capitalize', 'placeholder' => __('base.title'), 'autocomplete' => 'off', 'id' => 'title-post']) }}
                </div>
            </div>
            <div class="form-group m-form__group row">
                {{ Form::label('topic', __('base.topic'), ['class' => 'col-form-label col-lg-1 col-sm-12']) }}
                <div class="col-lg-11 col-md-11 col-sm-12">
                    {{ Form::select('topic', $topics, null, ['class' => 'form-control m-input', 'id' => 'topic-select', 'placeholder'=> __('base.select')  . ' ' . __('base.topic')]) }}
                </div>
            </div>
            <div class="form-group m-form__group row">
                {{ Form::label('tag', __('base.tag'), ['class' => 'col-form-label col-lg-1 col-sm-12']) }}
                <div class="col-lg-11 col-md-11 col-sm-12 parent-tags">
                    <select multiple="multiple" name="tags[]" id="tag"  class="form-control m-input" aria-describedby="emailHelp">
                        @foreach($tags as $tag)
                            <option value="{{ $tag }}">{{ $tag }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-1 col-sm-12">{{ __('base.content') }}</label>
                <div class="col-lg-11 col-md-11 col-sm-12 parent-content">
                    {{ Form::textarea('contents', '', ['id' => 'contents']) }}
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
                <div class="row">
                    <div class="col-lg-3 ml-lg-auto">
                        {{ Form::submit(__('base.create'), ['class' => 'btn btn-outline-success', 'id' => 'submit-create-post']) }}
                        <a href="{{ route('admin.post.index') }}" class="btn btn-outline-warning">{{ __('base.cancel') }}</a>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
