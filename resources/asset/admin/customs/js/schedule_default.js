jQuery(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    let nf = new Intl.NumberFormat();

    let datatableScheduleDefault = $('#schedule-default-table').mDatatable({
        data: {
            type: 'remote',
            source: {
                read: {
                    url: 'default/get-data',
                    method: 'get',
                },
                pageSize: 10,
            },
        },
        layout: {
            theme: 'default',
            class: 'table-hover',
            scroll: false,
            footer: false
        },
        pagination: true,
        search: {
            input: $('#generalSearch'),
        },
        columns: [
            {
                field: 'id',
                title: '#',
                width: 50,
                textAlign: 'center',
                selector: {
                    class: 'm-checkbox--solid m-checkbox--brand'
                }
            }, {
                field: 'name',
                title: Lang.get('base.name')
            }, {
                field: 'budget',
                title: Lang.get('base.budget'),
                template: function (e) {
                    return nf.format(e.budget) + ' ' + Lang.get('base.vnd');
                }
            }, {
                field: 'tasks_count',
                title: Lang.get('base.number_task')
            }, {
                field: 'child_schedules',
                title: Lang.get('admin.child_schedules_number'),
                template: function (e) {
                    return e.child_schedules.length;
                }
            }, {
                field: 'actions',
                title: '',
                overflow: 'visible',
                template: function (e, a, i) {
                    return '<div class="dropdown">' +
                        '<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">' +
                        '<i class="la la-ellipsis-h"></i>' +
                        '</a>' +
                        '<div class="dropdown-menu dropdown-menu-right">' +
                        '<a class="dropdown-item show-post" href="' + route('admin.schedule-default.show', { id: e.id }) + '">' +
                        '<i class="la la-file"></i>' + Lang.get('base.show') +
                        '</a>' +
                        '<a class="dropdown-item edit-post" href="' + route('post.edit', { id: e.id }) + '">' +
                        '<i class="la la-edit"></i>' + Lang.get('base.edit') +
                        '</a>' +
                        '<a class="dropdown-item delete-post" href="#" data-id="' + e.id + '">' +
                        '<i class="la la-trash"></i>' + Lang.get('base.delete') +
                        '</a>' +
                        '</div>' +
                        '</div>';
                }
            }
        ]
    });
});
