<div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Line Chart</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <a href="<?= base_url() . "AdminController/forcasting/".date("Y",strtotime('- 4 year',time())) ?>"  class="btn btn-secondary btn-hover upgrade-to-pro"><?php echo date("Y",strtotime('- 4 year',time())) ?></a>
                            <a href="<?= base_url() . "AdminController/forcasting/".date("Y",strtotime('- 3 year',time())) ?>"  class="btn btn-secondary btn-hover upgrade-to-pro"><?php echo date("Y",strtotime('- 3 year',time())) ?></a>
                            <a href="<?= base_url() . "AdminController/forcasting/".date("Y",strtotime('- 2 year',time())) ?>"  class="btn btn-secondary btn-hover upgrade-to-pro"><?php echo date("Y",strtotime('- 2 year',time())) ?></a>
                            <a href="<?= base_url() . "AdminController/forcasting/".date("Y",strtotime('- 1 year',time())) ?>"  class="btn btn-secondary btn-hover upgrade-to-pro"><?php echo date("Y",strtotime('- 1 year',time())) ?></a>
                            <a href="<?= base_url() . "AdminController/forcasting/".date("Y") ?>"  class="btn btn-secondary btn-hover upgrade-to-pro"><?php echo date("Y") ?></a>
                        </ul>
                    </div>
                </div>
				<?php
				$jan = 0;$feb = 0;$mar = 0;$apr = 0;$may = 0;$jun = 0;$jul = 0;$aug = 0;$sep = 0;$oct = 0;$nov = 0;$dec = 0;
				foreach($user as $mos){
					if($mos->date == "1"){
						$jan += $mos->cost;
					}
					if($mos->date == "2"){
						$feb += $mos->cost;
					}
					if($mos->date == "3"){
						$mar += $mos->cost;
					}
					if($mos->date == "4"){
						$apr += $mos->cost;
					}
					if($mos->date == "5"){
						$may += $mos->cost;
					}
					if($mos->date == "6"){
						$jun += $mos->cost;
					}
					if($mos->date == "7"){
						$jul += $mos->cost;
					}
					if($mos->date == "8"){
						$aug += $mos->cost;
					}
					if($mos->date == "9"){
						$sep += $mos->cost;
					}
					if($mos->date == "10"){
						$oct += $mos->cost;
					}
					if($mos->date == "11"){
						$nov += $mos->cost;
					}
					if($mos->date == "12"){
						$dec += $mos->cost;
					}
					
				}

				$jan_p = round(($nov + $dec + $jan)/3,0);
				$feb_p = round(($dec + $jan + $feb)/3,0);
				$mar_p = round(($jan + $feb + $mar)/3,0);
				$apr_p = round(($feb + $mar + $apr)/3,0);
				$may_p = round(($mar + $apr + $may)/3,0);
				$jun_p = round(($apr + $may + $jun)/3,0);
				$jul_p = round(($may + $jun + $jul)/3,0);
				$aug_p = round(($jun + $jul + $aug)/3,0);
				$sep_p = round(($jul + $aug + $sep)/3,0);
				$oct_p = round(($aug + $sep + $oct)/3,0);
				$nov_p = round(($sep + $oct + $nov)/3,0);
				$dec_p = round(($oct + $nov + $dec)/3,0);
					$year8 = 0;$year7 = 0;$year6 = 0;$year5 = 0;$year4 = 0;$year3 = 0;$year2 = 0;$year1 = 0;$yearC= 0;
				foreach($datee as $year){
					if($year->dateyear == date("Y",strtotime('- 8 year',time()))){
						$year8 += $year->cost;
					}
					if($year->dateyear == date("Y",strtotime('- 7 year',time()))){
						$year7 += $year->cost;
					}
					if($year->dateyear == date("Y",strtotime('- 6 year',time()))){
						$year6 += $year->cost;
					}
					if($year->dateyear == date("Y",strtotime('- 5 year',time()))){
						$year5 += $year->cost;
					}
					if($year->dateyear == date("Y",strtotime('- 4 year',time()))){
						$year4 += $year->cost;
					}
					if($year->dateyear == date("Y",strtotime('- 3 year',time()))){
						$year3 += $year->cost;
					}
					if($year->dateyear == date("Y",strtotime('- 2 year',time()))){
						$year2 += $year->cost;
					}
					if($year->dateyear == date("Y",strtotime('- 1 year',time()))){
						$year1 += $year->cost;
					}
					if($year->dateyear == date("Y")){
						$yearC += $year->cost;
					}
				}
				$year1_p = ($year8 + $year7 + $year6 + $year5 + $year4 + $year3 + $year2 + $year1 + $yearC )/9;
				$year2_p = ($year1_p + $year7 + $year6 + $year5 + $year4 + $year3 + $year2 + $year1 + $yearC )/9;
				$year3_p = ($year1_p + $year2_p + $year6 + $year5 + $year4 + $year3 + $year2 + $year1 + $yearC )/9;
				?>

                <div class="card-body">
                    <div class="card-block">
                        <p class="card-text">The blue line represent actual total sales of the month the redline 
                        represent forcasted value of the month.</p>
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
				

					 <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-inverse">
                        <TR>
                                    <th>Month</th>
                                    <th>Actual Total Sales</th>
                                    <th>Forcasted value</th>
                            </TR>          
                                   
                                </thead>
                                <tbody>
								<tr>
								<td>January</td>
								<td><?=$jan?></td>
								<td><?=$jan_p?></td>
								</tr>
								<tr>
								<td>February</td>
								<td><?=$feb?></td>
								<td><?=$feb_p?></td>
								</tr>
								<tr>
								<td>March</td>
								<td><?=$mar?></td>
								<td><?=$mar_p?></td>
								</tr><tr>
								<td>April</td>
								<td><?=$apr?></td>
								<td><?=$apr_p?></td>
								</tr><tr>
								<td>May</td>
								<td><?=$may?></td>
								<td><?=$may_p?></td>
								</tr><tr>
								<td>June</td>
								<td><?=$jun?></td>
								<td><?=$jun_p?></td>
								</tr><tr>
								<td>July</td>
								<td><?=$jul?></td>
								<td><?=$jul_p?></td>
								</tr><tr>
								<td>August</td>
								<td><?=$aug?></td>
								<td><?=$aug_p?></td>
								</tr><tr>
								<td>September</td>
								<td><?=$sep?></td>
								<td><?=$sep_p?></td>
								</tr><tr>
								<td>October</td>
								<td><?=$oct?></td>
								<td><?=$oct_p?></td>
								</tr><tr>
								<td>November</td>
								<td><?=$nov?></td>
								<td><?=$nov_p?></td>
								</tr><tr>
								<td>December</td>
								<td><?=$dec?></td>
								<td><?=$dec_p?></td>
								</tr>



                                </tbody>
                    </table>
					
	
            </div>



                    </div>
                </div>
				 <div class="card-body">
                    <div class="card-block">
                        <p class="card-text">The blue line represent actual total sales of the years the redline 
                        represent forcasted value of the year.</p>
                        <div id="chartContainer2" style="height: 370px; width: 100%;"></div>

                    </div>
                </div>

	 <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-inverse">
                        <TR>
                                    <th>Year</th>
                                    <th>Total Sales</th>
                            </TR>          
                                   
                                </thead>
                                <tbody>
								<tr>
								<td><?=date("Y",strtotime('- 8 year', time()));?></td>
								<td><?=$year8?></td>
								</tr>
								<tr>
								<td><?=date("Y",strtotime('- 7 year', time()));?></td>
								<td><?=$year7?></td>
								</tr>
								<tr>
								<td><?=date("Y",strtotime('- 6 year', time()));?></td>
								<td><?=$year6?></td>
								</tr>
								<tr>
								<td><?=date("Y",strtotime('- 5 year', time()));?></td>
								<td><?=$year5?></td>
								</tr>
								<tr>
								<td><?=date("Y",strtotime('- 4 year', time()));?></td>
								<td><?=$year4?></td>
								</tr>
								<tr>
								<td><?=date("Y",strtotime('- 3 year', time()));?></td>
								<td><?=$year3?></td>
								</tr>
								<tr>
								<td><?=date("Y",strtotime('- 2 year', time()));?></td>
								<td><?=$year2?></td>
								</tr>
								<tr>
								<td><?=date("Y",strtotime('- 1 year', time()));?></td>
								<td><?=$year1?></td>
								</tr>
								<tr>
								<td><?=date("Y");?></td>
								<td><?=$yearC?></td>
								</tr>

								


                                </tbody>
                    </table>
					
	
            </div>




            </div>
        </div>
    </div>
            <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Total Sales Profit by months - <?=$yeartitle?>"
	},
	axisY: {
		title: "Profit",
		valueFormatString: "₱#,##0.##",

	},

	data: [{
		type: "spline",
		markerSize: 5,
		name: "Actual",
		showInLegend: true,
		yValueFormatString: "#,##0.##",
		dataPoints: [
			{label: "January" , y: <?= $jan?>},
			{label: "Febuary" , y: <?= $feb?>},
			{label: "March" , y: <?= $mar?>},
			{label: "April" , y: <?= $apr?>},
			{label: "May" , y: <?= $may?>},
			{label: "June" , y: <?= $jun?>},
			{label: "July" , y: <?= $jul?>},
			{label: "August" , y: <?= $aug?>},
			{label: "September" , y: <?= $sep?>},
			{label: "October" , y: <?= $oct?>},
			{label: "November" , y:<?= $nov?>},
			{label: "December" , y: <?= $dec?>},
			

		]

	},
	{
		type: "spline",
		markerSize: 5,
		showInLegend: true,
		name: "Interval = 3 ",
		yValueFormatString: "#,##0.##",
	 dataPoints: [
			{label: "January" , y: <?= $jan_p?>},
			{label: "Febuary" , y: <?= $feb_p?>},
			{label: "March" , y: <?= $mar_p?>},
			{label: "April" , y: <?= $apr_p?>},
			{label: "May" , y: <?= $may_p?>},
			{label: "June" , y: <?= $jun_p?>},
			{label: "July" , y: <?= $jul_p?>},
			{label: "August" , y: <?= $aug_p?>},
			{label: "September" , y: <?= $sep_p?>},
			{label: "October" , y: <?= $oct_p?>},
			{label: "November" , y:<?= $nov_p?>},
			{label: "December" , y: <?= $dec_p?>},
		]
	}]
});
 
