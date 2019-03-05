  <section id="global-settings" class="card">
    <div class="card-header">
        <h4 class="card-title">Tour Packages</h4>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                <li><a <a href="<?= base_url() . 'AdminController/addPackage/'?>"><i class="icon-plus"></i></a></li>
            </ul>
        </div>
    </div>
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
                                    <th>Package Start Date</th>
                                    <th>Package End Date</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                <?php foreach($user as $u){ ?>
                                    <tr>
                                    <td><a href="<?= base_url() . "AdminController/viewPackage/".$u->package_id ?>"><?= $u->package_name ?> </a></td>
                                    <td><?= $u->package_place ?></td>
                                    <td><?= date("F j, Y h:i A", $u->package_dateA) ?></td>
                                    <td><?= date("F j, Y h:i A", $u->package_dateE) ?></td>
                                    <td><?= $u->package_status ?></td>
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