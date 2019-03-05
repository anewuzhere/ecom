


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
                        <form class="form" name="myForm" method="POST"  action="<?= base_url().'AdminController/do_addAquaSales/'?>">
                                <div class="col-md-12">
                                <div class="form-group">
                                        Number of Container
				                        	<label for="userinput2" class="sr-only">Number of Container</label>
                                            <select  class="form-control"name="container"><br>
                                        <?php for($i = 0; $i<=1000; $i++){?>
                                        <option value="<?=$i?>"><?=$i?></option>
                                        <?php }?>
                                     </select><br>
                                <?= form_error('container', '<span class="label label-danger">', '</span>') ?>
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
                                        Date Start
										<input value="<?=date("Y-m-d",time())?>"type="date" id="date" class="form-control" placeholder="Start Date " name="date" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Start Date">
									</div>
                                    
                                
                    <div class="col-md-6">
                        <br>
                        <center> <button type="submit" class="btn btn-success"><i class="icon-check2"></i> Submit</button>
                        <a href="<?= base_url() . 'AdminController/dashboard/'?>" class="btn btn-warning">BACK</a></center>
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
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <?php 
                            $kita = 0;
                            foreach($salese as $sale){
                               $kita += $sale->cost; 
                            }
                            ?>
                            <h3 class="blue">₱<?=number_format($kita,1)?></h3>
                            <span>Total Sales</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-diagram blue font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
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
                
                                    <th>Number of Container</th>
                                    <th>Cost</th>
                                    <th>Date and Time</th>
                                    <th>Action</th>
                                    
                                </thead>
                                <tbody>
                                <?php foreach($user as $u){ ?>
                                    <tr>
                                    
                                    <td><?= $u->container?> </a></td>
                                    <td><?=number_format($u->cost) ?></td>
                                    <td><?= date("F j, Y h:i A", $u->date) ?></td>
                                    <td> <a href = "<?= base_url() . 'AdminController/deletemoto/'.$u->id?>" onclick ="return confirm('Do you really want to Delete?');" class="btn btn-danger">Delete</a></td>
                                    
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

