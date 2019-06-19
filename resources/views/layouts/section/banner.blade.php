<section id="page-banner" class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 banner-dtl text-center">
                <ul role="tablist" class="nav nav-tabs cover__tab">
                    <li role="presentation" class="cover__tab-li active">
                        <a href="#search-service" aria-controls="search-service" role="tab" data-toggle="tab" class="cover__tab-link" aria-expanded="true">{{ __('page.index.wedding_service') }}</a>
                    </li>
                    <li role="presentation" class="cover__tab-li">
                        <a href="#search-idea" aria-controls="search-idea" role="tab" data-toggle="tab" class="cover__tab-link" aria-expanded="false">{{ __('page.index.wedding_idea') }}</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="search-service" class="tab-pane in active">
                        {{ Form::open(['class' => 'row']) }}
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name=""
                                       placeholder="{{ __('page.index.enter_search_service') }}">
                            </div>
                            <div class="col-lg-3 w-20 p-relative">
                                {{ Form::select('service', $categories, null, ['placeholder' => __('page.banner.all_services'), 'class' => 'form-control no-arrow-drop pointer']) }}
                                <span class="p-absolute">
                                    <i class="fa fa-list"></i>
                                </span>
                            </div>
                            <div class="col-lg-3 w-20 p-relative">
                                <select class="form-control no-arrow-drop pointer" name="idea">
                                    <option hidden="">{{ __('base.choose') . ' ' . __('base.city') }}</option>
                                </select>
                                <span class="p-absolute">
                                    <i class="fa fa-map-marker"></i>
                                </span>
                            </div>
                            <div class="col-lg-2">
                                <input type="submit" class="form-control btn btn-pink" name="submit_search" value="{{ __('base.search') }}">
                            </div>
                        {{ Form::close() }}
                    </div>
                    <div id="search-idea" class="tab-pane">
                        {{ Form::open(['class' => 'row']) }}
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="idea" placeholder="{{ __('page.index.enter_search_idea') }}">
                            </div>
                            <div class="col-lg-2 pl-0">
                                <input type="submit" class="form-control btn btn-pink" name="submit_search" value="{{ __('base.search') }}">
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
