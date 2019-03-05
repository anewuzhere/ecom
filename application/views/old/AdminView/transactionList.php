  <section id="global-settings" class="card">
    <div class="card-header">
        <h4 class="card-title"></h4>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>            </ul>
        </div>
    </div>
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
                                <?php if($u->isCurrent == "y") {?>
                                    <tr>
                                    <td><a href="<?= base_url() . "AdminController/viewTransaction/".$u->transaction_id ?>"><?= $u->transaction_id ?> </a></td>
                                    <td><?= $v->package_name ?></td>
                                    <td><?= $u->name ?></td>
                                    <td><?= date("F j, Y", $u->date) ?></td>
                                    <td><?= $u->status ?></td>
                                    <?php } ?>
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