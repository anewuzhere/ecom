<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Bluelagoon</title>


    
    <link href="<?php echo base_url().'app-assets/css/bootstrap.min.css';?>" rel="stylesheet">



    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url().'app-assets/images/ico/apple-icon-60.png';?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url().'app-assets/images/ico/apple-icon-76.png';?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url().'app-assets/images/ico/apple-icon-120.png';?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url().'app-assets/images/ico/apple-icon-152.png';?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url().'app-assets/images/ico/favicon.ico';?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url().'app-assets/images/ico/favicon-32.png';?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'app-assets/css/bootstrap.css';?>">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'app-assets/fonts/icomoon.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'app-assets/fonts/flag-icon-css/css/flag-icon.min.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'app-assets/vendors/css/extensions/pace.css';?>">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'app-assets/css/bootstrap-extended.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'app-assets/css/app.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'app-assets/css/colors.css';?>">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'app-assets/css/core/menu/menu-types/vertical-menu.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'app-assets/css/core/menu/menu-types/vertical-overlay-menu.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'app-assets/css/core/colors/palette-gradient.css';?>">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <link href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet">
     <script src="<?=base_url()?>assets/js/canvasjs.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    
     <script src="<?=base_url()?>assets/plugins/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea',width:600,height:200 });</script>
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css';?>">
    <!-- END Custom CSS-->
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item"><a href="index.html" class="navbar-brand nav-link"></a></li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">
    
            
              
              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"> <i></i></span><span class="user-name"><?=$this->session->last_name?>, <?=$this->session->first_name?></span></a>
                <div class="dropdown-menu dropdown-menu-right"><a href="<?= base_url() . "AdminController/editUser/" ?>" class="dropdown-item"><i class="icon-head"></i> Edit Profile</a><a href="<?= base_url() . "AdminController/backup_db" ?>" class="dropdown-item"><i class="icon-mail6"></i>Back up Database</a><a href="<?= base_url() . "AdminController/userlog" ?>" class="dropdown-item"><i class="icon-clipboard2"></i> User Logs</a><a href="#" class="dropdown-item"><i class="icon-calendar5"></i> Calender</a>
                  <div class="dropdown-divider"></div><a href=<?php echo base_url().'AdminController/logout'?> class="dropdown-item"><i class="icon-power3"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->

      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                    <li class="nav-item"><a href=<?php echo base_url().'AdminController/index'?>><i class="icon-home3"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Dashboard</span></a>
            </li>
               <li class=" nav-item"><a href="index.html"><i class="icon-user"></i><span data-i18n="nav.dash.main" class="menu-title">User Management</span></a>
            <ul class="menu-content">
              <li><a href=<?php echo base_url().'AdminController/users'?> data-i18n="nav.dash.main" class="menu-item">View User</a>
              </li>
              <li><a href=<?php echo base_url().'AdminController/register'?> data-i18n="nav.dash.main" class="menu-item">Add User </a>
              </li>
            </ul>
          </li>
           <li class=" nav-item"><a href="index.html"><i class="icon-address-book"></i><span data-i18n="nav.dash.main" class="menu-title">Customer Management</span></a>
            <ul class="menu-content">
              <li><a href=<?php echo base_url().'AdminController/client'?> data-i18n="nav.dash.main" class="menu-item">View Customer</a>
              </li>
              </ul>
          </li>
          
      
          
          <li class=" nav-item"><a href="index.html"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Service Management</span></a>
            <ul class="menu-content">
              <li><a href=<?php echo base_url().'AdminController/packagelist'?> data-i18n="nav.dash.main" class="menu-item">Tour Package</a>
              </li>
              </ul>
          </li>
         
             <li class=" nav-item"><a href="index.html"><i class="icon-paper"></i><span data-i18n="nav.dash.main" class="menu-title">Booking Reports</span></a>
            <ul class="menu-content">
              <li><a href=<?php echo base_url().'AdminController/transactionlist'?> data-i18n="nav.dash.main" class="menu-item">Transactions</a>
              </li>
              <li><a href=<?php echo base_url().'AdminController/transactionalllist'?> data-i18n="nav.dash.main" class="menu-item">Booking List</a>
              </li>
               <li><a href=<?php echo base_url().'AdminController/feedbacklist'?> data-i18n="nav.dash.main" class="menu-item">Feedback reports</a>
              </li>
              
            </ul>
          </li>
         
          <li class=" nav-item"><a href="index.html"><i class="icon-area-chart"></i><span data-i18n="nav.dash.main" class="menu-title">Sale Forecasting</span></a>
            <ul class="menu-content">
            <li class="nav-item"><a href=<?php echo base_url().'AdminController/addSales'?>><i class="icon-money"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Add Payments</span></a>
              </li>
          <li class="nav-item"><a href=<?php echo base_url().'AdminController/forcasting/2018'?>><i class="icon-area-chart"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Sales Forcasting</span></a>
            </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="index.html"><i class="icon-opacity"></i><span data-i18n="nav.dash.main" class="menu-title">Aqua Pogi Inventory</span></a>
            <ul class="menu-content">
          <li class="nav-item"><a href=<?php echo base_url().'AdminController/addAquaSales'?>><i class="icon-opacity"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Aqua sales</span></a>
              </li>
          <li class="nav-item"><a href=<?php echo base_url().'AdminController/addcredit'?>><i class="icon-opacity"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Credit List</span></a>
              </li>
              </li>
            </ul>
        </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row"> <h2><?=$title?></h2>
        </div>
        <div class="content-body"><!-- stats -->
      


  
         
    <!-- ////////////////////////////////////////////////////////////////////////////-->
