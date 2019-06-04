@extends('layouts.app')

@section('title')
    {{ __('page.title.home') }}
@endsection

@section('content')
    <section class="breadcrumb-news">
        <div class="breadcrumb-wrap">
            <div class="breadcrumb-content-detail">
                <ul class="list-breadcrumb">
                    <li class="item-breadcrumb">
                        <a href="{{ route('home') }}">
                            <span>{{ __('page.title.home') }}</span>
                        </a>
                    </li>
                    <li class="item-breadcrumb articles-bread-home">
                        <a href="{{ route('post.index') }}">
                            <span>{{ __('page.news.breadcrumb') }}</span>
                        </a>
                    </li>
                    <li class="item-breadcrumb articles-bread-home">
                        <a href="#">
                            <span>{{ $post->topic->name }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="search-wrap">
                <form action="" method="get" accept-charset="utf-8">
                    <input type="text" class="search-input" placeholder="{{ __('page.news.search') }}">
                </form>
            </div>
        </div>
    </section>
    <section class="detail-news-main-block">
        <div class="container pt-5">
            <div class="articles-listing pure-g mt20">
                <div class="articles-listing-left">
                    <div class="articles-post-heading">
                        <a class="articles-post-heading-topic" href="">{{ $post->topic->name }}</a>
                        <h1 class="articles-post-heading-title">{{ $post->title }}</h1>
                        <div class="articles-post-heading-box">
                            <div class="box-user w-5">
                                <img class="articles-post-heading-box-avatar"
                                     src="@if($post->user->media)  {{ asset(config('asset.users.avatar') . $post->user->media->name) }}
                                     @else {{ asset(config('asset.users.avatar') . config('define.user.image_default')) }} @endif">
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
                <div class="articles-listing-right">
                    <div class="app-articles-menu-most-read">
                        <div class="widget-container">
                            <p class="widget-title-section">{{ __('page.news.most_popular_title') }}</p>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($mostPopularPosts as $post)
                                <div class="widget-most-read">
                                    <div class="widget-most-read-box">
                                        <div class="widget-most-read-box-number">{{ ++$i }}</div>
                                        <a href="{{ route('post.detail', ['topic' => str_slug($post->topic->name, '-'), 'id' => $post->id, 'slug' => str_slug($post->slug, '-')]) }}"
                                           class="widget-most-read-box-title">{{ $post->title }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="widget-container">
                        <p class="widget-title-section">{{ __('page.news.topic_title_left') }}</p>
                        <ul class="widget-sections">
                            @foreach ($topics as $topic)
                                <li class="widget-sections-division">
                                    <div class="widget-sections-division-category">
                                        <a href="#"
                                           class="widget-sections-division-link title-hover">{{ $topic->name }}</a>
                                        <span class="icon-arrow-right"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <ul class="widget-sections-division-subcategory"></ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="related-post">
                <p class="articles-interesting-title">{{ __('page.news.related_news') }}</p>
                @for ($i = 0; $i < 4; $i++)
                    <div class="col-lg-3">
                        <figure class="articles-featured-small">
                            <div class="articles-featured-small-frame app-link">
                                <img class="articles-featured-small-image"
                                     src="{{ asset(config('asset.users.images.user_wedding') . 'couple-img.jpg') }}">
                            </div>
                            <figcaption class="articles-center-element">
                                <div class="articles-center-element-item">
                                    <span class="articles-featured-small-category">Places to Celebrate</span>
                                    <a class="articles-featured-small-title" href="#">13 Scenic Outdoor Wedding Venues
                                        in San Diego </a>
                                    <span class="articles-featured-small-content">If you're hoping to marry surrounded by nature, here are our favorite outdoor<span
                                                class="app-common-ellipsis">...</span></span>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                @endfor
            </div>
        </div>
    </section>
@endsection
