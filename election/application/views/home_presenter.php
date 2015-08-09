<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META SECTION -->
    <title>General Election-2015</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="<?php echo base_url('img/favicon.ico'); ?>" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('css/theme-default.css'); ?>"/>
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('css/custom.css'); ?>"/>
    <!-- EOF CSS INCLUDE -->
</head>
<body>
<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar">
        <!-- START X-NAVIGATION -->
        <ul class="x-navigation">
            <li class="xn-logo">
                <a href="index.html"><img src="<?php echo base_url('img/arttv.jpg'); ?>" alt="Admin"/></a>
            </li>
            <li class="xn-profile">
                <a href="#" class="profile-mini">
                    <img src="<?php echo base_url('assets/images/users/avatar.jpg'); ?>" alt="Admin "/>
                </a>
                <div class="profile">
                    <div class="profile-image">
                        <img src="<?php echo base_url('assets/images/users/avatar.jpg'); ?>" alt="Admin "/>
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name"><?php echo $username; ?></div>
                        <div class="profile-data-title">Administrator</div>
                    </div>
                    <div class="profile-controls">
                        <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                        <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                    </div>
                </div>
            </li>
            <li class="xn-title">View as:</li>

            <?php if ($type=='A'){ echo ("<li><a href='http://localhost/arttvelection2015/election/elect/get_admin_home'><span class='fa fa-desktop'></span>Admin</a></li>");} ?>
            <?php if ($type!='M'){ echo ("<li><a href='http://localhost/arttvelection2015/election/elect/get_presenter_home'><span class='fa fa-desktop'></span>Presenter</a></li>");} ?>
            <?php echo ("<li><a href='http://localhost/arttvelection2015/election/elect/get_mcr_home'><span class='fa fa-desktop'></span>MCR</a></li>"); ?>



        </ul>
        <!-- END X-NAVIGATION -->
    </div>
    <!-- END PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
            <!-- TOGGLE NAVIGATION -->
            <li class="xn-icon-button">
                <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
            </li>
            <!-- END TOGGLE NAVIGATION -->
            <!-- SEARCH -->
            <li class="xn-search">
                <form role="form">
                    <input type="text" name="search" placeholder="Search..."/>
                </form>
            </li>
            <!-- END SEARCH -->
            <!-- SIGN OUT -->
            <li class="xn-icon-button pull-right">
                <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
            </li>
            <!-- END SIGN OUT -->
            <!-- MESSAGES -->
            <li class="xn-icon-button pull-right">
                <a href="#"><span class="fa fa-comments"></span></a>
                <div class="informer informer-danger">4</div>
                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>
                        <div class="pull-right">
                            <span class="label label-danger">4 new</span>
                        </div>
                    </div>
                    <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-online"></div>
                            <img src="assets/images/users/user2.jpg" class="pull-left" alt="John Doe"/>
                            <span class="contacts-title">John Doe</span>
                            <p>Praesent placerat tellus id augue condimentum</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-away"></div>
                            <img src="assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>
                            <span class="contacts-title">Dmitry Ivaniuk</span>
                            <p>Donec risus sapien, sagittis et magna quis</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-away"></div>
                            <img src="assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali"/>
                            <span class="contacts-title">Nadia Ali</span>
                            <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-offline"></div>
                            <img src="assets/images/users/user6.jpg" class="pull-left" alt="Darth Vader"/>
                            <span class="contacts-title">Darth Vader</span>
                            <p>I want my money back!</p>
                        </a>
                    </div>
                    <div class="panel-footer text-center">
                        <a href="pages-messages.html">Show all messages</a>
                    </div>
                </div>
            </li>
            <!-- END MESSAGES -->
            <!-- TASKS -->
            <li class="xn-icon-button pull-right">
                <a href="#"><span class="fa fa-tasks"></span></a>
                <div class="informer informer-warning">3</div>
                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>
                        <div class="pull-right">
                            <span class="label label-warning">3 active</span>
                        </div>
                    </div>
                    <div class="panel-body list-group scroll" style="height: 200px;">
                        <a class="list-group-item" href="#">
                            <strong>Phasellus augue arcu, elementum</strong>
                            <div class="progress progress-small progress-striped active">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                            </div>
                            <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>
                        </a>
                        <a class="list-group-item" href="#">
                            <strong>Aenean ac cursus</strong>
                            <div class="progress progress-small progress-striped active">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                            </div>
                            <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>
                        </a>
                        <a class="list-group-item" href="#">
                            <strong>Lorem ipsum dolor</strong>
                            <div class="progress progress-small progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
                            </div>
                            <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>
                        </a>
                        <a class="list-group-item" href="#">
                            <strong>Cras suscipit ac quam at tincidunt.</strong>
                            <div class="progress progress-small">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                            </div>
                            <small class="text-muted">John Doe, 21 Sep 2014 /</small><small class="text-success"> Done</small>
                        </a>
                    </div>
                    <div class="panel-footer text-center">
                        <a href="pages-tasks.html">Show all tasks</a>
                    </div>
                </div>
            </li>
            <!-- END TASKS -->
        </ul>
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li class="active">Administrator Dashboard</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <!-- START WIDGETS -->
            <div class="row">
                <div class="col-md-3">

                    <!-- START WIDGET SLIDER -->
                    <div class="widget widget-default widget-carousel">
                        <div class="owl-carousel" id="owl-example">
                            <div>
                                <div class="widget-title">Total Visitors</div>
                                <div class="widget-subtitle">27/08/2014 15:23</div>
                                <div class="widget-int">3,548</div>
                            </div>
                            <div>
                                <div class="widget-title">Returned</div>
                                <div class="widget-subtitle">Visitors</div>
                                <div class="widget-int">1,695</div>
                            </div>
                            <div>
                                <div class="widget-title">New</div>
                                <div class="widget-subtitle">Visitors</div>
                                <div class="widget-int">1,977</div>
                            </div>
                        </div>
                        <div class="widget-controls">
                            <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                    <!-- END WIDGET SLIDER -->

                </div>
                <div class="col-md-3">

                    <!-- START WIDGET MESSAGES -->
                    <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                        <div class="widget-item-left">
                            <span class="fa fa-envelope"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count">48</div>
                            <div class="widget-title">Released Results</div>
                            <div class="widget-subtitle">184 Total</div>
                        </div>
                        <div class="widget-controls">
                            <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                    <!-- END WIDGET MESSAGES -->

                </div>
                <div class="col-md-3">

                    <!-- START WIDGET REGISTRED -->
                    <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                        <div class="widget-item-left">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count">3</div>
                            <div class="widget-title">Registred users</div>
                            <div class="widget-subtitle">On your website</div>
                        </div>
                        <div class="widget-controls">
                            <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                    <!-- END WIDGET REGISTRED -->

                </div>
                <div class="col-md-3">

                    <!-- START WIDGET CLOCK -->
                    <div class="widget widget-danger widget-padding-sm">
                        <div class="widget-big-int plugin-clock">00:00</div>
                        <div class="widget-subtitle plugin-date">Loading...</div>
                        <div class="widget-controls">
                            <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                        </div>

                    </div>
                    <!-- END WIDGET CLOCK -->

                </div>
            </div>
            <!-- END WIDGETS -->

            <div class="row">
                <div class="col-md-12">

                    <div id="admin_table">
                        <!-- START PROJECTS BLOCK -->
                        <div  class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title-box">
                                    <h3>Projects</h3>
                                    <span>Projects activity</span>
                                </div>
                                <ul class="panel-controls" style="margin-top: 2px;">
                                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-body panel-body-table">

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th width="10%">Number</th>
                                            <th width="60%">Name</th>
                                            <th width="10%"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><strong>01A</strong></td>
                                            <td><strong>Colombo North - Colombo</strong></td>
                                            <td><button type="button" class="btn btn-default">View</button></td>
                                        </tr>
                                        <tr>
                                            <td><strong>01B</strong></td>
                                            <td><strong>Colombo South - Colombo</strong></td>
                                            <td><button type="button" class="btn btn-default">View</button></td>
                                        </tr>
                                        <tr>
                                            <td><strong>02A</strong></td>
                                            <td><strong>Gampaha - Gampaha</strong></td>
                                            <td><button type="button" class="btn btn-default">View</button></td>
                                        </tr>
                                        <tr>
                                            <td><strong>02B</strong></td>
                                            <td><strong>Colombo North - Colombo</strong></td>
                                            <td><button type="button" class="btn btn-default">View</button></td>
                                        </tr>
                                        <tr>
                                            <td><strong>04P</strong></td>
                                            <td><strong>Colombo North - Colombo</strong></td>
                                            <td><button type="button" class="btn btn-default">View</button></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>


                    </div>


                </div>

            </div>

            <div class="row">

                <div class="col-md-4">

                    <!-- START USERS ACTIVITY BLOCK -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title-box">
                                <h3>Summary</h3>
                                <span>All island summery upto result</span>
                            </div>
                            <ul class="panel-controls" style="margin-top: 2px;">
                                <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-body padding-0">
                            <button type="button" class="btn btn-default">Generate</button>
                            <button type="button" class="btn btn-default">Add</button>
                            <button type="button" class="btn btn-default">View</button>
                        </div>
                    </div>
                    <!-- END USERS ACTIVITY BLOCK -->

                </div>
                <div class="col-md-4">

                    <!-- START VISITORS BLOCK -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title-box">
                                <h3>Connection</h3>
                                <span>Select the connection to the ftp server</span>
                            </div>
                            <ul class="panel-controls" style="margin-top: 2px;">
                                <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-body padding-0">
                            <button type="button" class="btn btn-default">View Connection</button></br>
                            <button type="button" class="btn btn-default">Add Connection</button></br>
                            <button type="button" class="btn btn-default">Refresh Connection</button>
                        </div>
                    </div>
                    <!-- END VISITORS BLOCK -->

                </div>
            </div>



        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>
                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="<?php echo site_url('home/logout') ?>" class="btn btn-success btn-lg">Yes</a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->

