<section class="top-nav-info">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="top-text">Welcome to Weddlist</div>
            </div>
            <div class="col-sm-6">
                <div class="top-detail text-right">
                    <ul>
                        <li><a href="help.html">Help</a></li>
                        <li><a href="pricing-plan.html">Pricing</a></li>
                        @auth
                            <li><a href="{{ route('user.profile', Auth::user()->user_name) }}">{{ Auth::user()->name }}</a></li>
                            <li><a href="{{ route('logout') }}">{{ __('base.logout') }}</a></li>
                        @endauth
                        @guest
                            <li><a href="{{ route('login') }}">{{ __('base.login') }} | {{ __('register') }}</a></li>
                        @endguest
                        <li class="search-btn search-icon text-center">
                            <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- search -->
        <div class="search">
            <div class="container">
                <input type="search" class="search-box" placeholder="Search"/>
                <a href="#" class="fa fa-times search-close"></a>
            </div>
        </div>
        <!-- end search -->
    </div>
</section>
