<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Warehouse</h1>
    </div>

    <div class="row">
    <!-- Button trigger modal -->
    <?php foreach($warehouse as $wh) { ?>
        <div class="card ml-3">
            <div class="card-body">
                <h4 class="card-title"><?php echo " ".$wh->ware_name;?></h4>
                <p class="card-text">
                    <strong>Capacity: </strong><?php echo $wh->ware_capacity;?> / 100000
                </p>
                <a class="btn btn-sm btn-primary" href="<?php echo base_url().'warehouse/insert'; ?>">Add Data</a>
            </div>
        </div>
    <?php } ?>
    </div>
</div>