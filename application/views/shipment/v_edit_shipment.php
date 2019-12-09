<!-- Begin Page Content -->
<div class="container-fluid">


    <?php foreach($shipment as $shp) {  ?>
  <form method="post" action="<?php echo base_url().'shipment/update'; ?>">
   
  <div class="form-group">
        <label for="">Shipment Date</label>
        <input type="date" name="shipment_date" id="" class="form-control" placeholder="" aria-describedby="helpId"
        value="<?php echo $shp->ship_date; ?>" readonly>
        <input type="hidden" name="ship_id" class="form-control" value="<?php echo $shp->ship_id; ?>">
        <small id="helpId" class="text-muted"><?php echo form_error('shipment_date'); ?></small>
    </div>

    <div class="form-group">
        <label for="">Shipment Name</label>
        <input type="text" name="shipment_name" id="" class="form-control" placeholder="" aria-describedby="helpId"
        value="<?php echo $shp->ship_name; ?>">
        <small id="helpId" class="text-muted"><?php echo form_error('shipment_name'); ?></small>
    </div>

    <div class="form-group">
        <label for="">Departure</label>
        <input type="text" name="departure" class="form-control" value="<?php echo $shp->ship_depart; ?>">
        <small id="helpId" class="text-muted"><?php echo form_error('departure'); ?></small>
    </div>

    <div class="form-group">
        <label for="">Destination</label>
        <input type="text" name="destination" class="form-control" value="<?php echo $shp->ship_destination; ?>">
        <small id="helpId" class="text-muted"><?php echo form_error('destination'); ?></small>
    </div>
    
    <div class="form-group">
        <label for="">Quantity</label>
        <input type="text" name="quantity" class="form-control" value="<?php echo $shp->ship_qty; ?>">
        <small id="helpId" class="text-muted"><?php echo form_error('quantity'); ?></small>
    </div>

    <div class="form-group">
        <label for="">Duration</label>
        <input type="text" name="duration" class="form-control" value="<?php echo $shp->ship_duration; ?>">
        <small id="helpId" class="text-muted"><?php echo form_error('duration'); ?></small>
    </div>


     

    <button type="submit" class="btn btn-primary">Save</button>
    <button class="btn btn-danger" type="reset">Reset</button>
  </form>
    <?php } ?>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
