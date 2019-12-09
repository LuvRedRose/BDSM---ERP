<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Shipment</h1>
        <a href="<?php echo base_url().'shipment/add'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-money-bill"></i>Add Shipment</a>
    </div>

    <table class="table table-inverse mt-3" id="shipment">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Shipment Name</th>
                <th>Shipment Date</th>
                <th>Departure</th>
                <th>Destination</th>
                <th>Duration</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach($shipment as $shp) {  ?>
            <tr>
                <td scope="row"><?php echo $no++; ?></td>
                <td><?php echo $shp->ship_name; ?></td>
                <td><?php echo $shp->ship_date; ?></td>
                <td><?php echo $shp->ship_depart; ?></td>
                <td><?php echo $shp->ship_destination; ?></td>
                <td><?php echo $shp->ship_duration; ?></td>
                <td><?php echo $shp->ship_qty; ?></td>
                <td>
                    <a class="btn btn-sm btn-warning" href="<?php echo base_url().'shipment/edit/'.$shp->ship_id; ?>">Update</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>