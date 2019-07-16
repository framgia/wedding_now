@extends('layouts.user.main')

@section('title', __('page.page.real_wedding'))

@section('page-name', __('page.page.real_wedding'))

@section('banner-content')
    <ul role="tablist" class="nav nav-tabs cover__tab">
        <li role="presentation" class="cover__tab-li active">
            <a href="#search-service" aria-controls="search-service" role="tab" data-toggle="tab" class="cover__tab-link" aria-expanded="true">{{ __('page.index.wedding_service') }}</a>
        </li>
        <li role="presentation" class="cover__tab-li">
            <a href="#search-idea" aria-controls="search-idea" role="tab" data-toggle="tab" class="cover__tab-link" aria-expanded="false">{{ __('page.index.wedding_idea') }}</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="search-service" class="tab-pane in active">
            {{ Form::open(['class' => 'row']) }}
                <div class="col-lg-5">
                    <input type="text" class="form-control" name=""
                           placeholder="{{ __('page.index.enter_search_service') }}">
                </div>
                <div class="col-lg-3 w-20 p-relative">
                    {{ Form::select('service', $categories, null, ['placeholder' => __('page.banner.all_services'), 'class' => 'form-control no-arrow-drop pointer']) }}
                    <span class="p-absolute">
                        <i class="fa fa-list"></i>
                    </span>
                </div>
                <div class="col-lg-3 w-20 p-relative">
                    <select class="form-control no-arrow-drop pointer" name="idea">
                        <option hidden="">{{ __('base.choose') . ' ' . __('base.city') }}</option>
                    </select>
                    <span class="p-absolute">
                        <i class="fa fa-map-marker"></i>
                    </span>
                </div>
                <div class="col-lg-2">
                    <input type="submit" class="form-control btn btn-pink" name="submit_search" value="{{ __('base.search') }}">
                </div>
            {{ Form::close() }}
        </div>
        <div id="search-idea" class="tab-pane">
            {{ Form::open(['class' => 'row']) }}
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="idea" placeholder="{{ __('page.index.enter_search_idea') }}">
                </div>
                <div class="col-lg-2 pl-0">
                    <input type="submit" class="form-control btn btn-pink" name="submit_search" value="{{ __('base.search') }}">
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('main-content')
<section class="real-wedding-main-block">
    <div class="container mt-20">
        <section class="post-section row">
            <div class="col-lg-12">
                @foreach ($posts as $post)
                    <div class="col-md-4 col-sm-6">
                        <div class="news-block">
                            <div class="news-img">
                                <a href="{{ route('client.post.detail', ['topic' => str_slug($post->topic->name, '-'), 'id' => $post->id, 'slug' => str_slug($post->slug, '-')]) }}">
                                    <img src="{{ config('define.post.path') . $post->image }}" class="img-responsive">
                                </a>
                                <div class="meta-tag">{{ $post->created_at }}</div>
                            </div>
                            <div class="news-dtl">
                                <h6 class="news-heading">
                                    <a href="{{ route('client.post.detail', ['topic' => str_slug($post->topic->name, '-'), 'id' => $post->id, 'slug' => str_slug($post->slug, '-')]) }}">{{ $post->title }}</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <hr>
        <div class="real-wedding">
            <div class="col-lg-8 p-l-r-0">
                <div class="show-real-wedding">
                    <div class="col-lg-9 p-l-r-0">
                        <h3>{{ __('page.real_wedding.list') }}</h3>
                        <div class="result-real-wedding">
                            @foreach ($weddings as $wedding)
                                <div class="row">
                                    <div class="col-lg-12 single-wedding">
                                        <div class="col-lg-5 p-l-r-0">
                                            <a href="{{ route('client.real-wedding.detail',['id' => $wedding->id, 'slug' => $wedding->slug]) }}">
                                                <img alt="{{ $wedding->slug }}"
                                                     src="{{ asset(config('asset.user.images.user_wedding') . $wedding->image) }}">
                                            </a>
                                        </div>
                                        <div class="col-lg-7 p-l-r-0 pl-10">
                                            <div class="p-l-r-0">
                                                <h3 class="title">
                                                    <a class="link" href="{{ route('client.real-wedding.detail',['id' => $wedding->id, 'slug' => $wedding->slug]) }}">{{ $wedding->name }}</a>
                                                </h3>
                                                <div class="detail">
                                                    <span>{{ $wedding->time_pass }}</span>
                                                </div>
                                                <div class="info">
                                                    <h6 class="mb-6">
                                                        {{ __('base.author') . ': ' . $wedding->user->name }}
                                                    </h6>
                                                    <div class="col-lg-12 p-l-r-0">
                                                        <div class="col-lg-5 pl-0">{{ __('base.task') . ': ' . $wedding->tasks_count }}</div>
                                                        <div class="col-lg-7 pl-0">{{ __('base.price') . ': ' . number_format($wedding->final_cost) . ' vnđ' }}</div>
                                                    </div>
                                                </div>
                                                <div class="location">
                                                    <i class="fa fa-map-marker"></i><span>{{ $wedding->location ?? 'Hidden' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{ $weddings->links() }}

                        </div>
                    </div>
                    <div class="col-lg-3 p-l-r-0 box-filter">
                        <div class="filter">
                            <div>
                                <h5 class="text-center mb-6">{{ __('page.real_wedding.filter.title') }}</h5>
                                <ul>
                                    <li>
                                        <label class="form-label">{{ __('page.real_wedding.filter.by_price') }}</label>
                                        <select class="form-control cursor-pointer w-100 filter-by-price" name="price_option">
                                            <option value="0">{{ __('page.real_wedding.filter.all') }}</option>
                                            <option value="1">{{ __('page.real_wedding.filter.option_1') }}</option>
                                            <option value="2">{{ __('page.real_wedding.filter.option_2') }}</option>
                                            <option value="3">{{ __('page.real_wedding.filter.option_3') }}</option>
                                            <option value="4">{{ __('page.real_wedding.filter.option_4') }}</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="inner">
                    <h4 class="text-center">{{ __('page.real_wedding.package_services') }}</h4>
                    <div class="box-service">
                        <div class="box-service__inner">
                            @foreach ($packages as $package)
                                <div class="col-lg-12 p-l-r-0 service-item">
                                     <div class="service-item__inner">
                                        <div class="col-lg-5 p-l-r-0">
                                            <a href="{{ route('client.package.detail', ['id' => $package->id, 'slug' => $package->slug]) }}">
                                                <img src="{{ asset(config('asset.package') . $package->image) }}">
                                            </a>
                                        </div>
                                        <div class="col-lg-7">
                                            <h6 class="header-title">
                                                <a href="{{ route('client.package.detail', ['id' => $package->id, 'slug' => $package->slug]) }}">{{ $package->name }}</a>
                                            </h6>
                                            <div class="infor">
                                                <div>
                                                    <span>{{ __('base.type') . ': ' }}</span>
                                                    @php
                                                        $number = count($package->tasks);
                                                        $i = 0;
                                                    @endphp
                                                    @foreach ($package->tasks as $type)
                                                        <span class="title">{{ $type->category->name }}
                                                            @if(++$i < $number)
                                                                <span>{{ ', ' }}</span>
                                                            @endif
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="split">
                        <hr>
                    </div>
                    <div class="comunity">
                        <h4 class="text-center">{{ __('base.community') }}</h4>
                        <div class="box-comunity">
                            <div class="box-comunity-inner">
                                @for ($i = 0; $i <= 3; $i++)
                                    <div class="element-comunity">
                                        <h6 class="title">
                                            <a href="#">Mối liên hệ giữa chọn váy cưới và túi tiền</a>
                                        </h6>
                                        <div class="comment-box">
                                            <span><i class="fa fa-heart"></i> {{ '0 ' . __('base.love') }}</span>
                                            <a href="#"><i class="fa fa-comment"></i> {{ '0 ' . __('base.comment') }}</a>
                                        </div>
                                        <div class="author">
                                            <span>{{ __('base.by_author') . ' Haha' }}</span>
                                        </div>
                                        <div class="time">
                                            <span>{{ '7 hour ago' }}</span>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
