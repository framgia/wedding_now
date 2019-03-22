{{-- status --}}
<div class="col-md-12 row">
    <h4><b>{{ __('base.view') . ' ' . __('base.by') }}</b></h4>
    <h4><b>{{ __('base.status') }}</b></h4>
    <a href="#" class="category-filter" data-status="{{ config('define.done') }}" data-name="{{ __('base.done') }}" data-type="status">
        <div class="col-md-9">
            <p>
                <i class="fa fa-circle text-success" aria-hidden="true"></i>
                &emsp;&emsp;<b>{{ __('base.done') }}</b>
            </p>
        </div>
        <div class="col-md-2">
            <p><b>{{ $doneTasks->count() }}</b></p>
        </div>
    </a>
    <a href="#" class="category-filter" data-status="{{ config('define.to_do') }}" data-name="{{ __('base.to_do') }}" data-type="status">
        <div class="col-md-9">
            <p>
                <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                &emsp;&emsp;<b>{{ __('base.to_do') }}</b>
            </p>
        </div>
        <div class="col-md-2">
            <p>
                <b>{{ count($totalTasks) - $doneTasks->count() }}</b>
            </p>
        </div>
    </a>
</div>
{{-- end status --}}

{{-- category --}}
<div class="col-md-12 row category-item">
    <h4><b>{{ __('page.filter.by_category') }}</b></h4>
    <a href="" class="category-filter" data-id="" data-name="{{ __('page.filter.all') }}" data-type="category">
        <div class="col-md-9">
            <p>
                <i class="fa fa-circle text-muted" aria-hidden="true"></i>
                &emsp;&emsp;<b>{{ __('page.filter.all') }}</b>
            </p>
        </div>
        <div class="col-md-2">
            <p><b>{{ count($totalTasks) }}</b></p>
        </div>
    </a>
</div>
@foreach($categoriesWithCountTasks as $category)
    <div class="col-md-12 row category-item">
        <a href="#" class="category-filter" data-id="{{ $category->id }}" data-name="{{ $category->name }}" data-type="category">
            <div class="col-md-9">
                <p>
                    <i class="fa fa-circle text-muted" aria-hidden="true"></i>
                    &emsp;&emsp;{{ $category->name }}
                </p>
            </div>
            <div class="col-md-2">
                <p>
                    {{ $category->tasks_count }}
                </p>
            </div>
        </a>
    </div>
@endforeach
{{-- end category --}}
