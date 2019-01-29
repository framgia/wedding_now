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
                        <li><a href="#" data-toggle="modal" data-target="#register-model">Register</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#login-model">Login</a></li>
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
        <!-- login popup -->
        <div class="modal fade login-model" id="login-model" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h5 class="modal-title text-center">Login</h5>
                    </div>
                    <div class="modal-body login-model-body text-center">
                        <form id="login-form" action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" id="login_email" placeholder="Enter Your Email"/>
                                <input type="password" class="form-control" id="login_password" placeholder="Enter Your Password"/>
                            </div>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end login popup -->
        <!-- register popup -->
        <div class="modal fade register-model" id="register-model" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h5 class="modal-title text-center">Register</h5>
                    </div>
                    <div class="modal-body request-model-body text-center">
                        <form id="register-form" action="#">
                            <div class="form-group">
                                <input type="text" class="form-control" id="reg_name" placeholder="Enter Your Name"/>
                                <input type="email" class="form-control" id="reg_email" placeholder="Enter Your Email"/>
                                <input type="password" class="form-control" id="reg_password" placeholder="Enter Your Password"/>
                                <input type="password" class="form-control" id="reg_confirm-password" placeholder="Confirm Your Password"/>
                            </div>
                            <button type="submit" class="btn btn-default">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end register popup -->
    </div>
</section>
