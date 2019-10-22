<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Stok In Material</h1>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
            Add Stock
          </button>
          
          <!-- Modal -->
          <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Stock In/Out/Reject Control</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                      </div>
                      <div class="modal-body">
                          <form method="post" action="<?php echo base_url().'production/add_stok'; ?>">
                            <div class="form-group">
                              <label for="material">Material Name</label>
                              <select class="form-control" name="material">
                                    <option selected="selected">-- Choose Material</option>
                                    <option value="Buah Jeruk">Buah Jeruk</option>
                                    <option value="Buah Mangga">Buah Mangga</option>
                                    <option value="Buah Anggur">Buah Anggur</option>
                                    <option value="Buah Alpukat">Buah Alpukat</option>
                                </select>
                              <small id="helpId" class="text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="stok_in">Stok In</label>
                                <input type="number" name="in" id="stok_in" class="form-control" placeholder="Input Stok In ..">
                            </div>
                            <div class="form-group">
                                <label for="stok_out">Stok Out</label>
                                <input type="number" name="out" id="stok_out" class="form-control" placeholder="Input Stok In ..">
                            </div>
                            <div class="form-group">
                                <label for="stok_reject">Stok Reject</label>
                                <input type="number" name="reject" id="stok_reject" class="form-control" placeholder="Input Stok In ..">
                            </div>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                      </form>
                  </div>
              </div>
          </div>
    </div>  
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Material</th>
            <th>Stok In</th>
            <th>Stok out</th>
            <th>Stok Reject</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    foreach($stok as $stk) {  ?>
        <tr>
            <td scope="row"><?php echo $no++; ?></td>
            <td><?php echo $stk->material; ?></td>
            <td><?php echo $stk->stok_in; ?></td>
            <td><?php echo $stk->stok_out; ?></td>
            <td><?php echo $stk->stok_reject; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

</div>