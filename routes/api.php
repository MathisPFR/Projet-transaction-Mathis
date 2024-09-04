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
    Route::get('/transactions', [TransactionController::class, 'index']);  // Voir toutes les transactions
    Route::post('/transactions', [TransactionController::class, 'store']);  // Créer une nouvelle transaction
    Route::get('/transactions/{id}', [TransactionController::class, 'show']);  // Voir une transaction spécifique
    Route::put('/transactions/{id}', [TransactionController::class, 'update']);  // Mettre à jour une transaction
    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);  // Supprimer une transaction
});
