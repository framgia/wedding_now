<header id="nav-bar" class="nav-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-3">
                <div class="wedding-logo">
                    <a href=""><img src="{{ asset('images/logo.png') }}" class="img-responsive" alt="logo"></a>
                </div>
            </div>
            <div class="col-md-10 col-sm-9">
                <div class="navigation">
                    <div id="cssmenu">
                        <ul class="css-menu">
                            <li class="active"><a href="#">{{ __('Home') }}</a>
                                <ul class="sub-menu">
                                    <li class="active">
                                        <a href="#">{{ __('Home 1') }}</a>
                                    </li>
                                    <li>
                                        <a href="#">{{ __('Home 2') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">{{ __('Pages') }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="">{{ __('About') }}</a></li>
                                    <li><a href="#">{{ __('Blog') }}</a>
                                        <ul class="has-sub">
                                            <li><a href="">{{ __('Blog') }}</a></li>
                                            <li><a href="">{{ __('Blog Detail') }}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">{{ __('Listing') }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="">{{ __('Category Listing') }}</a></li>
                                </ul>
                            </li>
                            <li><a href="#">{{ __('Vendor') }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="">{{ __('Vendor Dashboard') }}</a></li>
                                </ul>
                            </li>
                            <li><a href="#">{{ __('Planning Tools') }}<i class="fa fa-angle-down"
                                                                         aria-hidden="true"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="">{{ __('Budget Planner') }}</a></li>
                                </ul>
                            </li>
                            <li><a href="#">{{ __('Real Weddings') }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="">{{ __('Real Wedding Listing') }}</a></li>
                                </ul>
                            </li>
                            <li><a href="#">{{ __('Contact') }}<i class="fa fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="">{{ __('Contact 1') }}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header
