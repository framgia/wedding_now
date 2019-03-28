@foreach ($recentlyPosts as $post)
    <div class="pure-u-1-2 col-lg-6 pr-pl-0">
        <div class="articles-listing-box">
            <figure class="articles-listing-box-frame">
                <img class="articles-listing-box-image" src="{{ config('define.post.path') . $post->image }}">
            </figure>
            <p class="articles-listing-box-category">{{ $post->topic->name }}</p>
            <a class="articles-listing-box-title title-hover" href="">{{ $post->title }}</a>
            <p class="articles-listing-box-content">{{ $post->brief }}</p>
            <div class="articles-listing-box-date">
                <time datetime="2019-03-22">{{ $post->created_at }}</time>
            </div>
        </div>
    </div>
@endforeach
