<section id="wedding-plan" class="ptb120">
    <div class="container">
        <div class="section text-center">
            <h3 class="section-heading">{{ __('page.index.planning') }}</h3>
            <p class="section-sub-heading">{{ __('page.index.choose_planning') }}</p>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="wedding-plan-block">
                    <div class="wedding-plan-img">
                        <img src="{{ asset(config('asset.users.images.index') . 'wedding-plan-1.jpg') }}" class="img-responsive" alt="wedding-plan">
                        <div class="overlay-bg"></div>
                    </div>
                    <div class="wedding-plan-dtl text-center">
                        <h5 class="heading">{{ __('page.index.planning_new') }}</h5>
                        <p class="sub-heading">{{ __('page.index.detail_planning_new') }}</p>
                        {{ Form::open(['method' => 'post', 'route' => 'client.choose-type-schedule']) }}
                            {{ Form::hidden('type', $custom) }}
                            {{ Form::submit(__('page.choose'), ['class' => 'btn btn-default']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="wedding-plan-block">
                    <div class="wedding-plan-img">
                        <img src="{{ asset(config('asset.users.images.index') . 'wedding-plan-2.jpg') }}" class="img-responsive" alt="wedding-plan">
                        <div class="overlay-bg"></div>
                    </div>
                    <div class="wedding-plan-dtl text-center">
                        <h5 class="heading">{{ __('page.index.planning_default') }}</h5>
                        <p class="sub-heading">{{ __('page.index.detail_planning_default') }}</p>
                        {{ Form::open(['method' => 'post', 'route' => 'client.choose-type-schedule']) }}
                            {{ Form::hidden('type', $default) }}
                            {{ Form::submit(__('page.choose'), ['class' => 'btn btn-default']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="wedding-plan-block">
                    <div class="wedding-plan-img">
                        <img src="{{ asset(config('asset.users.images.index') . 'wedding-plan-3.jpg') }}" class="img-responsive" alt="wedding-plan">
                        <div class="overlay-bg"></div>
                    </div>
                    <div class="wedding-plan-dtl text-center">
                        <h5 class="heading"><a href="{{ route('user.suggest') }}">{{ __('page.index.planning_suggest') }}</a></h5>
                        <p class="sub-heading">{{ __('page.index.detail_planning_suggest') }}</p>
                        <a href="{{ route('user.suggest') }}" class="btn btn-default">{{ __('page.choose') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
