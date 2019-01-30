<section id="page-banner" class="page-banner">
    <div class="overlay-bg"></div>
    <div class="container">
        <div class="banner-dtl text-center">
            <h2 class="banner-heading">@yield('page-name')</h2>
            <div class="breadcrumb-block">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">{{ __('page.page.home') }}</a>
                    </li>
                    <li class="active">
                        <a href="#">@yield('page-name')</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>
