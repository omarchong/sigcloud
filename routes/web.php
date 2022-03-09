<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServiciosController;
use Illuminate\Support\Facades\Route;






route::get('/',[LoginController::class, 'login'])->name('login');
Route::post('validar',[LoginController::class, 'validar'])->name('validar');
route::get('inicio',[LoginController::class, 'inicio'])->name('inicio');
route::get('recuperacion',[LoginController::class, 'recuperacion'])->name('recuperacion');
route::get('recuperarcontrasena',[LoginController::class, 'recuperarcontrasena'])->name('recuperarcontrasena');

Route::resource('clientes', ClientesController::class);
Route::resource('servicios', ServiciosController::class);

