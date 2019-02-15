@extends('admin.index')

@section('subheader', __('admin.my_profile'))

@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="m-portlet m-portlet--full-height">
            <div class="m-portlet__body">
                <div class="m-card-profile">
                    <div class="m-card-profile__pic">
                        <div class="m-card-profile__pic-wrapper">
                            <img src="{{ asset(config('asset.users.avatar') . ($user->media ? $user->media->name : config('asset.user_default')) ) }}" id="user_avatar"/>
                        </div>
                    </div>
                    <div class="m-card-profile__details">
                        <span class="m-card-profile__name">
                            {{ $user->name }}
                        </span>
                        <a href="#" class="m-card-profile__email m-link">
                            {{ $user->email }}
                        </a>
                    </div>
                </div>
                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                    <li class="m-nav__separator m-nav__separator--fit"></li>
                    <li class="m-nav__section">
                        <span class="m-nav__section-text">
                            {{ __('admin.section') }}
                        </span>
                    </li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-profile-1"></i>
                            <span class="m-nav__link-title">
                                <span class="m-nav__link-wrap">
                                    <span class="m-nav__link-text">
                                        {{ __('admin.my_profile') }}
                                    </span>
                                    <span class="m-nav__link-badge">
                                        <span class="m-badge m-badge--success">
                                            2
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-share"></i>
                            <span class="m-nav__link-text">
                                {{ __('admin.activity') }}
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                            <span class="m-nav__link-text">
                                {{ __('admin.messages') }}
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-graphic-2"></i>
                            <span class="m-nav__link-text">
                                {{ __('admin.sales') }}
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-time-3"></i>
                            <span class="m-nav__link-text">
                                {{ __('admin.events') }}
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="#" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                            <span class="m-nav__link-text">
                                {{ __('admin.support') }}
                            </span>
                        </a>
                    </li>
                </ul>
                <div class="m-portlet__body-separator"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-8">
        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-tools">
                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                <i class="flaticon-share "></i>
                                {{ __('admin.update_profile') }}
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                {{ __('admin.messages') }}
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                {{ __('admin.settings') }}
                            </a>
                        </li>
                    </ul>
                </div>
                @include('admin.head_tools')
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="m_user_profile_tab_1">
                    {!! Form::open(['id' => 'update_profile', 'class' => 'm-form m-form--fit m-form--label-align-right', 'route' => 'user.update', 'files' => true]) !!}
                        @method('PUT')
                        {!! Form::file('avatar_file', ['class' => 'd-none', 'id' => 'avatar_file']) !!}
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">
                                        1. {{ __('admin.personal_details') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('name', __('admin.name'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::text('name', $user->name, ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('validation.custom.enter.name')]) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('birthday', __('admin.birthday'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::date('birthday', $user->birthday, ['required', 'class' => 'form-control m-input m-input--solid']) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('email', __('admin.email'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::email('email', $user->email, ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('validation.custom.enter.email')]) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('gender', __('admin.gender'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    <div class="m-radio-inline">
                                        <label class="m-radio m-radio--state-success">
                                            {!! Form::radio('gender', 'male', ($user->gender == 'male' ? true : false)) !!}
                                            {{ __('admin.male') }}
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--state-brand">
                                            {!! Form::radio('gender', 'female', ($user->gender == 'female' ? true : false)) !!}
                                            {{ __('admin.female') }}
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('phone', __('admin.phone'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::number('phone', $user->phone, ['required', 'class' => 'form-control m-input m-input--solid', 'placeholder' => __('validation.custom.enter.phone')]) !!}
                                </div>
                            </div>
                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">
                                        2. {{ __('admin.address') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('city', __('admin.city'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::select(
                                        'city',
                                        $city,
                                        $user->locations[0]->district->city->id,
                                        [
                                            'placeholder' => __('validation.custom.select.city'),
                                            'class' => 'form-control m-input m-input--solid'
                                        ])
                                    !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('district', __('admin.district'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::select(
                                        'district',
                                        $district,
                                        $user->locations[0]->district->id,
                                        [
                                            'placeholder' => __('validation.custom.select.district'),
                                            'class' => 'form-control m-input m-input--solid'
                                        ])
                                    !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('address', __('admin.address'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::text('address', $user->locations ? $user->locations[0]->address : null, ['class' => 'form-control m-input m-input--solid', 'placeholder' => __('validation.custom.enter.address')]) !!}
                                </div>
                            </div>
                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">
                                        4. {{ __('admin.account.account') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('user_name', __('admin.user_name'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::text('user_name', $user->user_name, ['class' => 'form-control m-input m-input--solid', 'disabled', 'placeholder' => __('admin.user_name')]) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('password', __('admin.password'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::password('password', ['class' => 'form-control m-input m-input--solid', 'placeholder' => __('validation.custom.enter.password')]) !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                {!! Form::label('password_confirmation', __('admin.password_confirmation'), ['class' => 'col-2 col-form-label']) !!}
                                <div class="col-7">
                                    {!! Form::password('password_confirmation', ['class' => 'form-control m-input m-input--solid', 'placeholder' => __('validation.custom.enter.password_confirmation')]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-7">
                                        {!! Form::submit(__('admin.update'), ['id' => 'save', 'class' => 'btn btn-accent m-btn m-btn--air m-btn--custom']) !!}
                                        &nbsp;&nbsp;
                                        {!! Form::reset(__('admin.reset'), ['class' => 'btn btn-secondary m-btn m-btn--air m-btn--custom']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="tab-pane" id="m_user_profile_tab_2"></div>
                <div class="tab-pane" id="m_user_profile_tab_3"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script defer type="text/javascript">
    jQuery(document).ready(function($) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        toastr.options = { "preventDuplicates": true };

        $('#user_avatar').click(function() {
            $('#avatar_file').click();
        });

        $('#avatar_file').change(function(e) {
            e.preventDefault();

            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#user_avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

                submitForm();
            }
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
                console.log(Lang.get('validation.custom.select.district'));
                $el.append(
                    $('<option></option>')
                    .attr('value', '').text( Lang.get('validation.custom.select.district') )
                );
                $.each(data, function(key, value) {
                    $el.append(
                        $('<option></option>')
                        .attr('value', key).text( value )
                    );
                });
            })
            .fail(function(message) {
                toastr.error(message);
            });
        });

        $('#save').click(function(event) {
            event.preventDefault();

            submitForm();
        });

        function submitForm() {
            $.ajax({
                url: '{{ route('user.update') }}',
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                data: new FormData($('form#update_profile')[0]),
            })
            .done(function(data) {
                $('.m-card-profile__name').text( $('#name').val() );
                $('.m-card-profile__email').text( $('#email').val() );

                toastr.success(data.message);
            })
            .fail(function(data) {
                var getError = $.parseJSON(data.responseText);
                $.each(getError.errors, function (key, value) {
                    toastr.error(value);
                });
            });
        }
    });
</script>
@endsection
