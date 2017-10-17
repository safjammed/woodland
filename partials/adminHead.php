<?php

/**
 * Created by PhpStorm.
 * User: safjammed
 * Date: 9/30/2017
 * Time: 10:11 PM
 */

include_once '../resource/session.php';
include_once '../resource/Database.php';
include_once '../resource/utilities.php';


if(isset($_SESSION['id']) && $_SESSION['role'] == '0'){
   //Do stuff
}else{
 header('location:../userlogin.php?ref=admin');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?=$page_title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="Admin panel for AryanDreamholidays">
    <meta name="author" content="ScriptLauncher">

    <!-- Base Css Files -->
    <link href="assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
    <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/libs/fontello/css/fontello.css" rel="stylesheet" />
    
    <link href="assets/libs/nifty-modal/css/component.css" rel="stylesheet" />
    <link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" />
    
    <link href="assets/libs/pace/pace.css" rel="stylesheet" />
    
    <link href="assets/libs/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
    
    <!-- Code Highlighter for Demo -->
    <link href="assets/libs/prettify/github.css" rel="stylesheet" />

    <!-- Extra CSS Libraries Start -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <!-- Extra CSS Libraries End -->
    <link href="assets/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- DATATABLES -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">


<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('.datatable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
} );
</script>



    <link rel="shortcut icon" href="assets/img/favicon.ico">    
    <!-- TinyMCE -->
    <!-- TINYMCE -->
    <link rel="stylesheet" type="text/css" href="//www.tinymce.com/css/codepen.min.css">
    <script type="text/javascript" src='assets/libs/tinymce/js/tinymce/tinymce.min.js'></script>
    <script type="text/javascript">
        tinymce.init({
          selector: 'textarea',
          height: 500,
          menubar: false,
          plugins: [
            'advlist autolink lists link charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code table'
          ],
          toolbar: 'undo redo table | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code'
          
        });
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.1/sweetalert2.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.1/sweetalert2.min.js"></script>
</head>
<body class="fixed-left">



<!-- Modal Start -->
<!-- Modal Task Progress -->
<div class="md-modal md-3d-flip-vertical" id="task-progress">
    <div class="md-content">
        <h3><strong>Task Progress</strong> Information</h3>
        <div>
            <p>CLEANING BUGS</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                    <span class="sr-only">80&#37; Complete</span>
                </div>
            </div>
            <p>POSTING SOME STUFF</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                    <span class="sr-only">65&#37; Complete</span>
                </div>
            </div>
            <p>BACKUP DATA FROM SERVER</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                    <span class="sr-only">95&#37; Complete</span>
                </div>
            </div>
            <p>RE-DESIGNING WEB APPLICATION</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="sr-only">100&#37; Complete</span>
                </div>
            </div>
            <p class="text-center">
                <button class="btn btn-danger btn-sm md-close">Close</button>
            </p>
        </div>
    </div>
</div>

<!-- Modal Logout -->
<div class="md-modal md-just-me" id="logout-modal">
    <div class="md-content">
        <h3><strong>Logout</strong> Confirmation</h3>
        <div>
            <p class="text-center">Are you sure want to logout from this system?</p>
            <p class="text-center">
                <button class="btn btn-danger md-close">Nope!</button>
                <a href="../logout.php" class="btn btn-success md-close">Yeah, I'm sure</a>
            </p>
        </div>
    </div>
</div>        <!-- Modal End -->
<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">
        <div class="topbar-left">
            <div class="logo">
                <h1 style="color:white"><b><?= $GLOBALS['sitename']?></b></h1>
            </div>
            <button class="button-menu-mobile open-left">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-collapse2">
                    <ul class="nav navbar-nav hidden-xs">
                        <li class="dropdown">
                            <a href="javascript:;" data-app="calc" data-status="inactive"><i class="fa fa-calculator"></i>Calculator</a>
                            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-th"></i></a> -->
                            <div class="dropdown-menu grid-dropdown">
                                <div class="row stacked">                                    
                                    <div class="col-xs-4">
                                        <a href="javascript:;" data-app="calc" data-status="inactive"><i class="fa fa-calculator"></i>Calculator</a>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                            </div>
                        </li>
                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right top-navbar">
                        
                        
                        
                        <li class="dropdown topbar-profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"></span> Jane <strong>Doe</strong> <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu">
                                <li>
<a href="#">My Profile</a></li>
                                <li>
<a href="#">Change Password</a></li>
                                <li>
<a href="#">Account Setting</a></li>
                                <li class="divider"></li>
                                <li>
<a href="#"><i class="icon-help-2"></i> Help</a></li>
                                <li>
<a href="lockscreen.html"><i class="icon-lock-1"></i> Lock me</a></li>
                                <li>
