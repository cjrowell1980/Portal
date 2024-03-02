<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EngineersController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\MachinesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return view('dashboard');
    } else {
        return view('auth.login');
    }
});

Auth::routes([
    'register'  => false,   // Registration routes
    'reset'     => false,   // Password reset routes
    'verify'    => false,   // Verify email routes
]);

Route::resources([
    'roles'         => RoleController::class,
    'users'         => UserController::class,
    'status'        => StatusController::class,
    'dashboard'     => DashboardController::class,
    'customers'     => CustomersController::class,
    'machines'      => MachinesController::class,
    'jobs'          => JobsController::class,
    'engineers'     => EngineersController::class,
]);

Route::get('/machines/{id}/pretransfer', [MachinesController::class, 'pretransfer'])->name('machines.pretransfer');
Route::put('/machines/{id}/transfer', [MachinesController::class, 'transfer'])->name('machines.transfer');
