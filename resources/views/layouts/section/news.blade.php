<section id="news" class="ptb120">
    <div class="">
        <h3 class="text-center">
            <a class="text-title text-title-new" href="{{ route('post.index') }}">{{ __('base.new') }}</a>
        </h3>
        <div class="content-new">
            @foreach ($posts as $post)
                <div class=" col-lg-12 posts">
                    <div class="news-block">
                        <div class="col-lg-5">
                            <a href="#" title="{{ $post->title }}">
                                <img alt="{{ $post->title }}" src="{{ asset(config('define.post.path') . $post->image) }}"
                                     class="img-responsive">
                            </a>
                            <div class="meta-tag">{{ $post->created_at }}</div>
                        </div>
                        <div class="col-lg-7 news-dtl pd-0">
                            <h6 class="news-heading">
                                <a href="{{ route('post.detail', ['topic' => str_slug($post->topic->name, '-'), 'id' => $post->id, 'slug' => str_slug($post->slug, '-')]) }}"
                                   title="{{ $post->title }}">{{ $post->title }}</a>
                            </h6>
                            <div class="new-author">
                                <span>{{ __('base.by_author') . ': ' }}</span>
                                <span class="text-author">{{ $post->user->name }}</span>
                            </div>
                            <div class="new-time">
                                <time>{{ $post->time_pass }}</time>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-lg-12 pd-0 mt-20">
            <div class="text-center pb-20">
                <p class="mb-5">{{ __('page.index.connect_with_us') }}</p>
                <div class="social">
                    <ul class="d-inline-flex">
                        <li class="logo-social">
                            <a href="#">
                                <img alt="" src="{{ asset(config('define.logo_fb')) }}">
                            </a>
                        </li>
                        <li class="logo-social">
                            <a href="#">
                                <img alt="" src="{{ asset(config('define.logo_youtube')) }}">
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
                                    <img alt="" src="{{ asset('storage/logo/logo1.png') }}">
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
