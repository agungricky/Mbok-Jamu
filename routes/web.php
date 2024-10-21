<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'index');
Route::view('/', 'Home');

Route::get('/form', [DashboardController::class, 'index']);
Route::post('/form', [DashboardController::class, 'store'])->name('form');