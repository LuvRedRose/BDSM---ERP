<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Invoice</h1>
    </div>
    <a href="<?php echo base_url().'transaction/invoice'; ?>" class="btn btn-primary">Back</a>

    <form method="post" action="<?php echo base_url().'transaction/update_action'; ?>">
        <?php foreach($invoice as $inv) { ?>
            <div class="form-row">
                <label></label>
                
            </div>
        <?php } ?>
    </form>
</div>