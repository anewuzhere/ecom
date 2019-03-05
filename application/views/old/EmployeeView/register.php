<div class="row match-height">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form-center">Add Account</h4>
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
                <div class= "row"><?php if (validation_errors()): ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <h4>***ERROR MESSAGE</h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?= validation_errors() ?>
                                <?php endif ?></div>
					<div class="card-block">
						<form class="form"action="<?= base_url().'EmployeeController/reg'?>" method="POST">
							<div class="row">
								<div class="col-md-10 ">
									<div class="form-body">
                                        <div class="col-md-6">
										<div class="form-group">
											<label for="eventInput1">First Name</label>
											<input type="text" value="<?=set_value('first_name','')?>" id="eventInput1" class="form-control" placeholder="First name" name="first_name"required>
										</div>
                                        </div>
                                         <div class="col-md-6">
										<div class="form-group">
											<label for="eventInput1">Middle Name</label>
											<input type="text" value="<?=set_value('middle_name','')?>"id="eventInput1" class="form-control" placeholder="Middle name" name="middle_name">
										</div>
                                        </div>
                                         <div class="col-md-6">
										<div class="form-group">
											<label for="eventInput1">Last Name</label>
											<input type="text" value="<?=set_value('last_name','')?>"id="eventInput1" class="form-control" placeholder="Last name" name="last_name"required>
										</div>
                                        </div>
                                        <div class="col-md-6">
										<div class="form-group">
											<label for="eventInput2">Email Address</label>
											<input type="email" value="<?=set_value('email_address','')?>"id="eventInput2" class="form-control" placeholder="Email Address" name="email_address"required>
										</div>
                                        </div>
                                         <div class="col-md-6">
										<div class="form-group">
											<label for="eventInput1">Password</label>
											<input type="password" id="eventInput1" class="form-control" placeholder="Password" name="password"required>
										</div>
                                        </div>
                                         <div class="col-md-6">
										<div class="form-group">
											<label for="eventInput1">Confirm Password</label>
											<input type="password" id="eventInput1" class="form-control" placeholder="Confirm Password" name="confirm_password"required>
										</div>
                                        </div>
                                        <div class="col-md-6">
										<div class="form-group">
											<label for="eventInput3">UserName</label>
											<input type="text" value="<?=set_value('username','')?>"id="eventInput3" class="form-control" placeholder="Username" name="username">
										</div>
                                        </div>
                                        <div class="col-md-6">                                        
										<div class="form-group">
											<label for="eventInput5">Contact Number</label>
											<input type="tel" value="<?=set_value('mobileno','')?>"id="eventInput5" class="form-control" name="mobileno" placeholder="contact number">
										</div>
                                        </div>
                                         <div class="col-md-6">                                        
										<div class="form-group">
                                        <label for="eventInput5">Account Type</label>
											<select id="issueinput5" value="<?=set_value('access_lvl','')?>"name="access_lvl" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority" data-original-title="" title="">
										<option value="Employeeistrator">Employeeistrator</option>
										<option value="employee">Employee</option>
										<option value="user">User</option>
									</select>
										</div>
                                        </div>

									</div>
								</div>
							</div>

							<div class="form-actions center">
								<a href="<?= base_url() . 'EmployeeController/index/'?>" class="btn btn-warning">Cancel</a>
								<button type="submit" class="btn btn-primary">
									<i class="icon-check2"></i> Save
								</button>
							</div>
						</form>	

					</div>
				</div>
			</div>
		</div>
	</div>