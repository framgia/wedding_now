@extends('admin.index')

@section('subheader', __('page.title.user_list'))

@section('content')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                {{ __('page.title.user_list') }}
                </h3>
            </div>
        </div>
        @include('admin.head_tools')
    </div>
    <div class="m-portlet__body">
        <!--begin: Search Form -->
        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="form-group m-form__group row align-items-center">
                        <div class="col-md-4">
                            <div class="m-input-icon m-input-icon--left">
                                <input type="text" class="form-control m-input m-input--solid" placeholder="{{ __('base.placeholder.search') }}" id="generalSearch">
                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                    <span>
                                        <i class="la la-search"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @permission('user-create')
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <a href="#" data-toggle="modal" data-target="#m_modal" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                        <span>
                            <i class="la la-plus"></i>
                            <span>
                                {{ __('base.create') . ' ' . __('base.user') }}
                            </span>
                        </span>
                    </a>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
                @endpermission
            </div>
        </div>
        <!--end: Search Form -->

        <!--begin: Datatable -->
        <div class="m_datatable" id="local_data"></div>
        <!--end: Datatable -->

    </div>
</div>

<div class="modal fade" id="m_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ __('base.create') . ' ' . __('base.user') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'POST', 'route' => 'admin.user.create', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed', 'id' => 'formUser']) !!}
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                {!! Form::label('name', __('base.name')) !!}
                                {!! Form::text('name', '', ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('base.name') . ' ...']) !!}
                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('email', __('base.email')) !!}
                                {!! Form::email('email', '', ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('base.email') . ' ...']) !!}
                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('phone', __('base.phone')) !!}
                                {!! Form::number('phone', '', ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('base.phone') . ' ...']) !!}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                {!! Form::label('city', __('base.city')) !!}
                                <div class="m-input-icon m-input-icon--right">
                                    {!! Form::select(
                                        'city',
                                        $city,
                                        null,
                                        [
                                            'placeholder' => __('validation.custom.select.city'),
                                            'class' => 'form-control m-input m-input--solid',
                                            'required'
                                        ])
                                    !!}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('district', __('base.district')) !!}
                                <div class="m-input-icon m-input-icon--right">
                                    {!! Form::select('district', [], null,['id' => 'district', 'required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('validation.custom.select.district')]) !!}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('address', __('base.address')) !!}
                                <div class="m-input-icon m-input-icon--right">
                                    {!! Form::text('address', '', ['class' => 'form-control m-input m-input--solid', 'placeholder' => __('base.address') . ' ...']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                <label>{{ __('base.gender') }}:</label>
                                <div class="m-radio-inline">
                                    <label class="m-radio m-radio--solid">
                                        {!! Form::radio('gender', 'male', 'checked') !!}
                                        {{ __('base.male') }}
                                        <span></span>
                                    </label>
                                    <label class="m-radio m-radio--solid">
                                        {!! Form::radio('gender', 'female', 'checked') !!}
                                        {{ __('base.female') }}
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>{{ __('base.birthday') }}:</label>
                                    {!! Form::date('birthday', '', ['required', 'class' => 'form-control m-input m-input--solid']) !!}
                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('role', __('admin.role')) !!}
                                <div class="m-input-icon m-input-icon--right">
                                    {!! Form::select(
                                        'role',
                                        $roles,
                                        null,
                                        [
                                            'placeholder' => __('validation.custom.select.role'),
                                            'class' => 'form-control m-input m-input--solid',
                                            'required'
                                        ])
                                    !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                {!! Form::label('user_name', __('base.user_name')) !!}
                                {!! Form::text('user_name', '', ['class' => 'form-control m-input m-input--solid', 'required', 'placeholder' => __('base.user_name') . ' ...']) !!}
                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('password', __('base.password')) !!}
                                {!! Form::password('password', ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('base.password') . ' ...']) !!}
                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('password_confirmation', __('base.password_confirmation')) !!}
                                {!! Form::password('password_confirmation', ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('base.password_confirmation') . ' ...']) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                {!! Form::button(__('base.cancel'), ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) !!}
                {!! Form::button(__('base.submit'), ['class' => 'btn btn-primary', 'id' => 'btnSubmit']) !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
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
            url: '{{ route('admin.user.list') }}',
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

        submitForm('{{ route('admin.user.create') }}');
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
</script>
@endsection
