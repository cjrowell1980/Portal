<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">Open Jobs List</div>
    <div class="card-body">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-customer')): ?>
        
        <?php endif; ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col" width="50px">#</th>
                <th scope="col">Job</th>
                <th scope="col">Stock</th>
                <th scope="col">Machine</th>
                <th scope="col" colspan="2">Status</th>
                <th scope="col" width="250px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                    <td><?php echo e($row->number); ?></td>
                    <td><?php echo e($row->getMachine->stock); ?></td>
                    <td><?php echo e($row->getMachine->make . ' ' . $row->getMachine->model); ?></td>
                    <td></td>
                    <td></td>
                    <td class="float-center">
                        <form action="<?php echo e(route('jobs.destroy', $row->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <a href="<?php echo e(route('jobs.show', $row->id)); ?>" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-jobs')): ?>
                                <a href="<?php echo e(route('jobs.edit', $row->id)); ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-jobs')): ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this jobs?');"><i class="bi bi-trash"></i> Delete</button>
                            <?php endif; ?>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <td colspan="7">
                        <span class="text-center text-danger fw-bold">
                            <p>No Jobs Found!</p>
                        </span>
                    </td>
                <?php endif; ?>
            </tbody>
        </table>

        <?php echo e($jobs->links()); ?>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\cjrow\OneDrive\Desktop\VSC_Projects\Portal\resources\views/jobs/index.blade.php ENDPATH**/ ?>