<header id="nav-bar" class="nav-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-3">
                <div class="wedding-logo">
                    <a href="/">
                        <img src="{{ asset(config('define.logo.website')) }}" class="img-responsive" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-md-10 col-sm-9">
                <div class="navigation">
                    <div id="cssmenu">
                        <ul class="css-menu">
                            <li class="active">
                                <a href="/">{{ __('page.header.home') }}</a>
                            </li>
                            @auth
                                <li>
                                    <a href="#">
                                        {{ __('page.header.my_wedding') }}
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="sub-menu">
                                        @if (hasSchedule())
                                            <li>
                                                <a href="{{ route('client.to-do-list') }}">
                                                    {{ __('page.header.todo_list') }}
                                                </a>
                                            </li>
                                        @endif
                                        @auth
                                            <li>
                                                <a href="{{ route('client.user.profile') }}">
                                                    {{ __('page.title.profile') }}
                                                </a>
                                            </li>
                                        @endauth
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('client.real-wedding.index') }}">
                                        {{ __('page.page.real_wedding') }}
                                    </a>
                                </li>
                            @endauth
                            <li>
                                <a href="{{ route('client.post.index') }}">
                                    {{ __('page.header.news') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
