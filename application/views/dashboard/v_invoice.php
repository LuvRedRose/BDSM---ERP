        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transaction</h1>
            <a href="<?php echo base_url().'supplier'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-money-bill"></i> Supplier</a>
            </div>
        <table class="table mt-3" id="invoice">
            <thead class="thead-dark">
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
                    <td>Rp. <?php echo number_format($bli->price, 0,',','.'); ?></td>
                    <td>Rp.  <?php echo number_format($bli->total_harga, 0,',','.'); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($bli->tgl_pembelian))?></td>
                    <td><?php if($bli->status=="posted"){
                        echo "<span class='badge badge-success'>Posted</span>";
                    }else{
                        echo "<span class='badge badge-warning'>Outstanding</span>";
                    } ?>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-secondary" href="<?php echo base_url().'transaction/update_invoice/'.$bli->id_invoice; ?>">Update</a>
                        <a class="btn btn-sm btn-danger" href="<?php echo base_url().'transaction/delete_invoice/'.$bli->id_invoice; ?>">Delete</a>                        
                    </td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
 
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
