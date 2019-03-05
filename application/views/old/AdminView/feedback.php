  <section id="global-settings" class="card">
    <div class="card-header">
        <h4 class="card-title">Tour Packages Ratings</h4>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                
            </ul>
        </div>
    </div>
     <div class="card">
            <div class="card-header">
                <h4 class="card-title"></h4>
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
		color: "#FFA500",
		name: "Q1",
		indexLabel: "{label} {y}",
		dataPoints: [
		    <?php foreach($four as $for){ ?>
            {y: <?=$for->ratings?> , label: "<?=$for->package_name?>"},
            <?php } ?>
		]
		}]
});
chart.render();

}
</script>   

    <div class="card-body collapse in">
        <div class="card-block">
            <div class= "row"><?php if (isset($error)): ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <h4>MESSAGE</h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?= $error ?>
                                <?php endif ?></div>

            <div class="card-text">
                <table class="table" id="mytable">
                                <thead >
                                    <th>Package Name</th>
                                    <th>Province/Municipality</th>
                                   
                                    <th>Ratings</th>
                                </thead>
                                <tbody>
                                <?php foreach($user as $u){ ?>
                                    <tr>
                                    <td><a href="<?= base_url() . "AdminController/viewPackage/".$u->package_id ?>"><?= $u->package_name ?> </a></td>
                                    <td><?= $u->package_place ?></td>
                                    
                                    <td><?= $u->ratings ?></td>
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