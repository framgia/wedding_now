<section id="news" class="pt120 pb90 bglight">
    <div class="container">
        <div class="section text-center">
            <h3 class="section-heading">{{ __('page.news.latest_news') }}</h3>
            <p class="section-sub-heading">{{ __('page.news.detail_latest_news') }}</p>
        </div>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 col-sm-6">
                    <div class="news-block">
                        <div class="news-img">
                            <a href="#"><img src="{{ config('define.post.path') . $post->image }}" class="img-responsive" alt="news"></a>
                            <div class="meta-tag">{{ $post->created_at }}</div>
                        </div>
                        <div class="news-dtl">
                            <h6 class="news-heading">
                                <a href="{{ route('post.detail', ['topic' => str_slug($post->topic->name, '-'), 'id' => $post->id, 'slug' => str_slug($post->slug, '-')]) }}">{{ $post->title }}</a>
                            </h6>
                            <p>{{ $post->brief }}</p>
                            <a href="{{ route('post.detail', ['topic' => str_slug($post->topic->name, '-'), 'id' => $post->id, 'slug' => str_slug($post->slug, '-')]) }}" class="btn read-more">{{ __('page.index.view_details') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
