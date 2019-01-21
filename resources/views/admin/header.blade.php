<header id="m_header" class="m-grid__item m-header"m-minimize-offset="200" m-minimize-mobile-offset="200">
    <div class="m-container m-container--fluid m-container--full-height">
        <div class="m-stack m-stack--ver m-stack--desktop">
            <!-- BEGIN: Brand -->
            <div class="m-stack__item m-brand m-brand--skin-dark">
                <div class="m-stack m-stack--ver m-stack--general">
                    <div class="m-stack__item m-stack__item--middle m-brand__logo">
                        <a href="#" class="m-brand__logo-wrapper">
                            <img src="{{ asset('assets/demo/default/media/img/logo/logo_default_dark.png') }}"/>
                        </a>
                    </div>
                    <div class="m-stack__item m-stack__item--middle m-brand__tools">
                        <!-- BEGIN: Left Aside Minimize Toggle -->
                        <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block
                           ">
                            <span></span>
                        </a>
                        <!-- END -->
                        <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                        <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>
                        <!-- END -->
                        <!-- BEGIN: Responsive Header Menu Toggler -->
                        <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>
                        <!-- END -->
                        <!-- BEGIN: Topbar Toggler -->
                        <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                            <i class="flaticon-more"></i>
                        </a>
                        <!-- BEGIN: Topbar Toggler -->
                    </div>
                </div>
            </div>
            <!-- END: Brand -->
            <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                <!-- BEGIN: Horizontal Menu -->
                <button class="m-aside-header-menu-mobile-close m-aside-header-menu-mobile-close--skin-dark" id="m_aside_header_menu_mobile_close_btn">
                <i class="la la-close"></i>
                </button>
                <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark">
                    <ul class="m-menu__nav m-menu__nav--submenu-arrow">
                        <li class="m-menu__item m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true">
                            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-icon flaticon-add"></i>
                                <span class="m-menu__link-text">{{ __('actions') }}</span>
                                <i class="m-menu__hor-arrow la la-angle-down"></i>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item" aria-haspopup="true">
                                        <a href="#" class="m-menu__link">
                                            <i class="m-menu__link-icon flaticon-file"></i>
                                            <span class="m-menu__link-text">
                                                {{ __('create_new_post') }}
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                        <a href="#" class="m-menu__link">
                                            <i class="m-menu__link-icon flaticon-diagram"></i>
                                            <span class="m-menu__link-title">
                                                <span class="m-menu__link-wrap">
                                                    <span class="m-menu__link-text">
                                                        {{ __('generate_reports') }}
                                                    </span>
                                                    <span class="m-menu__link-badge">
                                                        <span class="m-badge m-badge--success">
                                                            2
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item m-menu__item--submenu" m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
                                        <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                            <i class="m-menu__link-icon flaticon-business"></i>
                                            <span class="m-menu__link-text">
                                                {{ __('manage_orders') }}
                                            </span>
                                            <i class="m-menu__hor-arrow la la-angle-right"></i>
                                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                                        </a>
                                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                                            <span class="m-menu__arrow"></span>
                                            <ul class="m-menu__subnav">
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <span class="m-menu__link-text">
                                                            {{ __('latest_orders') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <span class="m-menu__link-text">
                                                            {{ __('pending_orders') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <span class="m-menu__link-text">
                                                            {{ __('processed_orders') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <span class="m-menu__link-text">
                                                            {{ __('delivery_reports') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <span class="m-menu__link-text">
                                                            {{ __('payments') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <span class="m-menu__link-text">
                                                            {{ __('customers') }}
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="m-menu__item m-menu__item--submenu" m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
                                        <a href="#" class="m-menu__link m-menu__toggle">
                                            <i class="m-menu__link-icon flaticon-chat-1"></i>
                                            <span class="m-menu__link-text">
                                                {{ __('customer_feedbacks') }}
                                            </span>
                                            <i class="m-menu__hor-arrow la la-angle-right"></i>
                                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                                        </a>
                                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                                            <span class="m-menu__arrow"></span>
                                            <ul class="m-menu__subnav">
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <span class="m-menu__link-text">
                                                            {{ __('customer_feedbacks') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <span class="m-menu__link-text">
                                                            {{ __('supplier_feedbacks') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <span class="m-menu__link-text">
                                                            {{ __('reviewed_feedbacks') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <span class="m-menu__link-text">
                                                            {{ __('resolved_feedbacks') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <span class="m-menu__link-text">
                                                            {{ __('feedback_reports') }}
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                        <a href="#" class="m-menu__link">
                                            <i class="m-menu__link-icon flaticon-users"></i>
                                            <span class="m-menu__link-text">
                                                {{ __('register_member') }}
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="m-menu__item m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true">
                            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-icon flaticon-line-graph"></i>
                                <span class="m-menu__link-text">
                                    {{ __('reports') }}
                                </span>
                                <i class="m-menu__hor-arrow la la-angle-down"></i>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu m-menu__submenu--fixed m-menu__submenu--left width-1000">
                                <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                <div class="m-menu__subnav">
                                    <ul class="m-menu__content">
                                        @for ($i = 0; $i < 4; $i++)
                                        <li class="m-menu__item">
                                            <h3 class="m-menu__heading m-menu__toggle">
                                            <span class="m-menu__link-text">
                                                {{ __('finance_reports') }}
                                            </span>
                                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                                            </h3>
                                            <ul class="m-menu__inner">
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <i class="m-menu__link-icon flaticon-map"></i>
                                                        <span class="m-menu__link-text">
                                                            {{ __('annual_reports') }}
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="m-menu__item m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true">
                            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-icon flaticon-paper-plane"></i>
                                <span class="m-menu__link-title">
                                    <span class="m-menu__link-wrap">
                                        <span class="m-menu__link-text">
                                            {{ __('apps') }}
                                        </span>
                                        <span class="m-menu__link-badge">
                                            <span class="m-badge m-badge--brand m-badge--wide">
                                                {{ __('new') }}
                                            </span>
                                        </span>
                                    </span>
                                </span>
                                <i class="m-menu__hor-arrow la la-angle-down"></i>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                        <a href="#" class="m-menu__link">
                                            <i class="m-menu__link-icon flaticon-business"></i>
                                            <span class="m-menu__link-text">
                                                {{ __('ecommerce') }}
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item m-menu__item--submenu" m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
                                        <a href="#" class="m-menu__link m-menu__toggle">
                                            <i class="m-menu__link-icon flaticon-computer"></i>
                                            <span class="m-menu__link-text">
                                                {{ __('audience') }}
                                            </span>
                                            <i class="m-menu__hor-arrow la la-angle-right"></i>
                                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                                        </a>
                                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                                            <span class="m-menu__arrow"></span>
                                            <ul class="m-menu__subnav">
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <i class="m-menu__link-icon flaticon-users"></i>
                                                        <span class="m-menu__link-text">
                                                            {{ __('active_users') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <i class="m-menu__link-icon flaticon-interface-1"></i>
                                                        <span class="m-menu__link-text">
                                                            {{ __('user_explorer') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <i class="m-menu__link-icon flaticon-lifebuoy"></i>
                                                        <span class="m-menu__link-text">
                                                            {{ __('users_flows') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <i class="m-menu__link-icon flaticon-graphic-1"></i>
                                                        <span class="m-menu__link-text">
                                                            {{ __('market_segments') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <i class="m-menu__link-icon flaticon-graphic"></i>
                                                        <span class="m-menu__link-text">
                                                            {{ __('user_reports') }}
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                        <a href="#" class="m-menu__link">
                                            <i class="m-menu__link-icon flaticon-map"></i>
                                            <span class="m-menu__link-text">
                                                {{ __('marketing') }}
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                        <a href="#" class="m-menu__link">
                                            <i class="m-menu__link-icon flaticon-graphic-2"></i>
                                            <span class="m-menu__link-title">
                                                <span class="m-menu__link-wrap">
                                                    <span class="m-menu__link-text">
                                                        {{ __('campaigns') }}
                                                    </span>
                                                    <span class="m-menu__link-badge">
                                                        <span class="m-badge m-badge--success">
                                                            3
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item m-menu__item--submenu" m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
                                        <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                            <i class="m-menu__link-icon flaticon-infinity"></i>
                                            <span class="m-menu__link-text">
                                                {{ __('cloud_manager') }}
                                            </span>
                                            <i class="m-menu__hor-arrow la la-angle-right"></i>
                                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                                        </a>
                                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                            <span class="m-menu__arrow"></span>
                                            <ul class="m-menu__subnav">
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <i class="m-menu__link-icon flaticon-add"></i>
                                                        <span class="m-menu__link-title">
                                                            <span class="m-menu__link-wrap">
                                                                <span class="m-menu__link-text">
                                                                    {{ __('file_upload') }}
                                                                </span>
                                                                <span class="m-menu__link-badge">
                                                                    <span class="m-badge m-badge--danger">
                                                                        3
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <i class="m-menu__link-icon flaticon-signs-1"></i>
                                                        <span class="m-menu__link-text">
                                                            {{ __('file_attributes') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <i class="m-menu__link-icon flaticon-folder"></i>
                                                        <span class="m-menu__link-text">
                                                            {{ __('folders') }}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item" m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="#" class="m-menu__link">
                                                        <i class="m-menu__link-icon flaticon-cogwheel-2"></i>
                                                        <span class="m-menu__link-text">
                                                            {{ __('system_settings') }}
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- END: Horizontal Menu -->
                <!-- BEGIN: Topbar -->
                <div id="m_header_topbar" class="m-topbar m-stack m-stack--ver m-stack--general">
                    <div class="m-stack__item m-topbar__nav-wrapper">
                        <ul class="m-topbar__nav m-nav m-nav--inline">
                            <li class="
                               m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light m-list-search m-list-search--skin-light"
                               m-dropdown-toggle="click" id="m_quicksearch" m-quicksearch-mode="dropdown" m-dropdown-persistent="1">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-nav__link-icon">
                                        <i class="flaticon-search-1"></i>
                                    </span>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header">
                                            <form class="m-list-search__form">
                                                <div class="m-list-search__form-wrapper">
                                                    <span class="m-list-search__form-input-wrapper">
                                                        <input id="m_quicksearch_input" autocomplete="off" type="text" name="q" class="m-list-search__form-input" value="" placeholder="{{ __('search') }}">
                                                    </span>
                                                    <span class="m-list-search__form-icon-close" id="m_quicksearch_close">
                                                        <i class="la la-remove"></i>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-max-height="300" data-mobile-max-height="200">
                                                <div class="m-dropdown__content"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width" m-dropdown-toggle="click" m-dropdown-persistent="1">
                                <a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
                                    <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
                                    <span class="m-nav__link-icon">
                                        <i class="flaticon-music-2"></i>
                                    </span>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header m--align-center background-url-noti">
                                            <span class="m-dropdown__header-title">
                                                9 {{ __('new') }}
                                            </span>
                                            <span class="m-dropdown__header-subtitle">
                                                {{ __('user_notifications') }}
                                            </span>
                                        </div>
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
                                                    <li class="nav-item m-tabs__item">
                                                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
                                                            {{ __('alerts') }}
                                                        </a>
                                                    </li>
                                                    <li class="nav-item m-tabs__item">
                                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_events" role="tab">
                                                            {{ __('events') }}
                                                        </a>
                                                    </li>
                                                    <li class="nav-item m-tabs__item">
                                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">
                                                            {{ __('logs') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
                                                        <div class="m-scrollable" data-scrollable="true" data-max-height="250" data-mobile-max-height="200">
                                                            <div class="m-list-timeline m-list-timeline--skin-light">
                                                                <div class="m-list-timeline__items">
                                                                    @for ($i = 0; $i < 4; $i++)
                                                                    <div class="m-list-timeline__item">
                                                                        <span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
                                                                        <span class="m-list-timeline__text">
                                                                            12 {{ __('new_users_registered') }}
                                                                        </span>
                                                                        <span class="m-list-timeline__time">
                                                                            {{ __('just_now') }}
                                                                        </span>
                                                                    </div>
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                                        <div class="m-scrollable" data-scrollable="true" data-max-height="250" data-mobile-max-height="200">
                                                            <div class="m-list-timeline m-list-timeline--skin-light">
                                                                <div class="m-list-timeline__items">
                                                                    @for ($i = 0; $i < 4; $i++)
                                                                    <div class="m-list-timeline__item">
                                                                        <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                                        <a href="" class="m-list-timeline__text">
                                                                            {{ __('new_order_received') }}
                                                                        </a>
                                                                        <span class="m-list-timeline__time">
                                                                            {{ __('just_now') }}
                                                                        </span>
                                                                    </div>
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                                        <div class="m-stack m-stack--ver m-stack--general min-height-180">
                                                            <div class="m-stack__item m-stack__item--center m-stack__item--middle">
                                                                <span class="">
                                                                    {{ __('all_caught_up') }}
                                                                    <br>
                                                                    {{ __('no_new_logs') }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
                                    <span class="m-nav__link-icon">
                                        <i class="flaticon-share"></i>
                                    </span>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header m--align-center background-url-quick-actions">
                                            <span class="m-dropdown__header-title">
                                                {{ __('quick_actions') }}
                                            </span>
                                            <span class="m-dropdown__header-subtitle">
                                                {{ __('shortcuts') }}
                                            </span>
                                        </div>
                                        <div class="m-dropdown__body m-dropdown__body--paddingless">
                                            <div class="m-dropdown__content">
                                                <div class="data" data="false" data-max-height="380" data-mobile-max-height="200">
                                                    <div class="m-nav-grid m-nav-grid--skin-light">
                                                        <div class="m-nav-grid__row">
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-file"></i>
                                                                <span class="m-nav-grid__text">
                                                                    {{ __('generate_report') }}
                                                                </span>
                                                            </a>
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-time"></i>
                                                                <span class="m-nav-grid__text">
                                                                    {{ __('add_new_event') }}
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="m-nav-grid__row">
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-folder"></i>
                                                                <span class="m-nav-grid__text">
                                                                    {{ __('create_new_task') }}
                                                                </span>
                                                            </a>
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-clipboard"></i>
                                                                <span class="m-nav-grid__text">
                                                                    {{ __('completed_tasks') }}
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-topbar__userpic">
                                        <img src="{{ asset('assets/app/media/img/users/user4.jpg') }}" class="m--img-rounded m--marginless m--img-centered"/>
                                    </span>
                                    <span class="m-topbar__username m--hide">
                                        Nick
                                    </span>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header m--align-center background-url-card-user">
                                            <div class="m-card-user m-card-user--skin-dark">
                                                <div class="m-card-user__pic">
                                                    <img src="{{ asset('assets/app/media/img/users/user4.jpg') }}" class="m--img-rounded m--marginless"/>
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name m--font-weight-500">
                                                        Mark Andre
                                                    </span>
                                                    <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                        mark.andre@gmail.com
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav m-nav--skin-light">
                                                    <li class="m-nav__section m--hide">
                                                        <span class="m-nav__section-text">
                                                            {{ __('section') }}
                                                        </span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="#" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                            <span class="m-nav__link-title">
                                                                <span class="m-nav__link-wrap">
                                                                    <span class="m-nav__link-text">
                                                                        {{ __('my_profile') }}
                                                                    </span>
                                                                    <span class="m-nav__link-badge">
                                                                        <span class="m-badge m-badge--success">
                                                                            2
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="#" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">
                                                                {{ __('activity') }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="#" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">
                                                                {{ __('messages') }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                                    <li class="m-nav__item">
                                                        <a href="#" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">
                                                                {{ __('faq') }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="#" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">
                                                                {{ __('support') }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                                    <li class="m-nav__item">
                                                        <a href="{{ route('logout') }}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                            {{ __('logout') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li id="m_quick_sidebar_toggle" class="m-nav__item">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-nav__link-icon">
                                        <i class="flaticon-grid-menu"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Topbar -->
            </div>
        </div>
    </div>
</header>
