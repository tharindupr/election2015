<!DOCTYPE html>
<html lang="en" >
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




    <script type="text/javascript" src="<?php echo base_url('js/plugins/jquery/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/plugins/jquery/jquery-ui.min.js'); ?>"></script>



    <script type="text/javascript">


        // Ajax post
        //$(document).ready(function() {
        setInterval(function() {


            //event.preventDefault();
            var user_name = "Hello";
            var password = "Lahiru";
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url('/result/get_presenter_view'); ?>",
                dataType: 'json',
                data: {name: user_name, pwd: password},
                success: function(res) {

                    //console.log("test1");
                    if (res)
                    {
                        // Show Entered Value

                        jQuery("div#presenter_view").html(res.username);
                        //jQuery("div#value_pwd").html(res.pwd);
                    }
                }
            });

            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url('/result/get_presenter_queue'); ?>",
                dataType: 'json',
                data: {name: user_name, pwd: password},
                success: function(res) {

                    //console.log("test1");
                    if (res)
                    {
                        // Show Entered Value

                        jQuery("div#presenter_queue").html(res.username);
                        jQuery("div#queue").html(res.pwd);
                    }
                }
            });

        }, 1000 );

        //});

    </script>

    <script type="text/javascript">


        function view_card(cardid){

            window.open("<?php echo base_url('viewcard/update/') ?>/"+ cardid);


        }

    </script>

</head>
<body>
<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar">
        <!-- START X-NAVIGATION -->
        <ul class="x-navigation">
            <li class="xn-logo">
                <a href="#"><img src="<?php echo base_url('img/arttv.jpg'); ?>" alt="Admin"/></a>
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
                        <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
                        <a href="#" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                    </div>
                </div>
            </li>
            <li class="xn-title">View as:</li>
            <?php if ($type=='A'){ echo ("<li><a href='".base_url('elect/get_admin_home')."'><span class='fa fa-desktop'></span>Admin</a></li>");} ?>
            <?php if ($type!='M'){ echo ("<li><a href='".base_url('elect/get_presenter_home')."'><span class='fa fa-desktop'></span>Presenter</a></li>");} ?>
            <?php if ($type!='P'){echo ("<li><a href='".base_url('elect/get_mcr_home')."'><span class='fa fa-desktop'></span>MCR</a></li>"); } ?>





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

            <!-- SIGN OUT -->
            <li class="xn-icon-button pull-right">
                <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
            </li>
            <!-- END SIGN OUT -->

        </ul>
        <!-- END X-NAVIGATION VERTICAL -->
        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <!-- START WIDGETS -->
            <div class="row">

                <div class="col-md-3">

                    <!-- START WIDGET SLIDER -->
                    <div class="widget widget-default widget-carousel">
                        <div class="owl-carousel" id="owl-example">
                            <div>
                                <div class="widget-title"></div>
                                <div class="widget-subtitle"></div>
                                <div class="widget-int">ART TELEVISION</div>
                            </div>
                            <div>
                                <div class="widget-title"></div>
                                <div class="widget-subtitle"></div>
                                <div class="widget-int">General ELECTION</div>
                            </div>
                            <div>
                                <div class="widget-title"></div>
                                <div class="widget-subtitle"></div>
                                <div class="widget-int">2015</div>
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
                    <div class="widget widget-default widget-item-icon" onclick="location.href='#';">
                        <div class="widget-item-left">
                            <span class="fa fa-envelope"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count" id="queue"></div>
                            <div class="widget-title">Results Queue</div>
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
                    <div class="widget widget-default widget-item-icon" onclick="location.href='#';">
                        <div class="widget-item-left">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count">PRES</div>
                            <div class="widget-title">Registred user</div>
                            <div class="widget-subtitle">Election 2015</div>
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
            <br>
            <br>


            <div class="row">
                <div id="content">
                    <div class="col-md-6">
                        <div id="presenter_table_panel">

                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default" >
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Queue</h3>
                                        <span>Added Cards for Presenter and MCR</span>
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

                                    <div class="table-responsive" id="presenter_queue">

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- END PROJECTS BLOCK -->

                    </div>
                    <div class="col-md-6">
                        <div id="presenter_table_panel">

                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default" >
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Viewed</h3>
                                        <span>Viewed Cards by Presenter</span>
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

                                    <div class="table-responsive" id="presenter_view">

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- END PROJECTS BLOCK -->

                    </div>
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
<!-- <script type="text/javascript" src="<?php echo base_url('js/settings.js'); ?>"></script> -->

<script type="text/javascript" src="<?php echo base_url('js/plugins.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/actions.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('js/demo_dashboard.js'); ?>"></script>
<!-- END TEMPLATE -->
<script type="text/javascript" src="<?php echo base_url('js/angular.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/angular.min.js'); ?>"></script>


<!-- END SCRIPTS -->

</body>
</html>






