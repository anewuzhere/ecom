  <section id="global-settings" class="card">
    <div class="card-header">
        <h4 class="card-title">Tour Packages</h4>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a href="<?= base_url() . 'AdminController/deleteInclusion/'.$inc->inc_id?>" onclick ="return confirm('Do you really want to Delete?');" ><i class="icon-trash"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body collapse in">
        <div class="card-block">
            <div class="card-text">
                        <form class="form" name="myForm" method="POST" onsubmit="return validateForm()" action="<?= base_url().'AdminController/do_editInclusion/'?>">
                                <div class="col-md-8">
                                <div class="form-group">
                                <?= form_hidden('id', $inc->inc_id); ?>
                                        Inclusion Name
				                        	<label for="userinput2" class="sr-only">Inclusion Name</label>
				                            <input value="<?= $inc->inclusions ?>"id="inclusions" name="inclusions" type="text" placeholder="Inclusions" class="form-control input-md">                              
                                <?= form_error('inclusions', '<span class="label label-danger">', '</span>') ?>
				                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                        Price
				                        	<label for="userinput2" class="sr-only">Inclusion Name</label>
				                            <input value="<?= $inc->price ?>"id="price" name="price" type="text" placeholder="price" class="form-control input-md">                              
                                <?= form_error('price', '<span class="label label-danger">', '</span>') ?>
				                </div>
                                </div>
                                <div class="col-md-8">
                                <div class="form-group">
								<label for="issueinput8">Inclusion Description</label>
								<textarea id="description" rows="5" class="tinymce" name="description" placeholder="description" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Comments"><?=$inc->description?></textarea>
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
<script>
function validateForm() {
    var x = document.forms["myForm"]["inclusions"].value;
    var b = document.forms["myForm"]["description"].value;
    if (x == ""||b== "") {
        alert("All must be filled out");
        return false;
    }
}


</script>
