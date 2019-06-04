@extends('layouts.main')

@section('title')
    {{ __('page.title.planning_suggestions') }}
@endsection

@section('page-name')
    {{ __('page.page.planning_suggestions') }}
@endsection

@section('main-content')
    <section class="ptb30 suggest">
        {!! Form::open(['method' => 'POST', 'route' => 'schedule.store', 'id' => 'schedule']) !!}
            <div class="container">
                <div class="row">
                    <div class="s-title text-center">
                        <span class="schedule-name">{{ __('page.suggest.schedule_name') }}:</span>
                        <div class="form-name">
                            {!! Form::text('name', __('page.suggest.schedule_of') . Auth::user()->name, ['class' => 's-name', 'title' => __('page.suggest.edit_title')]) !!}
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </div>
                        <div class="marry-day">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3 text-center">
                                    <span>{{ __('page.suggest.marry_day') }}:</span>
                                    {!! Form::date('marriage_day', $time, ['class' => 'marryage_day']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="side-bar">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    <button type="button" class="btn-new" data-toggle="modal" data-target="#newCate">{{ __('page.suggest.new_category') }}</button>
                                </li>
                                @if ($scheduleWedding)
                                    @foreach ($scheduleWedding->tasks as $key => $task)
                                        <li class="list-group-item">
                                            <a href="#" data-percent="{{ $task->percent }}" data-id="{{ $task->id }}" class="list-category category{{ $key }}">
                                                <span class="name">{{ $task->name }}</span>
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                <span class="currency"></span>
                                                {!! Form::hidden('price[]', null, ['class' => 'price']) !!}
                                                {!! Form::hidden('task_note[]', null, ['class' => 'task_note']) !!}
                                            </a>
                                            {!! Form::hidden('task_name[]', $task->name) !!}
                                            {!! Form::hidden('percent[]', $task->percent) !!}
                                            {!! Form::hidden('category[]', $task->category_id) !!}
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        @include('user.sections.section_planning_suggest')
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        <!-- Modal -->
        <div class="modal fade login-model" id="newCate" role="dialog">
            <div class="modal-dialog" role="document">
                {!! Form::open([]) !!}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h5 class="modal-title text-center">{{ __('page.suggest.new_category') }}</h5>
                        </div>
                        <div class="modal-body login-model-body text-center">
                            <div class="form-group">
                                {!! Form::text('new_category', null, ['class' => 'form-control new-cate', 'placeholder' => __('page.placeholder.category')]) !!}
                            </div>
                            {!! Form::button(__('page.action.create'), ['class' => 'btn btn-default create-cate']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset(config('asset.users.js') . 'suggest.js') }}"></script>
@endsection
