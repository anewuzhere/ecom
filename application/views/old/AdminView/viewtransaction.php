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
            <div class="card-text">
 <div class="card">
	            <div class="card-header" style="background-color:#0DB3A1; border-color:#0DB3A1">
	               <center> <h4 class="card-title" style="color:white;">Current Travel Transaction</h4></center>
	                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
                        <a href="<?= base_url() . 'AdminController/cancelTransaction/' . $u->transaction_id ?>"> Cancel Travel</a>
                        <?php if($u->status == "On hold"){ ?>
                        <a href="<?= base_url() . 'AdminController/verifyTransaction/' . $u->transaction_id ?>"> Verify</a>
                        <?php   } ?>
                        <?php if($u->status == "verified"){ ?>
                        <a data-target="#inlineForm" data-toggle="modal">  Payment</a>
                        <?php   } ?>
	                </div>
	            </div>
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
                            Date Of Tour
                           <output value="<?= $u->date ?>" type="date" placeholder="" class="form-control input-md"><?=date("Y-m-d",$u->date)?>
                     </div>
                     </div>	
                       <div class="col-md-4">
                     <div class="form-group">
                            Total Amount
                           <output value="<?= $u->price ?>" type="text" placeholder="" class="form-control input-md">₱<?= $u->price ?>
                     </div>
                     </div>	
                      <?php $count = 0; foreach($inclusion as $as){ $count++;}?>
                    <table class="table" id="mytable" name="table">
                                <thead >
                                    <th>Inclusion</th>
                                    <th>Description</th>
                                </thead>
                                <tbody>
                               
                                <?php for($i=0 ; $i<$count ; $i++){?>
                                <?php $num = (int)$inclusion[$i];?>
                                <?php foreach($inc as $select){ ?>
                                <?php if($select->inc_id == $num){ ?>
                                    <tr>
                                        <td><?=$select->inclusions?></td>
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
 <div class="modal fade text-xs-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
                                                    Verify Payment
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
													<label class="modal-title text-text-bold-600" id="myModalLabel33"></label>
												</div>
                                                <?php if($u->picpath != NULL){ ?>
                                              <center>  <img src="<?= base_url() . 'images/receipts/' . $u->picpath ?>" width = "500" height="500" alt="..." class="img-thumbnail"> </center>
                                                <?php }else{  ?>
                                                        <div class="alert alert-info mb-2" role="alert">
									                        <strong>Note!</strong> No Deposit Slip picture yet
								                        </div>
                                                    <?php  } ?>
												<form method="POST" action="<?= base_url().'AdminController/verifyPayment/'.$u->transaction_id?>">
											  	  <div class="modal-body">
                                                    <?= form_hidden('transaction_id', $u->transaction_id) ?>
                                                    <label><?php if($u->paymentmethod == "fp"){echo "Full Payment";} else{echo "Down Payment";}?> </label>
													<label>Back Deposit ID</label>
													<div class="form-group">
														<input value="<?= $u->deposit_id ?>" type="text" placeholder="" class="form-control input-md">
                                                    </div>
                                                    
													<label>Cost </label>                                                   
													<div class="form-group">
														<div class="input-group">
										                    <span class="input-group-addon">₱</span>
										                    <input value="<?= $u->price ?>" type="text" placeholder="" name="cost" class="form-control input-md ">
									                    </div>
                                                    </div>
                                                    <label>Time of transaction </label>  
                                                    <div class="form-group">
														<div class="input-group">
										                    
										                    <input value="<?=date("h:i:sa",$u->end_time)?>" type="text" placeholder="" name="end_time" class="form-control input-md ">
									                    </div>
                                                    </div>
                                                    
                                                    <label>Date Added </label>
													<div class="form-group">
							                            <input value="<?=date("Y-m-d, h:i:sa",$u->end_date)?>" type="date" placeholder="" name="date_created"class="form-control input-md">
                                                    </div>


												  <div class="modal-footer">
													<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
													<input type="submit" class="btn btn-outline-primary btn-lg" <?php if($u->picpath == NULL){ echo "disabled";} ?> >
												  </div>
												</form>
											</div>
										</div>
									</div>
