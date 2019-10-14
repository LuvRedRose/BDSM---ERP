<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-history" aria-hidden="true"></i> Production History</h1>
            <a href="<?php echo base_url().'production/product';?>" class="btn btn-sm btn-primary">Make Finishing Goods</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Material</th>
                    <th>Stok In</th>
                    <th>Finished Goods</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            foreach($produksi as $pds) { ?> 
                <tr>
                    <td scope="row"><?php echo $no++; ?></td>
                    <td><?php echo $pds->material; ?></td>
                    <td><?php echo $pds->stok_in; ?></td>
                    <td><?php echo $pds->stok_finish; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($pds->tgl_pembuatan))?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>


    </div>