<div id="footer" class="footer-main-block">
    <div class="container">
        <div class="footer-block">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="about-widget footer-widget">
                        <h4 class="footer-heading">{{ __('About Weddlist') }}</h4>
                        <div class="about-dtl">
                            <p>{{ __('Sed_ut_perspiciatis_unde_omnis_iste_natus_error_volup_tatem') }}</p>
                            <p>{{ __('Ut enim ad minima veniam') }}</p>
                            <a href="#" class="btn btn-white">{{ __('Find a Vendor') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6">
                    <div class="news-widget footer-widget">
                        <h4 class="footer-heading">{{ __('Latest News') }}</h4>
                        <ul>
                            <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="latest-news-img">
                                            <img src="{{ asset('images/footer-news-1.jpg') }}" class="img-responsive"
                                                 alt="news">
                                        </div>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="latest-news-dtl">
                                            <a href="blog-detail.html">{{ __('Sed ut perspiciatis unde omnis is te natus error
                                                sit volup') }}</a>
                                            <div class="date">{{ __('March 22, 2017') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="latest-news-img">
                                            <img src="{{ asset('images/footer-news-2.jpg') }}" class="img-responsive"
                                                 alt="news">
                                        </div>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="latest-news-dtl">
                                            <a href="blog-detail.html">{{ __('Excepteur sint occaecat cupidatat non
                                                proident,') }}</a>
                                            <div class="date">{{ __('March 21, 2017') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="subscribe-widget footer-widget">
                        <h4 class="footer-heading">{{ __('subscribe_new') }}</h4>
                        {!! Form::open(['id' => 'subscribe-form', 'class' => 'subscribe-form']) !!}
                        <div class="form-group">
                            {!! Form::email('email', null, ['id' => 'mc-email', 'class' => 'form-control', 'placeholder' => {{ __('email') }}]) !!}
                            {!! Form::submit(__('subscribe_now')  ['class' => 'btn btn-white']) !!}
                            {!! Form::label('mc-email', '', []) !!}
                        </div>
                        {!! Form::close() !!}
                        <ul class="social-btns">
                            <li>
                                <a class="btn facebook" href="#" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a class="btn twitter" href="#" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a class="btn pinterest" href="#" target="_blank">
                                    <i class="fa fa-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-block text-center">
        <div class="container">
            <p>&copy; {{ __('2017 All rights reserved') }}.</p>
        </div>
    </div>
</div>
