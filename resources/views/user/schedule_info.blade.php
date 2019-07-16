@extends('layouts.user.main')

@section('title')
    {{ __('page.page.schedule_info') }}
@endsection

@section('page-name')
    {{ __('page.page.schedule_info') }}
@endsection

@section('banner-content')
    <div class="t-schedule-name mb50 mt30">
        <h3>{{ $scheduleName }}</h3>
    </div>
@endsection

@section('main-content')
    <section id="to-do-list" class="to-do-list-main-block">
        <div class="container">
            @include('user.sections.to_do_list_tab')
            <div class="to-do-list-block">
                <h3 class="create-task-heading">{{ __('page.my_wedding') }}</h3>
                <div class="col-lg-12 padding-left-right-0">
                    <div class="dash-image">
                        {!! Form::open(['id' => 'upload-image-schedule', 'file' => true]) !!}
                        {!! Form::submit(__('page.change_photo'), ['class' => 'dash-btn-change-photo']) !!}
                        {!! Form::file('img_schedule', ['class' => 'img-file d-none']) !!}
                        {!! Form::close() !!}
                        <img alt="" class="dash-couple-img" src="{{ asset(config('define.main_schedule')) }}"
                             data-path="{{ config('asset.schedule') }}">
                    </div>
                    <div class="dash-couple-info">
                        {!! Form::submit(__('page.action.edit'), ['class' => 'btn btn-primary dash-couple-btn-edit', 'data-toggle' => 'modal', 'data-target' => '#myModal']) !!}
                        <div class="dash-couple">
                            <ul class="dash-ul-list">
                                @if (file_exists($myAvatar))
                                    <li class="dash-ul-li z-index-5">
                                        <img alt="" src="{{ asset($myAvatar) }}"
                                             class="dash-ul-li-img dash-ul-li-img-left">
                                    </li>
                                @else
                                    <li class="dash-ul-li z-index-5">
                                        <img alt="" src="{{ asset($myAvatar) }}"
                                             class="dash-ul-li-img dash-ul-li-img-left">
                                    </li>
                                @endif
                                @if (file_exists($partnerAvatar))
                                    <li class="dash-ul-li z-index-5">
                                        <img alt="" src="{{ asset($partnerAvatar) }}"
                                             class="dash-ul-li-img dash-ul-li-img-right">
                                    </li>
                                @else
                                    <li class="dash-ul-li z-index-5">
                                        <img alt="" src="{{ asset($partnerAvatar) }}"
                                             class="dash-ul-li-img dash-ul-li-img-right">
                                    </li>
                                @endif
                            </ul>
                            <p class="dash-couple-name">
                                <span class="dash-couple-name-span1">
                                    {{ $myName }}
                                </span>
                                &#38;
                                <span class="dash-couple-name-span2">
                                    {{ $partnerName }}
                                </span>
                            </p>
                            <p class="dash-couple-marriage-day">
                            </p>
                            <div class="dash-couple-tasks">
                                <ul class="pure-g">
                                    <li class="cursor-pointer">
                                        <a href="{{ route('client.to-do-list') }}">
                                            <span class="number-task-complete">
                                                <strong>{{ $doneTasks }}</strong>{{ __('page.schedule_info.of', ['total' => $totalTasks]) }}</span>
                                        </a>
                                        <small>{{ __('page.schedule_info.task_complete') }}</small>
                                    </li>
                                    <li class="cursor-pointer">
                                        <a href="{{ route('client.to-do-list') }}">
                                            <span class="number-task-complete">
                                                <strong>{{ $notDoneTasks }}</strong>{{ __('page.schedule_info.of', ['total' => $totalTasks]) }}</span>
                                        </a>
                                        <small>{{ __('page.schedule_info.task_to_do') }}</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content model-schedule-info">
                <div class="modal-header">
                    <button type="button" class="modal-close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">{{ __('page.my_wedding') }}</h4>
                </div>
                <div class="modal-body">
                    <div class="img-model">
                        {!! Form::open(['id' => 'scheduleInfo', 'file' => true]) !!}
                        <ul class="dash-ul-list width-100">
                            <li class="dash-ul-li model-ul-li couple-left">
                                <img src="{{ asset(config('define.default_avatar')) }}"
                                     class="dash-ul-li-img avatar-left"
                                     data-path="{{ asset(config('asset.schedule_avatar')) }}">
                                {!! Form::file('my_avatar', ['class' => 'avatar-left-input d-none']) !!}
                                <div class="info-couple">
                                    <span class="title-couple">{{ __('page.i_am') }}</span>
                                    <div class="title-coupe-input">
                                        {!! Form::text('my_name', null, ['class' => 'input-couple', 'id' => 'txtNameLeft', 'placeholder' => __('page.placeholder.your_name')]) !!}
                                    </div>
                                </div>
                                <div class="info-couple">
                                    <span class="title-couple">{{ __('page.schedule_info.wedding_date') }}</span>
                                    <div class="title-coupe-input">
                                        {!! Form::date('wedding_date', \Illuminate\Support\Carbon::now(), ['id' => 'dateWedding', 'class' => 'input-couple']) !!}
                                    </div>
                                </div>
                            </li>
                            <li class="dash-ul-li model-ul-li-20">
                                <img alt="" src="{{ asset(config('define.ring_img')) }}" class="icon-ring">
                            </li>
                            <li class="dash-ul-li model-ul-li couple-right">
                                <img alt="" src="{{ asset(config('define.default_avatar')) }}"
                                     class="dash-ul-li-img avatar-right"
                                     data-path="{{ config('asset.schedule_avatar') }}">
                                {!! Form::file('partner_avatar', ['class' => 'avatar-right-input d-none']) !!}
                                <div class="info-couple">
                                    <span class="title-couple">{{ __('page.partner_name') }}</span>
                                    <div class="title-coupe-input">
                                        {!! Form::text('partner_name', null, ['id' => 'txtNameRight', 'class' => 'input-couple', 'placeholder' => __('page.placeholder.partner_name')]) !!}
                                    </div>
                                </div>
                                <div class="info-couple">
                                    <span class="title-couple">{{ __('page.venue') }}</span>
                                    <div class="title-coupe-input">
                                        {!! Form::text('venue', null, ['id' => 'txtVenue', 'class' => 'input-couple', 'placeholder' => __('page.placeholder.venue')]) !!}
                                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw  spin-custom d-none"></i>
                                        {!! Form::hidden('district', null, ['id' => 'district']) !!}
                                    </div>
                                    <div class="search-venue">
                                        <div class="box-search">
                                            <ul class="list-venue">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="modal-footer row">
                    <div class="col-sm-6">
                        {!! Form::submit(__('page.action.save'), ['class' => 'btn save-schedule-info']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::submit(__('page.action.delete'), ['class' => 'btn delete-schedule-info']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
