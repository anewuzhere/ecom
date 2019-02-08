<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/styles.css"/>
<!--NAVBAR -->
<nav class="navbar navbar-light" style="background-color: #e60000;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand"  
          src="<?php echo base_url('images/logo.png');?>"  
          href="<?= base_url().'item/index/'?>"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li class="dropdown">
          <a href="#" style="color:#ffffff;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Item Management <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= base_url().'item/index'?>">Manage Items</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            
            
          </ul>
        </li> 
        <li><a href="#" style="color:#ffffff;">About</a></li>
        
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
         <form class="navbar-form navbar-left">

<div class="form-group">
    <label class="col-md-4 control-label" for="logout"></label>
    <div class="col-md-8">
      <a href="<?= base_url().'user/index'?>" class="btn btn-danger" role="button"> Logout</a>
    </div>
  </div>
 </form>

          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
</nav>