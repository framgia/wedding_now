jQuery(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    let datatableRole = $('#role-table').mDatatable({
        data: {
            type: 'remote',
            source: {
                read: {
                    url: 'role/get-data',
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
        sortable: true,
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
                field: 'display_name',
                title: Lang.get('base.role')
            }, {
                field: 'permissions_count',
                title: Lang.get('admin.permission_count')
            }, {
                field: 'description',
                title: Lang.get('base.description')
            }, {
                field: 'Actions',
                title: '',
                overflow: 'visible',
                template: function (e, a, i) {
                    return '<a href="#" data-id="' + e.id + '" class="show-edit-role m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="' + Lang.get('base.edit') + '">' +
                        '<i class="la la-edit"></i>' +
                        '</a>' +
                        '<a class="delet-role m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="' + Lang.get('base.delete') + '">' +
                        '<i class="la la-remove"></i>' +
                        '</a>';
                }
            }
        ]
    });

    $('body').on('click', '.show-edit-role', function (event) {

        event.preventDefault();

        let id = $(this).attr('data-id');

        $.ajax({
            url: route('admin.role.show', { id: id }),
            type: 'get',
            data: { id: id },
        }).done(function (res) {
            $('.id').val(res.id);
            $('.name').val(res.name);
            $('.display-name').val(res.display_name);
            $('.description').val(res.description);
            $('#edit-role-modal').modal('show');
            let permissions = res.permissions;
            if (permissions.length) {
                permissions.forEach(function (el) {
                    $('.permissions-' + el.id).prop('checked', true);
                });
            }
        }).fail(function () {
            toastr.error(Lang.get('page.message.fail'), Lang.get('base.error_label'));
        });
    });

    $('body').on('click', '.update-role', function (event) {

        event.preventDefault();

        let id = $('.id').val();

        let role = new FormData($('form#form-edit-role')[0]);

        $.ajax({
            url: route('admin.role.update', { id: id }),
            type: 'post',
            processData: false,
            contentType: false,
            cache: false,
            data: role,
        }).done(function () {

            datatableRole.reload();

            $('#edit-role-modal').modal('hide');

            swal(Lang.get('base.update') + '!', Lang.get('base.success'));
        }).fail(function () {
            toastr.error(Lang.get('base.error'), Lang.get('base.error_label'));
        });
    });

    $('body').on('click', '.show-create-role', function (event) {

        event.preventDefault();

        $('#create-role-modal').modal('show');
    });

    $('body').on('click', '.store-role', function (event) {

        $.ajax({
            url: route('admin.role.store'),
            type: 'post',
            data: new FormData('form@role-modal')[0],
        }).done(function () {
            $('#role-modal').modal('show');
        }).fail(function () {
            toastr.error(Lang.get('base.error'), Lang.get('base.error_label'));
        });
    });

    $('body').on('click', '#data-dismiss-form-role', function (event) {

        event.preventDefault();

        $("[name='permissions[]").prop('checked');
    });
});
