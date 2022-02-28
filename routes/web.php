<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('system.login.login');
});

route::get('/',[LoginController::class, 'login'])->name('login');
Route::post('validar',[LoginController::class, 'validar'])->name('validar');
route::get('inicio',[LoginController::class, 'inicio'])->name('inicio');
route::get('recuperarcontraseña',[LoginController::class, 'recuperarcontraseña'])->name('recuperarcontraseña');
route::get('recuperacion',[LoginController::class, 'recuperacion'])->name('recuperacion');

Route::resource('clientes', ClientesController::class);

