<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Purchase Form</h1>
    </div>
    <a href="<?php echo base_url().'supplier/index';?>" class="btn btn-sm btn-primary mb-3">Back</a>

    <form method="post" action="<?php echo base_url().'transaction/order_material';?>">
        <div class="form-row">
            <div class="col">
            <label>Supplier</label>
                <select class="form-control" name="supplier">
                <option value="">- Choose Supplier</option>
                <?php foreach($supplier as $spl) { ?>
                    <option <?php if(set_value('supplier') == $spl->id_supplier){echo "selected='selected'";} ?>
                    value="<?php echo $spl->id_supplier; ?>"><?php echo $spl->supplier_name; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col">
                <label>Material</label>
                <input type="text" name="material" id="material" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label>Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control">
            </div>
            <div class="col">
                <label>Price</label>
                <input type="number" name="price" id="price" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-5">Submit</button>
    </form>
</div>