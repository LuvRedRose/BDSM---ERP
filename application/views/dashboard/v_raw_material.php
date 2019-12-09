        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Raw Material</h1>
            <a href="<?php echo base_url().'production/form_raw'; ?>" class="btn-sm btn-primary shadow-sm"><i class="fas fa-money-bill"></i> Add Material</a>
            </div>
            <table class="table table-inverse mt-3" id="raw">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Material Name</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($raw as $rw) { ?>
                        <tr>
                            <td scope="row"><?php echo $no++; ?></td>
                            <td><?php echo $rw->material; ?></td>
                            <td><?php echo $rw->stok; ?></td>
                            <td>
                            <a href="<?php echo base_url().'production/edit_raw/'.$rw->id_material; ?>" class="btn btn-sm btn-primary">Update</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modelId">
                              Delete
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete Product</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            Are You Sure Want a Delete <?php echo $rw->material;?> ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                            <a href="<?php echo base_url().'production/delete_raw/'.$rw->id_material; ?>" class="btn btn-sm btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
 
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
