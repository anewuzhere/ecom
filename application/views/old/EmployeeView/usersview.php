<section id="global-settings" class="card">
    <div class="card-header">
        <h4 class="card-title">Account List</h4>
        
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body collapse in">
        <div class="card-block">
            <div class= "row"><?php if(isset($error)): ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <h4>MESSAGE</h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?= $error ?>
                                <?php endif ?></div>

            <div class="card-text">
                <table class="table" id="mytable">
                                <thead >
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>User Type</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                <?php foreach($user as $u){ ?>
                                    <tr>
                                    <td><a href="<?= base_url() . "EmployeeController/viewAccount/".$u->account_id ?>"><?= $u->firstname ?> <?= $u->middlename ?> <?= $u->lastname ?></a></td>
                                    <td><?= $u->email ?></td>
                                    <td><?= $u->access_lvl ?></td>
                                    <td>Address</td>
                                    <td>2</td>
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
      'lengthChange': true,
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