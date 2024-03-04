<?php $__env->startSection('content'); ?>

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Job
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('machines.show', $machine->id)); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('jobs.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="status_1" id="status_1" value="<?php echo e($settings->status_1); ?>">
                    <input type="hidden" name="status_1" id="status_2" value="<?php echo e($settings->status_2); ?>">
                    <input type="hidden" name="status_1" id="status_3" value="<?php echo e($settings->status_3); ?>">
                    <input type="hidden" name="status_1" id="status_4" value="<?php echo e($settings->status_4); ?>">

                    <div class="mb-3 row">
                        <label for="machineName" class="col-md-4 fol-form-label text-md-end text-start">Machine</label>
                        <div class="col-md-6">
                            <input type="hidden" name="machine" id="machine" value="<?php echo e($machine->id); ?>">
                            <input type="text" name="machineName" id="machineName" class="form-control" value="<?php echo e($machine->stock); ?> - <?php echo e($machine->make); ?> <?php echo e($machine->model); ?> - <?php echo e($machine->getCustomer->name); ?>" readonly="" disabled="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="number" class="col-md-4 col-form-label text-md-end text-start">Syrinx Job No#</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="number" name="number" value="<?php echo e(old('number')); ?>">
                            <?php if($errors->has('number')): ?>
                                <span class="text-danger"><?php echo e($errors->first('number')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="fault" class="col-md-4 col-form-label text-md-end text-start">Reported Fault</label>
                        <div class="col-md-6">
                            <textarea name="fault" class="form-control <?php $__errorArgs = ['fault'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="fault" cols="30" rows="3"><?php echo e(old('fault')); ?></textarea>
                            <?php if($errors->has('fault')): ?>
                                <span class="text-danger"><?php echo e($errors->first('fault')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start">Site Address</label>
                        <div class="col-md-6">
                            <textarea name="address" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="address" cols="30" rows="3"><?php echo e(old('address')); ?></textarea>
                            <?php if($errors->has('address')): ?>
                                <span class="text-danger"><?php echo e($errors->first('address')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="contactName" class="col-md-4 col-form-label text-md-end text-start">Contact Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['contactName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="contactName" name="contactName" value="<?php echo e(old('contactName')); ?>">
                            <?php if($errors->has('contactName')): ?>
                                <span class="text-danger"><?php echo e($errors->first('contactName')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="contactNo" class="col-md-4 col-form-label text-md-end text-start">Contact No#</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['contactNo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="contactNo" name="contactNo" value="<?php echo e(old('contactNo')); ?>">
                            <?php if($errors->has('contactNo')): ?>
                                <span class="text-danger"><?php echo e($errors->first('contactNo')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Job">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\cjrow\OneDrive\Desktop\VSC_Projects\Portal\resources\views/jobs/create.blade.php ENDPATH**/ ?>