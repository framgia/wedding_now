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
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group m-form__group row">
                                    {!! Form::label('title-schedule', __('admin.title'), ['class' => 'col-lg-2 col-form-label']) !!}
                                    <div class="col-lg-8">
                                        {!! Form::text('name', null, ['class' => 'form-control m-input m-input--solid', 'id' => 'title-schedule', 'placeholder' => __('admin.placeholder.title'), 'autocomplete' => 'off']) !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label('budget-schedule', __('admin.budget'), ['class' => 'col-lg-2 col-form-label']) !!}
                                    <div class="col-lg-8">
                                        {!! Form::number('budget', null, ['class' => 'form-control m-input m-input--solid', 'id' => 'budget-schedule', 'placeholder' => __('admin.placeholder.budget')]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">{{ __('admin.note') }}</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            {!! Form::textarea('note', null, ['class' => 'form-control m-input m-input--solid', 'id' => 'note-schedule', 'placeholder' => __('admin.placeholder.note'), 'rows' => 6]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-form__seperator m-form__seperator--dashed  m-form__seperator--space m--margin-bottom-40"></div>
                        <div id="m_repeater">
                            <div class="form-group  m-form__group row">
                                {!! Form::label('', __('admin.task.task'), ['class' => 'col-lg-1 col-form-label']) !!}
                                <div class="col-lg-11" id="task-schedule">
                                </div>
                            </div>
                            <div class="m-form__group form-group row">
                                <label class="col-lg-1 col-form-label"></label>
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
                                <button type="button" class="btn btn-success"
                                        id="submit-form-create">{{ __('admin.create') }}</button>
                                <button type="button" class="btn btn-secondary"
                                        id="cancel">{{ __('admin.cancel') }}</button>
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

            let data = [];

            function loadSelectCategories() {
                $.ajax({
                    url: route('admin.categories-pluck'),
                    type: 'get',
                    dataType: '',
                    data: {},
                })
                    .done(function (res) {

                        let arr = Object.entries(res);

                        let html = '<option hidden value="" disable>' + Lang.get('admin.choose_category') + '</option>';

                        arr.forEach(function (element, index) {

                            html += '<option value="' + element[0] + '">' + element[1] + '</option>';

                        })

                        $('.select-category').last().html(html);
                    })
            }

            function loadSelectTimeFrame() {
                $.ajax({
                    url: route('admin.time-frame-pluck'),
                    type: 'get',
                    dataType: '',
                    data: {},
                })
                    .done(function (res) {

                        let arr = Object.entries(res);

                        let html = '<option hidden value="" disable>' + Lang.get('admin.choose_time_frame') + '</option>';

                        arr.forEach(function (element, index) {

                            html += '<option value="' + element[0] + '">' + element[1] + '</option>';

                        })

                        $('.select-time-frame').last().html(html);
                    })
            }

            $('#btn-add-task').click(function (event) {

                event.preventDefault();

                let html = '<div class="form-group m-form__group row align-items-center single-task"> <div class="col-md-3"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label>Name:</label> </div> <div class="m-form__control"> <input type="name" class="form-control m-input m-input--solid title-task" placeholder="' + Lang.get('admin.task.title') + '"> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> <br> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label>Time:</label> </div> <div class="m-form__control"> <select name="time_frame" class="form-control m-input m-input--solid select-time-frame input-width-97-left-3"> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> </div> <div class="col-md-3"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label class="m-label m-label--single">Category:</label> </div> <div class="m-form__control"> <select name="category" class="form-control m-input m-input--solid select-category"> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> </div> <div class="col-md-3"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label class="m-label m-label--single">Item:</label> </div> <div class="m-form__control"> <select name="item" class="form-control m-input m-input--solid select-item" > <option value="">' + Lang.get('admin.choose_time_frame') + '</option> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> </div> <div class="col-md-2"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label class="m-label m-label--single">Priority:</label> </div> <div class="m-form__control"> <select name="" class="form-control m-input m-input--solid select-priority" > <option value="1">' + Lang.get('admin.high') + '</option> <option value="0">' + Lang.get('admin.low') + '</option> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> </div> <div class="col-md-1"> <div class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill task-delete"> <span> <i class="la la-trash-o"></i> <span>Delete</span> </span> </div> </div> </div>';

                loadSelectCategories();

                loadSelectTimeFrame();

                $('#task-schedule').append(html);

                $('.select-category').change(function (event) {

                    event.preventDefault();

                    let id = $(this).val();

                    var data_items = '';

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

                    $(this).closest('.single-task').find('.select-item').html(data_items);
                });

                $('.task-delete').click(function (event) {

                    event.preventDefault();

                    $(this).closest('.single-task').remove();
                });
            });

            $('#submit-form-create').click(function (event) {

                event.preventDefault();

                let info_schedule = {
                    name: $('#title-schedule').val(),
                    budget: $('#budget-schedule').val(),
                    note: $('#note-schedule').val(),
                };

                let arr_tasks = [];

                $('.single-task').each(function (index, el) {

                    let task = {
                        name: $(this).find('.title-task').val(),
                        category_id: $(this).find('.select-category').val(),
                        time_frame_id: $(this).find('.select-time-frame').val(),
                        item_user_id: $(this).find('.select-item').val(),
                        priority: $(this).find('.select-priority').val(),
                    }

                    arr_tasks.push(task);
                });

                $.ajax({
                    url: route('admin.store-schedule-default'),
                    type: 'POST',
                    dataType: '',
                    data: {arr_tasks: arr_tasks, info_schedule: info_schedule},
                })
                    .done(function (res) {
                        window.location.href = route('admin.list-schedule-default');
                    })
                    .fail(function (res) {
                        toastr.error('Error');
                    })
            });

            $('#cancel').click(function (event) {

                event.preventDefault();

                window.location.href = route('admin.list-schedule-default');
            });
        });
    </script>
@endsection
