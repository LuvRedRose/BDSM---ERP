        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transaction</h1>
            <a href="<?php echo base_url().'supplier'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-money-bill"></i> Buy Material</a>
            </div>

        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Id_Invoice</th>
                    <th>Supplier Name</th>
                    <th>Material</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Purchase Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach($pembelian as $bli) {  ?>
                <tr>
                    <td scope="row"><?php echo $no++; ?></td>
                    <td><?php echo $bli->supplier_name; ?></td>
                    <td><?php echo $bli->material; ?></td>
                    <td><?php echo $bli->stok; ?></td>
                    <td><?php echo $bli->price; ?></td>
                    <td></td>
                    <td><?php echo $bli->tgl_pembelian; ?></td>
                    <td></td>
                    <td>
                        <button class="btn btn-sm btn-danger" href="#">Void</button> 
                        <button class="btn btn-sm btn-success" href="#">Update</button>
                        <button class="btn btn-sm btn-primary" href="#">Confirm</button>
                    </td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
 
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
