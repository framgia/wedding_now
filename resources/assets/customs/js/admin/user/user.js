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
        .fail(function(data) {
            showError(data)
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
            showError(data)
        });
    }

    getUserList();

    $('body').on('click', '.showCreate', function(event) {
        event.preventDefault();

        resetValueModal();
        $('.modal-title').text( Lang.get('base.create') + ' ' + Lang.get('base.user') )
        $('#btnSubmit').removeClass('updateUser').addClass('createUser')
    });

    $('body').on('click', '.createUser', function(event) {
        event.preventDefault();

        $('input[name="_method"]').val('POST')

        submitForm(route('admin.user.store'));
    });

    $('body').on('click', '.updateUser', function(event) {
        event.preventDefault();

        var id = $('#user_id').val()
        $('input[name="_method"]').val('PUT')

        submitForm(route('admin.user.update', id))
    });

    var $el = $('#district');

    function getDistrict(cityId, districtId) {
        $.ajax({
            url: route('get.districts', cityId),
            type: 'GET',
        })
        .done(function(data) {
            $el.empty();
            $el.append(
                $('<option></option>')
                .attr('value', '').text( Lang.get('validation.custom.select.district') )
            );
            $.each(data, function(key, value) {
                var checked = false
                $el.append(
                    $('<option></option>')
                    .attr('value', key)
                    .text( value )
                );
            });

            $el.val(districtId)
        })
        .fail(function(message) {
            showError(data)
        });
    }

    function setValueModal(data) {
        $('#name').val(data.name)
        $('#user_id').val(data.id)
        $('#email').val(data.email)
        $('#phone').val(data.phone)
        $('#city').val(data.locations[0].district.city_id)
        getDistrict(data.locations[0].district.city_id, data.locations[0].district_id)
        $('#address').val(data.locations[0].address)
        $(`input[name='gender'][value='${data.gender}']`).prop('checked',true)
        $('input[name="birthday"]').val(data.birthday)
        $('#role').val(data.roles[0].id)
        $('#user_name').val(data.user_name)
    }

    function resetValueModal() {
        $('#name').val('')
        $('#user_id').val('')
        $('#email').val('')
        $('#phone').val('')
        $('#city').val('')
        $('#district').val('')
        $('#address').val('')
        $('#birthday').val('')
        $('#role').val('')
        $('#user_name').val('')
    }

    $('body').on('click', '.showEdit', function () {
        var id = $(this).closest('tr').find('td:eq(0) input[type="checkbox"]').val()


        $('.modal-title').text( Lang.get('base.edit') + ' ' + Lang.get('base.user') )
        $('#btnSubmit').removeClass('createUser').addClass('updateUser')

        $.ajax({
            url: route('admin.user.show', id),
            type: 'GET',
        })
        .done(function(data) {
            setValueModal(data)
        })
        .fail(function(data) {
            showError(data)
        })
    });

    function showError(data) {
        var getError = $.parseJSON(data.responseText);
        $.each(getError.errors, function (key, value) {
            toastr.error(value);
        });
    }

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
            showError(message)
        });
    });
});
