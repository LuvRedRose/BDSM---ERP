        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Finished Goods</h1>
            <a href="<?php echo base_url().'production/form_goods'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-money-bill"></i> Add Goods</a>
            </div>
            <table class="table table-inverse">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Material Name</th>
                        <th>Price</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($goods as $material) {
                    ?>
                        <tr>
                            <td scope="row"><?php echo $no++; ?></td>
                            <td><?php echo $material->product_name; ?></td>
                            <td><?php echo $material->price; ?></td>
                            <td><?php echo $material->stok; ?></td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="<?php echo base_url(). 'production/edit_goods/'.$material->id_product; ?>">Update</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modelId">
                                  Delete
                                </button>

                                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Items</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <h4 class="">Sure want a delete <?php echo $material->product_name; ?>?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-primary" data-dismiss="modal">No</a>
                                                <a class="btn btn-danger" href="<?php echo base_url().'production/delete_goods/'.$material->id_product; ?>">Yes</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Modal -->
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
 
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
