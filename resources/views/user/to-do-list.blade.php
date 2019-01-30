@extends('layouts.main')

@section('title')
    {{ __('To Do List') }}
@endsection

@section('page-name')
{{ __('To Do List') }}
@endsection

@section('main-content')
    <!-- to do list -->
    <section id="to-do-list" class="to-do-list-main-block">
        <div class="container">
            <ul class="to-do-list-tabs general-nav-tabs tabs">
                <li><a href="vendor-dashboard.html" class="btn btn-default"><span class="badge">Dashboard</span></a></li>
                <li><a href="vendor-profile.html" class="btn btn-default"><span class="badge">Profile</span></a></li>
                <li><a href="#" class="active btn btn-default"><span class="badge">To Do List</span></a></li>
                <li><a href="budget-planner.html" class="btn btn-default"><span class="badge">My Budget</span></a></li>
                <li><a href="#" class="btn btn-default"><span class="badge">My Wishlist</span></a></li>
                <li><a href="real-wedding-listing.html" class="btn btn-default"><span class="badge">Real Wedding</span></a></li>
            </ul>
            <div class="to-do-list-block">
                <div class="row">
                    <div class="col-md-5">
                        <div class="create-task-block">
                            <h4 class="create-task-heading">Create New Task</h4>
                            <div class="form-group">
                                <form id="create-task-form" action="#">
                                    <label for="task-title">Task Title</label>
                                    <input type="text" class="form-control" id="task-title"/>
                                    <label for="task-date">Task Date</label>
                                    <input type="text" class="form-control" id="task-date"/>
                                    <label for="task-dis">Task Description</label>
                                    <textarea class="form-control" id="task-description"></textarea>
                                    <button type="submit" class="btn btn-pink">Save Task</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="to-do-list">
                            <div class="panel-group faq-panel" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title to-do-list-heading">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            January 2017
                                            <span class="faq-btn faq-btn-plus hidden-xs"><i class="fa fa-angle-double-down" aria-hidden="true"></i></span>
                                            <span class="faq-btn faq-btn-minus hidden-xs"><i class="fa fa-angle-double-up" aria-hidden="true"></i></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body to-do-list-dtl">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h4 class="to-do-list-dtl-heading">Exce pteur sint occaecat cupid</h4>
                                                    <div class="date">January 12, 2017</div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="to-do-list-action-tabs">
                                                    <a href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title to-do-list-heading">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        March 2017
                                        <span class="faq-btn faq-btn-plus hidden-xs"><i class="fa fa-angle-double-down" aria-hidden="true"></i></span>
                                        <span class="faq-btn faq-btn-minus hidden-xs"><i class="fa fa-angle-double-up" aria-hidden="true"></i></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body to-do-list-dtl">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h4 class="to-do-list-dtl-heading">Exce pteur sint occaecat cupid</h4>
                                                <div class="date">January 12, 2017</div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="to-do-list-action-tabs">
                                                <a href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title to-do-list-heading">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                        April 2017
                                        <span class="faq-btn faq-btn-plus hidden-xs"><i class="fa fa-angle-double-down" aria-hidden="true"></i></span>
                                        <span class="faq-btn faq-btn-minus hidden-xs"><i class="fa fa-angle-double-up" aria-hidden="true"></i></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body to-do-list-dtl">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h4 class="to-do-list-dtl-heading">Exce pteur sint occaecat cupid</h4>
                                                <div class="date">January 12, 2017</div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="to-do-list-action-tabs">
                                                <a href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingFour">
                                        <h4 class="panel-title to-do-list-heading">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                            May 2017
                                            <span class="faq-btn faq-btn-plus hidden-xs"><i class="fa fa-angle-double-down" aria-hidden="true"></i></span>
                                            <span class="faq-btn faq-btn-minus hidden-xs"><i class="fa fa-angle-double-up" aria-hidden="true"></i></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                        <div class="panel-body to-do-list-dtl">
                                            <div class="row">
                                            <div class="col-xs-8">
                                                <h4 class="to-do-list-dtl-heading">Exce pteur sint occaecat cupid</h4>
                                                <div class="date">January 12, 2017</div>
                                            </div>
                                                <div class="col-xs-4">
                                                    <div class="to-do-list-action-tabs">
                                                        <a href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                        <a href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                        <a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end to do list -->
@endsection
