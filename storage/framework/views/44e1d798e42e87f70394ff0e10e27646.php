<?php $__env->startSection('content'); ?>

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Status
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('status.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('status.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3 row">
                        <label for="parent" class="col-md-4 col-form-label text-md-end text-start">Status Category</label>
                        <div class="col-md-6">
                            <select name="parent" id="parent" class="form-select <?php $__errorArgs = ['parent'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="1">Jobsheets</option>
                                <option value="2">Photos</option>
                                <option value="3">Incoming Invoices</option>
                                <option value="4">Outgoing Invoices</option>
                            </select>
                            <?php if($errors->has('parent')): ?>
                                <span class="text-danger"><?php echo e($errors->first('parent')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="order" class="col-md-4 col-form-label text-md-end text-start">Display Order</label>
                        <div class="col-md-6">
                        <input type="text" class="form-control <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="order" name="order" value="<?php echo e(old('order')); ?>" placeholder="hint: low numbers display first">
                            <?php if($errors->has('order')): ?>
                                <span class="text-danger"><?php echo e($errors->first('order')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                        <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" value="<?php echo e(old('name')); ?>">
                            <?php if($errors->has('name')): ?>
                                <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="description" name="description"><?php echo e(old('description')); ?></textarea>
                            <?php if($errors->has('description')): ?>
                                <span class="text-danger"><?php echo e($errors->first('description')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="parent" class="col-md-4 col-form-label text-md-end text-start">Status Colour</label>
                        <div class="col-md-6 ">
                            <select name="colour" id="colour" class="form-control">
                                <option value="primary">Primary</option>
                                <option value="secondary">Secondary</option>
                                <option value="success">Success</option>
                                <option value="info">Info</option>
                                <option value="warning">Warning</option>
                                <option value="danger">Danger</option>
                            </select>
                            <?php if($errors->has('parent')): ?>
                                <span class="text-danger"><?php echo e($errors->first('parent')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <span class="badge bg-primary col-md-2">Primary</span>
                        <span class="badge bg-secondary col-md-2">Secondary</span>
                        <span class="badge bg-success col-md-2">Success</span>
                        <span class="badge bg-info col-md-2">Info</span>
                        <span class="badge bg-warning col-md-2">Warning</span>
                        <span class="badge bg-danger col-md-2">Danger</span>
                        
                    </div>
                     
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Status">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\cjrow\OneDrive\Desktop\VSC_Projects\Portal\resources\views/status/create.blade.php ENDPATH**/ ?>