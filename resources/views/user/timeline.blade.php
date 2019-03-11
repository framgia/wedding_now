@extends('layouts.main')

@section('title')
    {{ __('page.title.timeline') }}
@endsection

@section('page-name')
    {{ __('page.page.timeline') }}
@endsection

@section('main-content')
<section class="timeline">
    <div class="container">
        <div class="row">
            <div class="t-schedule text-center pt30 pb15">
                <div class="t-schedule-name mb50 mt30">
                    <h3>{{ $schedule->name }}</h3>
                </div>
                <div class="t-schedule-info">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 text-justify">
                            <div class="t-note">
                                <pre>{{ $schedule->note }}</pre>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="info-item">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <span>{{ __('page.timeline.marriage_day') }}:</span>
                                <span>{{ $schedule->marriage_day }}</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="info-item">
                                <i class="fa fa-usd" aria-hidden="true"></i>
                                <span>{{ __('page.timeline.budget') }}:</span>
                                <span>{{ number_format($schedule->budget) }}</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="info-item">
                                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                <span>{{ __('page.timeline.task') }}:</span>
                                <span>{{ $countTask }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="list-timeline-item">
                @for ($i = 0; $i < $countTask - 1; $i += 2)
                    <div class="timeline-item">
                        <div class="timeline-img"></div>
                        <div class="timeline-content">
                            <div class="task-right wow bounceInRight" data-wow-delay=".5s">
                                <span class="date">{{ $tasks[$i]->time_occurs ? $tasks[$i]->time_occurs : __('page.timeline.undefined') }}</span>
                                <span class="task-title">{{ $tasks[$i]->name }}</span>
                                <div class="mt-2">
                                    <span class="task-category">{{ $tasks[$i]->category->name }}</span>
                                </div>
                            </div>
                            <div class="task-panel-wrapper wow bounceInLeft">
                                <div class="product-addto-links-text">
                                    <div class="more hideContent">
                                        <pre>{{ $tasks[$i]->note ? $tasks[$i]->note : __('page.timeline.no_note') }}</pre>
                                        @if ($tasks[$i]->priority == 1)
                                            <span class="priority">{{ __('page.timeline.high') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-img"></div>
                        <div class="timeline-content timeline-card">
                            <div class="task-left wow bounceInLeft" data-wow-delay=".5s">
                                <span class="task-title">{{ $tasks[$i + 1]->name }}</span>
                                <span class="date">{{ $tasks[$i + 1]->time_occurs ? $tasks[$i + 1]->time_occurs : __('page.timeline.undefined') }}</span>
                                <div class="mt-2">
                                    <span class="task-category">{{ $tasks[$i + 1]->category->name }}</span>
                                </div>
                            </div>
                            <div class="task-panel-wrapper wow bounceInRight">
                                <div class="product-addto-links-text">
                                    <div class="more hideContent">
                                        <pre>{{ $tasks[$i + 1]->note ? $tasks[$i + 1]->note : __('page.timeline.no_note') }}</pre>
                                        @if ($tasks[$i + 1]->priority == 1)
                                            <span class="priority">{{ __('page.timeline.high') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</section>

@endsection
