<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;

Route::redirect('/', '/menu');

Route::get('/menu', [PosController::class, 'index']);
Route::get('/kitchen', [PosController::class, 'kitchenView']);
Route::get('/dashboard', [PosController::class, 'dashboardView']);

Route::post('/api/orders/store', [PosController::class, 'storeOrder']);
Route::patch('/api/orders/{id}/status', [PosController::class, 'updateStatus']);
