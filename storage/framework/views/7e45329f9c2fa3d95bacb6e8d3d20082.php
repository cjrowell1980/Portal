<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">status List</div>
    <div class="card-body">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-customer')): ?>
            <a href="<?php echo e(route('customers.create')); ?>" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Customer</a>
        <?php endif; ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col" width="50px">#</th>
                <th scope="col" width="150px">Syrinx Acc#</th>
                <th scope="col">Name</th>
                <th scope="col" width="250px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                    <td><?php echo e($row->syrinx); ?></td>
                    <td><?php echo e($row->name); ?></td>
                    <td class="float-center">
                        <form action="<?php echo e(route('customers.destroy', $row->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <a href="<?php echo e(route('customers.show', $row->id)); ?>" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-customer')): ?>
                                <a href="<?php echo e(route('customers.edit', $row->id)); ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-customer')): ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this customer?');"><i class="bi bi-trash"></i> Delete</button>
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

        <?php echo e($customers->links()); ?>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\cjrow\OneDrive\Desktop\VSC_Projects\Portal\resources\views/customers/index.blade.php ENDPATH**/ ?>