<!-- START PRELOADS -->
<audio id="audio-alert" src="<?php echo base_url('audio/alert.mp3'); ?>" preload="auto"></audio>
<audio id="audio-fail" src="<?php echo base_url('audio/fail.mp3'); ?>" preload="auto"></audio>
<!-- END PRELOADS -->

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="<?php echo base_url('js/plugins/jquery/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/plugins/jquery/jquery-ui.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/plugins/bootstrap/bootstrap.min.js'); ?>"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type='text/javascript' src="<?php echo base_url('js/plugins/icheck/icheck.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/plugins/scrolltotop/scrolltopcontrol.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('js/plugins/morris/raphael-min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/plugins/morris/morris.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/plugins/rickshaw/d3.v3.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/plugins/rickshaw/rickshaw.min.js'); ?>"></script>
<script type='text/javascript' src="<?php echo base_url('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script type='text/javascript' src="<?php echo base_url('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
<script type='text/javascript' src="<?php echo base_url('js/plugins/bootstrap/bootstrap-datepicker.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/plugins/owl/owl.carousel.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('js/plugins/moment.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- END THIS PAGE PLUGINS-->

<!-- START TEMPLATE -->
<script type="text/javascript" src="<?php echo base_url('js/settings.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('js/plugins.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/actions.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('js/demo_dashboard.js'); ?>"></script>
<!-- END TEMPLATE -->
<!-- END SCRIPTS -->
</body>
</html>






