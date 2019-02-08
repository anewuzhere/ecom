<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/styles.css"/>
<form  class="form-horizontal"  action ="<?=base_url()?>user/update/<?=$item->id?>"  method='post'>
<fieldset>

<!-- Form Name -->
<legend class="text-center">EDIT</legend>

<!-- Text input-->
<!-- Text input-->
<div class="form-group">
 
  <div class="col-md-4">
  <input type="hidden" name="id" type="text" placeholder="ID" class="form-control input-md"value="<?=$item->id?>" required="" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for ="fname" >First Name</label>  
  <div class="col-md-4">
  <input  value="<?=$item->fname?>" name="fname" type="text" placeholder="First Name" class="form-control input-md" required="">
    
  </div>
</div>  
<div class="form-group">
  <label class="col-md-4 control-label" >Middle Name</label>  
  <div class="col-md-4">
  <input  value="<?=$item->mname?>" name="mname" type="text" placeholder="Middle Name" class="form-control input-md" >
    
  </div>
</div>  
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Last Name</label>  
  <div class="col-md-4">
  <input  value="<?=$item->lname?>" name="lname" type="text" placeholder="Last Name" class="form-control input-md" required="">
    
  </div>
</div>  
<div class="form-group">
  <label class="col-md-4 control-label" >Password</label>  
  <div class="col-md-4">
  <input  value="<?=$item->password?>" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
    
  </div>
</div>  
<div class="form-group">
  <label class="col-md-4 control-label" >Confirm Password</label>  
  <div class="col-md-4">
  <input  value="<?=$item->repass?>" name="repass" type="password" placeholder="Confirm Password" class="form-control input-md" required="">
    
  </div>
</div>  
<div class="form-group">
  <label class="col-md-4 control-label">Email</label>  
  <div class="col-md-4">
  <input  value="<?=$item->email?>" name="email" type="text" placeholder="Email Address" class="form-control input-md" required="">
    
  </div>
</div>  
<div class="form-group">
  <label class="col-md-4 control-label" >Contact No. </label>  
  <div class="col-md-4">
  <input  value="<?=$item->contact?>" name="contact" type="text" placeholder="Product Name" class="form-control input-md" required="">
    
  </div>
</div>  

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" >Gender</label>
  <div class="col-md-4">
    <select  value="<?=$item->gender?>" name="gender" class="form-control">
    <option value='<?=$item->gender?>' selected><?=$item->gender?></option>
      <option value="M">M</option>
      <option value="F">F</option>
     
    </select>
  </div>
</div>


<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
    <button id="button1id" name="submit" value="submit" class="btn btn-success">Edit</button>
    <a href="<?= base_url().'user/manageuser'?>" class="btn btn-danger" role="button"> Cancel</a>
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
