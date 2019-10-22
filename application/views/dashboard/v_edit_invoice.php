<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Invoice</h1>
    </div>
    <a href="<?php echo base_url().'transaction/invoice'; ?>" class="btn btn-sm btn-primary">Back</a>

    <?php foreach($invoice as $inv) { ?>
    <form method="post" action="<?php echo base_url().'transaction/invoice_action'; ?>" class="mt-3">
        <div class="form-row">
            <div class="col">
                <label>Supplier</label>
                <select class="form-control" name="supplier">
                    <option value="">-- Choose Supplier</option>
                    <?php foreach($supplier as $spl){ ?>
                    <option <?php if($inv->id_supplier == $spl->id_supplier){echo "selected='selected'";} ?>
                    value="<?php echo $spl->id_supplier ?>"><?php echo $spl->supplier_name; ?></option>
                    <?php } ?>
                    <?php echo form_error('supplier'); ?>
                </select>
            </div>
            <div class="col">
                <label>Material</label>
                <input type="text" name="material" class="form-control" value="<?php echo $inv->material; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label>Quantity</label>
                <input type="number" name="stok" id="quantity" class="form-control" value="<?php echo $inv->stok; ?>">
                <?php echo form_error('quantity'); ?>
            </div>
            <div class="col">
                <label>Price</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $inv->id_invoice; ?>">
                <input type="number" name="price" class="form-control" id="price" value="<?php echo $inv->price; ?>">
                <?php echo form_error('price'); ?>
            </div>
        </div>

        <input type="submit" class="btn btn-info mt-5" name="status" value="outstanding">
        <input type="submit" class="btn btn-primary mt-5" name="status" value="posted">
    </form>
    <?php } ?>
</div>