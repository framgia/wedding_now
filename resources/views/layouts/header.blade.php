<header id="nav-bar" class="nav-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-3">
                <div class="wedding-logo">
                    <a href="/">
                        <img src="{{ asset(config('asset.users.images.logo') . 'logo.png') }}" class="img-responsive" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-md-10 col-sm-9">
                <div class="navigation">
                    <div id="cssmenu">
                        <ul class="css-menu">
                            <li class="active">
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="#">
                                    {{ __('page.header.my_wedding') }}
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('client.to-do-list') }}">{{ __('page.header.todo_list') }}</a></li>
                                    @auth
                                    <li><a href="{{ route('user.profile', Auth::user()->user_name) }}">{{ __('page.title.profile') }}</a></li>
                                    @endauth
                                </ul>
                            </li>
                            <li><a href="#">Listing<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="category-listing.html">Category Listing</a></li>
                                    <li><a href="add-listing.html">Add Listing</a></li>
                                    <li><a href="listing-with-leftmap.html">Listing With Left Map</a></li>
                                    <li><a href="listing-with-topmap.html">Listing With Top Map</a></li>
                                    <li><a href="new-listing-item-des.html">Listing Item Description</a></li>
                                    <li><a href="new-listing-item-related-video.html">Listing Item Video</a></li>
                                    <li><a href="new-listing-item-review.html">Listing Item Review</a></li>
                                    <li><a href="new-listing-item-vendor-profile.html">Listing Item Vendor Profile</a></li>
                                    <li><a href="manage-item-listing.html">Manage Listing Items</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Vendor<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="vendor-dashboard.html">Vendor Dashboard</a></li>
                                    <li><a href="vendor-profile.html">Vendor Profile</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Planning Tools<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="budget-planner.html">Budget Planner</a></li>
                                    <li><a href="pricing-table.html">Pricing Table</a></li>
                                    <li><a href="to-do-list.html">To Do List</a></li>
                                    <li><a href="guest-list.html">Guest List</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('real-wedding.index') }}">{{ __('page.page.real_wedding') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('post.index') }}">{{ __('page.page.news') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
