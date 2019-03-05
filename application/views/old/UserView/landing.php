
		<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    .rating {
  display: inline-block;
  position: relative;
  height: 50px;
  line-height: 50px;
  font-size: 50px;
}

.rating label {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  cursor: pointer;
}

.rating label:last-child {
  position: static;
}

.rating label:nth-child(1) {
  z-index: 5;
}

.rating label:nth-child(2) {
  z-index: 4;
}

.rating label:nth-child(3) {
  z-index: 3;
}

.rating label:nth-child(4) {
  z-index: 2;
}

.rating label:nth-child(5) {
  z-index: 1;
}

.rating label input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}

.rating label .icon {
  float: left;
  color: transparent;
}

.rating label:last-child .icon {
  color: #000;
}

.rating:not(:hover) label input:checked ~ .icon,
.rating:hover label:hover input ~ .icon {
  color: #09f;
}

.rating label input:focus:not(:checked) ~ .icon:last-child {
  color: #000;
  text-shadow: 0 0 5px #09f;
}
</style>
<?php if(isset($package)){?>
<?php if($package != NULL){ ?>
<div class="col-md-12 col-sm-12">
			<div class="card">
            <div class="card-header">
                <form method="POST" action="<?= base_url().'UserController/rateMyTransaction/'.$anal->transaction_id?>" >
					<h4 class="card-title">Please Rate your last Tour</h4>
				</div>
				<div class="card-body collapse in">
					<div class="card-block">
					    <div class = "col-md-4">
					   <h1>
						<?php
						echo $package->package_name;
						?>
						</h1>
						</div>
						<div class = "col-md-4">
						<div class="rating">
                            <label>
                             <input type="radio" name="stars" value="1" />
                           <span class="icon">★</span>
                             </label>
                             <label>
                              <input type="radio" name="stars" value="2" />
                              <span class="icon">★</span>
                              <span class="icon">★</span>
                             </label>
                             <label>
                              <input type="radio" name="stars" value="3" />
                              <span class="icon">★</span>
                                 <span class="icon">★</span>
                              <span class="icon">★</span>   
                             </label>
                             <label>
                              <input type="radio" name="stars" value="4" />
                              <span class="icon">★</span>
                              <span class="icon">★</span>
                              <span class="icon">★</span>
                               <span class="icon">★</span>
                             </label>
                             <label>
                           <input type="radio" name="stars" value="5" />
                          <span class="icon">★</span>
                           <span class="icon">★</span>
                           <span class="icon">★</span>
                           <span class="icon">★</span>
                           <span class="icon">★</span>
                             </label>
                                </div>
						</div>
						<div class = "col-md-4">
					   <center> <button type="submit" class="btn btn-success"><i class="icon-check2"></i> Submit</button></center>
						</div>
					</div>
					</form>
                    <div class="card-block">
                </div>
				</div>
			</div>
		</div>
<?php } ?><?php } ?>
		<div class="col-md-6 col-sm-12">
			<div class="card">
            <div class="card-header">
					<h4 class="card-title">Welcome to Bluelagoon</h4>
				</div>
				<div class="card-body collapse in">
				<video width="800" controls autoplay>
			
  <source src="<?php echo base_url().'app-assets/images/logo/coron.mp4';?>" type="video/mp4">
  
  
</video>
                    <div class="card-block">
                </div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="card">
            <div class="card-header">
					<h4 class="card-title"></h4>
				</div>
				<div class="card-body collapse in">
					<div class="card-block">
						<div id="carousel-interval" class="carousel slide" data-ride="carousel" data-interval="5000">
							<ol class="carousel-indicators">
								<li data-target="#carousel-interval" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-interval" data-slide-to="1"></li>
								<li data-target="#carousel-interval" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner" role="listbox">
								<div class="carousel-item active">
									<img src="<?php echo base_url().'images/tour/kay2.jpg';?>" alt="First slide">
								</div>
							
							</div>
							<a class="left carousel-control" href="#carousel-interval" role="button" data-slide="prev">
								<span class="icon-prev" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#carousel-interval" role="button" data-slide="next">
								<span class="icon-next" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
                    <div class="card-block">
                </div>
				</div>
			</div>
			</div>
<div class="row">
		<div class="col-xs-12 mt-1 mb-3">
			<h4><font color="orange">Fixed Tour Package</h4>
		</div>
	</div>

<?php foreach($u as $us){?>
<div class="col-md-3 col-sm-12">
			<div class="card">
				<div class="card-body">
				
						<img class="card-img-top img-fluid"  src="<?php echo base_url().'images/tour/'.$us->picpath;?>" alt="Card image cap">
					<div class="card-block">
						<h4 class="card-title"><?=$us->package_name?></h4>
						<p class="card-text"></p>
						<a href="<?= base_url() . 'UserController/fixed/' . $us->package_id ?>" class="btn btn-outline-deep-orange">Book</a>
					</div>
				</div>
			</div>
		</div>
<?php  } ?>
<div class="row">
		<div class="col-xs-12 mt-1 mb-3">
			<h3><font color="orange">Highly Recommended Tour Package for you </h3>
		</div>
	</div>

<?php foreach($reco as $mend){?>
<div class="col-md-3 col-sm-12">
			<div class="card">
				<div class="card-body">
					<img class="card-img-top img-fluid"  src="<?php echo base_url().'images/tour/'.$mend->picpath;?>" alt="Card image cap">
					<div class="card-block">
						<h4 class="card-title"><?=$mend->package_name?></h4>
						<p class="card-text"></p>
						<a href="<?= base_url() . 'UserController/fixed/' . $mend->package_id ?>" class="btn btn-outline-deep-orange">Book</a>
					</div>
				</div>
			</div>
		</div>
<?php  } ?>

<script>
    $(':radio').change(function() {
  console.log('New star rating: ' + this.value);
});

</script>
