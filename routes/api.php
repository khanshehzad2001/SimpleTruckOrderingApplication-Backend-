<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/orders', [OrderController::class, 'createOrder']);
    Route::get('/orders', [OrderController::class, 'getOrders']);
});

Route::middleware(['auth:sanctum','admin'])->group(function () {
    Route::get('/admin/orders', [AdminController::class, 'getAllOrders']);
    Route::patch('/admin/orders/{id}', [AdminController::class, 'updateOrderStatus']);
    Route::post('/admin/orders/{id}/communicate', [AdminController::class, 'communicateWithUser']);
});

// Route::get('/', function () {
//     return 'API';
// });