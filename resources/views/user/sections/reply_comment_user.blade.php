<ul>
    @foreach ($replies as $reply)
        <li class="col-lg-12 reply-content">
            <div class="col-lg-2">
                @if ($reply->user->media && file_exists(asset(config('asset.user.avatar') . $reply->user->media->name )))
                    <img class="img-responsive" src="{{ asset(config('asset.user.avatar') .
                        $reply->user->media->name ) }}" alt="">
                @else
                    <img class="img-responsive" src="{{ asset(config('define.avatar_default')) }}" alt="">
                @endif
            </div>
            <div class="col-lg-10 pd-0">
                <span>
                    {{ $reply->user->name }}
                </span>
                {{ $reply->content }}
            </div>
        </li>
    @endforeach
</ul>