chart.render();
 
var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	title:{
		text: "Total Sales Profit yearly"
	},
	axisY: {
		title: "Profit",
		valueFormatString: "₱#,##0.##",

	},

	data: [{
		type: "spline",
		markerSize: 5,
		name: "Actual",
		showInLegend: true,
		yValueFormatString: "#,##0.##",
		dataPoints: [
			{label: "<?=date("Y",strtotime('- 8 year', time()));?>" , y:<?= $year8?>},
			{label: "<?=date("Y",strtotime('- 7 year', time()));?>" , y: <?= $year7?>},
			{label: "<?=date("Y",strtotime('- 6 year', time()));?>" , y: <?= $year6?>},
			{label: "<?=date("Y",strtotime('- 5 year', time()));?>" , y: <?= $year5?>},
			{label: "<?=date("Y",strtotime('- 4 year', time()));?>" , y: <?= $year4?>},
			{label: "<?=date("Y",strtotime('- 3 year', time()));?>" , y: <?= $year3?>},
			{label: "<?=date("Y",strtotime('- 2 year', time()));?>" , y: <?= $year2?>},
			{label: "<?=date("Y",strtotime('- 1 year', time()));?>" , y: <?= $year1?>},
			{label: "<?=date("Y");?>" , y: <?= $yearC?>},
			{label: "<?=date("Y",strtotime('+ 1 year', time()));?>" , y: <?=0?>},
			{label: "<?=date("Y",strtotime('+ 2 year', time()));?>" , y: <?= 0?>},
			{label: "<?=date("Y",strtotime('+ 3 year', time()));?>" , y: <?= 0?>},
		]

	},
	{
		type: "spline",
		markerSize: 5,
		showInLegend: true,
		name: "Interval = 3 ",
		yValueFormatString: "#,##0.##",
	 dataPoints: [
			{label: "<?=date("Y",strtotime('- 8 year', time()));?>" , y:<?= 0?>},
			{label: "<?=date("Y",strtotime('- 7 year', time()));?>" , y: <?= 0?>},
			{label: "<?=date("Y",strtotime('- 6 year', time()));?>" , y: <?= 0?>},
			{label: "<?=date("Y",strtotime('- 5 year', time()));?>" , y: <?= 0?>},
			{label: "<?=date("Y",strtotime('- 4 year', time()));?>" , y: <?= 0?>},
			{label: "<?=date("Y",strtotime('- 3 year', time()));?>" , y: <?= 0?>},
			{label: "<?=date("Y",strtotime('- 2 year', time()));?>" , y: <?= 0?>},
			{label: "<?=date("Y",strtotime('- 1 year', time()));?>" , y: <?= 0?>},
			{label: "<?=date("Y");?>" , y: <?= $yearC?>},
			{label: "<?=date("Y",strtotime('+ 1 year', time()));?>" , y: <?= $year1_p?>},
			{label: "<?=date("Y",strtotime('+ 2 year', time()));?>" , y: <?= $year2_p?>},
			{label: "<?=date("Y",strtotime('+ 3 year', time()));?>" , y: <?= $year3_p?>},

		]
	}]
});
 
chart2.render();
 

}
  
</script>