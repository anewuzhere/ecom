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
                        <form class="form" name="myForm" method="POST"  action="<?= base_url().'AdminController/do_addSales/'?>">
                                <div class="col-md-6">
                                <div class="form-group">
                                        Name
				                        	<label for="userinput2" class="sr-only">Package Name</label>
				                            <input value="<?=set_value('name','')?>"id="name" name="name" type="text" placeholder="Name" class="form-control input-md">
				                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                        Cost
				                        	<label for="userinput2" class="sr-only"></label>
				                            <input value="<?=set_value('cost','')?>"id="cost" name="cost" type="text" placeholder="Cost" class="form-control input-md">
				                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                <label>Date Added </label>
													<div class="form-group">
							                        <input value="<?=date("Y-m-d, h:i:sa")?>" type="date" placeholder="" name="date_created"class="form-control input-md">
                                                    </div>
                                                    </div>
                                </div>
                    <div class="col-md-6">
                        <br>
                        <center> <button type="submit" class="btn btn-success"><i class="icon-check2"></i> Submit</button>
                        <a href="<?= base_url() . 'AdminController/packagelist/'?>" class="btn btn-warning">BACK</a></center>
                    </div>
              </form>                  
            </div>
        </div>
        
    </div>
</section>
<section id="global-settings" class="card">
    <div class="card-header">
        <h4 class="card-title">Payments</h4>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                <li><a <a href="<?= base_url() . 'AdminController/addPackage/'?>"><i class="icon-plus"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body collapse in">
        <div class="card-block">
            <div class= "row"><?php if (isset($error)): ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <h4>MESSAGE</h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?= $error ?>
                                <?php endif ?></div>

            <div class="card-text">
                <table class="table" id="mytable">
                                <thead >
                                    <th>Name</th>
                                    <th>Cost</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    
                                </thead>
                                <tbody>
                                <?php foreach($user as $u){ ?>
                                    <tr>
                                    <td><?= $u->name ?> </a></td>
                                    <td><?= $u->cost ?></td>
                                    <td><?=  $u->date ?></td>
                                    <td><?= $u->dateyear ?></td>
                                    
                                    <?php } ?>
                                    </tr>
        
                                </tbody>
                            </table>
            </div>
        </div>
    </div>
</section>

 <script>
    
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});    
                $("#mytable").DataTable({
      'paging'      : true,
      'lengthChange': false ,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,

      dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
                

            </script>

