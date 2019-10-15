<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Supplier</h1>
        <a href="<?php echo base_url().'supplier/form_supplier'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-money-bill"></i> Buy Material</a>
    </div>

    <div class="row">

            <table class="table table-inverse">
                <thead class="thead-inverse thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Supplier Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Telpon Number</th>
                        <th>Material</th>
                        <th>Price (/kg)</th>
                        <th>Rekening Number</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach($barang as $brg) { ?>
                        <tr>
                            <td scope="row"><?php echo $no++; ?></td>
                            <td><?php echo $brg->supplier_name; ?></td>
                            <td><?php echo $brg->address_supplier; ?></td>
                            <td><?php echo $brg->email; ?></td>
                            <td><?php echo $brg->no_telp; ?></td>
                            <td><?php echo $brg->material; ?></td>
                            <td><?php echo $brg->price; ?></td>
                            <td><?php echo $brg->no_rek; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
    
    </div>

</div>