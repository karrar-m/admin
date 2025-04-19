<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\UserController;

Route::post('/add', [UserController::class, 'store']);

Route::prefix('v1')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});