@extends('layouts.main')

@section('title')
    {{ __('page.title.timeline') }}
@endsection

@section('page-name')
    {{ __('page.page.timeline') }}
@endsection

@section('main-content')
    <section class="real-wedding timeline">
        <div class="container">
            <div>
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
                    {!! Form::open(['route' => 'real-wedding.copy']) !!}
                    {!! Form::text('id', $schedule->id, ['class' => 'd-none']) !!}
                    <button class="btn btn-info copy" type="submit">{{ __('page.timeline.copy') }}</button>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="mt-40">
                @if ($countTask)
                    <div class="real-wedding-time-line list-timeline-item">
                        <div class="vertical-line"></div>
                        @foreach ($tasks as $key => $value)
                            @if ($key % 2 == 0)
                                <div class="timeline-item">
                                    <div class="timeline-img"></div>
                                    <div class="timeline-content">
                                        <div class="task-panel-wrapper">
                                            <div class="product-addto-links-text">
                                                <div class="more hideContent">
                                                    <pre class="note">{!! $value->note ? $value->note : __('page.timeline.no_note') !!}</pre>
                                                    @if ($value->priority == 1)
                                                        <span class="priority priority-high">{{ __('page.timeline.high') }}</span>
                                                    @else
                                                        <span class="priority priority-low">{{ __('page.timeline.low') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="task-right task">
                                    <span class="date" data-id="{{ $value->id }}">{{ $value->time_occurs ? $value->time_occurs : __('page.timeline.undefined') }}</span>
                                    <span class="task-title title-task-real-wedding">{{ $value->name }}</span>
                                    <div class="mt-2">
                                        <span class="task-category">{{ $value->category->name }}</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="timeline-item">
                                <div class="timeline-img"></div>
                                <div class="task-left task">
                                    <span class="task-title title-task-real-wedding">{{ $value->name }}</span>
                                    <span class="date" data-id="{{ $value->id }}">{{ $value->time_occurs ? $value->time_occurs : __('page.timeline.undefined') }}</span>
                                    <div class="mt-2">
                                        <span class="task-category">{{ $value->category->name }}</span>
                                    </div>
                                </div>
                                <div class="timeline-content timeline-card">
                                    <div class="task-panel-wrapper">
                                        <div class="product-addto-links-text">
                                            <div class="more hideContent">
                                                <pre class="note">{!! $value->note ? $value->note : __('page.timeline.no_note') !!}</pre>
                                                @if ($value->priority == 1)
                                                    <span class="priority priority-left priority-high">{{ __('page.timeline.high') }}</span>
                                                @else
                                                    <span class="priority priority-left priority-low">{{ __('page.timeline.low') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="alert alert-success mt25 pt25" role="alert">
                    <h4 class="alert-heading text-center">{{ __('page.timeline.no_task') }}</h4>
                </div>
            @endif
        </div>
        </div>
    </section>
@endsection
