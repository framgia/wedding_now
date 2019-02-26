@extends('admin.index')
@section('css')
    <link href="{{ asset('css/demo/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/demo/vendors.bundle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/demo/style.bundle.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        {{ __('admin.default_schedule') }}
                        <small>{{ __('base.create_by_admin') }}</small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-4">
                                <div class="m-form__group m-form__group--inline">
                                    <div class="m-form__label">
                                        {!! Form::label('', __('admin.status'), []) !!}
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control" tabindex="-98">
                                            <option value="">{{ __('admin.all') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="m-form__group m-form__group--inline">
                                    <div class="m-form__label">
                                        {!! Form::label('', __('admin.type'), ['class' => 'm-label m-label--single']) !!}
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control" tabindex="-98">
                                            <option value="">{{ __('admin.all') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input m-input--solid"
                                           placeholder="{{ __('base.placeholder.search') }}" id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                    <span>
                                        <i class="la la-search"></i>
                                    </span>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                        <a href="{{ route('admin.create-schedule-default') }}"
                           class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="la la-cart-plus"></i>
                                <span>{{ __('base.create_schedule') }}</span>
                            </span>
                        </a>
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>
            <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data">
                <table class="m-datatable__table table-list">
                    <thead class="m-datatable__head">
                    <tr class="m-datatable__row">
                        <th class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check">
                            <span class="span-width-50px">
                                <label class="m-checkbox m-checkbox--single m-checkbox--all m-checkbox--solid m-checkbox--brand">
                                    <input type="checkbox"><span></span>
                                </label>
                            </span>
                        </th>
                        <th class="m-datatable__cell m-datatable__cell--sort">
                            <span class="width-th-span">{{ __('admin.id') }}</span>
                        </th>
                        <th class="m-datatable__cell m-datatable__cell--sort">
                            <span class="width-th-span">{{ __('base.name') }}</span></th>
                        <th class="m-datatable__cell m-datatable__cell--sort">
                            <span class="width-th-span">{{ __('base.budget') }}</span></th>
                        <th class="m-datatable__cell m-datatable__cell--sort">
                            <span class="width-th-span">{{ __('admin.number_tasks') }}</span></th>
                        <th class="m-datatable__cell m-datatable__cell--sort">
                            <span class="width-th-span">{{ __('admin.type') }}</span></th>
                        <th class="m-datatable__cell m-datatable__cell--sort">
                            <span class="width-th-span">{{ __('base.note') }}</span></th>
                        <th class="m-datatable__cell m-datatable__cell--sort">
                            <span class="width-th-span">{{ __('base.actions') }}</span></th>
                    </tr>
                    </thead>
                    <tbody class="m-datatable__body">
                    @foreach($scheduleWeddings as $scheduleWedding)
                        <tr class="m-datatable__row tr-left-0">
                            <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check">
                                <span class="span-width-50px">
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" value="1">
                                        <span></span>
                                    </label>
                                </span>
                            </td>
                            <td class="m-datatable__cell">
                                <span class="width-th-span">{{ $scheduleWedding->id }}</span>
                            </td>
                            <td class="m-datatable__cell">
                                <span class="width-th-span">{{ $scheduleWedding->name }}</span>
                            </td>
                            <td class="m-datatable__cell">
                                <span class="width-th-span">{{ $scheduleWedding->budget }}</span>
                            </td>
                            <td class="m-datatable__cell">
                                <span class="width-th-span">{{ $scheduleWedding->tasks_count }}</span>
                            </td>
                            <td class="m-datatable__cell">
                                <span class="width-th-span">
                                    <span class="m-badge m-badge--brand m-badge--wide">{{ $scheduleWedding->type }}</span>
                                </span>
                            </td>
                            <td class="m-datatable__cell">
                                <span class="width-th-span">
                                    <span class="m--font-bold m--font-primary">{{ $scheduleWedding->note }}</span>
                                </span>
                            </td>
                            <td data-field="Actions" class="m-datatable__cell">
                                <span class="span-action-table">
                                    <div class="dropdown">
                                        <a href="#"
                                           class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                           data-toggle="dropdown"><i class="la la-ellipsis-h"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                               href="{{ route('admin.edit-schedule-default', ['slug' => $scheduleWedding->slug, 'id' => $scheduleWedding->id]) }}">
                                                <i class="la la-edit"></i>{{ __('base.edit') }}</a>
                                            <a href="#" class="dropdown-item delete-schedule"
                                               data-id="{{ $scheduleWedding->id }}">
                                                <i class="la la-leaf"></i>
                                                {{ __('admin.delele') }}
                                            </a>
                                        </div>
                                    </div>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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

            $('.delete-schedule').click(function (event) {

                event.preventDefault();

                let id = $(this).attr('data-id');

                if (confirm(Lang.get('base.confirm_delete'))) {
                    $.ajax({
                        url: route('admin.delete-schedule-default', {id: id}),
                        type: 'delete',
                        dataType: '',
                        data: {},
                    })
                        .done(function () {
                            location.reload();
                        })
                }
            });
        });
    </script>
@endsection
