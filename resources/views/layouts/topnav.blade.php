<section class="top-nav-info">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="top-text">{{ __('base.welcome') }} Weddding Now</div>
            </div>
            <div class="col-sm-6">
                <div class="top-detail text-right">
                    <ul>
                        @if(isAdmin())
                            <li>
                                <a href="{{ route('admin.index') }}">{{ __('page.profile.dashboard') }}</a>
                            </li>
                        @endif
                        @auth
                            <li><a href="{{ route('user.profile', Auth::user()->user_name) }}">{{ Auth::user()->name }}</a></li>
                            <li><a href="{{ route('logout') }}">{{ __('base.logout') }}</a></li>
                        @endauth
                        @guest
                            <li><a href="{{ route('login') }}">{{ __('base.login') }} | {{ __('base.register') }}</a></li>
                        @endguest
                        <li class="language">
                            <p class="current-lan">{{ session()->get('lang') }}</p>
                            <div class="hover-lan">
                                <ul class="select-lan">
                                    <li class="{{ session()->get('lang') == config('define.vn') ? 'd-none' : '' }}">
                                        <a href="{{ route('changeLang', ['lang' => 'vn']) }}">{{ __('base.vn') }}</a>
                                    </li>
                                    <li class="{{ session()->get('lang') == config('define.en') ? 'd-none' : '' }}">
                                        <a href="{{ route('changeLang', ['lang' => 'en' ]) }}">{{ __('base.en') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="search">
            <div class="container">
                <input type="search" class="search-box" placeholder="{{ __('page.index.search') }}"/>
                <a href="#" class="fa fa-times search-close"></a>
            </div>
        </div>
    </div>
</section>
