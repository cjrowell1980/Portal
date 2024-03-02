<?php $__env->startSection('content'); ?>

<div class="row justify-content-center">
    <div>

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Job Information
                </div>
                <div class="float-end">
                    <form action="<?php echo e(route('jobs.destroy', $job->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <a href="<?php echo e(route('jobs.show', $job->getMachine->id)); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-jobs')): ?>
                            <a href="<?php echo e(route('jobs.edit', $job->id)); ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-jobs')): ?>
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this job?');"><i class="bi bi-trash"></i> Delete
                        <?php endif; ?>
                    </form>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <label for="machineName" class="col-md-4 col-form-label text-md-end text-start"><strong>Machine:</strong></label>
                    <div class="col-md-6" style="line-height: 35px">
                        <?php echo e($job->getMachine->stock); ?> - <?php echo e($job->getMachine->make); ?> <?php echo e($job->getMachine->model); ?>

                    </div>
                </div>

                <div class="row">
                    <label for="number" class="col-md-4 col-form-label text-md-end text-start"><strong>Number:</strong></label>
                    <div class="col-md-6" style="line-height: 35px">
                        <?php echo e($job->number); ?>

                    </div>
                </div>

                <div class="row">
                    <label for="number" class="col-md-4 col-form-label text-md-end text-start"><strong>Fault:</strong></label>
                    <div class="col-md-6" style="line-height: 35px">
                        <?php echo nl2br($job->fault); ?>

                    </div>
                </div>

                <div class="row">
                    <label for="number" class="col-md-4 col-form-label text-md-end text-start"><strong>Address:</strong></label>
                    <div class="col-md-6" style="line-height: 35px">
                        <?php echo nl2br($job->address); ?>

                    </div>
                </div>

                <div class="row">
                    <label for="number" class="col-md-4 col-form-label text-md-end text-start"><strong>Contact:</strong></label>
                    <div class="col-md-6" style="line-height: 35px">
                        <?php echo e($job->contactName); ?><br />
                        <?php echo e($job->contactNo); ?>

                    </div>
                </div>

                <div class="row">
                    <label for="number" class="col-md-4 col-form-label text-md-end text-start"><strong>Engineer:</strong></label>
                    <div class="col-md-6" style="line-height: 35px">
                        <?php echo e($job->getEngineer->name); ?>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\cjrow\OneDrive\Desktop\VSC_Projects\Portal\resources\views/jobs/show.blade.php ENDPATH**/ ?>