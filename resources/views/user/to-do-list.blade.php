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
                                    <div class="col-md-6 select-3">
                                        {!! Form::select('time_frame', $timeFrames, null, ['class' => 'form-control', 'placeholder' => __('page.placeholder.time_frame'), 'id' => 'task-time-frame']) !!}
                                    </div>
                                    <div class="col-md-6 select-3">
                                        {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => __('page.placeholder.category'), 'id' => 'task-category']) !!}
                                    </div>
                                    <div class="col-md-6 select-3">
                                        {!! Form::text(
                                                'time_occurs',
                                                null,
                                                [
                                                    'class' => 'form-control time-occurs',
                                                    'placeHolder' => __('page.todo_list.choose_time'),
                                                    'onfocus' => '(this.type="date")',
                                                    'onblur' => '(this.type="text")'
                                                ]
                                            )
                                        !!}
                                    </div>
                                    <div class="col-md-6 select-3">
                                        <select name="priority" class="form-control" id="task-priority">
                                            <option value="" hidden>{{ __('page.placeholder.priority') }}</option>
                                            <option value="1">{{ __('page.priority.high') }}</option>
                                            <option value="0">{{ __('page.priority.low') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-6 col-sm-offset-3 select-3">
                                        <div class="show-list-group-item">
                                            <div class="text-left">
                                                <button type="button" class="btn btn-info btn-show-product" data-toggle="modal" data-target="#product-modal">{{ __('page.todo_list.show_item') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 select-3">
                                    <div class="item-sl mt15">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span class="s-item-title">{{ __('page.todo_list.item_selected') }}:</span>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="item-selected">
                                                    <div class="item-s">
                                                        <li>
                                                            <b>{{ __('page.todo_list.item_name') }}</b>
                                                            <span class="item-s-name"></span>
                                                        </li>
                                                        <li>
                                                            <b>{{ __('page.todo_list.item_user') }}</b>
                                                            <span class="item-s-user"></span>
                                                        </li>
                                                        <li>
                                                            <b>{{ __('page.todo_list.item_price') }}</b>
                                                            <span class="item-s-price"></span>
                                                            <span> {{ __('base.vnd') }}</span>
                                                        </li>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                    <div class="modal-show-product"></div>
                    {{-- view by --}}
                    <div class="view-by"></div>
                    {{-- end view by --}}

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

{{-- status --}}
<input type="hidden" name="done" id="status_done" value="{{ config('define.done') }}">
<input type="hidden" name="done" id="status_to_do" value="{{ config('define.to_do') }}">
{{-- end status --}}
@endsection

@section('css')
    <style>
        .alert-custom {
            border: 1px solid gray;
            border-radius: 25px;
            display: inline-block;
            padding: 11px
        }

        .alert-custom a {
            color: black;
        }
    </style>
@endsection

@section('script')
<script type="text/javascript" defer="">
    jQuery(document).ready(function($) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        var checkCategory = null;
        var checkStatus = null;

        var statusDone = $('#status_done').val();
        var statusToDo = $('#status_to_do').val();

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
                    let status = $(this).attr('data-status');
                    let display_name = $(this).attr('data-name');
                    let type = $(this).attr('data-type');

                    let checkTagExists = $(`.view-by strong:contains("${display_name}")`);
                    let checkTypeExists = $(`.view-by .alert-custom a[data-type="${type}"]`);

                    if (status && status != undefined && status != '') {
                        checkStatus = status;
                    }

                    if (category_id && category_id != undefined && category_id != '') {
                        checkCategory = category_id;
                    }

                    if (checkTypeExists) {
                        checkTypeExists.parents('.alert-custom').remove();
                    }

                    if (!checkTagExists.length) {
                        $('.view-by').append(`
                            <div class="alert alert-dismissible alert-custom">
                                <a href="#" data-status="${statusDone}" data-type="${type}" data-id="${category_id}">
                                    <strong>${display_name}</strong>
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                            </div>
                        `);
                    }

                   loadToDoList(checkCategory, checkStatus);
                });
            })
            .fail(function() {
                toastr.error( Lang.get('page.message.fail') );
            })
        }

        $('body').on('click', '.done-task', function(event) {
            event.preventDefault()

            var id = $(this).data('id')

            $.ajax({
                url: route('client.update-status-task', id),
                type: 'PUT',
                data: {id: id},
            })
            .done(function() {
                $('.view-by').empty()
                $('#show-list-category').empty()
                $('#list_tasks').empty()

                loadToDoList()
            })
            .fail(function(message) {
                toastr.error( Lang.get('page.message.fail') )
            })

        })

        // remove tag filter
        $('body').on('click', '.alert-custom', function(event) {
            event.preventDefault();
            let category_id = $(this).children('a').attr('data-id');
            let status = $(this).children('a').attr('data-status');
            let type = $(this).children('a').attr('data-type');

            if (type == 'status') {
                checkStatus = null;
            } else if (type == 'category') {
                checkCategory = null;
            }

            loadToDoList(checkCategory, checkStatus);
            $(this).remove();
        });

        function loadToDoList(category_id, type = null) {
            $.ajax({
                async: false,
                url: route('client.get-to-do-list'),
                type: 'get',
                dataType: '',
                data: {
                    category_id: category_id,
                    status: type
                },
            })
            .done(function(res) {

                loadCategoryFilter();

                $('#list_tasks').html(res);

                $('.task-single').each(function(index, el) {

                    let element = $(this);

                    let user_item_id = element.find('.selectItem').attr('data-item_user_id');

                    let category_id = element.find('.selectCategory').val();

                    element.find('.selectItem').val(user_item_id);

                    element.find('.selectCategory').change(function(event) {

                        event.preventDefault();
                    });
                });

                $(document).on('click', '.info-task', function(event) {

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

                        el.find('#task-category').change(function(event) {

                            event.preventDefault();
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
                                    update_category_id: el.find('#update-task-category').val(),
                                    priority: el.find('#task-priority').val(),
                                    item_id: parseInt($('input[name="item_id"]:checked').val()),
                                    time_occurs: $('.update-time-occurs').val(),
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

                    return false;
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
                    category_id: parseInt($('#task-category').val()),
                    priority: $('#task-priority').val(),
                    note: $('#task-note').val(),
                    item_id: parseInt($('input[name="item_id"]:checked').val()),
                    time_occurs: $('.time-occurs').val(),
                },
            })
            .done(function(res) {

                loadToDoList();

                $('#create-task-form')[0].reset();
                $("input[name='item_id']:checked").prop('checked', false);
                $('.item-s-name').text('');
                $('.item-s-user').text('');
                $('.item-s-price').text('');
                $('.item-sl').addClass('d-none');
                $('.btn-show-product').addClass('d-none');

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

            $('.view-by').hide();

            $('#create-task-div').show();

            $('#create-task-form')[0].reset();
        });

        $('#cancel-create-task').on('click', function(event) {

            event.preventDefault();

            $('#create-btn').show();

            $('#show-list-category').show();

            $('.view-by').show();

            $('#create-task-div').hide();

            $('#create-task-form')[0].reset();
        });
    });
</script>
<script>
    jQuery(document).ready(function($) {
        $('.item-sl').addClass('d-none');
        $('.item-sld').addClass('d-none');
        $('.btn-show-product').addClass('d-none');

        $(document).on('change', '#task-category', function() {
            let idTask = $(this).val();
            getItem(idTask);
        });

        function getItem (idTask, addClass = false) {
            createTask();
            $.ajax({
                type: 'get',
                url: route('client.get-item'),
                data: { id: idTask },
                success: function (response) {
                    $('.modal-show-product').html(response);
                    $('#product-modal').modal('show');
                    if (addClass) {
                        updateTask();
                    }
                }
            });
        }

        function getItemSelected () {
            let selected = $("input[name='item_id']:checked");
            let obj = {
                itemName: selected.parent('.select-product').prev('.description').find('h1').text(),
                itemPrice: selected.parent('.select-product').prev('.description').find('.price').text(),
                itemUser: selected.parent('.select-product').prev('.description').find('.vendor').text(),
            };

            return obj;
        };

        function updateTask () {
            $('#select-item').removeClass('create-task');
            $('#select-item').addClass('update-task');
        }

        function createTask () {
            $('#select-item').removeClass('update-task');
            $('#select-item').addClass('create-task');
        }

        $(document).on('click', '.create-task', function () {
            $('.item-sl').removeClass('d-none');
            $('.btn-show-product').removeClass('d-none');

            let itemSelected = getItemSelected();

            $('.item-s-name').text(itemSelected.itemName);
            $('.item-s-user').text(itemSelected.itemUser);
            $('.item-s-price').text(itemSelected.itemPrice);
        })

        $(document).on('click', '#update-task-category', function () {
            let idTask = $(this).val();
            getItem(idTask, true);
        })

        $(document).on('click', '.update-task', function () {
            $('.item-sld').removeClass('d-none');
            $('.btn-show-product').removeClass('d-none');

            let itemSelected = getItemSelected();

            $('.update-item-name').text(itemSelected.itemName);
            $('.update-item-user').text(itemSelected.itemUser);
            $('.update-item-price').text(itemSelected.itemPrice);
        })

    });
</script>
@endsection
