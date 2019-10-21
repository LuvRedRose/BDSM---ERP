        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php foreach($raws as $rw) { ?>
          <form method="post" action="<?php echo base_url().'production/update_raw'; ?>"> 
            <div class="form-group">
              <label for="">Material</label>
              <input type="hidden" name="id_material" value="<?php echo $rw->id_material ?>">
              <input type="text" name="material" id="" class="form-control" placeholder="" 
              aria-describedby="helpId" value="<?php echo $rw->material; ?>">
              <small id="helpId" class="text-muted"><?php echo form_error('material'); ?></small>
            </div>

            
            <div class="form-group">
              <input type="hidden" name="stok" id="" class="form-control"
               aria-describedby="helpId" value="<?php echo $rw->stok; ?>">
              <small id="helpId" class="text-muted"><?php echo form_error('stok'); ?></small>
            </div>

            

            <button type="submit" class="btn btn-primary">Save</button>
            <button class="btn btn-danger" type="reset">Reset</button>
          </form>
        <?php } ?>
 
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
