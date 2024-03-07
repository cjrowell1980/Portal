<?php $__env->startSection('content'); ?>

<div class="row justify-content-center">
    <div>

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <?php echo e($machine->make); ?> <?php echo e($machine->model); ?> - <?php echo e($machine->getCustomer->name); ?>

                </div>
                <div class="float-end">
                    <form action="<?php echo e(route('machines.destroy', $machine->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <a href="<?php echo e(route('customers.show', $machine->getCustomer->id)); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-machines')): ?>
                            <a href="<?php echo e(route('machines.edit', $machine->id)); ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-machines')): ?>
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this machine?');"><i class="bi bi-trash"></i> Delete</button>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-machines')): ?>
                            <a href="<?php echo e(route('machines.pretransfer', $machine->id)); ?>" class="btn btn-warning btn-sm"><i class="bi bi-arrow-left-right"></i> Transfer</a>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="parent" class="col-md-4 col-form-label text-md-end text-start"><strong>Stock Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($machine->stock); ?>

                        </div>
                    </div>
                    <?php if(empty(!$machine->asset)): ?>
                        <div class="row">
                            <label for="order" class="col-md-4 col-form-label text-md-end text-start"><strong>Fleet Ref:</strong></label>
                            <div class="col-md-6" style="line-height: 35px;">
                                <?php echo e($machine->asset); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <label for="order" class="col-md-4 col-form-label text-md-end text-start"><strong>Serial Number:</strong></label>
                        <div class="col-md-6 text-uppercase" style="line-height: 35px;">
                            <?php echo e($machine->serial); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="order" class="col-md-4 col-form-label text-md-end text-start"><strong>Year of Manufactuer:</strong></label>
                        <div class="col-md-6 text-uppercase" style="line-height: 35px;">
                            <?php echo e($machine->yom); ?>

                        </div>
                    </div>

            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <div class="float-start">
                    Jobs
                </div>
                <div class="float-end">

                    <a href="<?php echo e(route('jobs.create', 'id='.$machine->id)); ?>" class="btn btn-sm btn-success">Add Job</a>

                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="80px">Job No#</th>
                        <th scope="col" width="80px" class="text-center">Status</th>
                        <th scope="col">Fault</th>
                        <th scope="col" width="50px" class="text-center">Days</th>
                        <th scope="col" width="230px" class="text-center">Action</th>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $machine->getJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($row->number); ?></td>
                                <td class="text-center">
                                    <?php if($row->status): ?>
                                        <span class='badge rounded-pill bg-warning w-100'>Open</span>
                                    <?php else: ?>
                                        <span class='badge rounded-pill bg-success w-100'>Closed</span>                                    
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($row->fault); ?></td>
                                <td class="text-center">
                                    <?php if($row->status == 0): ?> 
                                        <?php echo e($row->updated_at->diffInDays($row->created_at)); ?>

                                    <?php else: ?> 
                                        <?php echo e(now()->diffInDays($row->created_at)); ?>

                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <form action="<?php echo e(route('jobs.destroy', $row->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <a href="<?php echo e(route('jobs.show', $row->id)); ?>" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                        <?php if($row->status == 1): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-jobs')): ?>
                                                <a href="<?php echo e(route('jobs.edit', $row->id)); ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>                                                
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-jobs')): ?>
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this machine?');"><i class="bi bi-trash"></i> Delete</button>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <td colspan="5">
                            <span class="text-danger text-center fw-bold">
                                <p>No Jobs Found!</p>
                            </span>
                        </td>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\cjrow\OneDrive\Desktop\VSC_Projects\Portal\resources\views/machines/show.blade.php ENDPATH**/ ?>