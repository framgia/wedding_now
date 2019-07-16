<li class="comment-single">
    <div class="box-user col-sm-2">
        @if ($comment->user->media && file_exists(asset(config('asset.user.avatar') . $comment->user->media->name )))
            <img src="{{ asset(config('asset.user.avatar') . $comment->user->media->name ) }}">
        @else
            <img src="{{ asset(config('define.avatar_default')) }}">
        @endif
    </div>
    <div class="box-content col-sm-10">
        <div class="content">
            <div class="content-header">
                <p class="user-post">{{ $comment->user->name }}</p>
                <span>
                    <time>{{ $comment->created_at->diffForHumans() }}</time>
                </span>
            </div>
            <div class="content-body">
                {{ $comment->content }}
            </div>
            <div class="content-footer">
                <div class="reply-user" data-id="{{ $comment->id }}">
                    @foreach ($comment->replies as $reply)
                        @if ($comment->user->media && file_exists(asset(config('asset.user.avatar') . $reply->user->media->name )))
                            <img class="img img-responsive" src="{{ asset(config('asset.user.avatar') .
                                $reply->user->media->name ) }}" alt="">
                        @else
                            <img class="img-reply" src="{{ asset(config('define.avatar_default')) }}" alt="">
                        @endif
                    @endforeach
                </div>
                <div class="reply" data-comment-id="{{ $comment->id }}" data-post-id="{{ $post->id }}">
                    <i class="fa fa-reply"></i>
                    <a href="#">
                        {{ __('base.rely') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</li>
