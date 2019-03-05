  <section id="global-settings" class="card">
    <div class="card-header">
        <h4 class="card-title"></h4>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body collapse in">
        <div class="card-block">
            <div class="card-text">
                <table class="table" id="mytable">
                                <thead >
                                    <th>Username</th>
                                    <th>Action</th>
                                    <th>Link</th>
                                    <th>Action Date</th>
                                </thead>
                                <tbody>
                                <?php foreach($user as $u){ ?>
                                    <tr>
                                    <td><?= $u->username ?></td>
                                    <td><?= $u->action ?></td>
                                    <td><?= $u->link?></td>
                                    <td><?= $u->date ?></td>
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