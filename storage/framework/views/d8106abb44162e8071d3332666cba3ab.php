<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">Manage Engineers</div>
    <div class="card-body">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-engineers')): ?>
            <a href="<?php echo e(route('engineers.create')); ?>" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Engineer</a>
        <?php endif; ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col" width="50px">#</th>
                <th scope="col" width="150px">Short</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">eMail</th>
                <th scope="col" width="350px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $engineers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                    <td><?php echo e($row->short); ?></td>
                    <td><?php echo e($row->name); ?></td>
                    <td><?php echo e($row->mobile); ?></td>
                    <td><?php echo e($row->email); ?></td>
                    <td class="float-center">
                        <form action="<?php echo e(route('engineers.destroy', $row->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <a href="mailto:<?php echo e($row->email); ?>" class="btn btn-info btn-sm"><i class="bi bi-envelope-at"></i> Send eMail</a>

                            <a href="<?php echo e(route('engineers.show', $row->id)); ?>" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-engineers')): ?>
                                <a href="<?php echo e(route('engineers.edit', $row->id)); ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-engineers')): ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this engineer?');"><i class="bi bi-trash"></i> Delete</button>
                            <?php endif; ?>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <td colspan="3">
                        <span class="text-danger text-center fw-bold">
                            <p>No Customers Found!</p>
                        </span>
                    </td>
                <?php endif; ?>
            </tbody>
        </table>

        <?php echo e($engineers->links()); ?>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\cjrow\OneDrive\Desktop\VSC_Projects\Portal\resources\views/engineers/index.blade.php ENDPATH**/ ?>