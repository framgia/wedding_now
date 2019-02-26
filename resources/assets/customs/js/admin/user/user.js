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
                        field: 'user_name', title: 'Username'
                    },
                    {
                        field: 'email', title: 'Email', template:function(e) {
                            return '<span style="width: 162px;" title="' + e.email + '">' + e.email + '</span>';
                        }
                    },
                    {
                        field: 'Role', title:'Role', template:function(e) {
                            var a = {
                                1: { class: 'm-badge--brand' },
                                2: { class: 'm-badge--success' },
                                3: { class: 'm-badge--metal' },
                            };

                            var badge = '';
                            e.roles.forEach(function(element) {
                                badge += '<span class="m-badge ' + a[element.id].class + ' m-badge--wide">' + element.display_name + '</span>';
                            });

                            return badge;
                        }
                    },
                    {
                        field:'name', title:'Name', responsive: {
                            visible: 'lg'
                        }
                    },
                    {
                        field:'gender', title: 'Gender', template:function(e) {
                            var a = {
                                'male' : { class: 'm-badge--brand', title: 'Male' },
                                'female' : { class: 'm-badge--danger', title: 'Female' },
                            };

                            return '<span class="m-badge ' + a[e.gender].class + ' m-badge--wide">' + a[e.gender].title + '</span>';
                        }
                    },
                    {
                        field: 'birthday', title: 'Birthday', type: 'date', format: 'MM/DD/YYYY'
                    },
                    {
                        field:'Actions', title:'Actions', sortable:!1, overflow:'visible', template:function(e, a, i) {
                            return `
                                <div class="dropdown">
                                    <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                                        <i class="la la-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">
                                            <i class="la la-edit"></i> Edit Details
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="la la-leaf"></i> Update Status
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="la la-print"></i> Generate Report
                                        </a>
                                    </div>
                                </div>
                                <a href="#" data-toggle="modal" data-target="#m_modal" class="showEdit m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                                    <i class="la la-edit"></i>
                                </a>
                            `;
                        }
                    }
                ]
            });
        }
    };

    function destroyDatatable() {
        $('.m_datatable').mDatatable().destroy();
    }

    function getData(data) {
        Datatable.init(JSON.stringify(data));
    }

    function getUserList() {
        $.ajax({
            url: route('admin.user.list'),
            type: 'GET',
        })
        .done(function(data) {
            getData(data);
        })
        .fail(function() {
            console.log('error');
        });
    }

    function submitForm(route) {
        $.ajax({
            async: false,
            url: route,
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData($('form#formUser')[0]),
        })
        .done(function(data) {
            toastr.success(data);
            destroyDatatable();
            getUserList();
        })
        .fail(function(data) {
            var getError = $.parseJSON(data.responseText);
            $.each(getError.errors, function (key, value) {
                toastr.error(value);
            });
        });
    }

    getUserList();

    $('#btnSubmit').on('click', function(event) {
        event.preventDefault();

        submitForm(route('admin.user.create'));
    });

    $('.m_datatable').on('click', 'td', function () {
        var id = $(this).closest('tr').find('td:eq(0) input[type="checkbox"]').val();
        console.log(id);
    });

    var $el = $('#district');

    $('#city').on('change', function(event) {
        event.preventDefault();

        var city = $(this).val();

        $.ajax({
            url: route('get.districts', city),
            type: 'GET',
        })
        .done(function(data) {
            $el.empty();
            $el.append(
                $('<option></option>')
                .attr('value', '').text( Lang.get('validation.custom.select.district') )
            );
            $.each(data, function(key, value) {
                $el.append(
                    $('<option></option>')
                    .attr('value', key).text(value)
                );
            });
        })
        .fail(function(message) {
            toastr.error(message);
        });
    });
});
