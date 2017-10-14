<?php 
include_once 'resource/session.php';
    include_once 'resource/Database.php';
    
    include_once 'resource/utilities.php';
 ?>

 <!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $page_title;?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <!-- MASTER SLIDER -->
    <link rel="stylesheet" href="assets/css/masterslider.main.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <!--<link rel="stylesheet" href="css/main.css"> -->
    <!-- MATERIALIZE CSS -->
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
    <script type="text/javascript" src="http://openexchangerates.github.io/money.js/money.min.js"></script>
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.1/sweetalert2.min.css" />
    

    <!-- CUSTOM STYLES -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Add your site or application content here -->
    <!-- Navbar and Header -->
    <input type="hidden" id="usrId" name="user_id" value="<?= (isset($_SESSION['id'])) ? $_SESSION['id'] : ''; ?>">
    <div class="navbar-fixed ">
        <nav class="grey darken-4 nav-extended">
            <div class="divider"></div>
            <div class="nav-wrapper container">
                <a href="#" class="brand-logo">WoodLand Away</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php">Home</a></li>                    
                    <li><a class="dropdown-button" href="#!" data-activates="dropdownCabins" data-belowOrigin="true" data-constrainWidth="false">Find a Cabin<i class="material-icons right">arrow_drop_down</i></a></li>                   
                    <li><a class="dropdown-button" href="forum/">Community Forum</a></li>                    
                     <?php if((isset($_SESSION['id']) || isCookieValid($db))): ?>
                      <li><a class='dropdown-button' href='#!' data-activates='feature-dropdown' data-belowOrigin="true" data-constrainWidth="false">My Account<i class="material-icons bt">arrow_drop_down</i></a></li>
                      <?php else:?>
                        <li><a href="userlogin.php" class="btn purple">Login</a></li>
                      <?php endif ?>
                      <li>
                        <div class="row">
                            <label for="currency">: Currency</label>
                            <select id="currency" class="currency col s4">
                              <option value="GBP">GBP</option>
                              <option value="EUR">EUR</option>
                              <option value="USD" selected>USD</option>
                            </select>                            
                        </div>
                            
                        
                    </li>
                </ul>
                
                <ul id="dropdownCabins" class="dropdown-content">
                    <li><a href="cabins.php?type=1">Luxuxry Cabins</a></li>
                    <li><a href="cabins.php?type=2">Contemporary Cabins</a></li>
                    <li><a href="cabins.php?type=3">Original Cabins</a></li>
                    <li class="divider"></li>
                    <li><a href="cabins.php">All</a></li>
                </ul>                
                <ul id='feature-dropdown' class='dropdown-content'>
                  <li><a href="profile.php">Access Forum</a></li>
                  <li><a href="profile.php?settings=1">Profile Settings</a></li>
                  <li class="divider"></li>
                  <li><a href="logout.php">Logout</a></li>          
                </ul>
            </div>
        </nav>
    </div>
    
