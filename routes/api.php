<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CustomerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/* Route::apiResource('customers', CustomerController::class); */
Route::get('customers', [CustomerController::class, 'index']);
Route::post('customers', [CustomerController::class, 'action']);

