@extends('layouts.app')

@section('title')
    {{ __('page.title.home') }}
@endsection

@section('content')
<section class="to-do-list-main-block">
    <div class="container mb-20">
        <div class="headings-intro">
            <h1>{{ __('page.news.title') }}</h1>
            <p>{{ __('page.news.slogan') }}</p>
            <div class="searchbox">
                <form class="article-home-search">
                    <div class="search1">
                        <input class="search-input" placeholder="{{ __('page.news.placeholder_search') }}" id="txtArticlesSearch" type="text">
                        <button type="submit" class="icon-search"><i class="fa fa-search"></i></button>
                    </div>
                    <div id="StrArticles" class="list-search d-none"></div>
                </form>
            </div>
        </div>
        <div class="popular">
            <div class="div-4">
                <div class="article-recommend">
                    <figure>
                        <div class="recommend-img">
                            <span class="ribbon-span">{{ __('page.news.recommended') }}</span>
                        </div>
                        <div class="image-recommend">
                            <img src="{{ config('define.post.path') . $recommendPost->image }}" alt="{{ $recommendPost->topic->name }}">
                        </div>
                        <figcaption class="articles-center-element">
                            <div class="articles-center-element-item">
                                <span class="articles-featured-big-category">{{ $recommendPost->topic->name }}</span>
                                <a class="articles-featured-big-title title-hover" href="#">{{ $recommendPost->title }}</a>
                                <span class="articles-featured-big-content">{{ $recommendPost->brief }}</span>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="div-6">
                <div class="articles-list">
                    @foreach ($newestPosts as $post)
                    <div class="article-small">
                        <figure>
                            <div class="image-article">
                                <img class="img-article" src="{{ config('define.post.path') . $post->image }}" alt="{{ $post->title }}">
                            </div>
                            <figcaption class="articles-center-element-small">
                                <div class="articles-element-item">
                                    <span class="articles-category">{{ $post->topic->name }}</span>
                                    <a class="articles-featured-big-title-small title-hover" href="#">{{ $post->title }}</a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-20">
        <div class="topic-wrapper">
            <p class="articles-categories-title">{{ __('page.news.topic_title') }}</p>
            <div class="pure-g">
                @foreach ($topics as $topic)
                <div class="articles-categories-item">
                    <span class="icon-articles-categories">
                        <img class="icon-articles-categories-img" src="{{ config('define.post.topic.path') . $topic->image }}" alt="{{ $topic->name }}">
                    </span>
                    <a class="articles-categories-item-text" href="#">{{ $topic->name }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container">
        <div class="articles-listing pure-g mt20">
            <div class="articles-listing-left">
                <p class="headings-title-section">{{ __('page.news.recently_title') }}</p>
                <div class="articles-listing-items-area" data-skip="{{ config('define.post.paginate') }}">
                    @foreach ($recentlyPosts as $post)
                        <div class="pure-u-1-2 col-lg-6 pr-pl-0">
                            <div class="articles-listing-box">
                                <figure class="articles-listing-box-frame">
                                    <img class="articles-listing-box-image" src="{{ config('define.post.path') . $post->image }}">
                                </figure>
                                <p class="articles-listing-box-category">{{ $post->topic->name }}</p>
                                <a class="articles-listing-box-title title-hover" href="#">{{ $post->title }}</a>
                                <p class="articles-listing-box-content">{{ $post->brief }}</p>
                                <div class="articles-listing-box-date">
                                    <time datetime="2019-03-22">{{ $post->created_at }}</time>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                                    <a href="#" class="widget-most-read-box-title">{{ $post->title }}</a>
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
                                    <a href="#" class="widget-sections-division-link title-hover">{{ $topic->name }}</a>
                                    <span class="icon-arrow-right"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <ul class="widget-sections-division-subcategory"></ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    <script type="text/javascript" defer="#">
        jQuery(document).ready(function($) {

            $(window).scroll(function() {

                var skip = $('.articles-listing-items-area').attr('data-skip');

                if (skip != null) {

                    clearTimeout($.data(this, 'scrollCheck'));

                    $.data(this, 'scrollCheck', setTimeout(function() {

                        var scroll_position_for_post_load = $(window).height() + $(window).scrollTop();

                        if (scroll_position_for_post_load >= ($(document).height() - $('.footer-main-block').height() - 200)) {

                            $.get(route('post.loadMore', { skip: skip }), function(data) {

                                $(data).hide().appendTo('.articles-listing-items-area').fadeIn();

                                $('.articles-listing-items-area').attr('data-skip', parseInt(skip) + 10);
                            })
                        }
                    }, 150));
                }
            })
        });
    </script>
@endsection
