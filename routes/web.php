<?php

use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('system.login.login');
});

Route::resource('clientes', ClientesController::class);
