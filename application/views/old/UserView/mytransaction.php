	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <section id="global-settings" class="card">
  
    <div class="card-header">
        <h4 class="card-title"> </h4>
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
            <div class= "row"><?php if ($error): ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <h4>MESSAGE</h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?= $error ?>
                                <?php endif ?></div>
                                <div class= "row"><?php if ($success): ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <h4>MESSAGE</h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?= $success ?>
                                <?php endif ?></div>


            <div class="card-text">
 <div class="card">
	            <div class="card-header" style="background-color:#FE5722; border-color:#FE5722">
	               <center> <h4 class="card-title" style="color:white;">Current Travel Transaction</h4></center>
	                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
                        <a href="<?= base_url() . 'UserController/cancelTransaction/' . $u->transaction_id ?>"> Cancel Travel</a>
                        <?php if($u->status == "verified" && date('Y-m-d') <= date('Y-m-d', strtotime('+ 5 days',$u->date_verified))    ){ ?>
                        <a href="<?= base_url() . 'UserController/addPayment/' . $u->transaction_id ?>"> Add Payment</a>
                        <?php   } ?>
	                </div>
	            </div>
                <?php if($u->status == "verified" && date('Y-m-d') > date('Y-m-d', strtotime('+ 5 days',$u->date_verified))    ){ ?>
                <div class="alert alert-danger mb-2" role="alert">
									<strong>opss!</strong> Your transaction is expired kase 5 days nga lang dapat bes.
								</div>
                 <?php   } ?>
	            <div class="card-body collapse in">
	                <div class="card-block">
                    
                    <div class="col-md-2">
                     <div class="form-group">
                            Transaction ID
                           <output value="<?= $u->transaction_id ?>" type="text" placeholder="" class="form-control input-md"><?= $u->transaction_id ?>
                     </div>
                     </div>	
                    
				     <div class="col-md-6">
                     <div class="form-group">
                            Tour Package
                           <output value="<?= $package->package_name ?>" type="text" placeholder="" class="form-control input-md"><?= $package->package_name ?>
                     </div>
                     </div>	
                     <div class="col-md-4">
                     <div class="form-group">
                            Hotel Accommodation
                           <output value="<?= $tour->tour_name ?>" type="text" placeholder="" class="form-control input-md"><?= $tour->tour_name ?>
                     </div>
                     </div>	
                     <div class="col-md-6">
                     <div class="form-group">
                            Rate
                           <output value="<?= $rate->rate_name ?>" type="text" placeholder="" class="form-control input-md"><?= $rate->rate_name ?>
                     </div>
                     </div>
                     <div class="col-md-4">
                     <div class="form-group">
                            Price
                           <output value="<?= $rate->rate_person ?>" type="text" placeholder="" class="form-control input-md"><?=" ₱"?><?= $rate->rate_price ?><?="/person - "?><?=$rate->rate_person?><?="pax"?>
                     </div>
                     </div>			
                     <div class="col-md-4">
                     <div class="form-group">
                            Status
                           <output value="<?= $u->status ?>" type="text" placeholder="" class="form-control input-md"><?= $u->status ?>
                     </div>
                     </div>	
                     <div class="col-md-4">
                     <div class="form-group">
                            Total Amount
                           <output value="<?= $u->price ?>" type="text" placeholder="" class="form-control input-md">₱<?= $u->price ?>
                     </div>
                     </div>	
                     <div class="col-md-4">
                     <div class="form-group">
                            Date Of Tour
                           <output value="<?= $u->date ?>" type="date" placeholder="" class="form-control input-md"><?=date("Y-m-d",$u->date)?>
                     </div>
                     </div>	
                     
                      <?php $count = 0; foreach($inclusion as $u){ $count++;}?>
                    <table class="table" id="mytable" name="table">
                                <thead >
                                    <th>Inclusion</th>
                                    <th>price</th>
                                    <th>Description</th>
                                </thead>
                                <tbody>
                               
                                <?php for($i=0 ; $i<$count ; $i++){?>
                                <?php $num = (int)$inclusion[$i];?>
                                <?php foreach($inc as $select){ ?>
                                <?php if($select->inc_id == $num){ ?>
                                    <tr>
                                        <td><?=$select->inclusions?></td>
                                        <td><?=$select->price?></td>
                                        <td><?=$select->description?></td>
                                        <?php }?>
                                        <?php }?>
                                        <?php }?>
                                    </tr>
                                    
                                </tbody>
                            </table>


</div>
</div>
            </div>
        </div>
    </div>
</section>

