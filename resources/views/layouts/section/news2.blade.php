<section id="news" class="pt40">
    <div class="container">
        <div class="col-lg-8">
            <div class="owl-carousel">
                @foreach ($posts as $post)
                    <div class="posts">
                        <div class="news-block">
                            <div class="news-img">
                                <a href="#" title="{{ $post->title }}">
                                    <img src="{{ config('define.post.path') . $post->image }}" class="img-responsive">
                                </a>
                                <div class="meta-tag">{{ $post->created_at }}</div>
                            </div>
                            <div class="news-dtl">
                                <h6 class="news-heading">
                                    <a class="link" href="{{ route('post.detail', ['topic' => str_slug($post->topic->name, '-'), 'id' => $post->id, 'slug' => str_slug($post->slug, '-')]) }}" title="{{ $post->title }}">{{ $post->title }}</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-4 pd-0">
            <div class="text-center pb-20">
                <p class="mb-5">{{ __('page.index.connect_with_us') }}</p>
                <div class="social">
                    <ul class="d-inline-flex">
                        <li class="logo-social">
                            <a href="#">
                                <img src="{{ asset(config('define.logo_fb')) }}">
                            </a>
                        </li>
                        <li class="logo-social">
                            <a href="#">
                                <img src="{{ asset(config('define.logo_youtube')) }}">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12 pd-0">
                <ul>
                    @for ($i = 0; $i < 4; $i++)
                        <li class="col-lg-6 pd-left-right-7">
                            <div class="ad-box">
                                <a href="#">
                                    <img src="{{ asset('storage/logo/logo1.png') }}">
                                </a>
                            </div>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
    <hr class="w-80">
</section>
