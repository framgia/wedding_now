<div class="col-md-12">
    <h4 class="create-task-heading">{{ __('page.task.number') . $task->id }}</h4>
    <div id="single-task-detail">
        <div class="create-task-block">
            <div class="row col-md-12">
                {!! Form::hidden('id', $task->id, ['id' => 'task-id']) !!}
                {!! Form::text('name', $task->name, ['class' => 'form-control', 'id' => 'task-title', 'placeholder' => __('page.placeholder.title'), 'autocomplete' => 'off']) !!}
            </div>
            <div class="row col-md-12 padding-bottom-15">
                <div class="col-md-4 select-3">
                    {!! Form::select('time_frame', $timeFrames, $task->time_frame_id, ['class' => 'form-control', 'placeholder' => __('page.placeholder.time_frame'), 'id' => 'task-time-frame']) !!}
                </div>
                <div class="col-md-4 select-3">
                    {!! Form::select('category', $categories, $task->category_id, ['class' => 'form-control', 'placeholder' => __('page.placeholder.category'), 'id' => 'task-category', 'data-id' => $task->category_id]) !!}
                </div>
                <div class="col-md-4 select-3">
                    <select name="priority" class="form-control" id="task-priority">
                        <option value="" hidden>{{ __('page.placeholder.priority') }}</option>
                        <option value="1" @if($task->priority == 1) selected @endif>{{ __('page.priority.high') }}</option>
                        <option value="0" @if($task->priority == 0) selected @endif>{{ __('page.priority.low') }}</option>
                    </select>
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
