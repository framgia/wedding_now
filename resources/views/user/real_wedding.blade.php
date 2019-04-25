@extends('layouts.main')
@section('title', __('page.page.real_wedding'))
@section('page-name', __('page.page.real_wedding'))
@section('main-content')
<section id="to-do-list" class="to-do-list-main-block">
    <div class="container">
        @include('user.sections.to_do_list_tab')
        <section class="main-container">
            <div class="refine-search">
                {!! Form::open(['route' => 'real-wedding.show']) !!}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="select-city-dropdown dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="drp-name" data-bind="label">{{ isset($reqCity) ? $reqCity[1] : 'Select City' }}</span>
                                    <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                    </button>
                                    <ul class="dropdown-menu city" aria-labelledby="dropdownMenu2">
                                        <li>
                                            <a href="#">{{ __('validation.custom.select.city') }}</a>
                                        </li>
                                        @foreach ($cities as $city)
                                            <li>
                                                <a href="#" data-id="{{ $city['id'] }}">{{ $city['name'] }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    {!! Form::hidden('cityId', isset($reqCity) ? $reqCity[0] : null, ['id' => 'cityId']) !!}
                                    {!! Form::hidden('cityName', isset($reqCity) ? $reqCity[1] : null, ['id' => 'cityName']) !!}
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-6">
                                <div class="price-filter">
                                    <div class="price-slider-amount">
                                        {!! Form::text('cost', '', ['class' => 'form-control', 'id' => 'amount', 'placeholder' => '0₫ - 0₫']) !!}
                                        {!! Form::hidden('max_cost', $maxCost, ['id' => 'max_cost', 'disabled']) !!}
                                        {!! Form::hidden('search_min', isset($cost) ? $cost[0] : 0, ['id' => 'search_min', 'disabled']) !!}
                                        {!! Form::hidden('search_max', isset($cost) ? $cost[1] : 0, ['id' => 'search_max', 'disabled']) !!}
                                    </div>
                                    <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all slider-range">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all">
                                        </div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="search-btn">
                                    <button type="submit" class="btn btn-pink">{{ __('base.search') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="category-listing-block">
                <div class="row">
                    @foreach ($data as $value)
                        <div class="col-md-4 col-sm-6">
                            <div class="category-listing-section">
                                <div class="category-listing-dtl">
                                    <div class="category-listing-img">
                                        <a href="{{ route('client.timeline', $value->slug . '-' . $value->id) }}" title="{{ __('base.view') }}">
                                            <img src="{{ asset(config('asset.users.images.user_wedding') . ($value['medias']->isNotEmpty() ? $value['medias'][0]['name'] : 'upcoming-wedd-3.jpg')) }}" class="img-responsive real-wedding-list" alt="category-img">
                                        </a>
                                    </div>
                                    <div class="category-info">
                                        <h6 class="category-dtl-heading">
                                            <a href="{{ route('client.timeline', $value->slug . '-' . $value->id) }}">
                                            {{ __('page.page.timeline') }} of {{ $data['scheduleMetasPluck'] ? $data['scheduleMetasPluck'][array_search('my_name', array_column($data['scheduleMetasPluck']->toArray(), 'key'))]['value'] : 'null' }}
                                            &nbsp;&amp;&nbsp;
                                            {{ $data['scheduleMetasPluck'] ? $data['scheduleMetasPluck'][array_search('partner_name', array_column($data['scheduleMetasPluck']->toArray(), 'key'))]['value'] : 'null' }}
                                            </a>
                                        </h6>
                                        <div class="category-dtl-address"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $value['location']['address'] }} {{ '- ' . $value['marriage_day'] }}</div>
                                    </div>
                                </div>
                                <div class="category-listing-text">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="category-text-heading">
                                                <a href="{{ route('client.timeline', $value->slug . '-' . $value->id) }}">{{ $value['tasks_count'] }} {{ __('base.task') }}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="category-price text-right">{{ number_format($value['final_cost'], 0, '', '.') }} ₫</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="pagination">
                <ul>
                    @if ($data->currentPage() != 1)
                        <li><a href="{{ url()->current() . '?page=' . ($data->currentPage() - 1) }}" class="btn btn-default"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                    @endif
                    @for ($i = 1; $i <= $data->lastPage() ; $i++)
                        <li {{ $data->currentPage() == $i ? 'class=active' : '' }}><a href="{{ url()->current() . '?page=' . $i }}" class="btn btn-default">{{ $i }}</a></li>
                    @endfor
                    @if ($data->currentPage() != $data->lastPage())
                        <li><a href="{{ url()->current() . '?page=' . ($data->currentPage() + 1) }}" class="btn btn-default"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    @endif
                </ul>
            </div>
        </section>
    </div>
</section>
@endsection

@section('script')
    <script type="text/javascript">
        jQuery(document).ready(function() {
            $('.city li a').click(function() {
                $('#cityId').val($(this).data('id'));
                $('#cityName').val($(this).text());
            });
        });
    </script>
@endsection
