<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">status List</div>
    <div class="card-body">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-status')): ?>
            <a href="<?php echo e(route('status.create')); ?>" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New status</a>
        <?php endif; ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" width="50px">#</th>
                    <th scope="col">Group</th>
                    <th scope="col">Order</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col" width="220px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                    <td><?php echo e(($row->parent == '1') ? __("Primary") : __("Secondary")); ?></td>
                    <td><?php echo e($row->order); ?></td>
                    <td><?php echo e($row->name); ?></td>
                    <td><?php echo e($row->description); ?></td>
                    <td>
                        <form action="<?php echo e(route('status.destroy', $row->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <a href="<?php echo e(route('status.show', $row->id)); ?>" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-status')): ?>
                                <a href="<?php echo e(route('status.edit', $row->id)); ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-status')): ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this status?');"><i class="bi bi-trash"></i> Delete</button>
                            <?php endif; ?>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <td colspan="6">
                        <span class="text-danger text-center fw-bold">
                            <p>No Statuses Found!</p>
                        </span>
                    </td>
                <?php endif; ?>
            </tbody>
        </table>

        <?php echo e($status->links()); ?>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\cjrow\OneDrive\Desktop\VSC_Projects\Portal\resources\views/status/index.blade.php ENDPATH**/ ?>