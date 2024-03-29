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
        var user_name = "Username";
        var password = "Password";

        setInterval(function() {

                //event.preventDefault();

            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url('/result/get_votes'); ?>",
                dataType: 'json',
                data: {name: user_name, pwd: password},
                success: function(res) {

                    //console.log("test1");
                    if (res)
                    {
                        // Show Entered Value

                        jQuery("div#value").html(res.username);
                        //jQuery("div#value_pwd").html(res.pwd);
                    }
                }
            });

            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url('/result/get_district'); ?>",
                dataType: 'json',
                data: {name: user_name, pwd: password},
                success: function(res) {

                    //console.log("test1");
                    if (res)
                    {
                        // Show Entered Value
                        //alert("Your bookmark has been saved");

                        jQuery("div#district_table").html(res.username);
                        //jQuery("div#value_pwd").html(res.pwd);
                    }
                }
            });

            /*

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
                        //jQuery("div#value_pwd").html(res.pwd);
                    }
                }
            });

            */

            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url('/result/get_all_island'); ?>",
                dataType: 'json',
                data: {name: user_name, pwd: password},
                success: function(res) {

                    //console.log("testallisland");
                    if (res)
                    {
                        // Show Entered Value

                        jQuery("div#island_summary").html(res.username);
                        //jQuery("div#value_pwd").html(res.pwd);
                    }
                }
            });

            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url('/result/national_seats'); ?>",
                dataType: 'json',
                data: {name: user_name, pwd: password},
                success: function(res) {

                    //console.log("testallisland");
                    if (res)
                    {
                        // Show Entered Value

                        jQuery("div#island_seats").html(res.username);
                        //jQuery("div#value_pwd").html(res.pwd);
                    }
                }
            });

            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url('/result/composition'); ?>",
                dataType: 'json',
                data: {name: user_name, pwd: password},
                success: function(res) {

                    //console.log("testallisland");
                    if (res)
                    {
                        // Show Entered Value

                        jQuery("div#composition").html(res.username);
                        //jQuery("div#value_pwd").html(res.pwd);
                    }
                }
            });

            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url('/result/admin_queue'); ?>",
                dataType: 'json',
                data: {name: user_name, pwd: password},
                success: function(res) {

                    //console.log("testallisland");
                    if (res)
                    {
                        // Show Entered Value
                        jQuery("div#votes_queue").html(res.votes);
                        jQuery("div#district_queue").html(res.district);
                        jQuery("div#all_island_queue").html(res.summary);
                        jQuery("div#national_seats_queue").html(res.seats);
                        jQuery("div#composition_queue").html(res.composition);
                    }
                }
            });

        }, 5000 );

        //});


    </script>

    <script type="text/javascript">


        function view_card(cardid){

            window.open("<?php echo base_url('viewcard/update/') ?>/"+ cardid);


        }

        function summary_generate(){

            location.href = "<?php echo base_url('summary_controller/generate') ?>";
        }

        function summary_add(){

            //var user_n = $(this).val();
            var type = 'summary';
            jQuery.ajax({
                type: 'POST',
                url: "<?php echo base_url('/result/add_to_view'); ?>",
                dataType: 'json',
                data: {type: type},
                success: function(res) {


                    if (res)
                    {
                        alert('Your Added To Presenter and MCR');
                    }
                }
            });


        }

        function summary_view(){

            window.open("<?php echo base_url('summary_controller/index') ?>");
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
            <?php echo ("<li><a href='".base_url('elect/get_mcr_home')."'><span class='fa fa-desktop'></span>MCR</a></li>"); ?>






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
            <!--
            <li class="xn-search">
                <form role="form">
                    <input type="text" name="search" placeholder="Search..."/>
                </form>
            </li>

            -->
            <!-- SIGN OUT -->
            <li class="xn-icon-button pull-right">
                <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
            </li>
            <!-- END SIGN OUT -->
            <!--
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
            <!-- TASKS 
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
        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <!-- START WIDGETS -->
            <div class="row">
                <div class="col-md-3">

                    <!-- START WIDGET MESSAGES -->
                    <!--<div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">-->
                    <div class="widget widget-default widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-envelope"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count" id="votes_queue"></div>
                            <div class="widget-title">Votes Results</div>
                            <div class="widget-subtitle">Results in queue</div>
                        </div>
                        <div class="widget-controls">
                            <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                    <!-- END WIDGET MESSAGES -->

                </div>
                <div class="col-md-3">

                    <!-- START WIDGET MESSAGES -->
                    <div class="widget widget-default widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-envelope"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count" id="district_queue"></div>
                            <div class="widget-title">District Results</div>
                            <div class="widget-subtitle">Results in queue</div>
                        </div>
                        <div class="widget-controls">
                            <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                    <!-- END WIDGET MESSAGES -->

                </div>
                <div class="col-md-3">

                    <!-- START WIDGET SLIDER -->
                    <div class="widget widget-default widget-carousel">
                        <div class="owl-carousel" id="owl-example">
                            <div>
                                <div class="widget-title">Summary</div>
                                <div class="widget-subtitle">All Island</div>
                                <div class="widget-int" id="all_island_queue"></div>
                            </div>
                            <div>
                                <div class="widget-title">Seats</div>
                                <div class="widget-subtitle">National Basis</div>
                                <div class="widget-int" id="national_seats_queue"></div>
                            </div>
                            <div>
                                <div class="widget-title">Composition</div>
                                <div class="widget-subtitle">of parliment</div>
                                <div class="widget-int" id="composition_queue"></div>
                            </div>
                        </div>
                        <div class="widget-controls">
                            <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                    <!-- END WIDGET SLIDER -->

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
                    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
                        <!-- <li><a href="#presenter" data-toggle="tab">Presenter</a></li> -->
                        <li><a href="#summary" data-toggle="tab">Summary</a></li>
                        <!-- <li><a href="#user" data-toggle="tab">User</a></li>
                        <li><a href="#polling_division" data-toggle="tab">Polling Division</a></li> -->

                    </ul>
                    <br>
                    <div id="my-tab-content" class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="col-md-6">

                                <div id="votes_table_panel">
                                    <!-- START PROJECTS BLOCK -->
                                    <div  class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="panel-title-box">
                                                <h3>Votes</h3>
                                                <span>Polling Divisions and Postal Results</span>
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

                                            <div class="table-responsive" id="value">
                                            </div>

                                        </div>

                                    </div>

                                    <!-- END PROJECTS BLOCK -->

                                </div>


                            </div>
                            <div >
                            <div class="col-md-6">
                                <div id="district_table_panel">

                                    <!-- START PROJECTS BLOCK -->
                                    <div class="panel panel-default" >
                                        <div class="panel-heading">
                                            <div class="panel-title-box">
                                                <h3>District Results</h3>
                                                <span>Released District Results</span>
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

                                            <div class="table-responsive" id="district_table">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- END PROJECTS BLOCK -->

                            </div>
                            </div>
                            <div >
                                <div class="col-md-6">
                                    <div id="island_seats_table_panel">

                                        <!-- START PROJECTS BLOCK -->
                                        <div class="panel panel-default" >
                                            <div class="panel-heading">
                                                <div class="panel-title-box">
                                                    <h3>All Island National Basis Seats</h3>
                                                    <span>All Island National Basis Seats Result</span>
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

                                                <div class="table-responsive" id="island_seats">

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PROJECTS BLOCK -->

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div id="island_summary_table_panel">

                                    <!-- START PROJECTS BLOCK -->
                                    <div class="panel panel-default" >
                                        <div class="panel-heading">
                                            <div class="panel-title-box">
                                                <h3>All Island Summary</h3>
                                                <span>All Island Summary Result</span>
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

                                            <div class="table-responsive" id="island_summary">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- END PROJECTS BLOCK -->

                            </div>

                            <div class="col-md-6">
                                <div id="composition_table_panel">

                                    <!-- START PROJECTS BLOCK -->
                                    <div class="panel panel-default" >
                                        <div class="panel-heading">
                                            <div class="panel-title-box">
                                                <h3>Composition of the Parliment</h3>
                                                <span>Composition of the Parliment Result</span>
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

                                            <div class="table-responsive" id="composition">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- END PROJECTS BLOCK -->

                            </div>
                        </div>

                        <!--
                        <div class="tab-pane" id="presenter">
                            <div class="col-md-6">
                                <div id="presenter_table_panel">


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


                            </div>
                            <div class="col-md-6">
                                <div id="presenter_table_panel">


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


                            </div>
                        </div>
                        -->

                        <!--

                        <div class="tab-pane" id="user">
                            <h1>Add new User</h1>

                        </div>

                        -->

                        <!--
                        <div class="tab-pane" id="polling_division">
                            <h1>Add new polling division</h1>

                            <div class="row">
                                <form>
                                    <div class="col-lg-6">
                                        <label >Code</label>
                                        <input type="text" class="form-control" name="code" id="code" placeholder="Enter Code" required>
                                        <label >Polling Division Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
                                        <label >District</label>
                                        <input type="text" class="form-control" name="district" id="district" placeholder="Enter District" required>
                                        <br>
                                        <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
                                    </div>
                                </form>
                            </div>


                        </div>

                        -->
                        <div class="tab-pane" id="summary">
                            <h1>Generate Summary</h1>

                            <div class="row">

                                <div class="col-md-6">
                                    <div id="district_table_panel">

                                        <!-- START PROJECTS BLOCK -->
                                        <div class="panel panel-default" >
                                            <div class="panel-heading">
                                                <div class="panel-title-box">
                                                    <h3>Summary</h3>
                                                    <span>All island summary upto released results</span>
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
                                                    <table class='table table-striped'>
                                                        <thead>
                                                        <tr >
                                                            <th width='50%'>Description</th>
                                                            <th width='50%'></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td><strong>Genrate Summary</strong></td>
                                                            <td><button type="button" class="btn btn-default" onclick="summary_generate()" >Generate</button></td>
                                                            <!-- <td><button type='button' class='btn btn-default' value='".$row->code."'><a href='".base_url('viewcard/update')."/".$row->code."'  target='_blank'>View</a></button></td> -->
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Add to Presenter View</strong></td>
                                                            <td><button type="button" class="btn btn-default" onclick="summary_add()">Add</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>View Generated Summary</strong></td>
                                                            <td><button type="button" class="btn btn-default" onclick="summary_view()">View</button></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PROJECTS BLOCK -->

                                </div>


                                <!--
                                <div class="col-md-4">


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


                                </div>

                                -->
                            </div>

                        </div>
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
<!--<script type="text/javascript" src="<?php echo base_url('js/settings.js'); ?>"></script>-->

<script type="text/javascript" src="<?php echo base_url('js/plugins.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/actions.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('js/demo_dashboard.js'); ?>"></script>
<!-- END TEMPLATE -->
<script type="text/javascript" src="<?php echo base_url('js/angular.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/angular.min.js'); ?>"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#tabs').tab();
    });
</script>

<!-- END SCRIPTS -->

</body>
</html>






