<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;


// POS Menu & Order Processing
Route::get('/', [PosController::class, 'index'])->name('pos.menu');
Route::get('/menu', [PosController::class, 'index'])->name('pos.menu');
Route::post('/order/store', [PosController::class, 'storeOrder'])->name('order.store');
Route::post('/checkout', [PosController::class, 'checkout'])->name('order.checkout');

// Kitchen Display System (KDS)
Route::get('/kitchen', [PosController::class, 'kitchenView'])->name('kitchen.view');
Route::get('/kitchen/live-queue', [PosController::class, 'getLiveQueue'])->name('kitchen.live');
Route::post('/kitchen/order/{id}/status', [PosController::class, 'updateStatus'])->name('kitchen.order.status');

// Analytics Dashboard
Route::get('/dashboard', [PosController::class, 'dashboardView'])->name('dashboard.view');