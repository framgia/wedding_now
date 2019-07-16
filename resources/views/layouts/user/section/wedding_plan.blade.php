<section id="wedding-plan" class="ptb120">
    <div class="">
        <div class="section text-center">
            <h3 class="section-heading">{{ __('page.index.planning') }}</h3>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="wedding-plan-block">
                    <div class="wedding-plan-img">
                        <img src="{{ asset(config('asset.user.images.index') . 'wedding-plan-2.jpg') }}"
                             class="img-responsive" alt="wedding-plan">
                        <div class="overlay-bg"></div>
                    </div>
                    <div class="wedding-plan-dtl text-center">
                        @if (hasSchedule())
                            <h5 class="heading">{{ __('page.index.wedding_plan.edit.text') }}</h5>
                            <p class="sub-heading">{{ __('page.index.wedding_plan.edit.detail') }}</p>
                            <a href="{{ route('client.to-do-list') }}"
                               class="btn btn-default">{{ __('page.choose') }}</a>
                        @else
                            <h5 class="heading">{{ __('page.index.planning_default') }}</h5>
                            <p class="sub-heading">{{ __('page.index.detail_planning_default') }}</p>
                            <button type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#modal-schedule">{{ __('page.choose') }}</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="wedding-plan-block">
                    <div class="wedding-plan-img">
                        <img src="{{ asset(config('asset.user.images.index') . 'wedding-plan-3.jpg') }}"
                             class="img-responsive" alt="wedding-plan">
                        <div class="overlay-bg"></div>
                    </div>
                    <div class="wedding-plan-dtl text-center">
                        <h5 class="heading">
                            <a href="{{ route('client.suggestion.index') }}">
                                {{ __('page.index.planning_suggest') }}
                            </a>
                        </h5>
                        <p class="sub-heading">
                            {{ __('page.index.detail_planning_suggest') }}
                        </p>
                        <a href="{{ route('client.suggestion.index') }}" class="btn btn-default">
                            {{ __('page.choose') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-schedule" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {{ Form::open(['method' => 'post', 'route' => 'client.select-schedule-default']) }}
                <div class="modal-header p-5">
                    <button type="button" class="close close-choose-schedule-default" data-dismiss="modal">&times;
                    </button>
                    <h4 class="modal-title">{{ __('page.index.schedule_default') }}</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @forelse ($detaultSchedules as $schedule)
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="blog-card">
                                    <div class="meta">
                                        <img src="{{ asset(config('asset.schedule_default') . 'news-update-3.jpg') }}"
                                             alt="">
                                    </div>
                                    <div class="description">
                                        <h1 title="{{ $schedule->name }}">{{ $schedule->name }}</h1>
                                        <p></p>
                                        <p class="read-more">
                                            <a target="_blank"
                                               href="{{ route('client.real-wedding.detail', ['slug' => $schedule->slug, 'id' => $schedule->id]) }}">{{ __('base.view_detail') }}</a>
                                        </p>
                                        <div class="more-info">
                                            <div class="fl-left">
                                                <p>{{ __('base.task') }}: {{ $schedule->tasks_count }}</p>
                                            </div>
                                            <div class="fl-right">
                                                <p class="price">{{ number_format($schedule->budget) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="select-product">
                                        <input type="radio" id="schedule{{ $schedule->id }}" name="select_schedule"
                                               value="{{ $schedule->id }}">
                                        <label for="schedule{{ $schedule->id }}"></label>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit(__('page.choose'), ['class' => 'btn btn-default w-10']) }}
                    <button type="button" class="btn btn-default  w-10"
                            data-dismiss="modal">{{ __('base.close') }}</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</section>
