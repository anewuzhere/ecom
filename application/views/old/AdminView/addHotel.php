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
                        <form class="form" name="myForm" method="POST"  action="<?= base_url().'AdminController/do_addHotel/'?>">
                                <div class="col-md-8">
                                <div class="form-group">
                                <?= form_hidden('id', $user->package_id); ?>
                                        Hotel Accommodation Name
				                        	<label for="userinput2" class="sr-only">Hotel Name</label>
				                            <input value="<?=set_value('tour_name','')?>"id="tour_name" name="tour_name" type="text" placeholder="Hotel Name" class="form-control input-md">                              

				                </div>
                                </div>
                                 <div class="col-md-4">
                                <div class="form-group">
                                        Reservation Slots
				                        	<label for="userinput2" class="sr-only">Reservation Slots</label>
                                            <select  class="form-control"name="tour_slots"><br>
                                        <?php for($i = 0; $i<=100; $i++){?>
                                        <option value="<?=$i?>"><?=$i?></option>
                                        <?php }?>
                                     </select><br>
                                <?= form_error('tour_name', '<span class="label label-danger">', '</span>') ?>
				                </div>
                                </div>
                                <div class="col-md-8">
                                <div class="form-group">
								<label for="issueinput8">Description</label>
								<textarea id="description" rows="5" class="tinymce" name="description" placeholder="description" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Comments"><?=set_value('description','')?></textarea>
							    <?= form_error('description', '<span class="label label-danger">', '</span>') ?>
                                </div> 
                                </div>  
                    <div class="col-md-8">
                        <center> <button type="submit" class="btn btn-success"><i class="icon-check2"></i> Submit</button>
                        <a href="<?= base_url() . 'AdminController/viewPackage/'.$user->package_id?>" class="btn btn-warning">BACK</a></center>
                    </div>
              </form>                  
            </div>
        </div>
    </div>
</section>

