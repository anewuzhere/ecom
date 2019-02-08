
<!-- <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/styles.css"/> -->
<form  class="form-horizontal"  action ="<?=base_url().'Staff/register'?>"   method='post'>
<fieldset>
<div class="container-fluid">
    <div class="row" >
    <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-primary">
            <div class="panel-heading">ADD</div>
            <div class="panel-body">
                <table class="table">
                    <!-- Text input-->
<div class="form-group">
 
  <div class="col-md-4">
  <input value="<?=item->$id?>" type="hidden"  name="id" type="text" placeholder="ID" class="form-control input-md" required="" >
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="gender">Customer Type</label>
  <div class="col-md-4">
    <select name="cus_type" class="form-control">
    <option Selected disabled="disabled" >Customer Type</option>
      <option value="1">In-House Brokerage</option>
      <option value="2">Broker/Agent</option>
      <option value="3">Freight Forwarder</option>
      <option value="4">Local/Sub-contractor</option>
    </select>
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label"for ="fname">First Name</label>  
  <div class="col-md-4">
  <input  name="fname" type="text" placeholder="First Name" class="form-control input-md">  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="mname" >Middle Name</label>  
  <div class="col-md-4">
  <input name="mname" type="text" placeholder="Middle Name(optional)" class="form-control input-md">  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="lname" >Last Name</label>  
  <div class="col-md-4">
  <input  name="lname" type="text" placeholder="Last Name" class="form-control input-md">  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="password" >Password</label>  
  <div class="col-md-4">
  <input name="password" type="password" placeholder="Password" class="form-control input-md">  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="repass" >Confirm Password</label>  
  <div class="col-md-4">
  <input  name="repass" type="password" placeholder="Confirm Password" class="form-control input-md">  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >Email</label>  
  <div class="col-md-4">
  <input  name="email" type="email" placeholder="Example@yahoo.com" class="form-control input-md">  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >Contact No.</label>  
  <div class="col-md-4">
  <input name="contact" type="text" placeholder="Contact Number" class="form-control input-md">  
  </div>
</div>


<!-- Select Basic -->




<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="gender">Gender</label>
  <div class="col-md-4">
    <select name="gender" class="form-control">
    <option Selected disabled="disabled" >Gender</option>
      <option value="M">Male</option>
      <option value="F">Female</option>
    </select>
  </div>
</div>


<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>


  <div class="col-md-8">
  
  <button id="button1id" name="add" type="Submit" value= "Submit"class="btn btn-success">Add</button>
  <a href="<?=base_url().'Staff/customer/'?>" class="btn btn-danger" role="button">Back</a>
  <center> <?php if(validation_errors()): ?>
  <div class="alert alert-danger alert-dismissible"  role="alert">
  <?=validation_errors()?>
  </div>
<?php endif; ?>
  
  </center>
 
  </div>
  
</div>




</fieldset>
</form>
            </div>
       
       
            </div>
        </div>
        </center>
    </div>
</div> 



