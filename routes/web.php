<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(TestController::class)->group(function () {
    Route::get('/users', 'show_user');
});
