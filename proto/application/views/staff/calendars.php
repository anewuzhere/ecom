<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/calendar.css"/>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/styles.css"/>
    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
			  <ul class="nav">
              <!-- Main menu -->
              <li class="current"><a href="<?=base_url().'Staff'?>"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
              <li><a href="<?=base_url().'staff/calendar'?>"><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
              <li><a href="<?=base_url().'staff/customer'?>"><i class="glyphicon glyphicon-edit"></i> Manage Customer</a></li>
              <li><a href="<?=base_url().'staff/customer'?>"><i class="glyphicon glyphicon-edit"></i> Manage Driver</a></li>
              <li><a href="<?=base_url().'staff/manageuser'?>"><i class="glyphicon glyphicon-edit"></i> Manage Conductor</a></li>
              <li><a href="<?=base_url().'staff/deliver'?>"><i class="glyphicon glyphicon-record"></i> Booking</a></li>
             
          </ul>
             </div>
		  </div>
		  <div class="col-md-10">

		  			<div class="content-box-large">
		  				<div class="panel-body">
		  					<div class="row">
		  						<div class="col-md-2">
		  							<div id='external-events'>
	                                    <h4>Draggable Events</h4>
	                                    <div class='external-event'>My Event 1</div>
	                                    <div class='external-event'>My Event 2</div>
	                                    <div class='external-event'>My Event 3</div>
	                                    <div class='external-event'>My Event 4</div>
	                                    <div class='external-event'>My Event 5</div>
	                                    <div class='external-event'>My Event 6</div>
	                                    <div class='external-event'>My Event 7</div>
	                                    <div class='external-event'>My Event 8</div>
	                                    <div class='external-event'>My Event 9</div>
	                                    <div class='external-event'>My Event 10</div>
	                                    <div class='external-event'>My Event 11</div>
	                                    <div class='external-event'>My Event 12</div>
	                                    <div class='external-event'>My Event 13</div>
	                                    <div class='external-event'>My Event 14</div>
	                                    <div class='external-event'>My Event 15</div>
	                                    <p>
	                                    <input type='checkbox' id='drop-remove' /> <label for='drop-remove'>remove after drop</label>
	                                    </p>
                                    </div>
		  						</div>
		  						<div class="col-md-10">
		  							<div id='calendar'></div>
		  						</div>
		  					</div>
		  				</div>
		  			</div>


		  </div>
		</div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/fullcalendar/fullcalendar.js"></script>
    <script src="vendors/fullcalendar/gcal.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/calendar.js"></script>

