<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Warehouse Detail</h1>
    </div>

    <table class="table table-inverse mt-3" id="gudang">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Ware Use</th>
                <th>Cluster</th>
                <th>Rack</th>
                <th>Activity</th>
                <th>Date</th>   
            </tr>
         </thead>
         <tbody>
         <?php 
         $no = 1;
         foreach ($warehouse_detail as $dtl) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $dtl->product_name;?></td>
                <td><?php echo $dtl->ware_qty; ?></td>
                <td><?php echo $dtl->ware_name; ?></td>
                <td><?php echo $dtl->ware_cluster; ?></td>
                <td><?php echo $dtl->ware_rack; ?></td>
                <td><?php echo $dtl->ware_activity; ?></td>
                <td><?php echo date('d-F-Y', strtotime($dtl->ware_date)); ?></td>
            </tr>
        <?php } ?> 
        </tbody>
    </table>
</div>