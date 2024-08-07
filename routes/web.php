<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [OrderController::class,'index']);
Route::post('/checkout', [OrderController::class,'checkout']);
Route::get('/checkout', [OrderController::class,'checkout']);
Route::get('/invoice/{id}', [OrderController::class,'invoice']);

