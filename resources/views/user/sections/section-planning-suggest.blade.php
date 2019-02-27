<div class="s-content">
    <ul class="list-group">
            <li class="list-group-item">
                <div class="r-content text-center">
                    <div class="r-icon">
                        <i class="fa fa-usd" aria-hidden="true"></i>
                        <span class="close-item"><i class="fa fa-times" aria-hidden="true"></i></span>
                    </div>
                    <span class="c-name">{{ __('page.suggest.budget') }}</span>
                    <div class="c-detail">
                        <span>
                            {{ __('page.suggest.estimated') }}:
                            {!! Form::number('budget', $scheduleWedding->budget, ['class' => 'input-price budget', 'id' => 'budget', 'min' => 50000000, 'step' => 100000, 'novalidate']) !!}
                            {!! Form::number('item', null, ['class' => 'input-price item', 'id' => 'item', 'step' => 100000]) !!}
                            <span class="reset-item"><i class="fa fa-trash" aria-hidden="true"></i> Remove</span>
                        </span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="note">
                    <span>{{ __('page.suggest.note') }}:</span>
                    <span class="text-note"></span>
                    <div class="mt-2">
                        {!! Form::textarea('note', null, ['class' => 'form-control s-note', 'rows' => '8']) !!}
                        {!! Form::textarea('note_task', null, ['class' => 'form-control t-note', 'rows' => '8']) !!}
                    </div>
                    <div class="mt-2">
                        {!! Form::submit(__('page.suggest.save'), ['class' => 'btn btn-info', 'id' => 'save']) !!}
                    </div>
                </div>
            </li>
    </ul>
</div>
