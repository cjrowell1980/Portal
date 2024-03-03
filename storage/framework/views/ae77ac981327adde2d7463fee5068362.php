<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(__("Service Portal")); ?></title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Scripts and Stylesheets -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    Service Portal
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <?php if(auth()->guard()->check()): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['create-jobs', 'edit-jobs', 'delete-jobs'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('jobs.index')); ?>" class="nav-link">Jobs</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['create-machines', 'edit-machines', 'delete-machines'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('machines.index')); ?>" class="nav-link">Machines</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['create-customer', 'edit-customer', 'delete-customer'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('customers.index')); ?>" class="nav-link">Customers</a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['create-role', 'edit-role', 'delete-role', 'create-user', 'edit-user', 'delete-user', 'create-status', 'edit-status', 'delete-status'])): ?>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="adminMenu">Settings</a>
                                    <div class="dropdown-menu" aria-labelledby="adminMenu">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['create-role', 'edit-role', 'delete-role'])): ?>
                                            <a class="dropdown-item" href="<?php echo e(route('roles.index')); ?>">Manage Roles</a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['create-user', 'edit-user', 'delete-user'])): ?>
                                            <a class="dropdown-item" href="<?php echo e(route('users.index')); ?>">Manage Users</a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['create-status', 'edit-status', 'delete-status'])): ?>
                                            <a class="dropdown-item" href="<?php echo e(route('status.index')); ?>">Manage Statuses</a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['create-engineers', 'edit-engineers', 'delete-engineers'])): ?>
                                            <a href="<?php echo e(route('engineers.index')); ?>" class="dropdown-item">Manage Engineers</a>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endif; ?>



                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center mt-3">
                    <div class="col-md-12">

                        <?php if($message = Session::get('success')): ?>
                            <div class="alert alert-success text-center" role="alert">
                                <?php echo e($message); ?>

                            </div>
                        <?php endif; ?>

                        <?php if($message = Session::get('errors')): ?>
                            <div class="alert alert-danger text-center" role="alert">
                                <?php echo e($message); ?>

                            </div>
                        <?php endif; ?>

                        <?php echo $__env->yieldContent('content'); ?>

                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\cjrow\OneDrive\Desktop\VSC_Projects\Portal\resources\views/layouts/app.blade.php ENDPATH**/ ?>