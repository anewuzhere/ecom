<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/styles.css"/>
<div class="row">
<div class="col-md-4">
    
 </div>
    <div class="col-md-4">
        <h1 class="text-center">View</h1>
        
        <form method="POST" action="<?=base_url().'Staff/view/'?>">
        <input value="<?=$item->id?>" type="text" name="id" class="form-control" placeholder="id" disabled> <br> </input>
        <input value="<?=$item->fname?>" type="text" name="fname" class="form-control" placeholder="fname" disabled> <br></input>
        <input value="<?=$item->mname?>" type="text" name="mname" class="form-control" placeholder="mname" disabled> <br></input>
        <input value="<?=$item->lname?>" type="text" name="lname" class="form-control" placeholder="lname" disabled> <br></input>
        <input value="<?=$item->password?>" type="password" name="password" class="form-control" placeholder="password" disabled> <br></input>
        <input value="<?=$item->email?>" type="text" name="email" class="form-control" placeholder="email" disabled> <br></input>
        <input value="<?=$item->contact?>" type="text" name="contact" class="form-control" placeholder="contact" disabled> <br></input>
        <input value="<?=$item->gender?>" type="text" name="gender" class="form-control" placeholder="gender" disabled> <br></input>
            
        
        
    
        <a href="<?= base_url().'staff/customer'?>" class="btn btn-danger" role="button"> Back</a>

        </form>
        <br>
       

    </div>
<div class="col-md-3">
</div>
</div>