<div class="content-body">
<div class="card">
    <div class="card-header" style="background-color:#009788; border-color:#009788">
     <center> <h4 class="card-title" style="font-family:Georgia; color: white; font-size:22;"> Hotel Accommodation Details</h4></center>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a href="<?= base_url() . 'AdminController/viewHotel/'.$tour->tour_id."/".$tour->package_id_f?>">Edit</a></li>
                       </ul>
                </div>
            </div>
    
    <div class="card-body collapse in">
        <div class="card-block">
            <div class="card-text">
            <table class="table">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Hotel Name</th>
                                <th>Remaining Slots</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h4><?=$tour->tour_name?></h4>
                                </td>
                                <td>
                                    <h4><?=$tour->tour_slots?></h4>
                                </td>
                                <td>
                                    <h4><?=$tour->description?></h4>
                                </td>

                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
</div>
<div class="content-body">
<div class="card">
    <div class="card-header">
        <h4 class="card-title"><?= $tour->tour_name ?> - Rates</h4>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a <a href="<?= base_url() . 'AdminController/addRate/'.$tour->tour_id."/".$user->package_id?>"><i class="icon-plus"></i></a></li>
            </ul>
        </div>
    </div>
    
    <div class="card-body collapse in">
        <div class="card-block">
            <div class="card-text">
            <table class="table">
            <thead class="thead-inverse">
                            <tr>
                                <th>Number of Days/Nights</th>
                                <th>Number of people</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($rate as $u): ?>
                            <tr>
                                <td>
                                    <?=$u->rate_name?>
                                </td>
                                <td>
                                    <?=$u->rate_person?>
                                </td>
                                <td>
                                    ₱<?=$u->rate_price?>
                                </td>
                                <td>
                                    <a href="<?= base_url() . 'AdminController/deleteRate/'.$u->rate_id?>"  data-toggle="tooltip" title="Delete"onclick ="return confirm('Do you really want to delete?');" class="btn btn-danger"><i class="icon-trash4"></i></a>
                                </td>

                            </tr>
                             <?php endforeach ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
</div>