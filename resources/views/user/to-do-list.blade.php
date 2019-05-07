@extends('layouts.main')

@section('title', __('page.page.to_do_list'))

@section('page-name', __('page.page.to_do_list'))

@section('main-content')
<section id="to-do-list" class="to-do-list-main-block">
    <div class="container">
        @include('user.sections.to_do_list_tab')
        <div class="wrapper">
            <nav class="my-tabs">
                <div class="selector"></div>
                <a class="active" data-toggle="tab" href="#to-do">
                    {{ __('page.page.to_do_list') }}
                </a>
                <a id="get-timeline" data-toggle="tab" href="#timeline">
                    {{ __('page.title.timeline') }}
                </a>
            </nav>
        </div>
        <br>
        <div class="tab-content">
            <div id="to-do" class="to-do-list-block tab-pane fade in active">
                {{-- <h3><b>{{ __('page.page.checklist') }}</b></h3> --}}
                <h3 class="create-task-heading">
                    {!! Form::submit(__('page.todo_list.reset_default'), ['id' => 'btn-choose-schedule', 'class' => 'btn btn-pink', 'data-toggle' => 'modal', 'data-target' => '#myModal']) !!}
                    {!! Form::submit(__('base.create') . ' ' . __('base.task'), ['id' => 'create-btn', 'class' => 'btn btn-pink pull-right']) !!}
                </h3>
                <div class="row">
                    <div class="col-md-5">
                        <div class="create-btn padding-bottom-10">
                        </div>
                        <div class="modal-show-product"></div>

                        <div id="show-list-category">
                            <div class="row">
                                <h3>{{ __('base.view') }} {{ __('base.by') }}</h3>
                                <div class="col-md-12">
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
                                <div class="col-md-12 category-item">
                                    <h4><b>{{ __('page.filter.by_category') }}</b></h4>
                                    <div class="col-md-7">
                                        <label for="radio_all">
                                            <input
                                                type="checkbox"
                                                id="radio_all"
                                                name="check_category"
                                                class="category-filter"
                                                data-name="{{ __('page.filter.all') }}"
                                                data-type="category"/>
                                            <span class="label-text">&emsp;{{ __('page.filter.all') }}</span>
                                        </label>
                                    </div>
                                    <div class="col-md-5">
                                        <p><b>{{ count($totalTasks) }}</b></p>
                                    </div>
                                </div>
                                @foreach($categoriesWithCountTasks as $category)
                                    <div class="col-md-12 category-item">
                                        <div class="col-md-7">
                                            <label for="radio_{{ $category->id }}">
                                                <input
                                                    type="checkbox"
                                                    id="radio_{{ $category->id }}"
                                                    name="check_category"
                                                    class="category-filter cate"
                                                    data-id="{{ $category->id }}"
                                                    data-name="{{ $category->name }}"
                                                    data-type="category"/>
                                                    <span class="label-text">&emsp;{{ $category->name }}</span>
                                            </label>
                                        </div>
                                        <div class="col-md-5">
                                            <p>
                                                {{ $category->tasks_count }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div id="create-task-div" class="display-none">
                            {{-- create task --}}
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
                                            {!! Form::text('time_occurs', null, ['class' => 'form-control time-occurs', 'placeHolder' => __('page.todo_list.choose_time'), 'onfocus' => '(this.type="date")', 'onblur' => '(this.type="text")']) !!}
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
                            {{-- endcreate task --}}
                        </div>
                        <div id="list_tasks"></div>
                    </div>
                </div>
            </div>

            <div id="timeline" class="tab-pane fade">
                <div class="container-flud">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-right d-flex">
                                <div class="form-group">
                                    <label class="form-label">{{ __('page.timeline.order_by_date') }}</label>
                                    <select class="form-control order-by-date">
                                        <option value="flow">{{ __('page.timeline.flow') }}</option>
                                        <option value="unflow">{{ __('page.timeline.unflow') }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ __('page.timeline.order_by_priority') }}</label>
                                    <select class="form-control order-by-priority">
                                        <option value="" hidden>{{ __('page.placeholder.priority') }}</option>
                                        <option value="high">{{ __('page.priority.high') }}</option>
                                        <option value="low">{{ __('page.priority.low') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="time-line-view"></div>
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
                            <div class="s-single">
                                <h5 class="padding-top-10">{{ $scheduleWedding->name }}</h5>
                                <p>{{ __('base.created_at') . ': ' . $scheduleWedding->created_at }}</p>
                                <div class="s-info o-auto">
                                    <span class="pull-left">{{ __('base.task') }}: {{ $scheduleWedding->tasks_count }}</span>
                                    <span class="pull-right">{{ __('base.budget')}}: {{ number_format($scheduleWedding->budget) }}</span>
                                </div>
                                <button
                                    class="btn btn-purple btn-choose-schedule"
                                    data-id="{{ $scheduleWedding->id }}">
                                    {{ __('page.choose') }}
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer row">
                <button type="button" class="btn btn-pink" data-dismiss="modal">{{ __('base.close') }}</button>
            </div>
        </div>
    </div>
</div>

{{-- status --}}
<input type="hidden" name="done" id="status_done" value="{{ config('define.done') }}">
<input type="hidden" name="done" id="status_to_do" value="{{ config('define.to_do') }}">
{{-- end status --}}
@endsection

@section('script')
<script type="text/javascript" defer>
    jQuery(document).ready(function($) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        var tabs = $('.my-tabs');
        var selector = $('.my-tabs').find('a').length;
        //var selector = $(".tabs").find(".selector");
        var activeItem = tabs.find('.active');
        var activeWidth = activeItem.innerWidth();

        $('.selector').css({
            'left': activeItem.position.left + 'px',
            'width': activeWidth + 'px'
        });

        $('.my-tabs').on('click', 'a',function(e){
            e.preventDefault();

            $('.my-tabs a').removeClass('active');
            $(this).addClass('active');

            var activeWidth = $(this).innerWidth();
            var itemPos = $(this).position();

            $('.selector').css({
                'left':itemPos.left + 'px',
                'width': activeWidth + 'px'
            });
        });

        $('body').on('click', '#get-timeline', function(event) {
            $.ajax({
                url: route('client.my-timeline'),
                type: 'GET',
            })
            .done(function(data) {
                $('#time-line-view').html(data);
            })
            .fail(function() {
                toastr.error( Lang.get('page.message.fail') );
            });
        });

        var checkCategory = null;
        var checkStatus = null;

        var statusDone = $('#status_done').val();
        var statusToDo = $('#status_to_do').val();
        var arrCategory = [];

        $('#radio_all').click(function() {
            $('.category-filter').prop('checked', false);
            $(this).prop('checked', true);
            arrCategory = [];
        })

        function loadCategoryFilter()
        {
            $('.category-filter').click(function(event) {
                $('.cate').click(function() {
                    $('#radio_all').prop('checked', false);
                });

                let checked = $(this).prop('checked');

                let category_id = parseInt($(this).attr('data-id'));
                if (!arrCategory.includes(category_id) && category_id && checked) {
                    arrCategory.push(parseInt(category_id));
                } else if (arrCategory.includes(category_id) && category_id && !checked) {
                    arrCategory.splice($.inArray(category_id, arrCategory), 1);
                }

                let status = $(this).attr('data-status');
                let display_name = $(this).attr('data-name');
                let type = $(this).attr('data-type');


                let checkTagExists = $(`.view-by strong:contains("${display_name}")`);
                let checkTypeExists = $(`.view-by .alert-custom a[data-type="${type}"]`);

                var conditionStatus = (status && status != undefined && status != '');
                var conditionCategory = (arrCategory && arrCategory != undefined && arrCategory != '');

                if (!conditionStatus && !conditionCategory) {
                    checkCategory = null;
                } else {
                    checkStatus = conditionStatus ? status : checkStatus;
                    checkCategory = conditionCategory ? arrCategory : checkCategory;
                }

                if (!checkTagExists.length) {
                    if (checkTypeExists) {
                        checkTypeExists.parents('.alert-custom').remove();
                    }
                }

                loadToDoList(checkCategory, checkStatus);
            });
        }

        loadCategoryFilter();

        $('body').on('click', '.done-task', function(event) {
            event.preventDefault()

            var id = $(this).data('id')

            $.ajax({
                url: route('client.update-status-task', id),
                type: 'PUT',
                data: {id: id},
            })
            .done(function() {

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

            $(this).remove();
            loadToDoList(checkCategory, checkStatus);
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

                        cancelCreateTask();

                        loadCategoryFilter();

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

        $('body').on('click', '#collapse_all', function(event) {
            event.preventDefault();
            $('.panel-collapse').collapse('toggle');
        });

        $('body').on('click', '#create-task', function(event) {
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
            createTask();
            loadToDoList();
        });

        function createTask() {
            $('#list_tasks').hide();
            $('#show-list-category').show();
            $('#single-task-detail').hide();

            $('#create-task-div').show();

            $('#create-task-form')[0].reset();
        }

        $('#cancel-create-task').on('click', function(event) {

            event.preventDefault();
            cancelCreateTask();
        });

        function cancelCreateTask() {
            $('#list_tasks').show();

            $('#show-list-category').show();

            $('#create-task-div').hide();

            $('#create-task-form')[0].reset();
        }
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
        });

        $('body').on('change', '.order-by-date', function(event) {

            event.preventDefault();

            let orderByDate = $(this).val();

            $.ajax({
                url: route('client.my-timeline'),
                data: {
                    'orderByDate': orderByDate,
                },
                type: 'GET',
            })
            .done(function(data) {
                $('#time-line-view').hide().html(data).fadeIn('slow');
            })
            .fail(function() {
                toastr.error( Lang.get('page.message.fail') );
            });
        });

        $('body').on('change', '.order-by-priority', function(event) {

            event.preventDefault();

            let orderByPriority = $(this).val();

            $.ajax({
                url: route('client.my-timeline'),
                type: 'GET',
                data: {
                    'orderByPriority': orderByPriority,
                },
            })
            .done(function(data) {
                $('#time-line-view').hide().html(data).fadeIn('slow');

            })
            .fail(function() {
                toastr.error( Lang.get('page.message.fail') );
            });
        });

        $('body').on('click', '.edit-link', function(event) {

            event.preventDefault();

            let edit_box_element = $(this).closest('.product-addto-links-text').find('.edit-note');

            let text_element = $(this).closest('.more').find('.note');

            let note = text_element.html();

            edit_box_element.find('.note-value').val(note);

            text_element.toggleClass('d-none');

            edit_box_element.toggleClass('d-none');
        });

        $('body').on('click', '.save-note', function(event) {

            event.preventDefault();

            let edit_box_element = $(this).closest('.product-addto-links-text').find('.edit-note');

            let text_element = $(this).closest('.product-addto-links-text').find('.note');

            text_element.toggleClass('d-none');
            
            edit_box_element.toggleClass('d-none');

            let note = edit_box_element.find('.note-value').val();

            let id = edit_box_element.attr('data-id');

            $.ajax({
                url: route('client.my-timeline.update.note'),
                type: 'POST',
                data: {
                    id: id,
                    note: note
                },
            })
            .done(function() {
                text_element.html(note);
                toastr.success(Lang.get('base.success'))
            })
            .fail(function() {
                toastr.error( Lang.get('page.message.fail') );
            })
        });

        $('body').on('input', '.note-value', function(event) {
            event.preventDefault();
            $(this).height(25).height($(this)[0].scrollHeight);
            $(this).autoResize();
        });

        $('body').on('click', '.choose-date', function(event) {

            event.preventDefault();

            let id = $(this).attr('data-id');

            let element = $(this).closest('.task').find('.datepicker');

            element.datepicker({
                onSelect: function(dateText, inst) {
                    var theDate = new Date(Date.parse($(this).datepicker('getDate')));
                    var dateFormatted = $.datepicker.formatDate('yy/m/d', theDate);
                    console.log(dateFormatted)
                    $.ajax({
                        url: route('client.my-timeline.update.date'),
                        type: 'POST',
                        data: {
                            id: id,
                            date: dateFormatted,
                        },
                    })
                    .done(function() {
                        loadMyTimeLine();
                    })
                    .fail(function() {
                        toastr.error( Lang.get('page.message.fail') );
                    })
                },
            });

            element.toggle();

            $(this).val(function(_,t) {
                return t == 'show' ? 'hide' : 'show';
            });
        });

        function loadMyTimeLine() {
            $.ajax({
                url: route('client.my-timeline'),
                type: 'GET',
            })
            .done(function(data) {
                $('#time-line-view').html(data);
            })
            .fail(function() {
                toastr.error( Lang.get('page.message.fail') );
            });
        }

        $('body').on('click', '.priority', function(event) {

            event.preventDefault();

            let element = $(this);

            let priority = $(this).attr('data-priority');

            let id = $(this).attr('data-id');

            swal({
                title: Lang.get('page.timeline.change_priority'),
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: route('client.my-timeline.update.priority'),
                        type: 'POST',
                        data: {
                            priority: priority,
                            id: id,
                        },
                    })
                    .done(function(res) {
                        loadMyTimeLine();
                    })
                    .fail(function() {
                        toastr.error( Lang.get('page.message.fail') );
                    })
                }
            });
        });
    });
</script>
@endsection
