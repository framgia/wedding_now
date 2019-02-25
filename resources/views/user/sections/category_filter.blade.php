<h4 class="title-category-list">{{ __('page.filter.by_category') }}</h4>
<div class="col-md-12 row category-item">
    <a href="" class="category-filter" data-id="">
        <div class="col-md-9">
            <p class="text-title text-name">{{ __('page.filter.all') }}</p>
        </div>
        <div class="col-md-2">
            <p class="text-title">{{ count($totalTasks) }}</p>
        </div>
    </a>
</div>
@foreach($categoriesWithCountTasks as $category)
    <div class="col-md-12 row category-item">
        <a href="das" class="category-filter" data-id="{{ $category->id }}">
            <div class="col-md-9">
                <p class="text-title text-name">{{ $category->name }}</p>
            </div>
            <div class="col-md-2">
                <p class="text-title">{{ $category->tasks_count }}</p>
            </div>
        </a>
    </div>
@endforeach
