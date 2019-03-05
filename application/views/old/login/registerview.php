<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Register - Travel Now Asia </title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'app-assets/css/pages/login-register.css';?>">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css';?>">
    <!-- END Custom CSS-->
  </head>
    <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page" background="<?php echo base_url().'app-assets/images/logo/loginbackground.jpg';?>">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-2 col-md-5 offset-xs-1 box-shadow-2 p-0">
		<div class="card border-grey border-lighten-3 px-2 py-2 m-0">
			<div class="card-header no-border">
				<div class="card-title text-xs-center">
					<img src="<?php echo base_url().'app-assets/images/logo/travelnowasialogo2.png';?>" alt="branding logo">
				</div>
				<h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Create Account</span></h6>
			</div>
			<div class="card-body collapse in">	
            <div class= "row"><?php if (validation_errors()): ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <h4>***ERROR MESSAGE</h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?= validation_errors() ?>
                                <?php endif ?></div>

				<div class="card-block">
					<form class="form-horizontal form-simple" action="<?= base_url().'Login/reg'?>" method="POST">
                        <div class="col-md-6">
						<fieldset class="form-group position-relative has-icon-left mb-1">
							<input type="text" class="form-control form-control-lg input-lg" name='first_name' placeholder="First Name" required>
							<div class="form-control-position">
							    <i class="icon-head"></i>
							</div>
                        </div>  
						</fieldset>
                        <fieldset class="form-group position-relative has-icon-left mb-1">
							<input type="text" class="form-control form-control-lg input-lg" name='middle_name' placeholder="Midlle Name">
							<div class="form-control-position">
							    <i class="icon-head"></i>
							</div>  
						</fieldset>
                        <div class="col-md-6"> 
                        <fieldset class="form-group position-relative has-icon-left mb-1">
							<input type="text" class="form-control form-control-lg input-lg" name='last_name' placeholder="Last Name"required>
							<div class="form-control-position">
							    <i class="icon-head"></i>
							</div>
                        </div>
						</fieldset>
                        <fieldset class="form-group position-relative has-icon-left mb-1">
							<input type="text" class="form-control form-control-lg input-lg" name='username' placeholder="User Name" required>
							<div class="form-control-position">
							    <i class="icon-head"></i>
							</div>
						</fieldset>
						<fieldset class="form-group position-relative has-icon-left mb-1">
							<input type="email" class="form-control form-control-lg input-lg" name='email_address' placeholder="Your Email Address" required>
							<div class="form-control-position">
							    <i class="icon-mail6"></i>
							</div>
						</fieldset>
                        
						<fieldset class="form-group position-relative has-icon-left mb-1">
							<input type="password" class="form-control form-control-lg input-lg" name='password' placeholder="Enter Password" required>
							<div class="form-control-position">
							    <i class="icon-key3"></i>
							</div>
						</fieldset>
                        <fieldset class="form-group position-relative has-icon-left mb-1">
							<input type="password" class="form-control form-control-lg input-lg" name='confirm_password' placeholder="Confirm Password" required>
							<div class="form-control-position">
							    <i class="icon-key3"></i>
							</div>
						</fieldset>
						<button type="submit" class="btn btn-secondary btn-lg btn-block"><i class="icon-unlock2"></i> Register</button>
					</form>
				</div>
				<p class="text-xs-center">Already have an account ? <a  href='<?= base_url()."Login/logon"?>' class="card-link">Login</a></p>
			</div>
		</div>
	</div>
</section>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url().'app-assets/js/core/libraries/jquery.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'app-assets/vendors/js/ui/tether.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'app-assets/js/core/libraries/bootstrap.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'app-assets/vendors/js/ui/unison.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'app-assets/vendors/js/ui/blockUI.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'app-assets/vendors/js/ui/jquery.matchHeight-min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'app-assets/vendors/js/ui/screenfull.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'app-assets/vendors/js/extensions/pace.min.js';?>" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="<?php echo base_url().'app-assets/js/core/app-menu.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'app-assets/js/core/app.js';?>" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>
</html>
