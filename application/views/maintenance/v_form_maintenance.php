<!-- Begin Page Content -->
<div class="container-fluid">

  <form method="post" action="<?php echo base_url().'maintenance/action_add'; ?>">
   
    <div class="form-group">
      <label>Machine Number</label>
      <select class="form-control" name="machine">
        <option select="selected">-Choose</option>
        <option>MACH 1</option>
        <option>MACH 2</option>
        <option>MACH 3</option>
        <option>MACH 4</option>
      </select>
    </div>

    <div class="form-group">
        <label for="">Start Date</label>
        <input type="date" name="start_date" id="" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted"><?php echo form_error('start_date'); ?></small>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <button class="btn btn-danger" type="reset">Reset</button>
  </form>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
