<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware()->group(function () {
    require base_path('routes/api/user.php');
});