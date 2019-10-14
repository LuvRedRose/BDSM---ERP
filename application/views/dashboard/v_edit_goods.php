        <!-- Begin Page Content -->
      <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Finished Goods - Update</h1>
          <a href="<?php echo base_url().'production/goods'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Back</a>
        </div>  

        <?php foreach($goods as $gds) {  ?>
          <form method="post" action="<?php echo base_url('production/update_goods'); ?>">

            <div class="form-group">
              <label for="product_name">Product Name</label>
              <input type="hidden" name="id_product" id="id_product" class="form-control" placeholder="" 
              aria-describedby="helpId" value="<?php echo $gds->id_product; ?>">
              </small><?php echo form_error('id_product'); ?></small>
              <input type="text" name="product_name" id="product_name" class="form-control" placeholder="" aria-describedby="helpId"
              value="<?php echo $gds->product_name; ?>">
              <?php echo form_error('product_name'); ?>
            </div>
            
            <div class="form-group">
              <label for="stok">Stok</label>
              <input type="number" name="stok" id="stok" class="form-control" placeholder="" aria-describedby="helpId"
              value="<?php echo $gds->stok; ?>">
              <?php echo form_error('stok'); ?>
            </div>

            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" name="price" id="price" class="form-control" placeholder="" aria-describedby="helpId"
              value="<?php echo $gds->price; ?>">
            </div>

          <button type="submit" class="btn btn-success" value="simpan">Save</button>
          </form>
        <?php } ?>

      </div>
      <!-- End of Main Content -->
