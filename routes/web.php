<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;






Route::get('/prueba', function () {
    return view('prueba');
})->name('prueba');

route::get('/',[LoginController::class, 'login'])->name('login');
Route::post('validar',[LoginController::class, 'validar'])->name('validar');
route::get('inicio',[LoginController::class, 'inicio'])->name('inicio');
route::get('recuperacion',[LoginController::class, 'recuperacion'])->name('recuperacion');
route::get('recuperarcontrasena',[LoginController::class, 'recuperarcontrasena'])->name('recuperarcontrasena');

Route::resource('clientes', ClientesController::class);
Route::resource('contactos', ContactosController::class);

