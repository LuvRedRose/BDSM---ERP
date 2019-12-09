<!-- Begin Page Content -->
<div class="container-fluid">

  <form method="post" action="<?php echo base_url().'maintenance/action_maintenance'; ?>">
   
    <div class="form-group">
        <label for="">Cluster</label>
        <input type="text" name="cluster" id="" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted"><?php echo form_error('cluster'); ?></small>
    </div>

    <div class="form-group">
        <label for="">Rack</label>
        <input type="text" name="racl" id="" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted"><?php echo form_error('rack'); ?></small>
    </div>

    <div class="form-group">
        <label for="">Quantity</label>
        <input type="text" name="quantity" id="" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted"><?php echo form_error('quantity'); ?></small>
    </div>

    <div class="form-group">
        <label for="">Activity</label>
        <select class="form-control" name="activity">
        <option select="selected">-Choose</option>
        <option>Out</option>
        <option>In</option>
      </select>
        <small id="helpId" class="text-muted"><?php echo form_error('cluster'); ?></small>
    </div>


     

    <button type="submit" class="btn btn-primary">Save</button>
    <button class="btn btn-danger" type="reset">Reset</button>
  </form>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
