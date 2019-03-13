@extends('layouts.main')

@section('title', __('page.page.to_do_list'))

@section('page-name', __('page.page.to_do_list'))

@section('main-content')
<section id="to-do-list" class="to-do-list-main-block">
    <div class="container">
        @include('user.sections.to_do_list_tab')
        <div class="to-do-list-block">
            <h3><b>{{ __('page.page.checklist') }}</b></h3>
            <h3 class="create-task-heading">
                {!! Form::submit(__('base.choose') . ' ' . __('base.schedule'), ['id' => 'btn-choose-schedule', 'class' => 'btn btn-pink', 'data-toggle' => 'modal', 'data-target' => '#myModal']) !!}
                {!! Form::submit(__('base.create') . ' ' . __('base.task'), ['id' => 'create-btn', 'class' => 'btn btn-pink']) !!}
            </h3>
            <h4><b>{{ __('base.view') . ' ' . __('base.by') }}</b></h4>
            <div class="row">
                <div class="col-md-5">
                    <div class="create-btn padding-bottom-10">
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
                    <div id="show-list-category"></div>
                </div>
                <div class="col-md-7" id="list_tasks">

                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content model-schedule-info">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">{{ __('page.your_list_schedule') }}</h4>
            </div>
            <div class="modal-body row">
                <div class="col-lg-12">
                    @foreach ($scheduleWeddings as $scheduleWedding)
                        <div class="col-lg-6 padding-bottom-15">
                            <h5 class="padding-top-10">{{ $scheduleWedding->name }}</h5>
                            <p>{{ __('page.marrige_day') . $scheduleWedding->marriage_day }}</p>
                            <button class="btn btn-info btn-choose-schedule"
                                    data-id="{{ $scheduleWedding->id }}">{{ __('page.choose') }}</button>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer row">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('base.close') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" defer="">
    jQuery(document).ready(function($) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        function loadCategoryFilter()
        {
            $.ajax({
                url: route('client.get-filter-category'),
                type: 'GET',
                dataType: '',
                data: {},
            })
            .done(function(res) {
                $('#show-list-category').html(res);

                $('.category-filter').click(function(event) {
                   event.preventDefault();
                   let category_id = $(this).attr('data-id');
                   loadToDoList(category_id);
                });
            })
            .fail(function() {
                toastr.error( Lang.get('page.message.fail') );
            })
        }

        function loadToDoList(category_id) {
            $.ajax({
                async: false,
                url: route('client.get-to-do-list'),
                type: 'get',
                dataType: '',
                data: {category_id: category_id},
            })
            .done(function(res) {

                loadCategoryFilter();

                $('#list_tasks').html(res);

                $('.task-single').each(function(index, el) {

                    let element = $(this);

                    let user_item_id = element.find('.selectItem').attr('data-item_user_id');

                    let category_id = element.find('.selectCategory').val();

                    element.find('.selectItem').html(getItems(category_id));

                    element.find('.selectItem').val(user_item_id);

                    element.find('.selectCategory').change(function(event) {

                        event.preventDefault();

                        let data_item = getItems($(this).val());

                        element.find('.selectItem').html(data_item);
                    });
                });

                $('.task-single').on('click', '.info-task', function(event) {

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

                $('.delete-task').click(function(event) {

                    event.preventDefault();

                    let el = $(this);

                    let id = el.attr('data-id');

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
                        loadCategoryFilter();
                    })
                    .fail(function(res) {
                        toastr.error( Lang.get('page.message.fail') );
                    })
                });
            })
            .fail(function(res) {
                toastr.error( Lang.get('page.message.fail') );
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

                let html = '<option hidden value="">' + Lang.get('base.choose') + ' ' + Lang.get('base.item') + '</option>';

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
            .fail(function(res) {
                toastr.error( Lang.get('page.message.fail') );
            })

            return data_items;
        }

        loadToDoList();

        $('#create-task').on('click', function(event) {

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

        $('.btn-choose-schedule').on('click', function(event) {

            event.preventDefault();

            let id = $(this).attr('data-id');

            $.ajax({
                url: route('client.get-to-do-list'),
                type: 'get',
                dataType: '',
                data: { id_choose: id },
            })
            .done(function (res) {
                location.reload();
            })
            .fail(function () {
                toastr.error( Lang.get('page.message.fail') );
            })
        });

        $('#create-btn').on('click', function(event) {

            event.preventDefault();

            $(this).hide();

            $('#show-list-category').hide();

            $('#create-task-div').show();

            $('#create-task-form')[0].reset();
        });

        $('#cancel-create-task').on('click', function(event) {

            event.preventDefault();

            $('#create-btn').show();

            $('#show-list-category').show();

            $('#create-task-div').hide();

            $('#create-task-form')[0].reset();
        });
    });
</script>
@endsection
