        <!-- Begin Page Content -->
        <div class="container-fluid">

          <form method="post" action="<?php echo base_url().'production/update_raw'; ?>"> 
            <div class="form-group">
              <label for="">Material</label>
              <input type="text" name="material" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted"><?php echo form_error('material'); ?></small>
            </div>


            <div class="form-group">
              <label for="">stok</label>
              <input type="text" name="stok" id="" class="form-control" placeholder="Input Quantity" aria-describedby="helpId">
              <small id="helpId" class="text-muted"><?php echo form_error('stok'); ?></small>
            </div>
            

            <button type="submit" class="btn btn-primary">Save</button>
            <button class="btn btn-danger" type="reset">Reset</button>
          </form
 
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
