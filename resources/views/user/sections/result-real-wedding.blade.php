@foreach ($weddings as $wedding)
    <div class="row">
        <div class="col-lg-12 single-wedding">
            <div class="col-lg-5 p-l-r-0">
                <a href="{{ route('real-wedding.detail',['id' => $wedding->id, 'slug' => $wedding->slug]) }}">
                    <img alt="{{ $wedding->slug }}"
                         src="{{ asset(config('asset.users.images.user_wedding') . $wedding->image) }}">
                </a>
            </div>
            <div class="col-lg-7 p-l-r-0 pl-10">
                <div class="p-l-r-0">
                    <h3 class="title">
                        <a class="link"
                           href="{{ route('real-wedding.detail',['id' => $wedding->id, 'slug' => $wedding->slug]) }}">{{ $wedding->name }}</a>
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
                    <div class="location" style="">
                        <i class="fa fa-map-marker"></i><span>{{ $wedding->location ?? 'Hidden' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

{{ $weddings->links() }}
