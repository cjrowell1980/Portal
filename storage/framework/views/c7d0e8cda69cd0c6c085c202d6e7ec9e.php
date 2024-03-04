<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">Machine List</div>
    <div class="card-body">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-customer')): ?>
        
        <?php endif; ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col" width="50px">#</th>
                <th scope="col" width="100px">Stock</th>
                <th scope="col">Make & Model</th>
                <th scope="col" width="110px" class="text-center">Open Jobs</th>
                <th scope="col" width="110px" class="text-center">Closed Jobs</th>
                <th scope="col" width="250px" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $machines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                    <td><?php echo e($row->stock); ?></td>
                    <td><?php echo e($row->make); ?> <?php echo e($row->model); ?></td>
                    <td class="text-center"><?php echo e(count($row->getJobs->where('status', 0))); ?> </td>
                    <td class="text-center"><?php echo e(count($row->getJobs->where('status', 1))); ?> </td>
                    <td class="text-center">
                        <form action="<?php echo e(route('machines.destroy', $row->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <a href="<?php echo e(route('machines.show', $row->id)); ?>" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-machines')): ?>
                                <a href="<?php echo e(route('machines.edit', $row->id)); ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-machines')): ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this machine?');"><i class="bi bi-trash"></i> Delete</button>
                            <?php endif; ?>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <td colspan="5">
                        <span class="text-danger text-center fw-bold">
                            <p>No Machines Found!</p>
                        </span>
                    </td>
                <?php endif; ?>
            </tbody>
        </table>

        <?php echo e($machines->links()); ?>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\cjrow\OneDrive\Desktop\VSC_Projects\Portal\resources\views/machines/index.blade.php ENDPATH**/ ?>