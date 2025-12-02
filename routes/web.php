<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenjualanController;

Route::get('/', function () {
    return view('index');
});

Route::get('/', [PenjualanController::class, 'index']);
