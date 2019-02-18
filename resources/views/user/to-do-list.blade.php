@extends('layouts.main')

@section('title')
    {{ __('To Do List') }}
@endsection

@section('page-name')
{{ __('To Do List') }}
@endsection

@section('main-content')
    <!-- to do list -->
    <section id="to-do-list" class="to-do-list-main-block">
        <div class="container">
            <ul class="to-do-list-tabs general-nav-tabs tabs">
                <li><a href="#" class="btn btn-default"><span class="badge">{{ __('page.page.dashboard') }}</span></a></li>
                <li><a href="#" class="btn btn-default"><span class="badge">{{ __('page.page.profile') }}</span></a></li>
                <li><a href="#" class="active btn btn-default"><span class="badge">{{ __('page.page.to_do_list') }}</span></a></li>
                <li><a href="#" class="btn btn-default"><span class="badge">{{ __('page.page.my_budget') }}</span></a></li>
                <li><a href="#" class="btn btn-default"><span class="badge">{{ __('page.page.my_wishlist') }}</span></a></li>
                <li><a href="#" class="btn btn-default"><span class="badge">{{ __('page.page.real_wedding') }}</span></a></li>
            </ul>
            <div class="to-do-list-block">
                <h3 class="create-task-heading">{{ __('page.page.to_do_list') }}</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="create-btn padding-bottom-10">
                            {!! Form::submit('Create', ['id' => 'create-btn', 'class' => 'btn btn-info']) !!}
                        </div>
                        <div id="create-task-div" class="display-none">
                            <h5 class="create-task-heading">{{ __('page.task.new') }}</h5>
                            <form id="create-task-form" action="#">
                                <div class="create-task-block">
                                    <div class="row col-md-12">
                                        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'task-title', 'placeholder' => __('page.placeholder.title'), 'autocomplete' => 'off']) !!}
                                    </div>
                                    <div class="row col-md-12 padding-bottom-15">
                                        <div class="col-md-4 select-3">
                                            {!! Form::select('time_frame', $timeFrames, null, ['class' => 'form-control', 'placeholder' => __('page.placeholder.time_frame'), 'id' => 'task-time-frame']) !!}
                                        </div>
                                        <div class="col-md-4 select-3">
                                            {!! Form::select('time_frame', $categories, null, ['class' => 'form-control', 'placeholder' => __('page.placeholder.category'), 'id' => 'task-category']) !!}
                                        </div>
                                        <div class="col-md-4 select-3">
                                            <select name="priority" class="form-control" id="task-priority">
                                                <option value="" hidden>{{ __('page.placeholder.priority') }}</option>
                                                <option value="1">{{ __('page.priority.high') }}</option>
                                                <option value="0">{{ __('page.priority.low') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        {!! Form::textarea('note', null, ['class' => 'form-control', 'id' => 'task-note', 'placeholder' => __('page.placeholder.note')]) !!}
                                        {!! Form::submit(__('page.action.save'), ['class' => 'btn btn-pink', 'id' => 'create-task']) !!}
                                        {!! Form::submit(__('page.action.cancel'), ['class' => 'btn btn-pink', 'id' => 'cancel-create-task']) !!}
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="show-list-category">
                            <h4 class="title-category-list">{{ __('page.filter.by_category') }}</h4>
                            <div class="col-md-12 row category-item">
                                <a href="">
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
                                <a href="">
                                    <div class="col-md-9">
                                        <p class="text-title text-name">{{ $category->name }}</p>
                                    </div>
                                    <div class="col-md-2">
                                        <p class="text-title">{{ $category->tasks_count }}</p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6" id="list_tasks">
                        {!! Form::hidden('schedule_choose', Session::get('schedule_id'), ['id' => 'schudule-choose']) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript" defer="">
        jQuery(document).ready(function($) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            $('#create-btn').click(function(event) {

                event.preventDefault();

                $(this).hide();

                $('#show-list-category').hide();

                $('#create-task-div').show();

                $('#create-task-form')[0].reset();
            });

            $('#cancel-create-task').click(function(event) {

                event.preventDefault();

                $('#create-btn').show();

                $('#show-list-category').show();

                $('#create-task-div').hide();

                $('#create-task-form')[0].reset();
            });

            function loadToDoList() {
                $.ajax({
                    async: false,
                    url: route('client.get-to-do-list'),
                    type: 'get',
                    dataType: '',
                    data: {},
                })
                .done(function(res) {

                    $('#list_tasks').html(res);

                    $('.task-single').each(function(index, el) {

                        let element = $(this);

                        let user_item_id = $(this).find('.selectItem').attr('data-item_user_id');

                        let category_id = $(this).find('.selectCategory').val();

                        $(this).find('.selectItem').html(getItems(category_id));

                        $(this).find('.selectItem').val(user_item_id);

                        $(this).find('.selectCategory').change(function(event) {

                            event.preventDefault();

                            let data_item = getItems($(this).val());

                            element.find('.selectItem').html(data_item);
                        });
                    });

                    $('.task-single').hover(function() {
                        $(this).find('.delete-task').show();
                    }, function() {
                        $(this).find('.delete-task').hide();
                    });

                    $('.task-single-a .info-task').click(function(event) {

                        event.preventDefault();

                        let id = $(this).attr('data-id');

                        $.ajax({
                            async: false,
                            url: route('client.get-single-task', { id: id }),
                            type: 'GET',
                            dataType: '',
                            data: {},
                        })
                        .done(function(res) {

                            $('#list_tasks').html(res);

                            $('#back').click(function(event) {

                                event.preventDefault();

                                loadToDoList();
                            });

                            let el = $('#single-task-detail');

                            let category_id = el.find('#task-category').attr('data-id');

                            let item_id = el.find('#task-item').attr('data-item-id');

                            el.find('#task-item').html(getItems(category_id, item_id));

                            el.find('#task-category').change(function(event) {

                                event.preventDefault();

                                el.find('#task-item').html(getItems($(this).val(), null));
                            });

                            $('#update-task').click(function(event) {

                                event.preventDefault();

                                $.ajax({
                                    async: false,
                                    url: route('client.update-task'),
                                    type: 'PUT',
                                    data: {
                                        id: el.find('#task-id').val(),
                                        name: el.find('#task-title').val(),
                                        time_frame_id: el.find('#task-time-frame').val(),
                                        category_id: el.find('#task-category').val(),
                                        priority: el.find('#task-priority').val(),
                                        item: el.find('#task-item').val(),
                                        note: el.find('#task-note').val(),
                                    },
                                })
                                .done(function(res) {
                                    loadToDoList();
                                    toastr.success(res.message);
                                })
                                .fail(function(xhr, status, error) {

                                    var message = JSON.parse(xhr.responseText);

                                    var errors = Object.entries(message.errors);

                                    errors.forEach(function(value, index) {
                                        toastr.error(value[1][0], 'Error!');
                                    });
                                })
                            });
                        })
                    });
                })
                .fail(function(res) {
                    console.log(res);
                })
            }

            function getItems(id_category, id_item) {

                let data_items = '';

                $.ajax({
                    async: false,
                    url: route('client.get-item-by-category'),
                    type: 'get',
                    dataType: '',
                    data: { id: id_category },
                })
                .done(function(res) {

                    let html = '<option hidden value="">' + Lang.get('admin.choose_item') + '</option>';

                    res.forEach(function(element, index) {

                        element.users.forEach(function(element1, index) {

                            let selected = '';

                            if (id_item == element1.pivot.id) {

                                selected = 'selected';
                            }

                            html += '<option value="' + element1.pivot.id + '" ' + selected + '>' + element.name + ' - ' + element1.name + '</option>';
                        })
                    })

                    data_items = html;
                })

                return data_items;
            }

            loadToDoList();

            $('#create-task').click(function(event) {

                event.preventDefault();

                $.ajax({
                    async: false,
                    url: route('client.create-task'),
                    type: 'POST',
                    dataType: '',
                    data: {
                        name: $('#task-title').val(),
                        time_frame_id: $('#task-time-frame').val(),
                        category_id: $('#task-category').val(),
                        priority: $('#task-priority').val(),
                        note: $('#task-note').val(),
                    },
                })
                .done(function(res) {

                    loadToDoList();

                    $('#create-task-form')[0].reset();
                })
                .fail(function(xhr, status, error) {

                    var message = JSON.parse(xhr.responseText);

                    var errors = Object.entries(message.errors);

                    errors.forEach(function(value, index) {
                        toastr.error(value[1][0], 'Error!');
                    });
                })
            });

            $('.delete-task').click(function(event) {

                event.preventDefault();

                let el = $(this);

                let id = $(this).attr('data-id');

                $.ajax({
                    async: false,
                    url: route('client.delete-task', { id: id }),
                    type: 'delete',
                    dataType: '',
                    data: {},
                })
                .done(function(res) {
                    el.closest('.task-single').remove();
                    toastr.success(res.message);
                })
                .fail(function(res) {
                    console.log(res);
                })
            });
        });

    </script>
@endsection
