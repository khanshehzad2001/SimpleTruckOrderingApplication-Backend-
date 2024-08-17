<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/orders', [AdminController::class, 'getAllOrders'])->name('admin.orders');
    Route::patch('/admin/orders/{id}', [AdminController::class, 'updateOrderStatus'])->name('admin.updateOrder');
    Route::post('/admin/orders/{id}/communicate', [AdminController::class, 'communicateWithUser'])->name('admin.communicate');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
// Route::post('/login', [LoginController::class, 'login']);