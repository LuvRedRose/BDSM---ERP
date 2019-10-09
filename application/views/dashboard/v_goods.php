        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Finished Goods</h1>
            <a href="<?php echo base_url().'production/form_goods'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-money-bill"></i> Add Goods</a>
            </div>
            <table class="table table-striped table-inverse">
                <thead class="thead-inverse">
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
                                <a class="btn btn-sm btn-danger" href="<?php echo base_url().'production/delete_goods/'.$material->id_product; ?>">Delete</a>
                                <a class="btn btn-sm btn-primary" href="<?php echo base_url(). 'production/edit_goods/'.$material->id_product; ?>">Update</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
 
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
