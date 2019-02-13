<h4 class="create-task-heading">{{ __('page.task.list') }}</h4>
<div class="to-do-list">
    <div class="panel-group faq-panel">
        @foreach($tasks as $task)
            <div class="panel panel-default task-single">
                <a href="" class="task-single-a">
                    <div class="row">
                        <div class="col-md-10 info-task" data-id="{{ $task->id }}">
                            <h4 class="panel-title to-do-list-heading h4-padding-10">
                                {{ $task->name . ' (' . $task->timeFrame->time_frame . ')' }}
                            </h4>
                            <p class="padding-left-10">{{ $task->category->name }}</p>
                        </div>
                        <div class="col-md-2">
                            <span class="delete-task" data-id="{{ $task->id }}">
                                <i class="fa fa-trash i-float-right" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
