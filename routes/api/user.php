
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\UserController;

Route::prefix('v1/users')->group(function () {
    Route::get('/', [UserController::class, 'index']);

    Route::post('/', [UserController::class, 'store']);

    Route::get('{id}', [UserController::class, 'show']);

    Route::put('{id}', [UserController::class, 'update']);

    Route::delete('{id}', [UserController::class, 'destroy']);
});