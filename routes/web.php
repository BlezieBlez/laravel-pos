<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;

// Main POS Menu & Order Processing
Route::get('/menu', [PosController::class, 'index'])->name('pos.menu');
Route::get('/', [PosController::class, 'index'])->name('pos.index');
Route::get('/pos', [PosController::class, 'index']);
Route::post('/pos/order', [PosController::class, 'storeOrder'])->name('pos.order.store');

// Kitchen Live Display & Queue Updates
Route::get('/kitchen', [PosController::class, 'kitchenView'])->name('pos.kitchen');
Route::get('/kitchen/live-queue', [PosController::class, 'getLiveQueue'])->name('pos.kitchen.live');
Route::post('/kitchen/order/{id}/status', [PosController::class, 'updateStatus'])->name('pos.kitchen.update');

// Analytics Dashboard
Route::get('/dashboard', [PosController::class, 'dashboardView'])->name('pos.dashboard');