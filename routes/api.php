<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\User\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// User API routes
Route::prefix('v1/users')->group(function () {
    Route::post('/', [UserController::class, 'store']);
});
