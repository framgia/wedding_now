<div class="to-do-list">
    <div class="panel-group faq-panel">
        <p class="pull-right">
            <button id="collapse_all" class="btn btn-pink">
                {{ __('page.todo_list.collapse_all') }}
                <span class="faq-btn faq-btn-plus hidden-xs">
                    <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                </span>
                <span class="faq-btn faq-btn-minus hidden-xs">
                    <i class="fa fa-angle-double-up" aria-hidden="true"></i>
                </span>
            </button>
        </p>
        <br><br>
        @foreach($tasks as $task)
            <div class="panel-group faq-panel task-single" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading_{{ $task->id }}">
                        <h4 class="panel-title to-do-list-heading">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{ $task->id }}" aria-expanded="true" aria-controls="collapse_{{ $task->id }}">
                                <b>
                                    @if ($task->status == config('define.done'))
                                        <i class="fa fa-check text-success"></i>
                                    @endif
                                    @if ($task->status == config('define.done'))
                                        <b class="text-success">
                                            <del>{{ $task->name }}</del>
                                        </b>
                                    @else
                                        <b>
                                            {{ $task->name }}
                                        </b>
                                    @endif
                                </b>
                                <span class="faq-btn faq-btn-plus hidden-xs">
                                    <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                                </span>
                                <span class="faq-btn faq-btn-minus hidden-xs">
                                    <i class="fa fa-angle-double-up" aria-hidden="true"></i>
                                </span>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse_{{ $task->id }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading_{{ $task->id }}">
                        <div class="panel-body to-do-list-dtl">
                            <div class="row">
                                <div class="col-sm-8">
                                    @if ($task->timeFrame)
                                        <div class="date">{{ $task->category->name }} - {{ $task->timeFrame->time_frame }}</div>
                                    @endif
                                </div>
                                <div class="col-sm-4">
                                    <div class="to-do-list-action-tabs">
                                        <a href="#" class="done-task" data-status="{{ $task->status }}" data-id="{{ $task->id }}">
                                            <i class="fa fa-check" aria-hidden="true" title="{{ __('base.done') }}"></i>
                                        </a>
                                        <a href="#" class="info-task" data-id="{{ $task->id }}">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="delete-task" data-id="{{ $task->id }}">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
