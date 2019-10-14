    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Production</h1>
        </div>

        <form>
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
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label>Stok In</label>
                    <input type="number" class="form-control">
                </div>
                <div class="col">
                    <label>Finished Good</label>
                    <input type="number" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-2">Submit</button>
            
        </form>
    </div>