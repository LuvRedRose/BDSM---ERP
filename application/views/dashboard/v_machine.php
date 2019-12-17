<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Machine</h1>
        <a href="<?php echo base_url().'maintenance/add'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-money-bill"></i>Add Maintenance</a>
    </div>

<table class="table table-inverse mt-3" id="maintenance">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Machine Number</th>
            <th>Date Start</th>
            <th>Date End</th>
            <th>Duration(/days)</th>
            <th>Machine Capacity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    foreach($machine as $mcn) { ?>
        <tr>
            <td scope="row"><?php echo $no++; ?></td>
            <td><?php echo $mcn->mach_number; ?></td>
            <td><?php echo $mcn->mach_sd_date; ?></td>
            <td><?php echo $mcn->mach_su_date; ?></td>
            <td><?php echo $mcn->mach_m_duration; ?></td>
            <td><?php echo $mcn->mach_capacity; ?></td>
            <td>
                <a class="btn btn-primary btn-sm" href="<?php echo base_url().'maintenance/edit/'.$mcn->mach_id; ?>">Update</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</div>