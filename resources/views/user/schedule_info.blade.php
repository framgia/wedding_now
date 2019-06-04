@extends('layouts.main')

@section('title')
    {{ __('page.page.schedule_info') }}
@endsection

@section('page-name')
{{ __('page.page.schedule_info') }}
@endsection

@section('main-content')
    <!-- to do list -->
    <section id="to-do-list" class="to-do-list-main-block">
        <div class="container">
            @include('user.sections.to_do_list_tab')
            <div class="to-do-list-block">
                <h3 class="create-task-heading">{{ __('page.my_wedding') }}</h3>
                <div class="col-lg-12 padding-left-right-0">
                    <div class="dash-image">
                        {!! Form::open(['id' => 'upload-image-schedule', 'file' => true]) !!}
                            {!! Form::submit(__('page.change_photo'), ['class' => 'dash-btn-change-photo']) !!}
                            {!! Form::file('img_schedule', ['class' => 'img-file d-none']) !!}
                        {!! Form::close() !!}
                        <img class="dash-couple-img" src="{{ config('define.main_schedule') }}" data-path="{{ config('asset.schedule') }}">
                    </div>
                    <div class="dash-couple-info">
                        {!! Form::submit(__('page.action.edit'), ['class' => 'btn btn-primary dash-couple-btn-edit', 'data-toggle' => 'modal', 'data-target' => '#myModal']) !!}
                        <div class="dash-couple">
                            <ul class="dash-ul-list">
                                <li class="dash-ul-li z-index-5">
                                    <img src="{{ asset(config('asset.users.avatar') . 'user_default.png') }}" class="dash-ul-li-img dash-ul-li-img-left" data-path="{{ config('asset.schedule_avatar') }}">
                                </li>
                                <li class="dash-ul-li dash-left-20">
                                    <img src="{{ asset(config('asset.users.avatar') . 'user_default.png') }}" class="dash-ul-li-img dash-ul-li-img-right">
                                </li>
                            </ul>
                            <p class="dash-couple-name">
                                <span class="dash-couple-name-span1"></span>
                                &#38;
                                <span class="dash-couple-name-span2"></span>
                            </p>
                            <p class="dash-couple-marriage-day">
                            </p>
                            <div class="dash-couple-tasks">
                                <ul class="pure-g">
                                    <li class="cursor-pointer">
                                        <p>
                                            <span class="number-task-complete">
                                                <strong>{{ $doneTasks }}</strong>{{ __('page.schedule_info.of', ['total' => $totalTasks]) }}</span>
                                        </p>
                                        <small>{{ __('page.schedule_info.task_complete') }}</small>
                                    </li>
                                    <li class="cursor-pointer">
                                        <p>
                                            <span class="number-task-complete">
                                                <strong>{{ $notDoneTasks }}</strong>{{ __('page.schedule_info.of', ['total' => $totalTasks]) }}</span>
                                        </p>
                                        <small>{{ __('page.schedule_info.task_to_do') }}</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content model-schedule-info">
                <div class="modal-header">
                    <button type="button" class="modal-close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">{{ __('page.my_wedding') }}</h4>
                </div>
                <div class="modal-body">
                    <div class="img-model">
                        {!! Form::open(['id' => 'scheduleInfo', 'file' => true]) !!}
                            <ul class="dash-ul-list width-100">
                                <li class="dash-ul-li model-ul-li couple-left">
                                    <img src="{{ asset(config('define.default_avatar')) }}" class="dash-ul-li-img avatar-left" data-path="{{ config('asset.schedule_avatar') }}">
                                    {!! Form::file('my_avatar', ['class' => 'avatar-left-input d-none']) !!}
                                    <div class="info-couple">
                                        <span class="title-couple">{{ __('page.i_am') }}</span>
                                        <div class="title-coupe-input">
                                            {!! Form::text('my_name', null, ['class' => 'input-couple', 'id' => 'txtNameLeft', 'placeholder' => __('page.placeholder.your_name')]) !!}
                                        </div>
                                        <span class="title-couple">{{ __('page.i_am') }}</span>
                                        <div class="gender-left">
                                            <span class="gender-left-span gender-left-span-left rdoGenderLeft" data-value="groom">{{ __('page.groom') }}</span>
                                            <span class="gender-left-span gender-left-span-right rdoGenderLeft" data-value="bride">{{ __('page.bride') }}</span>
                                            {!! Form::hidden('my_identity', null, ['class' => 'gender_left_value']) !!}
                                        </div>
                                    </div>
                                    <div class="info-couple">
                                        <span class="title-couple">{{ __('wedding_date') }}</span>
                                        <div class="title-coupe-input">
                                            {!! Form::date('wedding_date', \Illuminate\Support\Carbon::now(), ['id' => 'dateWedding', 'class' => 'input-couple']) !!}
                                        </div>
                                    </div>
                                </li>
                                <li class="dash-ul-li model-ul-li-20">
                                    <img src="{{ config('define.ring_img') }}" class="icon-ring">
                                </li>
                                <li class="dash-ul-li model-ul-li couple-right">
                                    <img src="{{ asset(config('define.default_avatar')) }}" class="dash-ul-li-img avatar-right" data-path="{{ config('asset.schedule_avatar') }}">
                                    {!! Form::file('partner_avatar', ['class' => 'avatar-right-input d-none']) !!}
                                    <div class="info-couple">
                                        <span class="title-couple">{{ __('page.partner_name') }}</span>
                                        <div class="title-coupe-input">
                                            {!! Form::text('partner_name', null, ['id' => 'txtNameRight', 'class' => 'input-couple', 'placeholder' => __('page.placeholder.partner_name')]) !!}
                                        </div>
                                        <span class="title-couple">{{ __('page.partner_identity') }}</span>
                                        <div class="gender-left">
                                            <span class="gender-left-span gender-left-span-left rdoGenderRight" data-value="groom">{{ __('page.groom') }}</span>
                                            <span class="gender-left-span gender-left-span-right rdoGenderRight" data-value="bride">{{ __('page.bride') }}</span>
                                            {!! Form::hidden('partner_identity', null, ['class' => 'gender_right_value']) !!}
                                        </div>
                                    </div>
                                    <div class="info-couple">
                                        <span class="title-couple">{{ __('page.venue') }}</span>
                                        <div class="title-coupe-input">
                                            {!! Form::text('venue', null, ['id' => 'txtVenue', 'class' => 'input-couple', 'placeholder' => __('page.placeholder.venue')]) !!}
                                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw  spin-custom d-none"></i>
                                            {!! Form::hidden('district', null, ['id' => 'district']) !!}
                                        </div>
                                        <div class="search-venue">
                                            <div class="box-search">
                                                <ul class="list-venue">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
                <div class="modal-footer row">
                    <div class="col-sm-6">
                    {!! Form::submit(__('page.action.save'), ['class' => 'btn save-schedule-info']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::submit(__('page.action.delete'), ['class' => 'btn delete-schedule-info']) !!}
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" defer="">
        jQuery(document).ready(function($) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            $.when(getScheduleInfo()).then(function(res) {

                  presentScheduleInfoPage(res);
            }, function() {

                toastr.error( Lang.get('page.message.fail') );
            });

            $('.dash-couple-btn-edit').click(function(event) {

                event.preventDefault();

                getScheduleInfo().then(function(res) {

                    presentScheduleInfoModal(res);
                }, function() {

                    toastr.error( Lang.get('page.message.fail') );
                });
            });

            function getScheduleInfo() {

                return $.ajax({
                    url: route('client.get-schedule-info'),
                    type: 'GET',
                });
            }

            function presentScheduleInfoPage(object) {

                let my_name = object.user.name;

                let my_avatar = null;

                let partner_name = 'Partner';

                let partner_avatar = null;

                let marriage_day = object.marriage_day == null ? Lang.get('page.undefine') : object.marriage_day;

                if (object.schedule_metas_pluck.length !== 0) {

                    let arr = object.schedule_metas_pluck;

                    arr.forEach(function(element, index) {

                        switch (element.key) {
                            case 'my_name': {
                                my_name = element.value;
                                break;
                            }
                            case 'my_avatar': {
                                my_avatar = element.value;
                                break;
                            }
                            case 'partner_name': {
                                partner_name = element.value;
                                break;
                            }
                            case 'partner_avatar': {
                                partner_avatar = element.value;
                                break;
                            }
                        }
                    });
                }

                let base_path = $('.dash-ul-li-img-left').attr('data-path');

                if (my_avatar != null) {
                    $('.dash-ul-li-img-left').attr('src', base_path + my_avatar);
                }

                if (partner_avatar != null) {
                    $('.dash-ul-li-img-right').attr('src', base_path + partner_avatar);
                }

                $('.dash-couple-name-span1').text(my_name);

                $('.dash-couple-name-span2').text(partner_name);

                $('.dash-couple-marriage-day').text(Lang.get('page.marrige_day') + new Date(marriage_day).toLocaleString());

                if (object.img_main.length !== 0) {

                    let path = $('.dash-couple-img').attr('data-path');

                    $('.dash-couple-img').attr('src', path + object.img_main[0].name);
                }
            }

            function presentScheduleInfoModal(object) {

                let my_name = object.user.name;

                let my_avatar = null;

                let partner_name = null;

                let partner_avatar = null;

                let my_identity = object.user.gender === 'male' ? 'groom' : 'female';

                let partner_identity = null;

                let address = object.location != null ? object.location.address : null;

                $('#dateWedding').val(object.marriage_day);

                if (object.schedule_metas_pluck.length !== 0) {

                    let arr = object.schedule_metas_pluck;

                    arr.forEach(function(element, index) {

                        switch (element.key) {
                            case 'my_name': {
                                my_name = element.value;
                                break;
                            }
                            case 'my_avatar': {
                                my_avatar = element.value;
                                break;
                            }
                            case 'partner_name': {
                                partner_name = element.value;
                                break;
                            }
                            case 'partner_avatar': {
                                partner_avatar = element.value;
                                break;
                            }
                            case 'my_identity': {
                                my_identity = element.value;
                                break;
                            }
                            case 'partner_identity': {
                                partner_identity = element.value;
                                break;
                            }
                        }
                    });

                    let path = $('.avatar-left').attr('data-path');

                    if(my_avatar != null) {

                        $('.avatar-left').attr('src', path + my_avatar);
                    }

                    if(partner_avatar != null) {

                        $('.avatar-right').attr('src', path + partner_avatar);
                    }
                }

                $('#txtNameLeft').val(my_name);

                $('#txtNameRight').val(partner_name);

                if (my_identity === 'groom') {

                    $('.rdoGenderLeft:eq(0)').addClass('gender-left-active');

                    $('.gender_left_value').val('groom');
                } else {

                    $('.rdoGenderLeft:eq(1)').addClass('gender-left-active');

                    $('.gender_left_value').val('bride');
                }

                if (partner_identity === 'groom') {

                    $('.rdoGenderRight:eq(0)').addClass('gender-left-active');

                    $('.gender_right_value').val('groom');
                } else {

                    $('.rdoGenderRight:eq(1)').addClass('gender-left-active');

                    $('.gender_right_value').val('bride');
                }

                $('#txtVenue').val(address);
            }

            $('.dash-btn-change-photo').click(function(event) {

                event.preventDefault();

                $('.img-file').click();
            });

            $('.img-file').change(function(event) {

                event.preventDefault();

                $.ajax({
                    url: route('client.schedule-upload-image'),
                    type: 'POST',
                    cache: false,
                    processData: false,
                    contentType: false,
                    data: new FormData($('form#upload-image-schedule')[0]),
                })
                .done(function(res) {
                    toastr.success(res.message);

                    getScheduleInfo().then(function(res){

                        presentScheduleInfoPage(res);
                    }, function() {

                        toastr.error( Lang.get('page.message.fail') );
                    });
                })
                .fail(function(xhr, status, error) {

                    var message = JSON.parse(xhr.responseText);

                    var errors = Object.entries(message.errors);

                    errors.forEach(function(value, index) {

                        toastr.error(value[1][0], 'Error!');
                    });
                })
            });

            $('.couple-right .gender-left-span').click(function(event) {

                event.preventDefault();

                $('.couple-right .gender-left-span').removeClass('gender-left-active');

                $(this).addClass('gender-left-active');

                let value = $(this).attr('data-value');

                $('.gender_right_value').val(value);
            });

            $('.couple-left .gender-left-span').click(function(event) {

                event.preventDefault();

                $('.couple-left .gender-left-span').removeClass('gender-left-active');

                $(this).addClass('gender-left-active');

                let value = $(this).attr('data-value');

                $('.gender_left_value').val(value);
            });

            $('.save-schedule-info').click(function(event) {

                event.preventDefault();

                $.ajax({
                    url: route('client.schedule-update'),
                    type: 'POST',
                    cache: false,
                    processData: false,
                    contentType: false,
                    data: new FormData($('form#scheduleInfo')[0]),
                })
                .done(function(res) {

                    toastr.success(res.message);

                    $('#myModal').modal('hide');

                    getScheduleInfo().then(function(res) {

                        presentScheduleInfoPage(res);
                    }, function() {

                        toastr.error( Lang.get('page.message.fail') );
                    })
                })
                .fail(function(xhr, status, error) {

                    var message = JSON.parse(xhr.responseText);

                    var errors = Object.entries(message.errors);

                    errors.forEach(function(value, index) {

                        toastr.error(value[1][0], 'Error!');
                    });
                })
            });

            $('.avatar-left').click(function(event) {

               event.preventDefault();

               $('.avatar-left-input').click();
            });

            $('.avatar-left-input').change(function () {

                if (this.files && this.files[0]) {

                    var reader = new FileReader();

                    reader.onload = function (e) {

                        $('.avatar-left').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(this.files[0]);
                }
            });

            $('.avatar-right').click(function(event) {

               event.preventDefault();

               $('.avatar-right-input').click();
            });

            $('.avatar-right-input').change(function () {

                if (this.files && this.files[0]) {

                    var reader = new FileReader();

                    reader.onload = function (e) {

                        $('.avatar-right').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(this.files[0]);
                }
            });

            $('#txtVenue').keyup(function(event) {

                event.preventDefault();

                let keyword = $(this).val();

                if('' !== keyword) {
                    $.ajax({
                        url: route('client.get-district', { keyword: keyword }),
                        type: 'GET',
                        beforeSend: function() {
                            $('.spin-custom').removeClass('d-none');
                        }
                    })
                    .done(function(res) {

                        let html = '';

                        res.forEach(function (element) {

                            let li = '<li><p data-id=' + element.id + '>' + element.name + ', ' + element.city.name + '</p></li>';
                            html += li;
                        });

                        $('.list-venue').html(html);

                        if (0 !== res.length) {

                            $('.search-venue').show();
                        } else {

                            $('.search-venue').hide();
                        }

                        setTimeout(function() {
                            $('.spin-custom').addClass('d-none');
                        }, 300);
                    })
                    .fail(function() {

                        $('.search-venue').hide();
                    });

                    $('body').on('click', '.list-venue p', function(event) {

                        event.preventDefault();

                        $('#txtVenue').val($(this).text());

                        $('.search-venue').hide();

                        $('#district').val($(this).attr('data-id'));
                    })
                }
                else {

                    $('.search-venue').hide();
                }
            });

            $('.delete-schedule-info').click(function(event) {

                event.preventDefault();

                if (confirm(Lang.get('page.question.delete'))) {

                    $.ajax({
                        url: route('client.delete-schedule'),
                        type: 'delete',
                    })
                    .done(function(res) {
                        location.href = route('client.to-do-list');
                    })
                    .fail(function() {
                        toastr.error( Lang.get('page.message.fail') );
                    })
                }
            });
        });
    </script>
@endsection
