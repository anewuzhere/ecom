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
             <a href="<?= base_url() . 'AdminController/deleteUser/' . $u->account_id ?>">Delete Account</a>
	                </div>
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block">

						

                    <form class="form" name="myform" method="POST" action="<?= base_url().'AdminController/do_editAcc/'?>">
	                    	<div class="form-body">
                             <?= form_hidden('id', $u->account_id); ?>  
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
				                        	<label for="userinput2" class="sr-only">First name</label>
				                            <input value="<?= $u->firstname ?>"id="name" name="first_name" type="text" placeholder="Name" class="form-control input-md">                              
                                <?= form_error('name', '<span class="label label-danger">', '</span>') ?>
				                        </div>
                                         <div class="form-group">
                                        Middle Name
				                        	<label for="userinput2" class="sr-only">Middle name</label>
				                            <input value="<?= $u->middlename ?>"id="name" name="middle_name" type="text" placeholder="Name" class="form-control input-md">                              
                                <?= form_error('name', '<span class="label label-danger">', '</span>') ?>
				                        </div>
                                         <div class="form-group">
                                        Last Name
				                        	<label for="userinput2" class="sr-only">Last name</label>
				                            <input value="<?= $u->lastname ?>"id="name" name="last_name" type="text" placeholder="Name" class="form-control input-md">                              
                                <?= form_error('name', '<span class="label label-danger">', '</span>') ?>
				                        </div>
                                <div class="form-group">
                                        User name
				                        	<label for="userinput3" class="sr-only">Username</label>
                                            <input value="<?= $u->username ?>"id="username" name="username" type="text" placeholder="Username" class="form-control input-md">                              
                                <?= form_error('name', '<span class="label label-danger">', '</span>') ?>
				                        </div>

                                <div class="form-group">
                                        Access Level
				                        <label for="userinput3" class="sr-only">Access Level</label>
                                           <select <?= $u->access_lvl ?> class="form-control"name="access_lvl"><br>
                                        <option <?php if($u->access_lvl == "administrator"){echo 'selected';}?> value="administrator">Administrator</option>
                                        <option <?php if($u->access_lvl == "employee"){echo 'selected';}?> value="employee">Employee</option>
                                        <option <?php if($u->access_lvl == "user"){echo 'selected';}?> value="user">User</option>
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
                              <input value="<?= $u->email ?>"id="email" name="email_address" type="text" placeholder="Email" class="form-control input-md">                              
                              <?= form_error('name', '<span class="label label-danger">', '</span>') ?> 
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                            House Address :
                            <label for="userinput5" class="sr-only">Address</label>
                              <input value="<?= $u->address ?>"id="address" name="home_address" type="text" placeholder="address" class="form-control input-md">                              
                              <?= form_error('name', '<span class="label label-danger">', '</span>') ?>
                            </div>
                            </div>
                            <div class="col-md-6">
                            Mobile Number : 
                            <div class="input-group">
                            <label for="userinput5" class="sr-only">Mobile Number</label>
                                <span class="input-group-addon">+63</span>
                              <input value="<?= $u->mobileno ?>"id="mobileno" name="mobileno" type="text" placeholder="mobileno" class="form-control input-md">                              
                              <?= form_error('name', '<span class="label label-danger">', '</span>') ?> 
                            </div>
                            </div>
   
                    

</div>
<center> <button type="submit" class="btn btn-success">
                        <i class="icon-check2"></i> Submit
                    </button>
<a href="<?= base_url() . 'AdminController/users/'?>" class="btn btn-warning">BACK</a></center>

				                        </div>
</form>
            </div>
        </div>
    </div>
</section>
