        <!-- Begin Page Content -->
        <div class="container-fluid">
      
          <form method="post" action="<?php echo base_url().'production/action_raw'; ?>">
           
            <div class="form-group">
              <label for="">Material</label>
              <input type="text" name="material" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <?php echo form_error('material'); ?>
            </div>

            <div class="form-group">
              <label for="">Quantity</label>
              <input disabled type="text" name="stok" id="" class="form-control" placeholder="Input Quantity" aria-describedby="helpId" value="0">
              <?php echo form_error('stok'); ?>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <button class="btn btn-danger" type="reset">Reset</button>
          </form>
 
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
