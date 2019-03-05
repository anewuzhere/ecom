<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Bluelagoon- Online Booking System</title>


    
    <link href="<?php echo base_url().'app-assets/css/bootstrap.min.css';?>" rel="stylesheet">




    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url().'app-assets/images/ico/blue.jpg';?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url().'app-assets/images/ico/blue.jpg';?>">
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
    <script src="<?php echo base_url().'assets/js/jquery-1.11.1.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    
    <link href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet">
    
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
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  fixed-navbar">

    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
              <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a href="index.html" class="navbar-brand nav-link"><img alt="branding logo" src="<?php echo base_url().'app-assets/images/logo/blue.jpg';?>" height="40"data-expand="<?php echo base_url().'app-assets/images/logo/blue.jpg';?>" data-collapse="<?php echo base_url().'app-assets/images/logo/logo.png';?>" class="brand-logo"></a></li>
              <li class="nav-item hidden-sm-down"><a href="<?= base_url() . "UserController/landing" ?>"  class="btn btn-secondary upgrade-to-pro">Home Page</a></li>
              <li class="nav-item hidden-sm-down"><a href="<?= base_url() . "UserController/myTransactions" ?>"  class="btn btn-secondary btn-hover upgrade-to-pro">My Transactions</a></li>
              <li class="nav-item hidden-sm-down"><a href="<?= base_url() . "UserController/index" ?>"  class="btn btn-secondary btn-hover upgrade-to-pro">Customize Tour</a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">
              
              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"> <i></i></span><span class="user-name"><?=$this->session->last_name?>, <?=$this->session->first_name?></span></a>
                <div class="dropdown-menu dropdown-menu-right"><a href="<?= base_url() . "UserController/editUser/".$this->session->id ?>" class="dropdown-item"><i class="icon-head"></i> Edit Profile</a><a href="<?= base_url() . "UserController/pastTransaction/".$this->session->id ?>" class="dropdown-item"><i class="icon-mail6"></i> Previous Transactions</a><a href="#" class="dropdown-item"><i class="icon-clipboard2"></i> Task</a><a href="#" class="dropdown-item"><i class="icon-calendar5"></i> Calender</a>
                  <div class="dropdown-divider"></div><a href=<?php echo base_url().'UserController/logout'?> class="dropdown-item"><i class="icon-power3"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title"><?=$title?></h2>
          </div>
        <!--   <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Page Layouts</a>
                </li>
                <li class="breadcrumb-item active">1 Column
                </li>
              </ol>
            </div>
          </div> -->
          
        </div>  
        <div class="content-body">
        
  

