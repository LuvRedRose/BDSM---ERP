    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Production</h1>
        </div>
        <form method="post" action="<?php echo base_url().'production/product_action'; ?>">
            <div class="form-row">
                <div class="col">
                    <label>Material</label>
                    <select class="form-control" name="material">
                    <option value="">- Choose Material</option>
                    <?php foreach($raw as $r){ ?> 
                    <option <?php if(set_value('material') == $r->id_material){echo "selected='selected'";} ?> 
                    value="<?php echo $r->id_material; ?>"><?php echo $r->material; ?></option>
                    <?php } ?>
                    </select>
                    <small class="text-muted"><?php echo form_error('material'); ?></small> 
                </div>
                <div class="col">
                    <label>Product Name</label>
                    <select class="form-control" name="product">
                    <option value="">- Choose Product</option>
                    <?php foreach($goods as $gds) {  ?>
                    <option <?php if(set_value('product') == $gds->id_product){echo "selected='selected'";}?>
                    value="<?php echo $gds->id_product; ?>"><?php echo $gds->product_name; ?></option>
                    <?php } ?>
                    </select>
                    <small class="text-muted"><?php echo form_error('product'); ?></small> 
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label>Stok In</label>
                    <input type="number" class="form-control" name="stok_in" id="barang_masuk" onkeyup="result();"/>
                    <small class="text-muted"><?php echo form_error('stok_in'); ?></small>
                </div>
                <div class="col">
                    <label>Finished Good</label>
                    <input disable type="number" class="form-control" name="stok_finish" id="barang_jadi"/>
                    <small class="text-muted"><?php echo form_error('stok_finish'); ?></small>
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-2">Submit</button>
            
        </form>
    </div>