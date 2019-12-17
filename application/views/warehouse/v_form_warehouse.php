<!-- Begin Page Content -->
<div class="container-fluid">

  <form method="post" action="<?php echo base_url().'warehouse/add'; ?>">
   
  <div class="form-group">
        <label for="">Warehouse</label>
        <select class="form-control" name="ware_use">
          <option value="1">Warehouse 1</option>
          <option value="2">Warehouse 2</option>
          <option value="3">Warehouse 3</option>
          <option value="4">Warehouse 4</option>
        </select>
        <small id="helpId" class="text-muted"><?php echo form_error('ware_use'); ?></small>
    </div>

    <div class="form-group">
        <label for="">Cluster</label>
        <input type="text" name="cluster" id="" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted"><?php echo form_error('cluster'); ?></small>
    </div>

    <div class="form-group">
        <label for="">Rack</label>
        <input type="text" name="rack" id="" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted"><?php echo form_error('rack'); ?></small>
    </div>

    <div class="form-group">
        <label for="">Quantity</label>
        <input type="text" name="quantity" id="" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted"><?php echo form_error('quantity'); ?></small>
    </div>
    
    <div class="form-group">
    <label>Product Name</label>
                                                <select class="form-control" name="product_name">
                                                <option value="">-Choose Product</option>
                                                <?php foreach($goods as $gds) {  ?>
                                                <option <?php if(set_value('product') == $gds->id_product){echo "selected='selected'";}?>
                                                value="<?php echo $gds->id_product; ?>"><?php echo $gds->product_name; ?></option>
                                                <?php } ?>
                                                </select>
        <small class="text-muted"><?php echo form_error('product_name'); ?></small>
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
