<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServiciosController;
use Illuminate\Support\Facades\Route;



Route::get('/prueba', function () {
    return view('prueba');
})->name('prueba');

Route::get('/panel-administrativo', [HomeController::class,'index'])->name('home');
route::get('/',[LoginController::class, 'login'])->name('login');
Route::post('validar',[LoginController::class, 'validar'])->name('validar');
route::get('inicio',[LoginController::class, 'inicio'])->name('inicio');
route::get('recuperacion',[LoginController::class, 'recuperacion'])->name('recuperacion');
route::get('recuperarcontrasena',[LoginController::class, 'recuperarcontrasena'])->name('recuperarcontrasena');

Route::resource('clientes', ClientesController::class);
Route::resource('contactos', ContactosController::class);
Route::get('datatables/contactos', [ContactosController::class, 'RegistrosDatatables'])->name('contactos.datatables');


Route::resource('servicios', ServiciosController::class);

