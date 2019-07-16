@extends('layouts.admin.app')

@section('subheader', __('page.title.posts'))

@section('content')
    <div class="row col-lg-12">
        <div class="col-lg-5 info-post">
            <h3 class="text text-center">{{ __('base.info') }}</h3>
            <div class="m-portlet__body">
                <div class="form-group row">
                    {{ Form::label('title', __('base.title'), ['class' => 'col-form-label col-lg-12 col-sm-12']) }}
                    <div class="col-lg-12 col-md-11 col-sm-12">
                        <p>{{ $post->title }}</p>
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('topic', __('base.topic'), ['class' => 'col-form-label col-lg-12 col-sm-12']) }}
                    <div class="col-lg-12 col-md-11 col-sm-12">
                        <p>{{ $post->topic->name }}</p>
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('topic', __('base.writer'), ['class' => 'col-form-label col-lg-12 col-sm-12']) }}
                    <div class="col-lg-12 col-md-11 col-sm-12">
                        <p>{{ $post->user->name }}</p>
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('tag', __('base.tag'), ['class' => 'col-form-label col-lg-12 col-sm-12']) }}
                    <div class="col-lg-12 col-md-11 col-sm-12">
                        @forelse($post->tags as $tag)
                            <span class="tag-span">{{ $tag->name }}</span>
                        @empty
                        <p>{{ __('admin.post.no_tag') }}</p>
                        @endforelse
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('tag', __('base.slug'), ['class' => 'col-form-label col-lg-12 col-sm-12']) }}
                    <div class="col-lg-12 col-md-11 col-sm-12">
                        <p>{{ $post->slug }}</p>
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('tag', __('base.status'), ['class' => 'col-form-label col-lg-12 col-sm-12']) }}
                    <div class="col-lg-12 col-md-11 col-sm-12">
                        <p>{{ __('base.post_status.public') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 show-real-post">
            <h3 class="text text-center">{{ __('base.showing') }}</h3>
            <div class="articles-post-heading">
                <p class="articles-post-heading-topic">{{ $post->topic->name }}</p>
                <h1 class="articles-post-heading-title">{{ $post->title }}</h1>
                <div class="articles-post-heading-box">
                    <div class="box-user w-5">
                        <img class="articles-post-heading-box-avatar"
                             src="@if ($post->user->media) {{ asset(config('asset.user.avatar') . $post->user->media->name) }}
                             @else {{ asset(config('asset.user.avatar') . config('define.user.image_default')) }} @endif">
                        <span class="articles-post-heading-box-author">{{ __('base.by') . ' ' . $post->user->name }}</span>
                        <span class="post-date">
                        <time>{{ $post->created_at->format('d/m/Y') }}</time>
                    </span>
                    </div>
                </div>
            </div>
            <div class="post-content">
                {!! html_entity_decode($post->content) !!}
            </div>
        </div>
    </div>
@endsection
