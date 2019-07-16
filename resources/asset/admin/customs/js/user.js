jQuery(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    let datatableUser = $('#user-table').mDatatable({
        data: {
            type: 'remote',
            source: {
                read: {
                    url: 'user/get-data',
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
            input: $('#generalSearch')
        },
        columns: [
            {
                field: 'id',
                title: '#',
                width: 50,
                sortable: false,
                textAlign: 'center',
                selector: {
                    class: 'm-checkbox--solid m-checkbox--brand'
                }
            }, {
                field: 'name',
                title: Lang.get('base.name')
            }, {
                field: 'email',
                title: Lang.get('base.email'),
                template: function (e) {
                    return '<span style="width: 162px;" title="' + e.email + '">' + e.email + '</span>';
                }
            }, {
                field: 'role',
                title: Lang.get('base.role'),
                template: function (e) {
                    let a = {
                        1: { class: 'm-badge--brand' },
                        2: { class: 'm-badge--success' },
                        3: { class: 'm-badge--metal' },
                    };

                    let badge = '';
                    e.roles.forEach(function (element) {
                        badge += '<span class="m-badge ' + a[element.id].class + ' m-badge--wide" style="margin: 0px 3px 2px 2px">' + element.display_name + '</span>';
                    });

                    return badge;
                }
            }, {
                field: 'gender',
                title: Lang.get('base.gender'),
                template: function (e) {
                    let a = {
                        'male': { class: 'm-badge--brand', title: 'Male' },
                        'female': { class: 'm-badge--danger', title: 'Female' },
                    };

                    return '<span class="m-badge ' + a[e.gender].class + ' m-badge--wide">' + a[e.gender].title + '</span>';
                }
            }, {
                field: 'birthday',
                title: Lang.get('base.birthday'),
                type: 'date',
                template: function (data) {
                    return new Date(data.birthday).toLocaleString('vn-Vn', { year: "numeric", month: "2-digit", day: "numeric" });
                }
            }, {
                field: 'Actions',
                overflow: 'visible',
                template: function (e) {
                    return '<div class="dropdown">' +
                        '<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">' +
                        '<i class="la la-ellipsis-h"></i>' +
                        '</a>' +
                        '<div class="dropdown-menu dropdown-menu-right">' +
                        '<a class="dropdown-item" href="' + route('admin.user.edit', { id: e.id }) + '">' +
                        '<i class="la la-print"></i>' + Lang.get('base.edit') +
                        '</a>' +
                        '<a class="dropdown-item delete-user" href="#" data-id="' + e.id + '">' +
                        '<i class="fa fa-trash"></i>' + Lang.get('base.delete') +
                        '</a>' +
                        '</div>' +
                        '</div>';
                }
            }
        ]
    });

    $('#roles').select2({
        placeholder: Lang.get('base.select') + ' ' + Lang.get('base.role'),
        tags: true,
    });

    $('body').on('click', '.delete-user', function (event) {

        event.preventDefault();

        let id = $(this).attr('data-id');

        swal({
            title: Lang.get('base.confirm_delete'),
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: route('admin.user.destroy', id),
                    type: 'delete',
                    data: {
                        id: id,
                    }
                }).done(function (data) {

                    datatableUser.reload();

                    swal(Lang.get('base.delete') + '!', Lang.get('base.success'))
                }).fail(function (message) {
                    toastr.error(Lang.get('page.message.fail'), Lang.get('base.error_label'));
                });
            }
        });
    });

    $('body').on('click', '#submit-edit-user', function (event) {

        event.preventDefault();

        let id = $('#user-id').val();

        $.ajax({
            type: 'post',
            url: route('admin.user.update', { id: id }),
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData($('form#form-edit-user')[0]),
        }).done(function () {

            window.location.href = route('admin.user.index');
        }).fail(function (xhr) {
            switch (xhr.status) {
                case 422:
                    {
                        Object.entries(JSON.parse(xhr.responseText).errors).forEach(function (error) {
                            toastr.error(error[1][0], Lang.get('base.error_label'))
                        });
                        break;
                    }
                case 500:
                    {
                        toastr.error(Lang.get('base.error'), Lang.get('base.error_label'));
                        break;
                    }
                case 403:
                    {
                        toastr.error(Lang.get('base.permission_denied'), Lang.get('base.error_label'));
                        break;
                    }
            }
        });
    });

    $('body').on('click', '#submit-create-user', function (event) {

        event.preventDefault();

        $.ajax({
            url: route('admin.user.store'),
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData($('form#form-create-user')[0]),
        }).done(function (res) {

            window.location.href = route('admin.user.index');
        }).fail(function (xhr) {

            switch (xhr.status) {

                case 422:
                    {
                        Object.entries(JSON.parse(xhr.responseText).errors).forEach(function (error) {
                            toastr.error(error[1][0], Lang.get('base.error_label'))
                        });
                        break;
                    }
                case 500:
                    {
                        toastr.error(Lang.get('base.error'), Lang.get('base.error_label'));
                        break;
                    }
                case 403:
                    {
                        toastr.error(Lang.get('base.permission_denied'), Lang.get('base.error_label'));
                        break;
                    }
            }
        });
    });

    $('body').on('click', '.avatar-user', function () {
        $('#avatar').click();
    });

    $('#avatar').change(function () {

        if (this.files && this.files[0]) {

            let reader = new FileReader();

            reader.onload = function (e) {

                $('.avatar-user').attr('src', e.target.result);
            };

            reader.readAsDataURL(this.files[0]);
        }
    });

    $('body').on('change', '#user-select-city', function () {

        let cityId = $(this).val();

        $.ajax({
            type: 'get',
            url: route('admin.city.get-district'),
            data: {
                id: cityId,
            }
        }).done(function (res) {

            let html = '';

            if (res.length > 0) {

                res.forEach(function (el) {

                    let element = '<option value="' + el.id + '"> ' + el.name + '</option>';

                    html += element
                });
            }

            $('#user-select-district').html(html);
        }).fail(function () {
            toastr.error(Lang.get('base.error'), Lang.get('base.error_label'));
        });
    });
});
