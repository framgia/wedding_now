{{-- status --}}
<div class="col-md-12 row">
    <h4><b>{{ __('base.status') }}</b></h4>
    <a href="">
        <div class="col-md-9">
            <p>
                <i class="fa fa-circle text-success" aria-hidden="true"></i>
                &emsp;&emsp;<b>{{ __('base.done') }}</b>
            </p>
        </div>
        <div class="col-md-2">
            <p><b>{{ $doneTasks }}</b></p>
        </div>
    </a>
    <a href="">
        <div class="col-md-9">
            <p>
                <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                &emsp;&emsp;<b>{{ __('base.to_do') }}</b>
            </p>
        </div>
        <div class="col-md-2">
            <p>
                <b>{{ count($totalTasks) - $doneTasks }}</b>
            </p>
        </div>
    </a>
</div>
{{-- end status --}}

{{-- category --}}
<div class="col-md-12 row category-item">
    <h4><b>{{ __('page.filter.by_category') }}</b></h4>
    <a href="" class="category-filter" data-id="">
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
        <a href="das" class="category-filter" data-id="{{ $category->id }}">
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
