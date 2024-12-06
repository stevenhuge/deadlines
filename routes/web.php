<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\AdminOnly;
use App\Http\Middleware\ClientOnly;
use App\Http\Middleware\SuperadminOnly;
use Illuminate\Support\Facades\Route;

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


Route::get('/login', [LoginController::class, 'index'])->name('login');

// main route
Route::middleware('auth:sanctum')->group(function () {

    // superadmin route
    Route::middleware(SuperadminOnly::class)->group(function () {
        Route::get('/sim-admin', [SuperadminController::class, 'index'])->name('superadmin');
        Route::get('/sim-admin/user', [SuperadminController::class, 'user'])->name('user');
        Route::get('/sim-admin/{id}', [SuperadminController::class, 'destroy'])->name('user.destroy');
    });

    // admin route
    Route::middleware(AdminOnly::class)->group(function () {
        Route::get('/admin/dashboard', [TaskController::class, 'admin_index'])->name('admin.dashboard');
        Route::put('/admin/{task}', [TaskController::class, 'admin_update'])->name('admin.update');
        Route::get('/admin/{task}/download', [TaskController::class, 'download'])->name('tasks.download');
    });

    // client route
    Route::middleware(ClientOnly::class)->group(function () {
        Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');
        Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
        Route::post('/dashboard', [TaskController::class, 'store'])->name('tasks.store');
        Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    });
});





// route login
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
