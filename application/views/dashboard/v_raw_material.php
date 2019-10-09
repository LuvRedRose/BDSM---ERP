        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Raw Material</h1>
            <a href="<?php echo base_url().'production/form_raw'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-money-bill"></i> Add Material</a>
            </div>
            <table class="table table-striped table-inverse">
                <thead class="thead-inverse">
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
                    foreach ($raw as $rw) {
                    ?>
                        <tr>
                            <td scope="row"><?php echo $no++; ?></td>
                            <td><?php echo $rw->material; ?></td>
                            <td><?php echo $rw->stok; ?></td>
                            <td>
                            <a href="<?php echo base_url().'production/delete_raw/'.$rw->id_material; ?>" class="btn btn-sm btn-danger">Delete</a>
                            <a href="<?php echo base_url().'production/edit_raw/'.$rw->id_material; ?>" class="btn btn-sm btn-primary">Update</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
 
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
