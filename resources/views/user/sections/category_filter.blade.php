{{-- status --}}
<div class="col-md-12 row">
    <h4><b>{{ __('base.status') }}</b></h4>
    <div class="col-md-7">
        <input
            type="radio"
            id="radio_done"
            name="check_category"
            class="category-filter"
            data-status="{{ config('define.done') }}"
            data-name="{{ __('base.done') }}"
            data-type="status"/>
        <label for="radio_done">
            &emsp;<span class="text-success">{{ __('base.done') }}</span>
        </label>
    </div>
    <div class="col-md-5">
        <p><b>{{ $doneTasks->count() }}</b></p>
    </div>
    <div class="col-md-7">
        <input
            type="radio"
            id="radio_todo"
            name="check_category"
            class="category-filter"
            data-status="{{ config('define.to_do') }}"
            data-name="{{ __('base.to_do') }}"
            data-type="status"/>
        <label for="radio_todo">
            &emsp;{{ __('base.to_do') }}
        </label>
    </div>
    <div class="col-md-5">
        <p>
            <b>{{ count($totalTasks) - $doneTasks->count() }}</b>
        </p>
    </div>
</div>
{{-- end status --}}

{{-- category --}}
<div class="col-md-12 row category-item">
    <h4><b>{{ __('page.filter.by_category') }}</b></h4>
    <div class="col-md-7">
        <input
            type="radio"
            id="radio_all"
            name="check_category"
            class="category-filter"
            data-name="{{ __('page.filter.all') }}"
            data-type="category"/>
        <label for="radio_all">
            &emsp;{{ __('page.filter.all') }}
        </label>
    </div>
    <div class="col-md-5">
        <p><b>{{ count($totalTasks) }}</b></p>
    </div>
</div>
@foreach($categoriesWithCountTasks as $category)
    <div class="col-md-12 row category-item">
        <div class="col-md-7">
            <input
                type="radio"
                id="radio_{{ $category->id }}"
                name="check_category"
                class="category-filter"
                data-id="{{ $category->id }}"
                data-name="{{ $category->name }}"
                data-type="category"/>
            <label for="radio_{{ $category->id }}">
                &emsp;{{ $category->name }}
            </label>
        </div>
        <div class="col-md-5">
            <p>
                {{ $category->tasks_count }}
            </p>
        </div>
    </div>
@endforeach
{{-- end category --}}
