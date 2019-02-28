jQuery(document).ready(function ($) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    let id_deleted_tasks = [];

    let html = '<div class="form-group m-form__group row align-items-center single-task"><div class="col-md-12 row"> <div class="col-md-10 row"> <div class="col-md-4"> <input type="hidden" class="id-task"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label>Name:</label> </div> <div class="m-form__control"> <input type="name" class="form-control m-input title-task" placeholder="' + Lang.get('admin.task.title') + '"> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> <br> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label>Time:</label> </div> <div class="m-form__control"> <select name="time_frame" class="form-control select-time-frame input-width-97-left-3"> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> </div> <div class="col-md-4"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label class="m-label m-label--single">' + Lang.get('base.category') +':</label> </div> <div class="m-form__control"> <select name="category" class="form-control select-category"> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> <br> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label class="m-label m-label--single">' + Lang.get('base.item') + ':</label> </div> <div class="m-form__control"> <select name="" class="form-control select-item" > <option hidden value="">' + Lang.get('base.choose') + ' ' + Lang.get('base.item') + '</option> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> </div> <div class="col-md-4"> <textarea class="form-control task-note" placeholder="' + Lang.get('admin.placeholder.note') + '"></textarea> </div> </div> <div class="col-md-2"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label class="m-label m-label--single">' + Lang.get('base.priority') + ':</label> </div> <div class="m-form__control"> <select name="" class="form-control select-priority" > <option value="1">' + Lang.get('admin.high') + '</option> <option value="0">' + Lang.get('admin.low') + '</option> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> <div class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill task-delete-schedule"> <span> <i class="la la-trash-o"></i> <span>' + Lang.get('base.delete') + '</span> </span> </div> </div> </div> </div>';

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
                    $('.single-task').find('.task-note').last().val(element.note);
                    $('.single-task').find('.task-delete-schedule').attr('data-id', element.id);
                })
            })

        $('.task-delete-schedule').click(function (event) {

            event.preventDefault();

            let id = $(this).attr('data-id');

            if (confirm(Lang.get('base.confirm_delete'))) {
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

                let html = '<option hidden value="" disable>' + Lang.get('base.choose') + ' ' + Lang.get('base.choose') + '</option>';

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

                let html = '<option hidden value="" disable>' + Lang.get('base.choose') + ' ' + Lang.get('base.time_frame') + '</option>';

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

                let html = '<option hidden value="">' + Lang.get('base.choose') + ' ' + Lang.get('base.item') + '</option>';

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

        let html = '<div class="form-group m-form__group row align-items-center single-task"> <div class="col-md-12 row"> <div class="col-md-10 row"> <div class="col-md-4"> <input type="hidden" class="id-task"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label>' + Lang.get('base.name') + ':</label> </div> <div class="m-form__control"> <input type="name" class="form-control m-input title-task" placeholder="' + Lang.get('admin.task.title') + '"> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> <br> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label>' + Lang.get('base.time_frame') + ':</label> </div> <div class="m-form__control"> <select name="time_frame" class="form-control select-time-frame input-width-97-left-3"> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> </div> <div class="col-md-4"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label class="m-label m-label--single">' + Lang.get('base.category') + ':</label> </div> <div class="m-form__control"> <select name="category" class="form-control select-category"> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> <br> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label class="m-label m-label--single">' + Lang.get('base.item') + ':</label> </div> <div class="m-form__control"> <select name="" class="form-control select-item" > <option hidden value="">' + Lang.get('base.choose') + ' ' + Lang.get('base.item') + '</option> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> </div> <div class="col-md-4"> <textarea class="form-control task-note" placeholder="' + Lang.get('admin.placeholder.note') + '"></textarea> </div> </div> <div class="col-md-2"> <div class="m-form__group m-form__group--inline"> <div class="m-form__label"> <label class="m-label m-label--single">' + lang.get('base.priority') + ':</label> </div> <div class="m-form__control"> <select name="" class="form-control select-priority" > <option value="1">' + Lang.get('admin.high') + '</option> <option value="0">' + Lang.get('admin.low') + '</option> </select> </div> </div> <div class="d-md-none m--margin-bottom-10"></div> <div class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill task-delete"> <span> <i class="la la-trash-o"></i> <span>' + Lang.get('base.delete') + '</span> </span> </div> </div> </div> </div>';

        let data_categories = loadSelectCategories('');

        let data_time_frames = loadSelectTimeFrame('');

        $(html).hide().appendTo('#task-schedule').fadeIn(500);

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

            if (confirm(Lang.get('base.confirm_delete'))) {
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
                note: $(this).find('.task-note').val()
            }

            arr_tasks.push(task);
        });

        $.ajax({
            url: route('admin.schedule-default.update', { id: id }),
            type: 'PUT',
            dataType: '',
            data: {arr_tasks: arr_tasks, info_schedule: info_schedule, id_deleted_tasks: id_deleted_tasks},
        })
        .done(function (res) {

            toastr.success(res.message);

            id_deleted_tasks = [];
        })
        .fail(function (xhr, status, error) {

            var message = JSON.parse(xhr.responseText);
            
            var errors = Object.entries(message.errors);

            errors.forEach(function (value, index) {
                toastr.error(value[1][0], 'Error!');
            });
        })
    });
});
