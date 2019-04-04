<div class="modal fade show-vendor login-model" id="product-modal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title text-center">{{ __('page.todo_list.list') }}</h5>
            </div>
            <div class="modal-body login-model-body text-center">
                <div class="product">
                    <div class="row">
                        <div class="near-you">
                            <div class="n-title text-left">
                                <h4>{{ __('page.todo_list.near_you') }}</h4>
                            </div>
                            <div class="n-product">
                                @if (count($itemsNearUser) > 0)
                                    <div class="row">
                                        @foreach ($itemsNearUser as $itemUser)
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="blog-card">
                                                    <div class="meta">
                                                        <a href="#"><div class="photo"></div></a>
                                                    </div>
                                                    <div class="description">
                                                        <h1>{{ $itemUser->name }}</h1>
                                                        <a href="#"><p class="vendor">{{ $itemUser->user->name }}</p></a>
                                                        <div class="more-info">
                                                            <div class="fl-left">
                                                                <p>
                                                                    @foreach ($itemUser->locations as $location)
                                                                        <li title="{{ $location->district->name . ', ' . $location->district->city->name }}">
                                                                            {{ $location->district->name }}
                                                                        </li>
                                                                    @endforeach
                                                                </p>
                                                            </div>
                                                            <div class="fl-right">
                                                                <p class="price">{{ number_format($itemUser->price) }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="select-product">
                                                        <input type="radio" id="item{{ $itemUser->id }}" name="item_id" value="{{ $itemUser->id }}">
                                                        <label for="item{{ $itemUser->id }}"></label>
                                                    </div>
                                                </div>
                                            </div>
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
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="blog-card">
                                                    <div class="meta">
                                                        <a href="#"><div class="photo"></div></a>
                                                    </div>
                                                    <div class="description">
                                                        <h1 title="{{ $item->name }}">{{ $item->name }}</h1>
                                                        <a href="#"><p class="vendor">{{ $item->user->name }}</p></a>
                                                        <div class="more-info">
                                                            <div class="fl-left">
                                                                <p>
                                                                    @foreach ($item->locations as $location)
                                                                        <li title="{{ $location->district->name . ', ' . $location->district->city->name }}">
                                                                            {{ $location->district->city->name }}
                                                                        </li>
                                                                    @endforeach
                                                                </p>
                                                            </div>
                                                            <div class="fl-right">
                                                                <p class="price">{{ number_format($item->price) }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="select-product">
                                                        <input type="radio" id="item{{ $item->id }}" name="item_id" value="{{ $item->id }}">
                                                        <label for="item{{ $item->id }}"></label>
                                                    </div>
                                                </div>
                                            </div>
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
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default create-task" id="select-item" type="button" data-dismiss="modal">{{ __('base.save') }}</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('base.close') }}</button>
            </div>
        </div>
    </div>
</div>

