<section id="global-settings" class="card">
    <div class="card-header">
        <h4 class="card-title">Tour Packages</h4>
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
                        <form class="form" name="myForm" method="POST"  action="<?= base_url().'EmployeeController/do_addInclusion/'?>">
                                <div class="col-md-8">
                                <div class="form-group">
                                <?= form_hidden('id', $user->package_id); ?>
                                        Inclusion Name
				                        	<label for="userinput2" class="sr-only">Inclusion Name</label>
				                            <input value="<?=set_value('inclusions','')?>"id="inclusions" name="inclusions" type="text" placeholder="Inclusions" class="form-control input-md">                              

				                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                        Price
				                        	<label for="userinput2" class="sr-only">Inclusion Name</label>
				                            <input value="<?=set_value('price','')?>"id="price" name="price" type="text" placeholder="price" class="form-control input-md">                              

				                </div>
                                </div>
                                <div class="col-md-8">
                                <div class="form-group">
								<label for="issueinput8">Inclusion Description</label>
								<textarea id="description" rows="5" class="tinymce" name="description" placeholder="description" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Comments"><?=set_value('description','')?></textarea>
							    <?= form_error('description', '<span class="label label-danger">', '</span>') ?>
                                </div> 
                                </div>  
                    <div class="col-md-8">
                        <center> <button type="submit" class="btn btn-success"><i class="icon-check2"></i> Submit</button>
                        <a href="<?= base_url() . 'EmployeeController/viewPackage/'.$user->package_id?>" class="btn btn-warning">BACK</a></center>
                    </div>
              </form>                  
            </div>
        </div>
    </div>
</section>

