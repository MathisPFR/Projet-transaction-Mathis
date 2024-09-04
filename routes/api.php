<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index']); 
    Route::post('/transactions', [TransactionController::class, 'store']);  
    Route::get('/transactions/{id}', [TransactionController::class, 'show']);  
    Route::put('/transactions/{id}', [TransactionController::class, 'update']);  
    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']); 
    Route::delete('/users/{id}', [AuthController::class, 'destroy']);
 
});
