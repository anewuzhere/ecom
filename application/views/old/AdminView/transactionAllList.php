  
  
  <section id="global-settings" class="card">
      
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Most availed tours 
                	<?php $number = array(); ?>
    <?php 
        foreach($coun as $cou){
            $number[] = $cou->count_id;
            
        }
    ?></h4> 
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div id="chartContainer" style="height: 400px; width: 100%;"></div>
            </div>
        </div>
    </div>
    
    <script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
        text: ""
	},

	data: [{
		type: "stackedColumn",
		showInLegend: false,
		color: "#9cd6b8",
		name: "Q1",
		indexLabel: "{label} {y}",
		dataPoints: [
            <?php $digi = 0;?>
		    <?php  foreach($four as $for){ ?>
		    <?php foreach($pack as $pac){?>
		    <?php if($pac->package_id == $for->package_id){?>
            {y: <?php print_r($number[$digi])?> , label: "<?=$pac->package_name?>"},
             <?php $digi++; ?>   
            <?php } ?>
            <?php } ?>
            <?php } ?>
		]
		}]
});
chart.render();

}
</script>   

    <div class="card-body collapse in">
        <div class="card-block">
        <div class= "row"><?php if ($error): ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <h4>MESSAGE</h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?= $error ?>
                                <?php endif ?></div>
            <div class="card-text">
                <table class="table" id="mytable">
                                <thead >
                                    <th></th>
                                    <th>Package Name</th>
                                    <th>Account Name</th>
                                    <th>Travel Tour Date</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                <?php foreach($transaction as $u){ ?>
                                <?php foreach($package as $v){ ?>
                                <?php if($u->package_id == $v->package_id) {?>
                                    <tr>
                                    <td><a href="<?= base_url() . "AdminController/viewTransaction/".$u->transaction_id ?>"><?= $u->transaction_id ?> </a></td>
                                    <td><?= $v->package_name ?></td>
                                    <td><?= $u->name ?></td>
                                    <td><?= date("F j, Y", $u->date) ?></td>
                                    <td><?= $u->status ?></td>
                                    <?php } ?>
                                    <?php } ?>
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