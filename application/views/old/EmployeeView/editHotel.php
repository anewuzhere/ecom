<section id="global-settings" class="card">
    <div class="card-header">
        <h4 class="card-title">Tour Packages</h4>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a href="<?= base_url() . 'EmployeeController/deleteHotel/'.$tour->tour_id?>" onclick ="return confirm('Do you really want to Delete?');" ><i class="icon-trash"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body collapse in">
        <div class="card-block">
            <div class="card-text">
                        <form class="form" name="myForm" method="POST" onsubmit="return validateForm()" action="<?= base_url().'EmployeeController/do_editHotel/'?>">
                                <div class="col-md-8">
                                <div class="form-group">
                                <?= form_hidden('id', $tour->tour_id); ?>
                                        Hotel Name
				                        	<label for="userinput2" class="sr-only">Hotel Name</label>
				                            <input value="<?= $tour->tour_name ?>"id="tour_name" name="tour_name" type="text" placeholder="Hotel Name" class="form-control input-md">                              
                                <?= form_error('tour_name', '<span class="label label-danger">', '</span>') ?>
				                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                        Reservation Slots
				                        	<label for="userinput2" class="sr-only">Reservation Slots</label>
                                            <select <?= $tour->tour_slots ?> class="form-control"name="tour_slots"><br>
                                        <?php for($i = 0; $i<=100; $i++){?>
                                        <option <?php if($tour->tour_slots == $i){echo 'selected';}?> value="<?=$i?>"><?=$i?></option>
                                        <?php }?>
                                     </select><br>
                                <?= form_error('tour_name', '<span class="label label-danger">', '</span>') ?>
				                </div>
                                </div>
                                <div class="col-md-8">
                                <div class="form-group">
								<label for="issueinput8">Description</label>
								<textarea id="description" rows="5" class="tinymce" name="description" placeholder="description" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Comments"><?=$tour->description?></textarea>
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
<script>
function validateForm() {
    var x = document.forms["myForm"]["tour_name"].value;
    var b = document.forms["myForm"]["description"].value;
    if (x == ""||b== "") {
        alert("All must be filled out");
        return false;
    }
}


</script>
