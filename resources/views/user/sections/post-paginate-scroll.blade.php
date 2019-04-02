@foreach ($recentlyPosts as $post)
    <div class="pure-u-1-2 col-lg-6 pr-pl-0">
        <div class="articles-listing-box">
            <figure class="articles-listing-box-frame">
                <a href="{{ route('post.detail', ['topic' => str_slug($post->topic->name, '-'), 'id' => $post->id, 'slug' => str_slug($post->slug, '-')]) }}"><img class="articles-listing-box-image" src="{{ config('define.post.path') . $post->image }}"></a>
            </figure>
            <p class="articles-listing-box-category">{{ $post->topic->name }}</p>
            <a class="articles-listing-box-title title-hover" href="{{ route('post.detail', ['topic' => str_slug($post->topic->name, '-'), 'id' => $post->id, 'slug' => str_slug($post->slug, '-')]) }}">{{ $post->title }}</a>
            <p class="articles-listing-box-content">{{ $post->brief }}</p>
            <div class="articles-listing-box-date">
                <time datetime="2019-03-22">{{ $post->created_at }}</time>
            </div>
        </div>
    </div>
@endforeach
