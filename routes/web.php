<?php

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;
use App\Http\Controllers\OrderController;

Route::redirect('/', '/menu');

// Views
Route::get('/menu', [PosController::class, 'index'])->name('pos.menu');
Route::get('/kitchen', [PosController::class, 'kitchenView'])->name('pos.kitchen');
Route::get('/dashboard', [PosController::class, 'dashboardView'])->name('pos.dashboard');

// Actions / API
Route::post('/checkout/store', [PosController::class, 'storeOrder'])->name('checkout.store');
Route::post('/kitchen/status/{id}', [PosController::class, 'updateStatus'])->name('kitchen.status');