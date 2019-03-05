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
                        <form class="form" name="myForm" method="POST"  action="<?= base_url().'EmployeeController/do_addRate/'?>">
                                <div class="form-group">
                                <?= form_hidden('id', $tour->tour_id); ?>
                                <?= form_hidden('id2', $user->package_id); ?>
                                        Rate Inclusion
				                        	<label for="userinput2" class="sr-only"></label>
				                            <input value="<?=set_value('rate_name','')?>"id="rate_name" name="rate_name" type="text" placeholder="# Days and # Nights" class="form-control input-md">                              
				                </div>
                                 <div class="col-md-6">
                                <div class="form-group">
                                        Number of people
				                        	<label for="userinput2" class="sr-only"></label>
                                            <select  class="form-control"name="rate_person"><br>
                                        <?php for($i = 1; $i<=50; $i++){?>
                                        <option value="<?=$i?>"><?=$i?></option>
                                        <?php }?>
                                     </select><br>
				                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                        Price
				                        	<label for="userinput2" class="sr-only"></label>
				                            <input value="<?=set_value('rate_price','')?>"id="rate_price" name="rate_price" type="number" placeholder="Price" class="form-control input-md">                              
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

