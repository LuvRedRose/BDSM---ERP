        <!-- Begin Page Content -->
        <div class="container-fluid">
          <form method="post" action="<?php echo base_url().'production/update_goods'; ?>"> 
            <div class="form-group">
              <label for="">Product Name</label>
              <input type="text" name="product_name" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted"><?php echo form_error('product_name'); ?></small>
            </div>

            <div class="form-group">
              <label for="">Quantity</label>
              <input type="text" name="stok" id="" class="form-control" placeholder="Input Quantity" aria-describedby="helpId">
              <small id="helpId" class="text-muted"><?php echo form_error('stok'); ?></small>
            </div>
             
             <div class="form-group">
               <label for="">Price</label>
               <input type="text" name="price" id="" class="form-control" placeholder="" aria-describedby="helpId">
               <small id="helpId" class="text-muted"><?php echo form_error('price'); ?></small>
             </div>


            <button type="submit" class="btn btn-primary">Save</button>
            <button class="btn btn-danger" type="reset">Reset</button>
          </form>
 
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
