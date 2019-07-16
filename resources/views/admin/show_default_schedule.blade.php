@extends('layouts.admin.app')

@section('subheader', __('page.title.user_list'))

@section('content')
<section class="timeline">
    <div class="mt-40">
        @if (count($schedule->tasks))
        <div class="list-timeline-item">
            <div class="vertical-line"></div>
            @foreach ($schedule->tasks as $key => $value)
            @if ($key % 2 == 0)
            <div class="timeline-item">
                <div class="timeline-img"></div>
                <div class="timeline-content">
                    <div class="task-panel-wrapper">
                        <div class="product-addto-links-text">
                            <div class="more hideContent">
                                <pre class="note">
                                        {!! $value->note ? $value->note : __('page.timeline.no_note') !!}
                                </pre>
                                @if ($value->priority == 1)
                                <span class="priority priority-high link" data-priority="0"
                                    data-id="{{ $value->id }}">{{ __('page.timeline.high') }}</span>
                                @else
                                <span class="priority priority-low link" data-priority="1"
                                    data-id="{{ $value->id }}">{{ __('page.timeline.low') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="task-right task">
                    <span class="date choose-date"
                        data-id="{{ $value->id }}">{{ $value->time_occurs ? $value->time_occurs : __('page.timeline.undefined') }}</span>
                    <span class="task-title">{{ $value->name }}</span>
                    <div class="mt-2-c">
                        <span class="task-category">{{ $value->category->name }}</span>
                    </div>
                </div>
            </div>
            @else
            <div class="timeline-item">
                <div class="timeline-img"></div>
                <div class="task-left task">
                    <span class="task-title">{{ $value->name }}</span>
                    <span class="date choose-date"
                        data-id="{{ $value->id }}">{{ $value->time_occurs ? $value->time_occurs : __('page.timeline.undefined') }}</span>
                    <div class="mt-2-c">
                        <span class="task-category">{{ $value->category->name }}</span>
                    </div>
                </div>
                <div class="timeline-content timeline-card">
                    <div class="task-panel-wrapper">
                        <div class="product-addto-links-text">
                            <div class="more hideContent">
                                <pre class="note">
                                    {!! $value->note ? $value->note : __('page.timeline.no_note') !!}
                                </pre>
                                @if ($value->priority == 1)
                                <span class="priority priority-left priority-high link" data-priority="0"
                                    data-id="{{ $value->id }}">{{ __('page.timeline.high') }}</span>
                                @else
                                <span class="priority priority-left priority-low link" data-priority="1"
                                    data-id="{{ $value->id }}">{{ __('page.timeline.low') }}</span>
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
</section>
@endsection