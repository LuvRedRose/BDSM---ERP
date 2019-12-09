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
            <td><?php echo date('d-F-Y', strtotime($mcn->mach_sd_date)); ?></td>
            <td><?php echo date('d-F-Y', strtotime($mcn->mach_su_date)); ?></td>
            <td><?php echo $mcn->mach_m_duration; ?></td>
            <td><?php echo $mcn->mach_capacity; ?></td>
            <!-- <td>
                <a class="btn btn-primary btn-sm" href="<?php echo base_url().'maintenance/edit/'.$mcn->mach_id; ?>">Update</a>
            </td> -->
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                  Launch
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                Body
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</div>