<?php $__env->startSection('content'); ?>

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Machine
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('customers.show', $customerId)); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('machines.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Machine Owner#</label>
                        <div class="col-md-6">
                            <input type="hidden" name="customer" id="customer" value="<?php echo e($customerId); ?>">
                            <input type="text" name="customerName" id="customerName" class="form-control" value="<?php echo e($customers->firstWhere('id', $customerId)->name); ?>" readonly="" disabled="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Stock No#</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="stock" name="stock" value="<?php echo e(old('stock')); ?>">
                            <?php if($errors->has('stock')): ?>
                                <span class="text-danger"><?php echo e($errors->first('stock')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Fleet No#</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['asset'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="asset" name="asset" value="<?php echo e(old('asset')); ?>">
                            <?php if($errors->has('asset')): ?>
                                <span class="text-danger"><?php echo e($errors->first('asset')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Serial No#</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['serial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="serial" name="serial" value="<?php echo e(old('serial')); ?>">
                            <?php if($errors->has('serial')): ?>
                                <span class="text-danger"><?php echo e($errors->first('serial')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Make</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['make'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="make" name="make" value="<?php echo e(old('make')); ?>">
                            <?php if($errors->has('make')): ?>
                                <span class="text-danger"><?php echo e($errors->first('make')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Model</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['model'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="model" name="model" value="<?php echo e(old('model')); ?>">
                            <?php if($errors->has('model')): ?>
                                <span class="text-danger"><?php echo e($errors->first('model')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Year of Manufacture</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['yom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="yom" name="yom" value="<?php echo e(old('yom')); ?>">
                            <?php if($errors->has('yom')): ?>
                                <span class="text-danger"><?php echo e($errors->first('yom')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Machine">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\cjrow\OneDrive\Desktop\VSC_Projects\Portal\resources\views/machines/create.blade.php ENDPATH**/ ?>