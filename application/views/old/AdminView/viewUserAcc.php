  <section id="global-settings" class="card">
    <div class="card-header">
        <h4 class="card-title">Account List</h4>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body collapse in">
        <div class="card-block">
            <div class="card-text">
 <div class="card">
	            <div class="card-header" style="background-color:#FE5722; border-color:#FE5722">
	               <center> <h4 class="card-title" style="color:white;">USER DETAILS</h4></center>
	                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
                        <a href="<?= base_url() . 'AdminController/editAcc/' . $u->account_id ?>">Edit Profile</a>
	                </div>
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block">

						

                    <form method="post">
	                    	<div class="form-body">
	                    		<h4 class="form-section"><i class="icon-eye6"></i> About User</h4>
	                    		<div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group"><br><br>
                              <img src="<?= base_url() . 'images/' . $u->picpath ?>" width = "200" height="200" alt="..." class="img-thumbnail">
                                        
				                        </div>
			                        </div>
                              <br>


			                        <div class="col-md-6">
				                        <div class="form-group">
                                        Full Name
				                        	<label for="userinput2" class="sr-only">Full name</label>
                                            <?php $fname = $u->firstname.' '.$u->middlename.' '.$u->lastname?>
				                            <output value="<?= $fname ?>"id="name" name="firstname" type="text" placeholder="Name" class="form-control input-md">                              
                                <?= form_error('name', '<span class="label label-danger">', '</span>') ?><?= $fname ?>
				                        </div>
                                <div class="form-group">
				                        	<label for="userinput3" class="sr-only">Username</label>
                                            <output value="<?= $u->username ?>"id="username" name="username" type="text" placeholder="Username" class="form-control input-md">                              
                                <?= form_error('name', '<span class="label label-danger">', '</span>') ?><?=$u->username ?>
				                        </div>

                                <div class="form-group">
				                        <label for="userinput3" class="sr-only">Access Level</label>
                                            <OUTPUT value="<?= $u->access_lvl ?>"id="Access_lvl" name="Access_lvl" type="text" placeholder="Access_lvl" class="form-control input-md">                              
                                <?= form_error('name', '<span class="label label-danger">', '</span>') ?><?= $u->access_lvl ?>
                                        
                                     </select><br>
                                     &nbsp; &nbsp;
				                        </div>
			                        </div>
		                        </div>
                            <h4 class="form-section"><i class="icon-mail6"></i> Contact Info  </h4>
                            <div class="col-md-6">
                            <div class="form-group">
                            Email Address : 
                            <label for="userinput5" class="sr-only">Email</label>
                              <output value="<?= $u->email ?>"id="email" name="email" type="text" placeholder="Email" class="form-control input-md">                              
                              <?= form_error('name', '<span class="label label-danger">', '</span>') ?> <?= $u->email ?>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                            House Address :
                            <label for="userinput5" class="sr-only">Address</label>
                              <output value="<?= $u->address ?>"id="address" name="address" type="text" placeholder="address" class="form-control input-md">                              
                              <?= form_error('name', '<span class="label label-danger">', '</span>') ?> <?= $u->address ?>
                            </div>
                            </div>
                            <div class="col-md-6">
                            Mobile Number : 
                            <div class="input-group">
                            <label for="userinput5" class="sr-only">Mobile Number</label>
                                <span class="input-group-addon">+63</span>
                              <output value="<?= $u->mobileno ?>"id="mobileno" name="mobileno" type="text" placeholder="mobileno" class="form-control input-md">                              
                              <?= form_error('name', '<span class="label label-danger">', '</span>') ?> <?= $u->mobileno ?>
                            </div>
                            </div>
   
                    

</div>
<center><td><a href="<?= base_url() . 'AdminController/users/'?>" class="btn btn-warning">BACK</i></a><td></center>

				                        </div>
            </div>
        </div>
    </div>
</section>
