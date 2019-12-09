<!-- Begin Page Content -->
<div class="container-fluid">

  <form method="post" action="<?php echo base_url().'shipment/action_shipment'; ?>">
   
  <div class="form-group">
        <label for="">Shipment Date</label>
        <input type="date" name="shipment_date" id="" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted"><?php echo form_error('shipment_date'); ?></small>
    </div>

    <div class="form-group">
        <label for="">Shipment Name</label>
        <input type="text" name="shipment_name" id="" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted"><?php echo form_error('shipment_name'); ?></small>
    </div>

    <div class="form-group">
        <label for="">Departure</label>
        <input type="text" name="departure" class="form-control">
        <small id="helpId" class="text-muted"><?php echo form_error('departure'); ?></small>
    </div>

    <div class="form-group">
        <label for="">Destination</label>
        <input type="text" name="destination" class="form-control">
        <small id="helpId" class="text-muted"><?php echo form_error('destination'); ?></small>
    </div>
    
    <div class="form-group">
        <label for="">Quantity</label>
        <input type="text" name="quantity" class="form-control">
        <small id="helpId" class="text-muted"><?php echo form_error('quantity'); ?></small>
    </div>

    <div class="form-group">
        <label for="">Duration</label>
        <input type="text" name="duration" class="form-control">
        <small id="helpId" class="text-muted"><?php echo form_error('duration'); ?></small>
    </div>


     

    <button type="submit" class="btn btn-primary">Save</button>
    <button class="btn btn-danger" type="reset">Reset</button>
  </form>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
