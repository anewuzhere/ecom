<section id="global-settings" class="card">
    <div class="card-header">
        <h4 class="card-title"></h4>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
            <ul class="list-inline mb-0">
            </ul>
        </div>
    </div>
    <div class="card-body collapse in">

        <div class="card-block">
                        <div class= "row"><?php if ($error): ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <h4>***ERROR MESSAGE</h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?= $error ?>
                                <?php endif ?></div>

            <div class="card-text">
                        <form class="form" name="myForm" method="POST"  action="<?= base_url().'EmployeeController/do_addPackage/'?>">
                                <div class="col-md-6">
                                <div class="form-group">
                                        Package Name
				                        	<label for="userinput2" class="sr-only">Package Name</label>
				                            <input value="<?=set_value('package_name','')?>"id="package_name" name="package_name" type="text" placeholder="Package Name" class="form-control input-md">
				                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                        Country/City
				                        	<label for="userinput2" class="sr-only"></label>
				                            <input value="<?=set_value('package_place','')?>"id="package_place" name="package_place" type="text" placeholder="Country or City Name" class="form-control input-md">
				                </div>
                                </div>
                                 <div class="col-md-4">
                                <div class="form-group">
                                        Status
				                        	<label for="userinput2" class="sr-only"></label>
                                            <select  class="form-control"name="package_status"><br>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                     </select><br>
				                </div>
                                </div>  
                                <div class="col-md-4">
                                        Date Start
										<input value="<?=date("Y-m-d",time())?>"type="date" id="date" class="form-control" placeholder="Start Date " name="Sdate" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Start Date">
									</div>
                                    <div class="col-md-4">
                                        Date Expiration
										<input value="<?=date("Y-m-d",time())?>"type="date" id="date" class="form-control" placeholder="Date Expiration " name="Edate" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Expiration">
									</div>
                    <div class="col-md-4">
                        <br>
                        <center> <button type="submit" class="btn btn-success"><i class="icon-check2"></i> Submit</button>
                        <a href="<?= base_url() . 'EmployeeController/packagelist/'?>" class="btn btn-warning">BACK</a></center>
                    </div>
              </form>                  
            </div>
        </div>
    </div>
</section>

