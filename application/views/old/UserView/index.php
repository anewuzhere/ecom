	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div class="card">
    <div class="card-header">
        <h4 class="card-title"></h4>
    </div>
    <div class="card-body collapse in">
        <div class="card-block">
        <div class= "row"><?php if ($error): ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <h4>***WARNING MESSAGE</h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?= $error ?>
                                <?php endif ?></div>
                                <?php if ($success): ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <h4>Success Message</h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?= $success ?>
                                <?php endif ?></div>
            <div class="card-text">

<div class="container">
    	<div class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li class="active"><a href="#step-1">
                    <h4 class="list-group-item-heading">Step 1</h4>
                    <p class="list-group-item-text">Select Tour Package</p>
                </a></li>
                <li class="disabled"><a href="#step-2">
                    <h4 class="list-group-item-heading">Step 2</h4>
                    <p class="list-group-item-text">Personal Information</p>
                </a></li>
                <li class="disabled"><a href="#step-3">
                    <h4 class="list-group-item-heading">Step 3</h4>
                    <p class="list-group-item-text">Date</p>
                </a></li>
            </ul>
        </div>
	</div>
           <br>

            <form class="form" name="myform" method="POST" action="<?= base_url().'UserController/do_book/'?>">
                <div class="tab-content">
                    <div class="row setup-content"  id="step-1">
                     <div class="col-md-6">
                     <div class="form-group">
                            Select Tour Package
                           <select class="form-control"name="package"><br>
                           <option value="">--- Select Tour Package ---</option>
                           <?php 
                                foreach ($pack as $key => $value) {
                            echo "<option value='".$value->package_id."'>".$value->package_name."</option>";
                        }
                            ?>
                            </select>
                     </div>
                     </div>
                     <div class="col-md-6">
                     <div class="form-group">
                            Select Hotel Accommodation
                           <select class="form-control"name="hotel"><br>
                           <option value="">--- Select Hotel ---</option>
                            </select>
                     </div>
                     </div>
                     <div class="col-md-6">
                     <div class="form-group">
                            Select Rates
                           <select class="form-control"name="rate"><br>
                           <option value="">--- Select Rate ---</option>
                            </select>
                     </div>
                     </div>
                    <table class="table" id="mytable" name="table">
                                <thead >
                                    <th>  </th>
                                    <th>Inclusion</th>
                                    <th>Description</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                     <div class="col-md-8">
                     <div class="form-group">
                        <button id="activate-step-2" class="btn btn-primary btn-lg">Proceed to step 2</button>
                     </div>
                     </div>
                </div>


                    <div class="row setup-content"  id="step-2" name="personal">
                                        <div class="col-md-6">
										<div class="form-group">
											<label for="eventInput1">Name</label>
											<input value="<?= $u->firstname ?> <?= $u->lastname ?>"id="name" name="name" type="text" placeholder="Name" class="form-control input-md">
										</div>
                                        </div>
                                        <div class="col-md-6">
										<div class="form-group">
											<label for="eventInput1">Contact Number</label>
											<input value="<?= $u->mobileno ?>"id="mobileno" name="mobileno" type="text" placeholder="mobileno" class="form-control input-md">
										</div>
                                        </div>
                                        <div class="col-md-6">
										<div class="form-group">
											<label for="eventInput1">Email Address</label>
											<input value="<?= $u->email ?>"id="email" name="email_address" type="text" placeholder="Email" class="form-control input-md"> 
										</div>
                                        </div>
                                        <div class="col-md-6">
										<div class="form-group">
											<label for="eventInput1">Home Address</label>
											<input value="<?= $u->address ?>"id="address" name="home_address" type="text" placeholder="address" class="form-control input-md">
										</div>
                                        </div>

                     
                     <div class="col-md-8">
                     <div class="form-group">
                        <button id="activate-step-3" class="btn btn-primary btn-lg">Proceed to step 3</button>
                     </div>
                     </div>
                    </div>
                    <div class="row setup-content"  id="step-3">
                <div class="alert alert-warning"> PLEASE TAKE NOTE : <br>
                         You Can Only set your travel date 7 days from your booking date <br><br>
                         </div>
                        <div class="col-md-6">
                            
                        <div class="form-group">
                            Select your Tour Date
						<input type="date" id="date" class="form-control" placeholder="Date expiration " min = "<?= date("Y-m-d", strtotime(date("Y-m-d").'+ 7 days')) ?>" name="date" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Tour Date">

                     </div>
                     </div>
                     <div class="col-md-8">
                     <div class="form-group">
                        <?php if($u->haveCurrentBook == "n"){?>
                        <button type="submit" class="btn btn-primary btn-lg">Book</button>
                        <?php }?>
                        <?php if($u->haveCurrentBook == "y"){?>
                        <div class="alert alert-danger mb-2" role="alert">
									<strong>opss!</strong> One Travel package at a time please check your current transaction.
								</div>
                        <?php }?>
                     </div>
                     </div>
                    </div>
                </div>
            </form>
        </div>
   </div>
    </div>


<script type="text/javascript">


    $(document).ready(function() {
    
        $('select[name="package"]').on('change', function() {
            var tourID = $(this).val();
            if(tourID) {
                $.ajax({
                    url: "ajaxHotel/"+tourID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="hotel"]').empty();
                         $('select[name="hotel"]').append('<option value=""> ---> Select Hotel <---</option>');
                        $.each(data, function(key, value) {
                            
                            $('select[name="hotel"]').append('<option value="'+ value.tour_id +'">'+ value.tour_name +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="hotel"]').empty();
            }
        });

        $('select[name="hotel"]').on('change', function() {
            var tourID = $(this).val();
            if(tourID) {
                $.ajax({
                    url: "ajaxRate/"+tourID,
                    type: "POST",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="rate"]').empty();
                        $('select[name="rate"]').append("<option value='' selected='selected'>Select Rate</option>");
                        $.each(data, function(key, value) {
                            $('select[name="rate"]').append('<option value="'+ value.rate_id +'">'+ value.rate_name +' : '+ value.rate_price 
                            + '/person - ' + value.rate_person +' pax' +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="rate"]').empty();
            }
        });

        $('select[name="package"]').on('change', function() {
            var tourID = $(this).val();
            if(tourID) {
                $.ajax({
                    url: "ajaxInclusion/"+tourID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $("#mytable ").find('tbody').empty();

                        $.each(data, function(key, value) {
                            $("#mytable tbody:first").append(
                                "<tr>"
                                    +"<td>"+"<input  type=checkbox name=ckb[] value="+value.inc_id+  ">" + "</td>"
                                    +"<td>"+value.inclusions+"</td>"
                                    +"<td>"+value.price+"</td>"
                                    +"<td>"+value.description+"</td>"
                                +"</tr>" )
                        });
                    }
                });
            }
        });
        

      var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO ONLY //
    $('#activate-step-2').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
        $(this).remove();
    })  
    $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
        $(this).remove();
    }) 
    $('#activate-step-4').on('click', function(e) {
        $('ul.setup-panel li:eq(3)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-4"]').trigger('click');
        $(this).remove();
    })   
});

</script>

            </div>
        </div>
    </div>
</div>

