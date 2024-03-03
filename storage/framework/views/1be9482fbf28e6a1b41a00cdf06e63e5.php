<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">Status Lists</div>
    <div class="card-body">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-status')): ?>
            <a href="<?php echo e(route('status.create')); ?>" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New status</a>
        <?php endif; ?>

        <div class="accordion" id="accordionStatus">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Jobsheet Statuses (in display order)
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionStatus">
                    <div class="accordion-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="50px">#</th>
                                    <th scope="col" width="200px">Status</th>
                                    <th scope="col">Description</th>
                                    <th scope="col" width="250px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $status1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                                    <td class="text-center"><span class="badge w-75 rounded-pill bg-<?php echo e($row->colour); ?>"><?php echo e($row->name); ?></span></td>
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
                        <?php echo e($status1->links()); ?>

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Photo Statuses (in display order)
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionStatus">
                    <div class="accordion-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="50px">#</th>
                                    <th scope="col" width="200px">Status</th>
                                    <th scope="col">Description</th>
                                    <th scope="col" width="250px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $status3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                                    <td class="text-center"><span class="badge w-75 rounded-pill bg-<?php echo e($row->colour); ?>"><?php echo e($row->name); ?></span></td>
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
                        <?php echo e($status3->links()); ?>

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Incoming Invoice Statuses (in display order)
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionStatus">
                    <div class="accordion-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="50px">#</th>
                                    <th scope="col" width="200px">Status</th>
                                    <th scope="col">Description</th>
                                    <th scope="col" width="250px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $status2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                                    <td class="text-center"><span class="badge w-75 rounded-pill bg-<?php echo e($row->colour); ?>"><?php echo e($row->name); ?></span></td>
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
                        <?php echo e($status2->links()); ?>

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Outgoing Invoice / Warranty Claim Statuses (in display order)
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionStatus">
                    <div class="accordion-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="50px">#</th>
                                    <th scope="col" width="200px">Status</th>
                                    <th scope="col">Description</th>
                                    <th scope="col" width="250px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $status4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                                    <td class="text-center"><span class="badge w-75 rounded-pill bg-<?php echo e($row->colour); ?>"><?php echo e($row->name); ?></span></td>
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
                        <?php echo e($status4->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\cjrow\OneDrive\Desktop\VSC_Projects\Portal\resources\views/status/index.blade.php ENDPATH**/ ?>