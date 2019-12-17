<!-- Begin Page Content -->
<div class="container-fluid">
    <?php foreach($maintenance as $mtn) {  ?>
  <form method="post" action="<?php echo base_url().'maintenance/update'; ?>">

    <div class="form-group">
        <label for="">Machine Number</label>
        <input type="text" name="mach_number" id="" class="form-control" placeholder="" aria-describedby="helpId" 
        value="<?php echo $mtn->mach_number; ?>" readonly>
        <input type="hidden" name="mach_id" id="" class="form-control" placeholder="" aria-describedby="helpId" 
        value="<?php echo $mtn->mach_id; ?>">
        <small id="helpId" class="text-muted"><?php echo form_error('mach_number'); ?></small>
    </div>

    <div class="form-group">
        <label for="">Shipment Date</label>
        <input type="date" name="start_date" id="" class="form-control" placeholder="" aria-describedby="helpId"
        value="<?php echo $mtn->mach_sd_date; ?>" readonly>
        <small id="helpId" class="text-muted"><?php echo form_error('start_date'); ?></small>
    </div>
    
    <div class="form-group">
        <label for="">End Date</label>
        <input type="date" name="end_date" id="" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted"><?php echo form_error('end_date'); ?></small>
    </div>

    <div class="form-group">
        <label for="">Capacity</label>
        <input type="text" name="capacity" id="" class="form-control" placeholder="" aria-describedby="helpId"
        value="<?php echo $mtn->mach_capacity; ?>">
        <small id="helpId" class="text-muted"><?php echo form_error('capacity'); ?></small>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <button class="btn btn-danger" type="reset">Reset</button>
  </form>
    <?php } ?>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
