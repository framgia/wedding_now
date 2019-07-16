<div class="row">
    <div class="near-you">
        <div class="n-title text-left">
            <h4>{{ __('page.todo_list.near_you') }}</h4>
        </div>
        <div class="n-product">
            @if (count($itemsNearUser) > 0)
                <div class="row">
                    @foreach ($itemsNearUser as $itemUser)
                        @forelse ($itemUser->users as $user)
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="blog-card">
                                    <div class="meta">
                                        <a href="#">
                                            <div class="photo"></div>
                                        </a>
                                    </div>
                                    <div class="description">
                                        <h1>{{ $itemUser->name }}</h1>
                                        <a href="#">
                                            <p class="vendor">{{ $user->name }}</p>
                                        </a>
                                        <div class="more-info">
                                            <div class="fl-left">
                                                @foreach ($itemUser->locations as $location)
                                                    <li title="{{ $location->district->name . ', ' . $location->district->city->name }}">
                                                        {{ $location->district->name }}
                                                    </li>
                                                @endforeach
                                            </div>
                                            <div class="fl-right">
                                                <p class="price">{{ number_format($itemUser->price) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="select-product">
                                        <input type="radio" id="item{{ $itemUser->id }}"
                                               name="item_id"
                                               value="{{ $itemUser->id }}">
                                        <label for="item{{ $itemUser->id }}"></label>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    @endforeach
                </div>
            @else
                <div class="alert alert-info">
                    <strong>{{ __('base.info') }}</strong> {{ __('page.todo_list.no_product')}}
                </div>
            @endif
        </div>
    </div>
</div>
<div class="other-product">
    <div class="n-title">
        <h4>{{ __('page.todo_list.other') }}</h4>
    </div>
    @if (count($items) > 0)
        <div class="n-product">
            <div class="row">
                @foreach ($items as $key => $item)
                    @if (!in_array($item->id, $itemsNearUser->pluck('id')->toArray()))
                        @forelse ($item->users as $user)
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="blog-card">
                                    <div class="meta">
                                        <a href="#">
                                            <div class="photo"></div>
                                        </a>
                                    </div>
                                    <div class="description">
                                        <h1 title="{{ $item->name }}">{{ $item->name }}</h1>
                                        <a href="#">
                                            <p class="vendor">{{ $user->name }}</p>
                                        </a>
                                        <div class="more-info">
                                            <div class="fl-left">

                                                @foreach ($item->locations as $location)
                                                    <li title="{{ $location->district->name . ', ' . $location->district->city->name }}">
                                                        {{ $location->district->city->name }}
                                                    </li>
                                                @endforeach

                                            </div>
                                            <div class="fl-right">
                                                <p class="price">{{ number_format($item->price) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="select-product">
                                        <input type="radio" id="item{{ $item->id }}" name="item_id"
                                               value="{{ $item->id }}">
                                        <label for="item{{ $item->id }}"></label>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    @endif
                @endforeach
            </div>
        </div>
    @else
        <div class="alert alert-info">
            <strong>{{ __('base.info') }}</strong> {{ __('page.todo_list.no_product')}}
        </div>
    @endif
</div>