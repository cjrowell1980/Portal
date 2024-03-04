<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __("Service Portal") }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Scripts and Stylesheets -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Service Portal
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            @canany(['create-jobs', 'edit-jobs', 'delete-jobs'])
                                <li class="nav-item">
                                    <a href="{{ route('jobs.index') }}" class="nav-link">Jobs</a>
                                </li>
                            @endcanany
                            @canany(['create-machines', 'edit-machines', 'delete-machines'])
                                <li class="nav-item">
                                    <a href="{{ route('machines.index') }}" class="nav-link">Machines</a>
                                </li>
                            @endcanany
                            @canany(['create-customer', 'edit-customer', 'delete-customer'])
                                <li class="nav-item">
                                    <a href="{{ route('customers.index') }}" class="nav-link">Customers</a>
                                </li>
                            @endcanany
                        @endauth

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @canany(['create-role', 'edit-role', 'delete-role', 'create-user', 'edit-user', 'delete-user', 'create-status', 'edit-status', 'delete-status'])
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="adminMenu">Settings</a>
                                    <div class="dropdown-menu" aria-labelledby="adminMenu">
                                        @canany(['create-role', 'edit-role', 'delete-role'])
                                            <a class="dropdown-item" href="{{ route('roles.index') }}">Manage Roles</a>
                                        @endcanany
                                        @canany(['create-user', 'edit-user', 'delete-user'])
                                            <a class="dropdown-item" href="{{ route('users.index') }}">Manage Users</a>
                                        @endcanany
                                        @canany(['create-status', 'edit-status', 'delete-status'])
                                            <a class="dropdown-item" href="{{ route('status.index') }}">Manage Statuses</a>
                                        @endcanany
                                        @canany(['create-engineers', 'edit-engineers', 'delete-engineers'])
                                            <a href="{{ route('engineers.index') }}" class="dropdown-item">Manage Engineers</a>
                                        @endcanany
                                        @canany(['edit-settings'])
                                            <a href="{{ route('settings.show', 1) }}" class="dropdown-item">Manage Settings</a>
                                        @endcanany
                                    </div>
                                </li>
                            @endcanany



                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center mt-3">
                    <div class="col-md-12">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success text-center alert-dismissible" role="alert">
                                {{ $message }}
                                <button class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                            </div>
                        @endif

                        @yield('content')

                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
