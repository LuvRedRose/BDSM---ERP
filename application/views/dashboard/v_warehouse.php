<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Warehouse</h1>
    </div>

    <div class="row">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
      Warehouse
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    Body
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <?php  
    foreach ($warehouse as $w){ ?>
        <div class="card ml-3">
            <img class="card-img-top" src="<?php echo base_url().'uploads/warehouse-512.png'; ?>" alt="">
            <div class="card-body">
                <h4 class="card-title"><?php echo $w->ware_name; ?></h4>
                <p class="card-text"><?php echo $w->ware_capacity; ?>/100000</p>
            </div>
        </div>
    <?php } ?>
    </div>''
</div>