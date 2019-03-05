		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form-center"><?=$u->name?></h4>
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
                        <div class= "row"><?php if ($success): ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <h4>MESSAGE</h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?= $success ?>
                                <?php endif ?></div>

						<form class="form" name="myForm" method="POST" action="<?= base_url().'UserController/do_addPayment/'?>">
                        <?= form_hidden('id', $u->transaction_id); ?>
							<div class="row">
								<div class="col-md-6 offset-md-3">
									<div class="form-body">
                                       <h1> Total Amount : ₱<?=$u->price?> </h1>
											<label>Existing Customer</label>
											<div class="input-group">
												<label class="display-inline-block custom-control custom-radio ml-1">
													<input type="radio" name="customer1" class="custom-control-input" value="dp">
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Down Payment 50%</span>
												</label>
												<label class="display-inline-block custom-control custom-radio">
													<input type="radio" name="customer1"  class="custom-control-input" value="fp">
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Full Payment</span>
												</label>
											</div>
											 <?php if($u->picpath == NULL){ ?>

                                            <div class="alert alert-warning mb-2" role="alert">
									<strong>Warning!</strong> You must upload the image receipt before selecting Payment Method.
									
								            </div>
                                           <?php } ?> 
										<div class="col-md-8">
											<div class="form-group">
									<label for="timesheetinput1">Bank Transaction ID</label>
										<input type="text" id="timesheetinput1" class="form-control" placeholder="" name="bank">
								</div>
								</div>
											<div class="col-md-6">
										<div class="form-group">
											<label for="timesheetinput6"> Deposit Date</label>
											<div class="position-relative has-icon-left">
												<input type="date" id="timesheetinput6" class="form-control" name="datedeposit">
												<div class="form-control-position">
													<i class="icon-clock5"></i>
												</div>
											</div>
										</div>
									</div>
										<div class="col-md-6">
										<div class="form-group">
											<label for="timesheetinput6"> Time</label>
											<div class="position-relative has-icon-left">
												<input type="time" id="timesheetinput6" class="form-control" name="endtime">
												<div class="form-control-position">
													<i class="icon-clock5"></i>
												</div>
											</div>
										</div>
									</div>
								
								
                                           
                                           
                                </div>           
                                            <div class="form-actions center">
								<button type="button" class="btn btn-warning mr-1">
									<i class="icon-cross2"></i> Cancel
								</button>
								<button type="submit" class="btn btn-primary"<?php if($u->picpath == NULL){echo "disabled";}  ?>    >
									<i class="icon-check2"></i> Save
								</button>
							</div>
                            </form>	
                                             <legend>Upload Receipt Image</legend>
                                                                <font color="red"><?=isset($error)?$error: ""?></font>
                                                                <img src="<?= base_url() . 'images/receipts/' . $u->picpath ?>" width = "500" height="500" alt="..." class="img-thumbnail">
                                                                <br/><br/>

                                                                <?php echo form_open_multipart('UserController/do_upload'); ?>
                                                                <input type="file" name="userfile" size="20" />
                                                                <br />
                                                                <input type="submit" class="btn btn-success"  value="Upload / Update Image" />
                                                                <?= form_hidden('id', $u->transaction_id) ?>
                                                                </form> 
										</div>

									</div>
								</div>
							</div>

						

					</div>
				</div>
			</div>
		</div>