<a class="md-trigger" href="#" data-modal="logout-modal"><i class="icon-logout-1"></i> Logout</a></li>
                            </ul>
                        </li>
                        <li class="right-opener">
                            <a href="javascript:;" class="open-right"><i class="fa fa-angle-double-left"></i><i class="fa fa-angle-double-right"></i></a>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->
    <!-- Left Sidebar Start -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <div class="clearfix"></div>
            <!--- Profile -->
            <div class="profile-info">
                <br><br><br>
                <div class="col-xs-10">
                    <div class="profile-text">Welcome <b>Jane</b></div>
                    <div class="profile-buttons">                                                
                        <a class="md-trigger" href="#" data-modal="logout-modal" title="Sign Out"><i class="fa fa-power-off text-red-1"></i></a>
                    </div>
                </div>
            </div>
            <!--- Divider -->
            <div class="clearfix"></div>
            <hr class="divider" />
            <div class="clearfix"></div>
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>

                    <li class='has_sub'>
                        <a href='javascript:void(0);'>
                            <i class='icon-home-3'></i><span>Manage Places</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul>
                            <li>
                                <a href='places.php'><span>All Places</span></a></li><li>
                                <a href='places.php?add=1'><span>Add a New Place</span></a></li><li>                                
                            </li>
                        </ul>
                    </li>

                    <li class='has_sub'>
                        <a href='javascript:void(0);'>
                            <i class='icon-home-3'></i><span>Manage Cabins</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul>
                            <li>
                                <a href='cabin.php'><span>Manage All Cabins</span></a></li><li>
                                <a href='cabin.php?add=1'><span>Add a New Cabin</span></a>
                            </li>
                        </ul>
                    </li>                    
                    <li class='has_sub'>
                        <a href='javascript:void(0);'>
                            <i class='icon-home-3'></i><span>Price Management</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul>
                            <li>
                                <a href='prices.php'><span>Manage All</span></a></li><li>
                                <a href='prices.php?add=1'><span>New Price for a Cabin</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href='customers.php'>
                            <i class='icon-home-3'></i><span>Manage Accounts</span>
                        </a>                        
                    </li>
                    <li>
                        <a href='bookings.php'>
                            <i class='icon-home-3'></i><span>Manage Bookings</span>
                        </a>                        
                    </li>                   
                     <li>
                        <a href='#' class="md-trigger" href="#" data-modal="logout-modal" title="Sign Out" >
                            <i class='icon-logout'></i><span>Logout</span>
                        </a>                        
                    </li>
                </ul>                    
                <div class="clearfix"></div>
            </div>
                        
            <div class="clearfix"></div><br><br><br>
        </div>
        
    </div>
    <!-- Left Sidebar End -->
    <!-- Start right content -->
    <div class="content-page">
        <!-- ============================================================== -->
        <!-- Start Content here -->
        <!-- ============================================================== -->
        <div class="content">
            <!-- Start info box -->

            <!--THE CALCULATOR APP-->
            <div class="row">
                <div class="col-lg-4 col-md-6 portlets">
                    <div id="calc" class="widget darkblue-2">
                        <div class="widget-header">
                            <div class="additional-btn left-toolbar">
                                <div class="btn-group">
                                    <a class="additional-icon" id="dropdownMenu2" data-toggle="dropdown">
                                        Calculator <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
                                        <li><a href="#">Save</a></li>
                                        <li><a href="#">Export</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Quit</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="additional-btn">
                                <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>

                                <a href="#" class="widget-popout hidden tt" title="Pop Out/In"><i class="icon-publish"></i></a>
                                <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                            </div>
                        </div>
                        <div id="calculator" class="widget-content">
                            <div class="calc-top col-xs-12">
                                <div class="row">
                                    <div class="col-xs-3"><span class="calc-clean">C</span></div>
                                    <div class="col-xs-9"><div class="calc-screen"></div></div>
                                </div>
                            </div>

                            <div class="calc-keys col-xs-12">
                                <div class="row">
                                    <div class="col-xs-3"><span>7</span></div>
                                    <div class="col-xs-3"><span>8</span></div>
                                    <div class="col-xs-3"><span>9</span></div>
                                    <div class="col-xs-3"><span class="calc-operator">+</span></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3"><span>4</span></div>
                                    <div class="col-xs-3"><span>5</span></div>
                                    <div class="col-xs-3"><span>6</span></div>
                                    <div class="col-xs-3"><span class="calc-operator">-</span></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3"><span>1</span></div>
                                    <div class="col-xs-3"><span>2</span></div>
                                    <div class="col-xs-3"><span>3</span></div>
                                    <div class="col-xs-3"><span class="calc-operator">÷</span></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3"><span>0</span></div>
                                    <div class="col-xs-3"><span>.</span></div>
                                    <div class="col-xs-3"><span class="calc-eval">=</span></div>
                                    <div class="col-xs-3"><span class="calc-operator">x</span></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>