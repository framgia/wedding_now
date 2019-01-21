<!DOCTYPE html>
<html lang="en">
<head>
    <title>Weddlist — Wedding Vendor Directory HTML Template</title>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="description" content="Weddlist"/>
    <meta name="keywords"
          content="wedding, wedding vendor, wedding vendor directory, HTML template, html theme, wedding html template, wedding html theme, weddlist, weddlist html, weddlist html template">
    <meta name="author" content="udayraj"/>
    <meta name="MobileOptimized" content="320"/>
    <link href="{{ asset('images/favicon.ico') }}" rel="icon" type="image/x-icon"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app_client.css') }}">
</head>
<body>
<div class="preloader">
    <div class="status">
        <div class="status-message">
        </div>
    </div>
</div>
<section class="top-nav-info">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="top-text">{{ __('Welcome to Weddlist') }}</div>
            </div>
            <div class="col-sm-6">
                <div class="top-detail text-right">
                    <ul>
                        <li><a href="#">{{ __('Help') }}</a></li>
                        <li><a href="#">{{ __('Pricing') }}</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#register-model">{{ __('Register') }}</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#login-model">{{ __('Login') }}</a></li>
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

        <div class="modal fade login-model" id="login-model" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h5 class="modal-title text-center">{{ __('Login') }}</h5>
                    </div>
                    <div class="modal-body login-model-body text-center">
                        <form id="login-form" action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" id="login_email"
                                       placeholder="Enter Your Email"/>
                                <input type="password" class="form-control" id="login_password"
                                       placeholder="Enter Your Password"/>
                            </div>
                            <button type="submit" class="btn btn-default">{{ __('Login') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade register-model" id="register-model" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h5 class="modal-title text-center">{{ __('Register') }}</h5>
                    </div>
                    <div class="modal-body request-model-body text-center">
                        <form id="register-form" action="#">
                            <div class="form-group">
                                <input type="text" class="form-control" id="reg_name" placeholder="Enter Your Name"/>
                                <input type="email" class="form-control" id="reg_email" placeholder="Enter Your Email"/>
                                <input type="password" class="form-control" id="reg_password"
                                       placeholder="Enter Your Password"/>
                                <input type="password" class="form-control" id="reg_confirm-password"
                                       placeholder="Confirm Your Password"/>
                            </div>
                            <button type="submit" class="btn btn-default">{{ __('Register') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end register popup -->
    </div>
</section>
@include('client.layouts.header')
<section class="home-revo-slider">
    <article class="content">
        <div id="rev_slider_1066_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="notgeneric125"
             data-source="gallery" style="background-color:transparent;padding:0px;">
            <!-- slider bottom panel -->
            <div class="slider-bottom-panel">
                <div class="container">
                    <div class="col-sm-4">
                        <div class="select-category-dropdown dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                <span class="drp-name" data-bind="label">{{ __('Select Vendor Category') }}</span>
                                <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" role="menu">
                                <li><a href="#">{{ __('Cake') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="select-category-dropdown dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                <span class="drp-name" data-bind="label">{{ __('Select City') }}</span>
                                <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <li><a href="#">{{ __('London') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="slider-bottom-panel-btn">
                            <button type="button" class="btn btn-pink">{{ __('Find A Vendor') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end slider bottom panel -->
            @include('client.layouts.slider')
        </div>
    </article>
</section>
<!-- end home revolution slider -->
<!-- wedding plan -->
<section id="wedding-plan" class="ptb120">
    <div class="container">
        <div class="section text-center">
            <h3 class="section-heading">{{ __('Start Planning Your Wedding Step By Step') }}</h3>
            <p class="section-sub-heading">{{ __('Sed ut perspiciatis unde omnis iste natus error sit voluptatem') }}</p>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="wedding-plan-block">
                    <div class="wedding-plan-img">
                        <img src="images/wedding-plan-1.jpg" class="img-responsive" alt="wedding-plan">
                        <div class="overlay-bg"></div>
                    </div>
                    <div class="wedding-plan-dtl text-center">
                        <h5 class="heading"><a href="budget-planner.html">{{ __('Budget Planner') }}</a></h5>
                        <p class="sub-heading">{{ __('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accus.') }}</p>
                        <a href="#" class="btn btn-default">{{ __('View Details') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="wedding-plan-block">
                    <div class="wedding-plan-img">
                        <img src="images/wedding-plan-2.jpg" class="img-responsive" alt="wedding-plan">
                        <div class="overlay-bg"></div>
                    </div>
                    <div class="wedding-plan-dtl text-center">
                        <h5 class="heading"><a href="guest-list.html">{{ __('Guest List') }}</a></h5>
                        <p class="sub-heading">{{ __('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accus.') }}</p>
                        <a href="" class="btn btn-default">{{ __('View Details') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="wedding-plan-block">
                    <div class="wedding-plan-img">
                        <img src="images/wedding-plan-3.jpg" class="img-responsive" alt="wedding-plan">
                        <div class="overlay-bg"></div>
                    </div>
                    <div class="wedding-plan-dtl text-center">
                        <h5 class="heading"><a href="to-do-list.html">{{ __('Check List') }}</a></h5>
                        <p class="sub-heading">{{ __('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accus.') }}</p>
                        <a href="" class="btn btn-default">{{ __('View Details') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end wedding plan -->
<!-- wedding location -->
<section id="wedding-location" class="bglight ptb120">
    <div class="container">
        <div class="section text-center">
            <h3 class="section-heading">{{ __('Top Wedding Location') }}</h3>
            <p class="section-sub-heading">{{ __('Sed ut perspiciatis unde omnis iste natus error sit voluptatem') }}</p>
        </div>
        <div class="wedding-location-block">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="location-block">
                                <div class="city-img">
                                    <img src="images/wedding-location/location-1.jpg" class="img-responsive" alt="city">
                                    <div class="overlay-bg"></div>
                                </div>
                                <div class="city-dtl text-center">
                                    <h6 class="city-dtl-heading"><a href="#">{{ __('New York') }}</a></h6>
                                    <p>{{ __('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accus') }}.</p>
                                    <a href="#" class="btn btn-pink hidden-xs">{{ __('Read More') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <div class="location-block">
                                <div class="city-img">
                                    <img src="images/wedding-location/location-2.jpg" class="img-responsive" alt="city">
                                    <div class="overlay-bg"></div>
                                </div>
                                <div class="city-dtl text-center">
                                    <h6 class="city-dtl-heading"><a href="#">{{ __('Sydney') }}</a></h6>
                                    <p>{{ __('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accus') }}.</p>
                                    <a href="#" class="btn btn-pink hidden-xs">{{ __('Read More') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="location-block">
                        <div class="city-img">
                            <img src="images/wedding-location/location-3.jpg" class="img-responsive" alt="city">
                            <div class="overlay-bg"></div>
                        </div>
                        <div class="city-dtl text-center">
                            <h6 class="city-dtl-heading"><a href="#">Berlin</a></h6>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accus.</p>
                            <a href="#" class="btn btn-pink">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="location-block">
                                <div class="city-img">
                                    <img src="images/wedding-location/location-4.jpg" class="img-responsive" alt="city">
                                    <div class="overlay-bg"></div>
                                </div>
                                <div class="city-dtl text-center">
                                    <h6 class="city-dtl-heading"><a href="#">{{ __('Melbourne') }}</a></h6>
                                    <p>{{ __('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accus.') }}</p>
                                    <a href="#" class="btn btn-pink hidden-xs">{{ __('Read More') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="location-block">
                                <div class="city-img">
                                    <img src="images/wedding-location/location-5.jpg" class="img-responsive" alt="city">
                                    <div class="overlay-bg"></div>
                                </div>
                                <div class="city-dtl text-center">
                                    <h6 class="city-dtl-heading"><a href="#">{{ __('Berlin') }}</a></h6>
                                    <p>{{ __('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accus.') }}</p>
                                    <a href="#" class="btn btn-pink hidden-xs">{{ __('Read More') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="location-btn text-center">
            <a href="#" class="btn btn-pink">{{ __('View More Location') }}</a>
        </div>
    </div>
</section>
<!-- end wedding location -->
@include('client.layouts.gallery')
<!-- feature wedding -->
<section id="feature-wedding" class="pt120 pb90">
    <div class="container">
        <div class="section text-center">
            <h3 class="section-heading">{{ __('Our Best Featured Wedding Vendor') }}</h3>
            <p class="section-sub-heading">{{ __('Sed ut perspiciatis unde omnis iste natus error sit voluptatem') }}</p>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="feature-block">
                    <div class="feature-img">
                        <img src="images/feature-wedd-1.jpg" class="img-responsive" alt="feature">
                    </div>
                    <div class="tags tags-clr-one">{{ __('Featured') }}</div>
                    <div class="feature-dtl">
                        <h6 class="feature-heading"><a href="vendor-profile.html">{{ __('Venue Vendor Title') }}</a></h6>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{ __('Street Address, Name Of Town, 12345,
                            Country.') }}</p>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="feature-vendor">
                                <a href="vendor-profile.html">{{ __('Venue Vendor') }}</a>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="feature-price text-right">
                                {{ __('$120-$500') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="feature-block">
                    <div class="feature-img">
                        <img src="images/feature-wedd-2.jpg" class="img-responsive" alt="feature">
                    </div>
                    <div class="tags tags-clr-two">{{ __('top rated') }}</div>
                    <div class="feature-dtl">
                        <h6 class="feature-heading"><a href="vendor-profile.html">{{ __('Wedding Dress') }}</a></h6>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{ __('Street Address, Name Of Town, 12345,
                            Country.') }}</p>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="feature-vendor">
                                <a href="vendor-profile.html">{{ __('Venue Vendor') }}</a>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="feature-price text-right">
                                {{ __('$120-$500') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="feature-block">
                    <div class="feature-img">
                        <img src="{{ asset('images/feature-wedd-3.jpg') }}" class="img-responsive" alt="feature">
                    </div>
                    <div class="tags tags-clr-three">{{ __('popular') }}</div>
                    <div class="feature-dtl">
                        <h6 class="feature-heading"><a href="#">{{ __('Crazy Photography') }}</a></h6>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{ __('Street Address, Name Of Town, 12345,
                            Country.') }}</p>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="feature-vendor">
                                <a href="#">{{ __('Venue Vendor') }}</a>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="feature-price text-right">
                                {{ __('$120-$500') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="call-out" class="call-out-main-block">
    <div class="parallax" style="background-image: url('images/bg/call-out-parr.jpg');">
        <div class="overlay-bg"></div>
        <div class="container text-center">
            <div class="call-out-dtl">
                <h2 class="call-out-heading">{{ __('Are you trying our planning tools ?') }}</h2>
                <a href="#" class="btn btn-pink">{{ __('Start Planning Today') }}</a>
            </div>
        </div>
    </div>
</section>
<section id="why-choose" class="why-choose-main-block ptb120">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="why-choose-img">
                    <img src="images/why-choose.png" class="img-responsive" alt="why-choose">
                </div>
            </div>
            <div class="col-md-8">
                <div class="section">
                    <div class="row">
                        <div class="col-sm-5">
                            <h3 class="section-heading">{{ __('Why Choose Wedd') }}<span>{{ __('list') }}</span></h3>
                        </div>
                        <div class="col-sm-7">
                            <p class="section-sub-heading">{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercit.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="why-block">
                            <div class="why-icon">
                                <i class="flaticon-two-hearts"></i>
                            </div>
                            <h4 class="why-choose-heading">{{ __('20 Year Experience') }}</h4>
                            <p>{{ __('Sed ut perspiciatis unde omnis iste na voluptatem accusantium doloremque laudantium') }}</p>
                        </div>
                        <div class="why-block">
                            <div class="why-icon">
                                <i class="flaticon-food"></i>
                            </div>
                            <h4 class="why-choose-heading">{{ __('1500+ Wedding Suppliers') }}</h4>
                            <p>{{ __('Sed ut perspiciatis unde omnis iste na voluptatem accusantium doloremque laudantium') }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="why-block">
                            <div class="why-icon">
                                <i class="flaticon-valentine-day"></i>
                            </div>
                            <h4 class="why-choose-heading">{{ __('100 Real Weddingse') }}</h4>
                            <p>{{ __('Sed ut perspiciatis unde omnis iste na voluptatem accusantium doloremque laudantium') }}</p>
                        </div>
                        <div class="why-block">
                            <div class="why-icon">
                                <i class="flaticon-wedding-day"></i>
                            </div>
                            <h4 class="why-choose-heading">{{ __('Perfect Checklist') }}</h4>
                            <p>{{ __('Sed ut perspiciatis unde omnis iste na voluptatem accusantium doloremque laudantium') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="testimonial-block" class="testimonial-main-block"
         style="background-image: url('images/bg/testimonial-bg.jpg');">
    <div class="overlay-bg"></div>
    <div class="container">
        <div class="section text-center">
            <h3 class="section-heading">{{ __('Words From Happy Couples') }}</h3>
            <p class="section-sub-heading">{{ __('Sed ut perspiciatis unde omnis iste natus error') }}</p>
        </div>
        <div id="testimonials-slider" class="testimonials-slider">
            <div class="item testimonial-block">
                <div class="testimonial-client-img">
                    <img src="images/testi-1.png" class="img-responsive" alt="client">
                </div>
                <div class="testimonial-dtl">
                    <h5 class="testimonial-client">{{ __('Dave Macwan') }}</h5>
                    <div class="date">{{ __('March 25, 2017') }}</div>
                    <p>{{ __('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi.') }}</p>
                </div>
            </div>
            <div class="item testimonial-block">
                <div class="testimonial-client-img">
                    <img src="images/testi-2.png" class="img-responsive" alt="client">
                </div>
                <div class="testimonial-dtl">
                    <h5 class="testimonial-client">{{ __('Marry') }} &amp; {{ __('Leary') }}</h5>
                    <div class="date">{{ __('March 29, 2017') }}</div>
                    <p>{{ __('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi.') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end testimonial -->
<!-- news and update -->
@include('client.layouts.news')
<!-- end news and update -->
<!-- footer -->
@include('client.layouts.footer')
<!-- end footer -->
<!-- jquery -->
<script type="text/javascript" src="{{ asset('js/client/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/client/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/client/owl.carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/client/jquery.ajaxchimp.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/client/smooth-scroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/client/jquery.magnific-popup.min.js') }}"></script>
<!-- magnify popup js -->
<script type="text/javascript" src="{{ asset('js/client/waypoints.min.js') }}"></script>
<!-- facts count js required for jquery.counterup.js file -->
<script type="text/javascript" src="{{ asset('js/client/jquery.counterup.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/client/menumaker.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/client/jquery.share-tooltip.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/client/price-slider.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/client/bootstrap-datepicker.js') }}"></script>
<!-- revolution js files -->
<script type="text/javascript" src="{{ asset('js/client/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/client/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/client/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/client/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('js/client/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('js/client/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/client/extensions/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('js/client/extensions/revolution.extension.slideanims.min.js') }}"></script>
<!-- end revolution js files -->
<script type="text/javascript" src="{{ asset('js/client/theme.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/slider-bar-effec.js') }}"></script>
</body>
</html>
