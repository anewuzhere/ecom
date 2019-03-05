
<div class="content-body"><a href = "<?= base_url() . 'AdminController/editPackage/'.$user->package_id?>" >[Edit]</a>
<a href = "<?= base_url() . 'AdminController/deletePackage/'.$user->package_id?>" onclick ="return confirm('Do you really want to Delete?');">[Delete]</a>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Package Inclusions</h4>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a <a href="<?= base_url() . 'AdminController/addInclusion/'.$user->package_id?>"><i class="icon-plus"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body collapse in">
        <div class="card-block">
            <div class="card-text">
                <table class="table" id="mytable">
                                <thead >
                                    <th>Inclusion</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                </thead>
                                <tbody>
                                <?php foreach($inc as $u){ ?>
                                    <tr>
                                    <td><a href="<?= base_url() . 'AdminController/viewInclusion/'.$u->inc_id.'/'.$u->inc_package_id ?>"><?= $u->inclusions ?> </a></td>
                                    <td><?= $u->price ?></td>
                                    <td><?= $u->description ?></td>
                                    <?php } ?>
                                    </tr>
        
                                </tbody>
                            </table>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Hotel Accommodation</h4>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a <a href="<?= base_url() . 'AdminController/addHotel/'.$user->package_id?>"><i class="icon-plus"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body collapse in">
        <div class="card-block">
            <div class="card-text">
                <table class="table" id="mytable2">
                                <thead >
                                    <th>Hotel Name</th>
                                    <th>Remaining Slots</th>
                                    <th>Description</th>
                                </thead>
                                <tbody>
                                <?php foreach($tour as $v){ ?>
                                    <tr>
                                    <td><a href="<?= base_url() . 'AdminController/viewRate/'.$v->tour_id.'/'.$v->package_id_f ?>"><?= $v->tour_name ?> </a></td>
                                    <td><?= $v->tour_slots ?></td>
                                    <td><?= $v->description ?></td>
                                    <?php } ?>
                                    </tr>
        
                                </tbody>
                            </table>
            </div>
        </div>
    </div>
</div>


</div>
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
                
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});    
                $("#mytable2").DataTable({
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