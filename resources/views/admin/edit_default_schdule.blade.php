@extends('admin.index')
@section('css')
    <link href="{{ asset('css/demo/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/demo/vendors.bundle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/demo/style.bundle.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                {{ __('admin.default_schedule') }}
                            </h3>
                        </div>
                    </div>
                </div>
                {!! Form::open(['class' => 'm-form']) !!}
                {!! Form::hidden('id', $scheduleWedding->id, []) !!}
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group m-form__group row">
                                    {!! Form::label('title-schedule', __('admin.title'), ['class' => 'col-lg-2 col-form-label']) !!}
                                    <div class="col-lg-10">
                                        {!! Form::text('name', $scheduleWedding->name, ['class' => 'form-control m-input m-input--solid', 'id' => 'title-schedule', 'placeholder' => __('admin.placeholder.title'), 'autocomplete' => 'off']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('budget-schedule', __('admin.budget'), ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::number('budget', $scheduleWedding->budget, ['class' => 'form-control m-input m-input--solid', 'id' => 'budget-schedule', 'placeholder' => __('admin.placeholder.budget')]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group m-form__group row">
                                {!! Form::label('budget-schedule', __('admin.note'), ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        {!! Form::textarea('note', $scheduleWedding->note, ['class' => 'form-control m-input m-input--solid', 'id' => 'note-schedule', 'placeholder' => __('admin.placeholder.note'), 'rows' => 6]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-form__seperator m-form__seperator--dashed  m-form__seperator--space m--margin-bottom-40"></div>
                    <div id="m_repeater">
                        <div class="form-group  m-form__group row">
                            {!! Form::label('', __('admin.task'), ['class' => 'col-lg-1 col-form-label']) !!}
                            <div class="col-lg-11" id="task-schedule">
                            </div>
                        </div>
                        <div class="m-form__group form-group row">
                            {!! Form::label('', '', ['class' => 'col-lg-1 col-form-label']) !!}
                            <div class="col-lg-4">
                                <div id="btn-add-task"
                                     class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
                                            <span>
                                                <i class="la la-plus"></i>
                                                <span>{{ __('admin.create_new_task') }}</span>
                                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2">
                            {!! Form::submit('submit', ['class' => 'btn btn-success', 'id' => 'submit-form-update']) !!}
                            {!! Form::submit('cancel', ['class' => 'btn btn-secondary', 'id' => 'cancels']) !!}
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@section('js')
    <script defer type="text/javascript">
        jQuery(document).ready(function ($) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            let id_deleted_tasks = [];

            let html = '<div class="form-group m-form__group row align-items-center single-task"> <input type="hidden" class="id-task"> <div class="col-md-3"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label>Name:</label> </div> <div class="m-form__control"> <input type="name" class="form-control m-input m-input--solid m-input m-input--solid--solid title-task" placeholder="' + Lang.get('admin.task.title') + '"> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> <br> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label>Time:</label> </div> <div class="m-form__control"> <select name="time_frame" class="form-control m-input m-input--solid select-time-frame input-width-97-left-3"> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> </div> <div class="col-md-3"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label class="m-label m-label--single">Category:</label> </div> <div class="m-form__control"> <select name="category" class="form-control m-input m-input--solid select-category"> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> </div> <div class="col-md-3"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label class="m-label m-label--single">Item:</label> </div> <div class="m-form__control"> <select name="" class="form-control m-input m-input--solid select-item" > </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> </div> <div class="col-md-2"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label class="m-label m-label--single">Priority:</label> </div> <div class="m-form__control"> <select name="" class="form-control m-input m-input--solid select-priority" > <option value="1">' + Lang.get('admin.high') + '</option> <option value="0">' + Lang.get('admin.low') + '</option> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> </div> <div class="col-md-1"> <div class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill task-delete-schedule"> <span> <i class="la la-trash-o"></i> <span>' + Lang.get('admin.delete') + '</span> </span> </div> </div> </div>';

            function loadTasks() {

                let schedule_id = $('#id-schedule').val();

                $.ajax({
                    async: false,
                    url: route('admin.task-in-schedule'),
                    type: 'get',
                    dataType: '',
                    data: {id: schedule_id},
                })
                    .done(function (res) {
                        res.forEach(function (element, index) {
                            $('#task-schedule').append(html);
                            let data_items = getItems(element.category_id);
                            let data_categories = loadSelectCategories(element.category_id);
                            let data_time_frames = loadSelectTimeFrame(element.time_frame_id);
                            $('.single-task').find('.select-item').last().html(data_items);
                            $('.single-task').find('.select-time-frame').last().html(data_time_frames);
                            $('.single-task').find('.select-category').last().html(data_categories);
                            $('.single-task').find('.title-task').last().val(element.name);
                            $('.single-task').find('.select-item').last().val(element.item_user_id);
                            $('.single-task').find('.select-priority').last().val(element.priority);
                            $('.single-task').find('.id-task').last().val(element.id);
                            $('.single-task').find('.select-time-frame').last().val(element.time_frame_id);
                            $('.single-task').find('.select-category').last().val(element.category_id);
                            $('.single-task').find('.task-delete-schedule').attr('data-id', element.id);
                        })
                    })

                $('.task-delete-schedule').click(function (event) {

                    event.preventDefault();

                    let id = $(this).attr('data-id');

                    if (confirm(Lang.get('admin.confirm_delete'))) {
                        id_deleted_tasks.push(id);
                        $(this).closest('.single-task').remove();
                    }
                });
            }

            function loadSelectCategories(id) {
                $.ajax({
                    async: false,
                    url: route('admin.categories-pluck'),
                    type: 'get',
                    dataType: '',
                    data: {},
                })
                    .done(function (res) {

                        let arr = Object.entries(res);

                        let html = '<option hidden value="" disable>' + Lang.get('admin.choose_category') + '</option>';

                        let selected = '';

                        arr.forEach(function (element, index) {

                            if (element[0] == id) {

                                selected = 'selected';
                            }

                            html += '<option value="' + element[0] + '"' + selected + '>' + element[1] + '</option>';

                            selected = '';

                        })

                        data_categories = html;
                    })

                return data_categories;
            }

            function loadSelectTimeFrame(id) {
                $.ajax({
                    async: false,
                    url: route('admin.time-frame-pluck'),
                    type: 'get',
                    dataType: '',
                    data: {},
                })
                    .done(function (res) {

                        let arr = Object.entries(res);

                        let html = '<option hidden value="" disable>' + Lang.get('admin.choose_time_frame') + '</option>';

                        let selected = '';

                        arr.forEach(function (element, index) {

                            if (element[0] == id) {

                                selected = 'selected';
                            }

                            html += '<option value="' + element[0] + '"' + selected + '>' + element[1] + '</option>';

                            selected = '';

                        })

                        data_time_frames = html;
                    })

                return data_time_frames;
            }

            function getItems(id) {

                let data_items = '';

                $.ajax({
                    async: false,
                    url: route('admin.item-with-vendor-pluck-by-category'),
                    type: 'get',
                    dataType: '',
                    data: {id: id},
                })
                    .done(function (res) {

                        let html = '<option hidden value="">' + Lang.get('admin.choose_item') + '</option>';

                        res.forEach(function (element, index) {

                            element.users.forEach(function (element1, index) {

                                html += '<option value="' + element1.pivot.id + '">' + element.name + ' - ' + element1.name + '</option>';
                            })
                        })

                        data_items = html;
                    })

                return data_items;
            }

            loadTasks();

            $('#btn-add-task').click(function (event) {

                event.preventDefault();

                let html = '<div class="form-group m-form__group row align-items-center single-task"> <input type="hidden" class="id-task"> <div class="col-md-3"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label>' + Lang.get('admin.name') + ':</label> </div> <div class="m-form__control"> <input type="name" class="form-control m-input m-input--solid title-task" placeholder="' + Lang.get('admin.task.title') + '"> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> <br> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label>Time:</label> </div> <div class="m-form__control"> <select name="time_frame" class="form-control m-input m-input--solid select-time-frame input-width-97-left-3"> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> </div> <div class="col-md-3"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label class="m-label m-label--single">Category:</label> </div> <div class="m-form__control"> <select name="category" class="form-control m-input m-input--solid select-category"> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> </div> <div class="col-md-3"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label class="m-label m-label--single">Item:</label> </div> <div class="m-form__control"> <select name="" class="form-control m-input m-input--solid select-item" > </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> </div> <div class="col-md-2"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label class="m-label m-label--single">Priority:</label> </div> <div class="m-form__control"> <select name="" class="form-control m-input m-input--solid select-priority" > <option value="1">' + Lang.get('admin.high') + '</option> <option value="0">' + Lang.get('admin.low') + '</option> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> </div> <div class="col-md-1"> <div class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill task-delete"> <span> <i class="la la-trash-o"></i> <span>' + Lang.get('admin.delete') + '</span> </span> </div> </div> </div>';

                let data_categories = loadSelectCategories('');

                let data_time_frames = loadSelectTimeFrame('');

                $('#task-schedule').append(html);

                $('.select-category').last().html(data_categories);

                $('.select-time-frame').last().html(data_time_frames);

                $('.select-category').change(function (event) {

                    event.preventDefault();

                    let id = $(this).val();

                    let data_items = getItems(id);

                    $(this).closest('.single-task').find('.select-item').html(data_items);
                });

                $('.task-delete').click(function (event) {

                    event.preventDefault();

                    if (confirm('Delete?')) {
                        $(this).closest('.single-task').remove();
                    }
                });
            });

            $('#submit-form-update').click(function (event) {

                event.preventDefault();

                let id = $('#id-schedule').val();

                let info_schedule = {
                    id: $('#id-schedule').val(),
                    name: $('#title-schedule').val(),
                    budget: $('#budget-schedule').val(),
                    note: $('#note-schedule').val(),
                };

                let arr_tasks = [];

                $('.single-task').each(function (index, el) {

                    let task = {
                        id: $(this).find('.id-task').val(),
                        name: $(this).find('.title-task').val(),
                        category_id: $(this).find('.select-category').val(),
                        time_frame_id: $(this).find('.select-time-frame').val(),
                        item_user_id: $(this).find('.select-item').val(),
                        priority: $(this).find('.select-priority').val(),
                    }

                    arr_tasks.push(task);
                });

                $.ajax({
                    url: route('admin.update-schedule-default', {id: id}),
                    type: 'PUT',
                    dataType: '',
                    data: {arr_tasks: arr_tasks, info_schedule: info_schedule, id_deleted_tasks: id_deleted_tasks},
                })
                    .done(function (res) {

                        window.location.href = route('admin.list-schedule-default');

                        id_deleted_tasks = [];
                    })
            });

            $('#cancel').click(function (event) {

                event.preventDefault();

                window.location.href = route('admin.list-schedule-default');
            });
        });
    </script>
@endsection
