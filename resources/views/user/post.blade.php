@extends('layouts.user.app')

@section('title')
    {{ __('page.title.home') }}
@endsection

@section('content')
<section class="breadcrumb-news">
    <div class="breadcrumb-wrap">
        <div class="breadcrumb-content">
            <ul class="list-breadcrumb">
                <li class="item-breadcrumb">
                    <a href="{{ route('client.home') }}">
                        <span>{{ __('page.title.home') }}<span>
                    </a>
                </li>
                <li class="item-breadcrumb articles-bread-home">
                    <a href="{{ route('client.post.index') }}">
                        <span>{{ __('page.news.breadcrumb') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="news-main-block">
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
                    <div id="StrArticles" class="list-search">
                        <ul class="post-search">
                            <div class="wrap-post-search">
                                @foreach ($topics as $topic)
                                <li class="item-search-element">
                                    <a href="#">
                                        <div class="w-13">
                                            <img src="{{ config('define.post.topic.path') . $topic->image }}" alt="{{ $topic->name }}">
                                        </div>
                                        <div class="w-87">
                                            <span>{{ $topic->name }}</span>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </div>
                        </ul>
                    </div>
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
                            <a href="{{ route('client.post.detail', ['topic' => str_slug($recommendPost->topic->name, '-'), 'id' => $recommendPost->id, 'slug' => str_slug($recommendPost->slug, '-')]) }}">
                                <img src="{{ config('define.post.path') . $recommendPost->image }}" alt="{{ $recommendPost->topic->name }}">
                            </a>
                        </div>
                        <figcaption class="articles-center-element">
                            <div class="articles-center-element-item">
                                <span class="articles-featured-big-category">{{ $recommendPost->topic->name }}</span>
                                <a class="articles-featured-big-title title-hover" href="{{ route('client.post.detail', ['topic' => str_slug($recommendPost->topic->name, '-'), 'id' => $recommendPost->id, 'slug' => str_slug($recommendPost->slug, '-')]) }}">{{ $recommendPost->title }}</a>
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
                                <a href="{{ route('client.post.detail', ['topic' => str_slug($post->topic->name, '-'), 'id' => $post->id, 'slug' => str_slug($post->slug, '-')]) }}">
                                    <img class="img-article" src="{{ config('define.post.path') . $post->image }}" alt="{{ $post->title }}">
                                </a>
                            </div>
                            <figcaption class="articles-center-element-small">
                                <div class="articles-element-item">
                                    <span class="articles-category">{{ $post->topic->name }}</span>
                                    <a class="articles-featured-big-title-small title-hover" href="{{ route('client.post.detail', ['topic' => str_slug($post->topic->name, '-'), 'id' => $post->id, 'slug' => str_slug($post->slug, '-')]) }}">{{ $post->title }}</a>
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
                        <a href=""><img class="icon-articles-categories-img" src="{{ config('define.post.topic.path') . $topic->image }}" alt="{{ $topic->name }}"></a>
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
                                    <a href="{{ route('client.post.detail', ['topic' => str_slug($post->topic->name, '-'), 'id' => $post->id, 'slug' => str_slug($post->slug, '-')]) }}">
                                        <img class="articles-listing-box-image" src="{{ config('define.post.path') . $post->image }}">
                                    </a>
                                </figure>
                                <p class="articles-listing-box-category">{{ $post->topic->name }}</p>
                                <a class="articles-listing-box-title title-hover" href="{{ route('client.post.detail', ['topic' => str_slug($post->topic->name, '-'), 'id' => $post->id, 'slug' => str_slug($post->slug, '-')]) }}">{{ $post->title }}</a>
                                <p class="articles-listing-box-content">{{ $post->brief }}</p>
                                <div class="articles-listing-box-date">
                                    <time>{{ $post->created_at }}</time>
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
                                    <a href="{{ route('client.post.detail', ['topic' => str_slug($post->topic->name, '-'), 'id' => $post->id, 'slug' => str_slug($post->slug, '-')]) }}" class="widget-most-read-box-title">{{ $post->title }}</a>
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
