@extends('layouts.main')

@section('title')
    {{ __('To Do List') }}
@endsection

@section('page-name')
    {{ __('To Do List') }}
@endsection

@section('main-content')
    <!-- to do list -->
    <section id="to-do-list" class="to-do-list-main-block">
        <div class="container">
            <ul class="to-do-list-tabs general-nav-tabs tabs">
                <li><a href="#" class="btn btn-default"><span class="badge">{{ __('page.page.dashboard') }}</span></a>
                </li>
                <li><a href="#" class="btn btn-default"><span class="badge">{{ __('page.page.profile') }}</span></a>
                </li>
                <li><a href="#" class="active btn btn-default"><span
                                class="badge">{{ __('page.page.to_do_list') }}</span></a></li>
                <li><a href="#" class="btn btn-default"><span class="badge">{{ __('page.page.my_budget') }}</span></a>
                </li>
                <li><a href="#" class="btn btn-default"><span class="badge">{{ __('page.page.my_wishlist') }}</span></a>
                </li>
                <li><a href="#" class="btn btn-default"><span
                                class="badge">{{ __('page.page.real_wedding') }}</span></a></li>
            </ul>
            <div class="to-do-list-block">
                @if(count($scheduleWeddings) > 1)
                    @foreach ($scheduleWeddings as $scheduleWedding)
                        <div class="col-lg-4 padding-bottom-15">
                            <img class="d-block w-100" src="{{ config('define.image.default') }}">
                            <h5 class="padding-top-10">{{ $scheduleWedding->name }}</h5>
                            <p>{{ __('page.marrige_day') . $scheduleWedding->marriage_day }}</p>
                            <button class="btn btn-info btn-choose-schedule"
                                    data-id="{{ $scheduleWedding->id }}">{{ __('page.choose') }}</button>
                        </div>
                    @endforeach
                @else
                    <h4 class="create-task-heading">{{ __('page.question.choose_type_schedule') }}</h4>
                    <div class="col-lg-12 row">
                        <div class="col-lg-4">
                            <img class="d-block w-100" src="{{ config('define.image.default') }}"
                                 alt="{{ __('page.image.default') }}">
                            <h5 class="padding-top-10">{{ __('page.type_chedule.default') }}</h5>
                            <button class="btn btn-info btn-choose-type-schedule"
                                    data-type="{{ $default }}">{{ __('page.choose') }}</button>
                        </div>
                        <div class="col-lg-4">
                            <img class="d-block w-100" src="{{ config('define.image.combo') }}"
                                 alt="{{ __('page.image.combo') }}">
                            <h5 class="padding-top-10">{{ __('page.type_chedule.combo') }}</h5>
                            <button class="btn btn-info btn-choose-type-schedule"
                                    data-type="{{ $combo }}">{{ __('page.choose') }}</button>
                        </div>
                        <div class="col-lg-4">
                            <img class="d-block w-100" src="{{ config('define.image.custom') }}"
                                 alt="{{ __('page.image.custom') }}">
                            <h5 class="padding-top-10">{{ __('page.type_chedule.custom') }}</h5>
                            <button class="btn btn-info btn-choose-type-schedule"
                                    data-type="{{ $custom }}">{{ __('page.choose') }}</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript" defer="">
        jQuery(document).ready(function ($) {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            $('.btn-choose-type-schedule').click(function (event) {

                event.preventDefault();

                let type = $(this).attr('data-type');

                console.log(type);

                $.ajax({
                    async: false,
                    url: route('client.choose-type-schedule'),
                    type: 'POST',
                    dataType: '',
                    data: {type: type},
                })
                .done(function (res) {
                    location.reload();
                })
                .fail(function () {
                    console.log("error");
                })
            });

            $('.btn-choose-schedule').click(function (event) {

                event.preventDefault();

                let id = $(this).attr('data-ID');

                $.ajax({
                    async: false,
                    url: route('client.get-to-do-list'),
                    type: 'get',
                    dataType: '',
                    data: {id_choose: id},
                })
                .done(function (res) {
                    location.reload();
                })
                .fail(function () {
                    console.log("error");
                })
            });
        });
    </script>
@endsection
