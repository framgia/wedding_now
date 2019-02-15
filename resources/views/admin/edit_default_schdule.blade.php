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
                {!! Form::hidden('id', $scheduleDefault->id, ['id' => 'id-schedule']) !!}
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group m-form__group row">
                                    {!! Form::label('title-schedule', __('admin.title'), ['class' => 'col-lg-2 col-form-label']) !!}
                                    <div class="col-lg-10">
                                        {!! Form::text('name', $scheduleDefault->name, ['class' => 'form-control ', 'id' => 'title-schedule', 'placeholder' => __('admin.placeholder.title'), 'autocomplete' => 'off']) !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label('budget-schedule', __('admin.budget'), ['class' => 'col-lg-2 col-form-label']) !!}
                                    <div class="col-lg-10">
                                        {!! Form::number('budget', $scheduleDefault->budget, ['class' => 'form-control ', 'id' => 'budget-schedule', 'placeholder' => __('admin.placeholder.budget')]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group m-form__group row">
                                    {!! Form::label('budget-schedule', __('admin.note'), ['class' => 'col-lg-2 col-form-label']) !!}
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            {!! Form::textarea('note', $scheduleDefault->note, ['class' => 'form-control ', 'id' => 'note-schedule', 'placeholder' => __('admin.placeholder.note'), 'rows' => 6]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-form__seperator m-form__seperator--dashed  m-form__seperator--space m--margin-bottom-40"></div>
                    <div id="m_repeater">
                        <div class="form-group  m-form__group row">
                            <div class="col-lg-12" id="task-schedule">
                            </div>
                        </div>
                        <div class="m-form__group form-group row">
                            {!! Form::label('', '', ['class' => 'col-lg-1 col-form-label']) !!}
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
                            {!! Form::submit(__('admin.update'), ['class' => 'btn btn-success', 'id' => 'submit-form-update']) !!}
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
