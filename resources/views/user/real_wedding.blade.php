@extends('layouts.main')
@section('title', __('page.page.real_wedding'))
@section('page-name', __('page.page.real_wedding'))
@section('main-content')
<section class="real-wedding-main-block">
    <div class="container mt-20">
        <section class="post-section row">
            <div class="col-lg-12">
                @foreach ($posts as $post)
                    <div class="col-md-4 col-sm-6">
                        <div class="news-block">
                            <div class="news-img">
                                <a href="{{ route('post.detail', ['topic' => str_slug($post->topic->name, '-'), 'id' => $post->id, 'slug' => str_slug($post->slug, '-')]) }}">
                                    <img src="{{ config('define.post.path') . $post->image }}" class="img-responsive">
                                </a>
                                <div class="meta-tag">{{ $post->created_at }}</div>
                            </div>
                            <div class="news-dtl">
                                <h6 class="news-heading">
                                    <a href="{{ route('post.detail', ['topic' => str_slug($post->topic->name, '-'), 'id' => $post->id, 'slug' => str_slug($post->slug, '-')]) }}">{{ $post->title }}</a>
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
                                            <a href="{{ route('package.detail', ['id' => $package->id, 'slug' => $package->slug]) }}">
                                                <img src="{{ asset(config('asset.package') . $package->image) }}">
                                            </a>
                                        </div>
                                        <div class="col-lg-7">
                                            <h6 class="header-title">
                                                <a href="{{ route('package.detail', ['id' => $package->id, 'slug' => $package->slug]) }}">{{ $package->name }}</a>
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

@section('script')
    <script type="text/javascript" defer="">
        jQuery(document).ready(function($) {
            function loadData() {
                $.ajax({
                    url: route('real-wedding.load'),
                    type: 'get',
                })
                .done(function(res) {
                    $('.result-real-wedding').html(res);
                })
                .fail(function() {
                    toastr.error( Lang.get('page.message.fail') );
                })
            }

            loadData();

            $('body').on('click', '.page-link', function(event) {

                let page = Number($(this).attr('href').split('/?page=')[1]);

                let price_option = $('.filter-by-price').val();

                event.preventDefault();

                $.ajax({
                    url: route('real-wedding.load'),
                    type: 'get',
                    data: {
                        page: page,
                        price_option: price_option,
                    },
                })
                .done(function(res) {
                    $('.result-real-wedding').hide().html(res).fadeIn('slow');
                    $('html, body').animate({
                        scrollTop: $('.result-real-wedding').offset().top - 50
                    }, 700);
                })
                .fail(function() {
                    toastr.error( Lang.get('page.message.fail') );
                })
            });

            $('.filter-by-price').change(function(event) {

                event.preventDefault();

                let price_option = Number($(this).val());

                $.ajax({
                    url: route('real-wedding.load'),
                    type: 'get',
                    data: {
                        price_option: price_option,
                    },
                })
                .done(function(res) {
                    $('.result-real-wedding').hide().html(res).fadeIn('slow');
                    $('html, body').animate({
                        scrollTop: $('.result-real-wedding').offset().top - 50
                    }, 700);
                })
                .fail(function() {
                    toastr.error( Lang.get('page.message.fail') );
                })
            })
        });
    </script>
@endsection
