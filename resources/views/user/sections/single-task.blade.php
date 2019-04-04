<div class="col-md-12">
    <h4 class="create-task-heading">{{ __('page.task.number') . $task->id }}</h4>
    <div id="single-task-detail">
        <div class="create-task-block">
            <div class="row col-md-12">
                {!! Form::hidden('id', $task->id, ['id' => 'task-id']) !!}
                {!! Form::text('name', $task->name, ['class' => 'form-control', 'id' => 'task-title', 'placeholder' => __('page.placeholder.title'), 'autocomplete' => 'off']) !!}
            </div>
            <div class="row col-md-12 padding-bottom-15">
                <div class="col-md-6 select-3">
                    {!! Form::select('time_frame', $timeFrames, $task->time_frame_id, ['class' => 'form-control', 'placeholder' => __('page.placeholder.time_frame'), 'id' => 'task-time-frame']) !!}
                </div>
                <div class="col-md-6 select-3">
                    {!! Form::select('update_category_id', $categories, $task->category_id, ['class' => 'form-control', 'placeholder' => __('page.placeholder.category'), 'id' => 'update-task-category', 'data-id' => $task->category_id]) !!}
                </div>
                <div class="col-md-6 select-3">
                    {!! Form::text(
                            'time_occurs',
                            $task->time_occurs,
                            [
                                'class' => 'form-control update-time-occurs',
                                'placeHolder' => __('page.todo_list.choose_time'),
                                'onfocus' => '(this.type="date")',
                                'onblur' => '(this.type="text")'
                            ]
                        )
                    !!}
                </div>
                <div class="col-md-6 select-3">
                    <select name="priority" class="form-control" id="task-priority">
                        <option value="" hidden>{{ __('page.placeholder.priority') }}</option>
                        <option value="1" @if($task->priority == 1) selected @endif>{{ __('page.priority.high') }}</option>
                        <option value="0" @if($task->priority == 0) selected @endif>{{ __('page.priority.low') }}</option>
                    </select>
                </div>
            </div>

                <div class="col-md-12 row pb15">
                    <div class="item-sld mt15">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="s-item-title">{{ __('page.todo_list.item_selected') }}:</span>
                            </div>
                            <div class="col-md-12">
                                <div class="item-selected">
                                    <div class="item-s update-info-item">
                                        <li>
                                            <b>{{ __('page.todo_list.item_name') }}</b>
                                            <span class="update-item-name">{{ $task->item ? $task->item->name : __('page.todo_list.no_item') }}</span>
                                        </li>
                                        <li>
                                            <b>{{ __('page.todo_list.item_user') }}</b>
                                            <span class="update-item-user">{{ $task->item ? $task->item->user->name : '' }}</span>
                                        </li>
                                        <li>
                                            <b>{{ __('page.todo_list.item_price') }}</b>
                                            <i class="update-item-price">{{ $task->item ? number_format($task->item->price) : '' }}</i>
                                            <span> {{ __('base.vnd') }}</span>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="row col-md-12">
                {!! Form::textarea('note', $task->note, ['class' => 'form-control', 'id' => 'task-note', 'placeholder' => __('page.placeholder.note')]) !!}
                {!! Form::submit(__('page.action.update'), ['class' => 'btn btn-pink', 'id' => 'update-task']) !!}
                {!! Form::submit(__('page.action.back'), ['class' => 'btn btn-pink', 'id' => 'back']) !!}

            </div>
        </div>
    </div>
</div>
