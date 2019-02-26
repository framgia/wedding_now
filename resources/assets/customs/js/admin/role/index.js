jQuery(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    var Datatable = {
        init:function(data) {
            var e, a, i, option;
            e = JSON.parse(data);
            a = $('.m_datatable').mDatatable({
                data: {
                    type: 'local', source: e, pageSize: 10
                },
                layout: {
                    theme: 'default', class: '', scroll: !1, footer: !1
                },
                sortable:!0, pagination:!0, search: {
                    input: $('#generalSearch')
                },
                columns: [
                    {
                        field: 'id', title:'#', width:50, sortable:!1, textAlign:'center', selector: {
                            class: 'm-checkbox--solid m-checkbox--brand'
                        }
                    },
                    {
                        field: 'display_name', title: 'Role Name'
                    },
                    {
                        field: 'permissions_count', title: 'Permission Count'
                    },
                    {
                        field: 'description', title: 'Description'
                    },
                    {
                        field:'Actions', title:'Actions', sortable:!1, overflow:'visible', template:function(e, a, i) {
                            return `
                                <a href="#" data-toggle="modal" data-target="#m_modal" class="showEditRole m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="${Lang.get('base.view')}">
                                    <i class="la la-edit"></i>
                                </a>
                                <a class="btnDeleteRole m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="${Lang.get('base.delete')}">
                                    <i class="la la-remove"></i>
                                </a>
                            `;
                        }
                    }
                ]
            });
        }
    };

    function getData(data) {
        Datatable.init(JSON.stringify(data));
    }

    function showError(data) {
        var getError = $.parseJSON(data.responseText);
        $.each(getError.errors, function (key, value) {
            toastr.error(value);
        });
    }

    function getRoleList() {
        $.ajax({
            url: route('role.getRole'),
            type: 'GET',
        })
        .done(function(data) {
            getData(data);
        })
        .fail(function(data) {
            showError(data);
        });
    }

    getRoleList();

    function reloadDatatable() {
        $('.m_datatable').mDatatable().destroy();
        getRoleList();
    }

    function postData(route) {
        $.ajax({
            url: route,
            method: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData($('form#formRole')[0]),
        })
        .done(function(data) {
            toastr.success(data);
            reloadDatatable();
        })
        .fail(function(data) {
            showError(data);
        });
    }

    // clear form fields when modal hidden
    $('#m_modal').on('hidden.bs.modal', function () {
        $('form#formRole')[0].reset();
    })

    $('body').on('click', '.showEditRole', function (event) {
        event.preventDefault();

        var id = $(this).closest('tr').find('input[type="checkbox"]').val();

        $('input[name="_method"]').val('PUT');
        $('#role-id').val(id);

        $.ajax({
            url: route('role.show', id),
            method: 'GET',
        })
        .done(function(data) {
            $('#name').val(data.name);
            $('#display_name').val(data.display_name);
            $('#description').val(data.description);

            $.each(data.permissions, function(index, val) {
                $(`.permission-value input[type='checkbox'][value='${val.id}']`).prop('checked', true);
            });
        })
        .fail(function(data) {
            showError(data);
        });
    });

    $('.showCreateRole').on('click', function(event) {
        $('input[name="_method"]').val('POST');
    });

    $('#btnSubmit').click(function(event) {
        event.preventDefault();
        var method = $('input[name="_method"]').val();

        if (method == 'POST') {
            postData(route('role.store'));
        } else if (method == 'PUT') {
            let id = $('#role-id').val();

            postData(route('role.update', id));
        }
    });

    $('body').on('click', '.btnDeleteRole', function (event) {
        event.preventDefault();

        var id = $(this).closest('tr').find('input[type="checkbox"]').val();

        $.ajax({
            url: route('role.destroy', id),
            type: 'GET'
        })
        .done(function(data) {
            toastr.success(data);
            reloadDatatable();
        })
        .fail(function() {
            showError(data);
        });
    });
});
