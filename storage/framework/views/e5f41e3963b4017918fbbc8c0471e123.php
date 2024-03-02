<?php $__env->startSection('content'); ?>

<div class="row justify-content-center">
    <div>

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Customer Information
                </div>
                <div class="float-end">
                    <form action="<?php echo e(route('customers.destroy', $customer->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <a href="<?php echo e(route('customers.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-customer')): ?>
                            <a href="<?php echo e(route('customers.edit', $customer->id)); ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-customer')): ?>
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this customer?');"><i class="bi bi-trash"></i> Delete
                        <?php endif; ?>
                    </form>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="parent" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($customer->name); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="order" class="col-md-4 col-form-label text-md-end text-start"><strong>Syrinx Acc:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($customer->syrinx); ?>

                        </div>
                    </div>

            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <div class="float-start">
                    Machines
                </div>
                <div class="float-end">

                    <a href="<?php echo e(route('machines.create', "id=".$customer->id)); ?>" class="btn btn-sm btn-success">Add Machine</a>

                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="1%">Id</th>
                        <th scope="col">Make</th>
                        <th scope="col">Model</th>
                        <th scope="col" width="250px">Action</th>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $machines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $machine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="row"><?php echo e($loop->iteration); ?></th>
                            <td><?php echo e($machine->stock); ?></td>
                            <td><?php echo e($machine->make); ?></td>
                            <td><?php echo e($machine->model); ?></td>
                            <td>
                                <form action="<?php echo e(route('machines.destroy', $machine->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <a href="<?php echo e(route('machines.show', $machine->id)); ?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i> Show</a>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-machines')): ?>
                                        <a href="<?php echo e(route('machines.edit', $machine->id)); ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
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
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\cjrow\OneDrive\Desktop\VSC_Projects\Portal\resources\views/customers/show.blade.php ENDPATH**/ ?>